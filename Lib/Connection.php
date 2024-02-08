<?php


class Lib_Connection
{
    protected $_conn=null;

    public function __construct(){

        $this->connect();
    }

    public function connect(){
        if (is_null($this->_conn)){
        $this->_conn= mysqli_connect("127.0.0.1:4308","root@","","ccc_practice");

        if($this->_conn==false){
            die("error");
        }
    }
    return $this->_conn;
    }

   public function exec($sql){

    try{
        $test=$this->connect()->query($sql);
        var_dump($test);
        

    }
    catch(Exception $e){
        var_dump($e->getMessage());

    }
} 
}
?>