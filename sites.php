<?php 

class Sites extends QueryBuilder
{
    public $count = "COUNT(*)";

    public $table_name = "sites";

    public function __construct()
    {
        parent::__construct();
        $this->table_name;

    }

}

?>