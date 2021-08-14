<?php
require "siteSettings.php";

define("PATH", realpath('.'));

function getLastPath($number = 0) {
    $lastPath = explode("/", $_SERVER['REQUEST_URI']);
    $index = count($lastPath) - $number;
    return $lastPath[$index];
}

function settings($name) {
    global $setting;
    return (isset($setting[$name]) ? $setting[$name] : false);
}

function session($name) {
    if (isset($_SESSION[$name])) {
        return $_SESSION[$name];
    }
}

function sPost($name) {
    if (isset($_POST[$name])) {
        if (is_array($_POST[$name])) {
            return array_map(function ($item) {
                return htmlspecialchars(trim($item));
            }, $_POST[$name]);

            return htmlspecialchars(trim($_POST[$name]));
        }
    }
}

function sChar($arr) {
    if (isset($arr)) {
        if (is_array($arr)) {
            return array_map(function ($item) {
                return htmlspecialchars(trim($item));
            }, $arr);
        }
        return htmlspecialchars(trim($arr));
    }
}


function post($name) {
    if (isset($_POST[$name])) {
        return htmlspecialchars(trim($_POST[$name]));
    }
}

function slugit($str, $replace = array(), $delimiter = '-') {
    if (!empty($replace)) {
        $str = str_replace((array)$replace, ' ', $str);
    }
    $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str); //Ascii karakterlere çeviri yapar.
    $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '-', "$clean"); //Belirtilen karakterler harici(A-Z a-z 0-9 / _ | + (space) -) çeşitli noktalama işaretlerini "-" ile değiştirir.
    $clean = strtolower(trim($clean, '-')); //Değerin başında ve sonunda "-" işareti varsa trimler.
    $clean = preg_replace("/[\/_|+ -]+/", $delimiter, "$clean"); //Eğer belirtilen karakterlerin de istenilen bir karakter ile değiştirilmesini istiyorsak bunu kullanırız, şuan default olarak "-" ile değişiyor.
    return $clean;
}

function UpdateQueryGenerator($table, $model, $id) {
    $keys = array();
    $values = array();

    foreach (json_decode($model) as $key => $value) {
        array_push($keys, $key);
        array_push($values, $value);
    }

    $query = 'UPDATE ' . $table . ' SET ';
    for ($i = 0; $i < count($keys); $i++) {
        if ($i < count($keys) - 1) {
            $query .= $keys[$i] . " = '$values[$i]',";
        } else {
            $query .= $keys[$i] . " = '$values[$i]'";;
        }
    }
    $query .= ' WHERE id=' . $id;
    return $query;
}

function InsertQueryGenerator($table, $model) {
    $keys = array();
    $values = array();

    foreach (json_decode($model) as $key => $value) {
        array_push($keys, $key);
        array_push($values, $value);
    }

    $query = 'INSERT INTO ' . $table . ' (';
    for ($i = 0; $i < count($keys); $i++) {
        if ($i < count($keys) - 1) {
            $query .= $keys[$i] . ",";
        } else {
            $query .= $keys[$i];
        }
    }
    $query .= ') VALUES (';
    for ($i = 0; $i < count($values); $i++) {
        if ($i < count($values) - 1) {
            $query .= "'$values[$i]'" . ",";
        } else {
            $query .= "'$values[$i]'";
        }
    }

    $query .= ');';
    return $query;
}

function GenerateRandomCode($n = 11) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
    return $randomString;
}


/**
 * Açıklama: Görüntü işleme fonksiyondur.
 * 
 * Gereksinimler: php.ini içindeki "extension=gd", "extension=mbstring" yi önündeki ";" ü kaldırarak etkinleştiriniz.
 * 
 * Kullanım: imageTransform($src = "/desktop/image1.jpg", $dest = "/desktop/image2.jpg", [640, 480, false, 0, 100]);
 * 
 * @param string $src Kaynak Dosya
 * @param string $dest Hedef Dosya
 * @param array $dim [Width, Height, AspectRatio(True|False), Rotate, Quality]
 * @author "Codetalker&Blitzkrieg"
 * */
function imageTransform($src, $dest, $dim) {

    $imager = new Zebra_Image();

    $imager->source_path = $src;
    $imager->target_path = $dest;

    $imager->auto_handle_exif_orientation = true;  //$width, $height"extension=mbstring"
    $imager->enlarge_smaller_images = true; //False olarak ayarlanırsa, gerekli genişlik ve yükseklikten daha küçük; hem genişliğe hem de yüksekliğe sahip resimlere dokunulmaz.
    $imager->preserve_time = true;
    $imager->handle_exif_orientation_tag = true;

    $imager->preserve_aspect_ratio = $dim[2]; //Görüntünün bozulmaması için görüntüyü kırparak boyutlandırır. Resmin bir kısmı kaybolur.
    $imager->rotate($dim[3]);
    $imager->jpeg_quality = $dim[4];

    if (!$imager->resize($dim[0], $dim[1], ZEBRA_IMAGE_CROP_CENTER)) {

        switch ($imager->error) {

            case 1:
                echo 'Kaynak dosyası bulunamadı!';
                break;
            case 2:
                echo 'Kaynak dosyası okunabilir değil!';
                break;
            case 3:
                echo 'Hedef dosyaya yazılamıyor!';
                break;
            case 4:
                echo 'Desteklenmeyen formatta kaynak dosya!';
                break;
            case 5:
                echo 'Desteklenmeyen formatta hedef dosya!';
                break;
            case 6:
                echo 'GD kitaplığı sürümü, hedef dosya biçimini desteklemiyor!';
                break;
            case 7:
                echo 'GD kütüphanesi yüklü değil!';
                break;
            case 8:
                echo '"chmod" komutu ayarlardan dolayı devre dışı!';
                break;
            case 9:
                echo '"exif_read_data" fonksiyonu mevcut değil';
                break;
        }
    }
}
