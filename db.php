<?php


class Db {
    protected static $connection;

    public function connect() {
        if (!self::$connection) {
            $config = parse_ini_file("config.ini");
            self::$connection = new mysqli("localhost", $config["username"], $config["password"], $config["databasename"]);

            if (self::$connection->connect_error) {
                die("Connection failed: " . self::$connection->connect_error); // Xử lý lỗi kết nối
            }
        }
        return self::$connection;
    }

    public function query_execute($queryString) {
        $connection = $this->connect();
        $result = $connection->query($queryString);

        if (!$result) {
            die("Query failed: " . $connection->error);
        }

        return $result;
    }

    public function select_to_array($queryString) {
        $rows = array();
        $result = $this->query_execute($queryString);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }

        return $rows;
    }

    public function select_to_pages($table, $page, $records_per_page) {
        $offset = ($page - 1) * $records_per_page;

        $queryString = "SELECT * FROM $table LIMIT $offset, $records_per_page";

        return $this->select_to_array($queryString);
    }
    
}

?>
