
<?php

class Lib_Sql_Query_Builder extends Lib_Connection
{
    // The constructor is empty in this example.
    public function __construct()
    {
    }

    // Method to build an INSERT query.
    public function insert($tableName, $data)
    {
        $columns = $values = [];

        // Iterate through the data to build the column and value lists.
        foreach ($data as $key => $value) {
            $columns[] = sprintf("`%s`", $key);
            $values[]  = sprintf("'%s'", addslashes($value));
        }

        // Combine the column and value lists into an INSERT query.
        $columns = implode(",", $columns);
        $values = implode(",", $values);
        
        return "INSERT INTO {$tableName} ({$columns}) VALUES ({$values});";
    }
}


?>