<?php
include "db.php";

class DataOperation extends Database{
    public function save_category($table,$field){
        $this->con = mysqli_connect("localhost","root","","rms");
        $sql ="";
        $sql .= "INSERT INTO" .$table;
        $sql .= " (".implode(",", array_keys($field)).") VALUES";
        $sql .= "('".implode("','", array_values($field))."')";
        if($query){
            return true;
        }else{
            echo "cant insert";
        }
        
    }
}

$obj = new DataOperation();

if(isset($_POST["enterCat"])){
    $myArray = array(
        "name"=> $_POST['category']
    );
    $obj->save_category("category_table",$myArray);     
}
?>