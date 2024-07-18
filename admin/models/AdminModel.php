<?php
class AdminModel {
    private $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    

    private function getStrKeys($data) {
        $keys = array_keys($data);
        $keysTenTen = array_map(function ($key) {
            return "`$key`";
        }, $keys);
        return implode(',', $keysTenTen);
    }

    private function getVirtualParams($data) {
        $keys = array_keys($data);
        $tmp = [];
        foreach ($keys as $key) {
            $tmp[] = ":$key";
        }
        return implode(',', $tmp);
    }

    private function getSetParams($data) {
        $keys = array_keys($data);
        $tmp = [];
        foreach ($keys as $key) {
            $tmp[] = "`$key` = :$key";
        }
        return implode(',', $tmp);
    }

    public function insert($tableName, $data = []) {
        try {
            $strKeys = $this->getStrKeys($data);
            $virtualParams = $this->getVirtualParams($data);
            $sql = "INSERT INTO $tableName($strKeys) VALUES ($virtualParams)";
            $stmt = $this->conn->prepare($sql);

            foreach ($data as $fieldName => &$value) {
                $stmt->bindParam(":$fieldName", $value);
            }

            $stmt->execute();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }

    public function insertGetLastId($tableName, $data = []) {
        try {
            $strKeys = $this->getStrKeys($data);
            $virtualParams = $this->getVirtualParams($data);
            $sql = "INSERT INTO $tableName($strKeys) VALUES ($virtualParams)";
            $stmt = $this->conn->prepare($sql);

            foreach ($data as $fieldName => &$value) {
                $stmt->bindParam(":$fieldName", $value);
            }

            $stmt->execute();
            return $this->conn->lastInsertId();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }

    public function listAll($tableName) {
        try {
            $sql = "SELECT * FROM $tableName";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }

    public function showOne($tableName, $id, $columnName = 'id') {
        try {
            $sql = "SELECT * FROM $tableName WHERE $columnName = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }

    public function update($tableName, $id, $data = [], $idColumn = 'id') {
        try {
            $setParams = $this->getSetParams($data);
            $sql = "UPDATE $tableName SET $setParams WHERE $idColumn = :id";
            $stmt = $this->conn->prepare($sql);

            foreach ($data as $fieldName => &$value) {
                $stmt->bindParam(":$fieldName", $value);
            }

            $stmt->bindParam(":id", $id);
            $stmt->execute();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }

    public function delete($tableName, $id, $idColumn = 'id') {
        try {
            $sql = "DELETE FROM $tableName WHERE $idColumn = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }

    public function deleteMore($table1, $table2, $id, $idColumn = 'id') {
        try {
            $sql = "DELETE $table1, $table2
                    FROM $table1
                    JOIN $table2 ON $table1.$idColumn = $table2.$idColumn
                    WHERE $table1.$idColumn = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }

    public function checkUniqueName($tableName, $name) {
        try {
            $sql = "SELECT * FROM $tableName WHERE name = :name LIMIT 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":name", $name);
            $stmt->execute();
            $data = $stmt->fetch();
            return empty($data) ? true : false;
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }

    public function checkUniqueNameForUpdate($tableName, $id, $name) {
        try {
            $sql = "SELECT * FROM $tableName WHERE name = :name AND id <> :id LIMIT 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $data = $stmt->fetch();
            return empty($data) ? true : false;
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }

    private function debug($e) {
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        die();
    }
    public function insertDanhMuc($ten_danh_muc, $mo_ta)
    {
        try {
            $sql = 'INSERT INTO danh_mucs(ten_danh_muc, mo_ta) VALUES (:ten_danh_muc, :mo_ta)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_danh_muc' => $ten_danh_muc,
                ':mo_ta' => $mo_ta
            ]);
            return true;
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
}
?>
