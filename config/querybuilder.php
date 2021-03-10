<?php

class QueryBuilder {
    
    private $table_name;
    private $col_name;

    public function __construct($table_name, array $col_name)
    {
        // Code... 
        $this->table_name = $table_name;
        $this->col_name = $col_name;
    }

    public function insert()
    {
        # code...
        $query = "INSERT INTO".$this->table_name."()";
    }

    public function show($id)
    {
        # code...
    }

    public function update()
    {
        # code...
    }

    public function delete($id)
    {
        # code...
    }

}