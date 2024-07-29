<?php
class AdminLienHe
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllLienHe()
    {
        try {
            $sql = 'SELECT * FROM lien_hes';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
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