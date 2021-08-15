/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100420
 Source Host           : localhost:3306
 Source Schema         : cms

 Target Server Type    : MySQL
 Target Server Version : 100420
 File Encoding         : 65001

 Date: 15/08/2021 12:15:50
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `caturl` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `active` tinytext CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `name`(`name`) USING BTREE,
  INDEX `id`(`id`, `name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES (1, 'Yazılım', 'yazilim', 'Yeni nesil programlama dilleri', '', '0');
INSERT INTO `category` VALUES (2, 'Uzay', 'uzay', 'Yeni bulunan gezegen', '', '1');
INSERT INTO `category` VALUES (3, 'Giyim', 'giyim', 'Yazın ve kışın giyilebilen ileri teknoloji tasarımlar', '', '0');
INSERT INTO `category` VALUES (10, 'Ülkemizdeki Son Durum', 'ulkemizdeki-son-durum', 'Yabancı uyruklu kimselerin kontrolsüz şekilde ülkeye girişi', 'BrainArt.jpg', '1');
INSERT INTO `category` VALUES (11, 'Sanat', 'sanata-dair-her-sey', 'Sanata Dair Her Şey', 'logo.png', '1');
INSERT INTO `category` VALUES (35, 'DGH Arge', 'dgh-arge', 'Mimari', 'unnamed.png', '1');

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menus
-- ----------------------------

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL COMMENT 'başlık',
  `message` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL COMMENT 'konu',
  `categoryid` int NOT NULL COMMENT 'kategori',
  `author` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL COMMENT 'yazar',
  `created` datetime NOT NULL COMMENT 'blog text',
  `text` varchar(3000) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL COMMENT 'text',
  `uploadedImageName` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL COMMENT 'yüklenmiş resmin adı',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `categoryid`(`categoryid`) USING BTREE,
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`categoryid`) REFERENCES `category` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 176 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES (1, 'Summertext', 'PHP-VUE2-Summertext ', 1, 'Burakhan', '2021-08-03 15:33:31', '<ul><li><b><font face=\"Arial Black\" style=\"background-color: rgb(247, 247, 247);\" color=\"#9c00ff\">Bugün az bir uyku ile yazmaya devam ediyorum ve sonunda vue2 ile summertext i projeye ekledim. Tam olarak çalışmama nedeni bir ton gereksiz script ve css dosyası oldu. Ama Nida, namı diğer codeTalker la çözmek için elimizden geleni yaptık ve her zaman ki gibi başaracağımıza inandık.Bence İyi bir ekibiz.</font></b></li></ul>', NULL);
INSERT INTO `posts` VALUES (76, 'PHP-CSS', 'EN YENİ KONULAR', 2, 'Nida', '2021-08-09 16:52:38', '<ul><li><strong>&nbsp; Merhaba, bu makalemde Axios‘tan bahsedeceğim. Axios, client side uygulamalarda HTTP çağrılarının kolayca yapılmasını sağlayan bir javascript kütüphanesidir. Npm veya bower paketi olarak veya CDN üzerinden kullanılabilir.</strong></li><li><strong>&nbsp; Günümüzde artık birçok web uygulaması client side olarak yazılıyor ve birçoğu Angular ve React gibi kütüphaneler kullanıyor. Yalnız, bir uygulama veya web sitesini sadece client side olarak yazmak pek de mümkün değildir. Verileri saklamak ve işlemek için bir veritabanına ve doğal olarak server üzerinde çalışacak bir uygulamaya yani bir API’ye ihtiyaç duyulur. Son olarak da bu iki ortamın birbiriyle haberleşmesi gerekir. İşte Axios, bu iki ortamın haberleşmesini sağlar. Eğer daha önce jQuery kullanmışsanız, $.ajax() fonksiyonu da benzer işi yapmaktadır.</strong></li></ul>', 'mult-axios.jpg');
INSERT INTO `posts` VALUES (86, 'Yönetim', 'Mülteci', 10, 'Ülke', '2021-08-12 17:19:09', '<p>Türkiye’deki geçici koruma altındaki kayıtlı Suriyeli sayısı 23 Temmuz 2021 tarihi itibarıyla bir önceki aya göre 6 bin 484 kişi <strong>artarak</strong> toplam <strong>3 milyon 690 bin 896 kişi</strong> oldu. Bu kişilerin 1 milyon 774 bin 520’si (%48) 0-18 yaş arası çocuklar oluşturuyor. 0-18 yaş arası çocukların ve kadınların toplam sayısı ise 2 milyon 627 bin 824 kişi. (%71,2)</p>', 'mülteci.jpg');
INSERT INTO `posts` VALUES (122, 'Sanat', 'Düşünceleri Anlatmanın Bambaşka Yolu', 11, 'AnOtherWorld', '2021-08-12 19:47:22', '<p>Kendimizi yansıtabildiğimiz en iyi sözsüz iletişim yoludur sanat…</p>', 'logo.png');
INSERT INTO `posts` VALUES (123, 'Güneş Enerjisi', '4 Mevsime Dayanıklı Garantili Enerji', 2, 'DGH', '2021-08-13 20:57:02', '<blockquote><p><i><strong>Türkiye Yenilenebilir Enerji Yönetmeliğine göre artık bina çatı üstü ve bina cephelerinde yenilenebilir enerji kaynaklarından olan temiz, sınırsız enerji kaynağı güneşten elektrik üretilebilecek, ihtiyaç fazlası elektrik olması durumunda elektrik dağıtım kurumuna satabilmek mümkündür.</strong></i></p></blockquote>', 'dghenerji.png');
INSERT INTO `posts` VALUES (173, 'Şiir', 'Sanat', 11, 'Orhan Veli Kanık', '2021-08-14 17:53:29', '<ul><li>İstanbul u dinliyorum, gözlerim kapalı</li><li>Önce hafiften bir rüzgâr esiyor</li><li>Yavaş yavaş sallanıyor Yapraklar, ağaçlarda</li><li>Uzaklarda, çok uzaklarda</li><li>Sucuların hiç durmayan çıngırakları İstanbulu dinliyorum, gözlerim kapalı.</li></ul>', 'orhanveli.jpg');
INSERT INTO `posts` VALUES (174, 'Kürk Mantolu Madonna', 'Roman', 11, 'Sabahattin Ali', '2021-08-14 18:01:25', '<p>Romanın baş karakterleri Maria Puder ve Raif Efendidir. Raif Efendi içine kapanık, melankolik, sessiz ve dış dünyaya uyum sağlayamamış bir karakterdir. Hayatı boyunca birçok şeye boyun eğmiş, haksızlığa uğradığında bile buna karşı koyamamıştır. Sevmediği bir kadınla evlenmiştir, bir ailesi vardır. Kendi hayatına kendi yön verememiş, başkalarının istediği bir insan olarak hayatını sürdürmüştür. Hayatında gerçekten yaşadığını hissettiği sadece bir anısı olmuştur ve bunu günlüğüne aktarmıştır.</p>', 'sabahattin.jpg');
INSERT INTO `posts` VALUES (175, 'Şamlı', 'Nesneler', 2, 'Burakhan', '2021-08-14 20:57:37', '<p>İçerikler…</p>', 'unnamed.png');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `passwords` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (9, 'burakhan', 'burakhan@gmail.com', '123', '1', 1);
INSERT INTO `users` VALUES (10, 'Nida', 'nidamehter278@gmail.com', '123', '1', 0);
INSERT INTO `users` VALUES (16, 'Burakhan Şamlı', '/cms/admin/userList', '123', '1', 1);
INSERT INTO `users` VALUES (17, 'Nida', 'Nida@gmail.com', '123', '1', 1);
INSERT INTO `users` VALUES (18, 'ABC', 'abc@gmail.com', '123', '2', 1);

SET FOREIGN_KEY_CHECKS = 1;
