<?php
    class DBConfig {
        private $hostName = 'localhost';
        private $userName = 'root';
        private $pass = '';
        private $dbName = 'web2';
        public $conn = NULL;
        public $result = NULL;


        public function connect() {
            $this->conn = new mysqli($this->hostName, $this->userName, $this->pass, $this->dbName);
        
            // Check for connection error
            if ($this->conn->connect_errno) {
                echo "Failed to connect to MySQL: " . $this->conn->connect_error;
                exit();
            } else {
                // Connection successful, set charset
                mysqli_set_charset($this->conn, "utf8");
                return $this->conn;
            }
        }
        

        public function execute($sql) {
            $this->result = $this->conn->query($sql);
            return $this->result;
        }

        public function getData() {
            if($this->result) {
                $data = mysqli_fetch_array($this->result);
            } else {
                $data  = 0;
            }
            return $data;
        }

        public function getAllData($table) {
            $sql = "select * from $table";
            $this->execute($sql);
            if($this->num_row() == 0) {
                $data = 0;
            }else {
                while($datas = $this->getData()) {
                    $data[] = $datas;
                }
            }
            return $data;
        }
        public function getAllDataBySql($sql) {
            $this->execute($sql);
            if($this->num_row() == 0) {
                $data = 0;
            }else {
                while($datas = $this->getData()) {
                    $data[] = $datas;
                }
            }
            return $data;
        }
        public function num_row() {
            if($this->result) {
                $num = mysqli_num_rows($this->result);
            } else {
                $num = 0;
            }
            return $num;
        }
    }
?>
