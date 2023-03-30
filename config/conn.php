<?php
date_default_timezone_set("Asia/Kolkata");
// require 'vendor/autoload.php';
class database

{
    private $conn = false;

    private $myconn;

    private $result=array();

    private $numrow;

    private $host="localhost";

    private $username="root";

    private $password = "";

    private $db_name="invento";

    public function connect()
    {
        if (!$this->conn)
        {
            $this->myconn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
            if ($this->myconn){
                $this->conn = true;
                return true;
            }
            else{
                return false;
            }

        }
        else{
            return false;
        }
    }
    public function sql($query)
    {
        if ($this->conn) {
            $this->myconn->query("SET NAMES utf8mb4");
            if ($data = $this->myconn->query($query)) {
                if (isset($data->num_rows) && $data->num_rows > 0) {
                    $this->numrows = $data->num_rows;
                  
                    while ($row = $data->fetch_assoc()) {
                        array_push($this->result, $row);
                    }
                    return true;
                } else {
                   
                    array_push($this->result, $data);
                    $this->numrows = 0;
                    
                    return true;
                }
            } else {

                array_push($this->result, $this->myconn->error);
                return false;
            }
        } else {

            return false;
        }
    }

    public function result()
    {
        $val = $this->result;
        $this->result=array();
        return $val;
    }

    public function numrows()
    {
        $val = $this->numrows;
        return $val;
    }

    //xss clean
    public function clean($clean)
    {
        return $this->myconn->real_escape_string(strip_tags($clean));
    }
    public function disconnect()
    {
        if ($this->conn) {
            $this->myconn->close();
            $this->conn = false;
            return true;
        } else {
            return true;
        }
    }
}


?>