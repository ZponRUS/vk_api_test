<?php

$vk_token = "Token";

ini_set("max_execution_time", 0);

class DB{

  function __construct()
  {
    require_once __DIR__ . '/vendor/autoload.php';
    $this->$collection = (new MongoDB\Client)->project->users;
  }

  function Add($data){
    $this->$collection->insertOne($data);
  }

  function Get(){
    return $this->$collection->find();
  }
}

class Request{
  
  function Get($req, $count, $token){
    return file_get_contents("https://api.vk.com/method/users.search?q=".$req."&count=".$count."&access_token=".$token."&v=5.112");
  }

  function Upload($acid, $tgid, $contacts, $token){
    return file_get_contents("https://api.vk.com/method/ads.importTargetContacts?account_id=".$acid."&target_group_id=".$tgid."&contacts=".$contacts."&access_token=".$token."&v=5.112");
  }  
}