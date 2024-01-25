<?php

function update($t, $d = [], $where = []) {
    $columns = $whereCond = [];
    foreach($d as $field => $value) {
        $columns[] = " `$field` = '$value'";
        
    }

    foreach($where as $field => $value) {
        $whereCond[] = " `$field` = '$value'";
    }
    $columns = implode(",",$columns);
    $whereCond = implode(" AND ",$whereCond);
    echo " UPDATE {$t} SET {$columns} WHERE {$whereCond};";

}
// update('xyz',['pnam'=>'Test','type'=>'Typetest'],['id'=>3,'email'=>'@.com']);

function insert($table_name,$data){
    $columns = $VALUES = [];
    foreach($data as $col => $val){
        $columns[] = "`$col`";
        $VALUES[] = "'". addslashes($val). "'";
    }
    $columns = implode(", ",$columns);
    $VALUES = implode(", ",$VALUES);
    echo "INSERT INTO {$table_name} ({$columns}) VALUES ({$VALUES})";
    
    
}
function delete_query($table_name, $where){
    $whereCond = [];
    foreach($where as $field => $val){
        $whereCond[] = " `$field` = '" . addslashes($val) ."'";
    }
    $whereCond = implode(" AND ", $whereCond);
    return "DELETE FROM {$table_name} WHERE {$whereCond}";
}
function select($table_name, $column){
    return "SELECT {$column} FROM {$table_name}";
}

?>