<?php

class Core_Model_DB_Adapter
{
    public $config = [
        "host" => "localhost",
        "user" => "root",
        "password" => "",
        "db" => "ccc_practice"
    ];
    public $connect = null;


    public function connect()
    {
        if (is_null($this->connect)) {
            $this->connect = mysqli_connect(
                $this->config["host"],
                $this->config["user"],
                $this->config["password"],
                $this->config["db"]
            );
        }
        return $this->connect;
    }

    public function fetchAll($query)
    {
        $row = [];
        $sql = mysqli_query($this->connect(), $query);
        while ($_row = mysqli_fetch_assoc($sql)) {
            $row[] = $_row;
        }
        return $row;
    }


    public function fetchPairs($query)
    {
    }


    public function fetchOne($query)
    {
    }


    public function fetchRow($query)
    {
        $row = [];
    //    echo $query;
        $sql = $this->connect()->query($query);
        while ($_row = mysqli_fetch_assoc($sql)) {
            $row = $_row;
        }
        
        
        return $row;
        // $execute = $this->connect->query($query);
    }


    public function insert($query)
    {

        // echo $query;
        // die;
        if (mysqli_query($this->connect(), $query)) {
            echo "<script>alert('success')</script>";
            // echo "<script>location. href='form'</script>" ;
            return mysqli_insert_id($this->connect());
        } else {
            return FALSE;
        }
    }



    public function update($query)
    {
        if (mysqli_query($this->connect(), $query)) {
            return true;
        } else {
            return false;
        }
    }
    public function delete($query)
    {
        if (mysqli_query($this->connect(), $query)) {
            return true;
        } else {
            return false;
        }
    }
    public function query($query)
    {

    }


}
