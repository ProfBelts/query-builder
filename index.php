<?php

require('database.php');
require('query-builder.php');
require("sites.php");
require("clients.php");

$database = new Database();

$database->connect();


$sites = new Sites();

$sites->select(["client_id", $sites->count])
      ->from("sites")
      ->group_by("client_id")
      ->having($sites->count, ">", 5)
      ->get();


$clients = new Clients();



// Select * FROM clients WHERE client_id IN (3,9)
$clients->select("*")
        ->from($clients->table_name)
        ->where_in("client_id", [3, 9]) 
        ->get();





?>