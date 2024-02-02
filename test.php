<?php 

$array = array('clients.client_id', "COUNT(sites.site_id)");


var_dump(implode(",", $array));


?>