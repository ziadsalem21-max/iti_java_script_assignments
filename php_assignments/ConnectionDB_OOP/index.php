<?php
class DB
{
    protected $db_name,
              $db_type,
              $db_user,
              $db_pass,
              $db_host,
              $connection;

    function __construct($db_name, $db_type, $db_user, $db_pass, $db_host)
    {
        $this->db_name = $db_name;
        $this->db_type = $db_type;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;

        try {
            // Create Connection (DSN Format)
            $dsn = "$this->db_type:host=$this->db_host;dbname=$this->db_name;charset=utf8";
            $this->connection = new PDO($dsn, $this->db_user, $this->db_pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\Throwable $th) {
            die("Connection failed: " . $th->getMessage());
        }
    }
    public function getConnection() {
        return $this->connection;
    }

    // Get all data
    function index($table)
    {
        try {
            $query = "SELECT * FROM $table";
            return $this->connection->query($query)->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    // Get single row by id
    function show($table, $id)
    {
        try {
            $query = "SELECT * FROM $table WHERE id = :id";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    // Insert new record
    function insert($table, $data)
    {
        try {
            $columns = implode(",", array_keys($data));
            $placeholders = ":" . implode(",:", array_keys($data));
            $query = "INSERT INTO $table ($columns) VALUES ($placeholders)";
            $stmt = $this->connection->prepare($query);
            return $stmt->execute($data);
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return false;
        }
    }

    // Update record by id
    function update($table, $data, $id)
    {
        try {
            $set = "";
            foreach ($data as $key => $value) {
                $set .= "$key = :$key, ";
            }
            $set = rtrim($set, ", ");
            $query = "UPDATE $table SET $set WHERE id = :id";
            $stmt = $this->connection->prepare($query);
            $data['id'] = $id;
            return $stmt->execute($data);
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return false;
        }
    }

    // Delete record by id
    function delete($table, $id)
    {
        try {
            $query = "DELETE FROM $table WHERE id = :id";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return false;
        }
    }
}

// Create DB object
$database = new DB("iti_sm_php_g2_2025", "mysql", "root", "", "localhost");