<?php

class Database
{
    var $connection;

    public function __construct()
    {
        if (!defined('DB_HOST')) {
            define('DB_HOST', 'localhost');
        }
        
        if (!defined('DB_USER')) {
            define('DB_USER', 'root');
        }
        
        if (!defined('DB_PASS')) {
            define('DB_PASS', '!@Asdzxc123');
        }
        
        if (!defined('DB_DATABASE')) {
            define('DB_DATABASE', 'lead_gen_business');
        }

        $this->connect(); 
    }

    public function connect()
    {
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);

        // Check for connection errors
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function fetch_all($query)
    {
        $data = array();
        $result = $this->connection->query($query); 

        // Check for query errors
        if (!$result) {
            die("Query failed: " . $this->connection->error);
        }

        while($row = mysqli_fetch_assoc($result)) 
        {
            $data[] = $row;
        }
        return $data;
    }

    public function fetch_record($query) 
    {
        $result = $this->connection->query($query);

        // Check for query errors
        if (!$result) {
            die("Query failed: " . $this->connection->error);
        }

        return mysqli_fetch_assoc($result);
    }

    public function run_mysql_query($query)
    {
        $result = $this->connection->query($query);

        // Check for query errors
        if (!$result) {
            die("Query failed: " . $this->connection->error);
        }

        return $this->connection->insert_id;
    }

    public function escape_this_string($string)
    {
        return $this->connection->real_escape_string($string);
    }
}

?>
