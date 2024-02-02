<?php 

class Clients extends QueryBuilder
{

    public $table_name = "clients";

    public function __construct()
    {
        parent::__construct();
        $this->table_name;

    }

}

?>