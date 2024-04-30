<?php
namespace App\Models;

use PDO;


class Database{

    public $pdo;

    public function __construct(){

        $this->pdo = new PDO("mysql:host=localhost;dbname=online-store","root","root");

    }

    public function SelectAll($table): array
    {
        $sql = "SELECT * FROM $table";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }

    public function SelectWhere($table, $firstValue,  $secondValue, $columns = "*", $symbol = "=")
    {
        $sql = "SELECT $columns FROM $table WHERE $firstValue $symbol :secondvalue";
        $stmt = $this->pdo->prepare($sql);
        
        $stmt->execute([':secondvalue' => $secondValue]);
                
        $result = $stmt->fetchAll();
        
        return $result;
    }

    public function Insert($table, $data):int
    {
        $keys = array_keys($data);
        $fields = implode(', ', $keys);
        $placeholders = ':' . implode(', :', $keys);
    
        $sql = "INSERT INTO $table ($fields) VALUES ($placeholders)";
        $stmt = $this->pdo->prepare($sql);
    
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
    

        try {
            $stmt->execute();
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return -1; // Or handle the error as needed
        }
    }

}