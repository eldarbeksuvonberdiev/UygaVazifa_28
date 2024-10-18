<?php

namespace App\Models;

use App\Models\Crud;
use PDO;

abstract class Model implements Crud
{

    public $table;

    public function connection()
    {
        return new PDO("mysql:host=localhost;dbname=products", 'root', 'root');
    }

    public function all()
    {
        $sql = "SELECT * FROM " . $this->table;
        $result = $this->connection()->query($sql);
        return $result->fetchAll(PDO::FETCH_OBJ);
    }

    public function show($id)
    {
        if (gettype((int)$id) == "integer") {
            $sql = "SELECT * FROM " . $this->table . " WHERE id = :id";
            $result = $this->connection()->prepare($sql);
            $result->bindParam(":id", $id);
            $result->execute();
            return $result->fetch(PDO::FETCH_OBJ);
        }
    }

    public function create($data)
    {
        $columns = implode(", ", array_keys($data));
        $values = "'" . implode("','", array_values($data)) . "'";
        $sql = "INSERT INTO " . $this->table . " ({$columns}) VALUES ({$values})";
        $result = $this->connection()->prepare($sql)->execute();
        if ($result) {
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM " . $this->table . " WHERE id = :id";
        $result = $this->connection()->prepare($sql);
        $result->bindParam(":id", $id);
        if ($result->execute()) {
            return true;
        }
        return false;
    }

    public function update($data, $id)
    {
        $setValue = "";

        foreach ($data as $key => $value) {
            $setValue .= "{$key} = '{$value}',";
        }
        $setValue = rtrim($setValue, ",");

        $result = "UPDATE " . $this->table . " SET {$setValue} WHERE id = {$id}";
        $stmt = $this->connection()->prepare($result);

        return $stmt->execute();
    }
}
