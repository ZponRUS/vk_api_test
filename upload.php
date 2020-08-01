<?php
require_once("./functions.php");

// Идентификатор рекламного кабинета
$account_id = 0;

// Иидентификатор аудитории таргетинга
$target_group_id = 0;


$db = new DB;
$users = $db->Get();

foreach ($users as $user) {
    $contacts .= $user['user_id'] .",";
}
$contacts = substr($contacts, 0, -1);


$r = new Request;
$result = $r->Upload($account_id, $target_group_id, $contacts, $vk_token);
print($result);
