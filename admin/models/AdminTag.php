<?php
class AdminTag
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllTag()
    {
        try {
            $sql = 'SELECT * FROM tags';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
            
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function insertTag($ten_tag, $mo_ta)
    {
        try {
            $sql = 'INSERT INTO tags(ten_tag, mo_ta) VALUES (:ten_tag, :mo_ta)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_tag' => $ten_tag,
                ':mo_ta' => $mo_ta
            ]);
            return true;
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function getDetailTag($id)
    {
        try {
            $sql = 'SELECT * FROM tags WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
                
            ]);
            return $stmt->fetch();
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function updateTag($id,$ten_tag, $mo_ta)
    {
        try {
            $sql = 'UPDATE tags SET ten_tag = :ten_tag, mo_ta=:mo_ta WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_tag' => $ten_tag,
                ':mo_ta' => $mo_ta,
                ':id' => $id
            ]);
            return true;
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    public function deleteTag($id)
    {
        try {
            $sql = 'DELETE FROM tags WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return true;
        } catch (\Exception $e) {
            $this->debug($e);
        }
    }
    private function debug($e)
    {
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        die();
    }
}
