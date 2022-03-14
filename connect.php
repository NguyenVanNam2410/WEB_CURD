<?php
class DB
{
    const HOST        = 'localhost';
    const DB_NAME     = 'root';
    const DB_USER     = 'vd';
    const DB_PASSWORD = '';
    const CHARSET = 'utf8mb4';
    public function Connect()
    {
        try{
            $dsn = "mysql:host=".self::HOST.";dbname=".self::DB_USER.";charset=".self::CHARSET;
            $connection = new PDO($dsn,self::DB_NAME,self::DB_PASSWORD);
            $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $connection;
        }catch(PDOException $e){
            echo "connect lỗi".$e->getMessage();
        }
    }
    public function store($table, $data)
    {
        $columns = [];
        $values = [];
        foreach($data as $key => $value)
        {
            $columns[] = $key;
            $values[] = "'{$value}'"; 
        }
        $columnsStr = implode(',', $columns);
        $valueStr = implode(',', $values);
        $sql = "INSERT INTO {$table} ({$columnsStr}) VALUES ({$valueStr})";
        $connection = $this->Connect();
        $result = $connection->exec($sql);
        if($result == True)
        {
            return True;
        }
        return False;
    }
    public function Update($table, $data, $id)
    {
        $updateFields = [];
        foreach($data as $key => $value)
        {
            $updateFields[] = "{$key}='{$value}'";
        }
        $updateFieldsStr = implode(',',$updateFields);
        $sql = "UPDATE {$table} SET {$updateFieldsStr} WHERE id = {$id} ";
        $connection = $this->Connect();
        $result = $connection->exec($sql);
        if($result == True)
        {
            return True;
        }
        return False;
    }
    public function Delete($table, $id)
    {
        $sql = "DELETE FROM {$table} WHERE id = {$id}";
        // die($sql);
        $connection = $this->Connect();
        $result = $connection->exec($sql);
        if($result == True)
        {
            return True;
        }
        return False;
    }
    public function select($columns = '*',$table, $para = '',$where = ' ')
    {
        if($where == 1){
            $sql = "SELECT {$columns} FROM {$table} WHERE {$para}";
        }else{
            $sql = "SELECT {$columns} FROM {$table} {$para}";
        }
        $connection = $this->Connect()->prepare($sql);
        $connection->execute();
        $post = $connection->fetchAll();
        // die($post);
        // echo '<pre>';
        // print_r($posts);
        // echo '<pre>';
        return $post;
    }
    public function search($table,$key)
    {
        if(isset($key)){
            $query = "SELECT * FROM {$table} WHERE name LIKE '%{$key}%'";
        }
        $connection = $this->Connect()->prepare($query);
        $connection->execute();
        $post = $connection->fetchAll();
        return $post;
    }
}
?>