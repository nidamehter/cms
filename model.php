<?php

class Model extends Database {
    public function get($querystring = "") {
        try {
            //İstekten kendi sorgusu ile gelmezse belirtilen tablodan tüm veriler gelecek, belirtilmiş ise kendi yazdığı sorguya göre veri getirilecek.
            $query = $querystring;
            $result = $this->connection()->query($query)->fetchAll(PDO::FETCH_ASSOC);

            $this->result = [
                "success" => true,
                "result" => $result,
                "message" => "Get function called.",
                "date" => date("d/m/Y")
            ];

            return $this->result;
        } catch (PDOException $exception) {
            $this->result = [
                "success" => false,
                "result" => $exception,
                "message" => "Error",
                "date" => date("d/m/Y")
            ];
            return $this->result;
        }
    }

    public function Insert($query) {
        try {
            //InsertQueryGeneretor helperFunctions'tan gelen fonksiyon.
            $result = $this->connection()->prepare($query);
            $result->execute();
            if ($result->rowCount() > 0) {
                //Veri eklendikten sonra tekrardan eklenen verinin ID değerini çekiyoruz.
                $insertedValue = $this->lastID();
                $this->result = [
                    "success" => true,
                    "result" => $insertedValue,
                    "message" => $result->rowCount() . " rows inserted..",
                    "date" => date("d/m/Y")
                ];
                return $this->result;
            } else {
                $this->result = [
                    "success" => false,
                    "result" => "Rows could'nt inserted..",
                    "message" => "Insert function called.",
                    "date" => date("d/m/Y")
                ];
                return $this->result;
            }
        } catch (PDOException $exception) {
            $this->result = [
                "success" => false,
                "result" => $exception,
                "message" => "Error",
                "date" => date("d/m/Y")
            ];
            return $this->result;
        }
    }

    public function Update($query) {

        try {
            //UpdateQueryGeneretor helperFunctions'tan gelen fonksiyon.
            $result = $this->connection()->prepare($query);
            $result->execute();
            if ($result) {

                $this->result = [
                    "success" => true,
                    "message" => $result->rowCount(),
                ];
                return $this->result;
            } else {
                $this->result = [
                    "success" => false,
                    "result" => "Rows could'nt updated..",
                    "message" => "Update function called.",
                ];
                return $this->result;
            }
        } catch (PDOException $exception) {
            $this->result = [
                "success" => false,
                "result" => $exception,
                "message" => "Error",
            ];
            return $this->result;
        }
    }

    public function Delete($query) {
        try {
            $result = $this->connection()->prepare($query);
            $result->execute();
            if ($result) {
                $this->result = [
                    "success" => true,
                    "message" => $result->rowCount() . " rows deleted..",
                    "date" => date("d/m/Y")
                ];
                return $this->result;
            } else {
                $this->result = [
                    "success" => false,
                    "result" => "Rows could'nt deleted..",
                    "message" => "Delete function called.",
                    "date" => date("d/m/Y")
                ];
                return $this->result;
            }
        } catch (PDOException $exception) {
            $this->result = [
                "success" => false,
                "result" => $exception,
                "message" => "Error",
                "date" => date("d/m/Y")
            ];
            return $this->result;
        }
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

}
