<?php


//     public $name;


//     function __construct($n){
//       $this->name=$n;
//     }
//     function show(){

//         echo "this is value of now   ".$this->name;
//     }

//     function __destct(){
//         echo "connection closed";
//     }
// }

// $p1=new vijay("naaaam");
// $p1->show();
// $p1->name="boss";
// $p1->show();

class vijay{

    public $name="yah";
    public $age=89;

    public function __construct($n,$a){
        $this->name=$n;
        $this->age=$a;
    }
    public function __sleep(){

        return array("name");
    }
}

$p1=new vijay("nzaaa",90);
$test=serialize($p1);
echo $test;
?>