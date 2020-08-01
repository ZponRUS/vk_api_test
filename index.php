<?php
require_once("./functions.php");


if($_POST["req"] and $_POST["count"]){

  $r = new Request;
  $users = json_decode($r->Get($_POST["req"], $_POST["count"], $vk_token), 1)["response"]["items"];


  $db = new DB;
  foreach ($users as $user) {
    $model = [
      'user_id' => $user['id'],
      'first_name' => $user['first_name'],
      'last_name' => $user['last_name'],
    ];
    $db->Add($model);
  }
  exit("<div class='alert alert-success' role='alert'><center>Успех!</center></div>");

}

?>

<!DOCTYPE html>
<html>
<head>
  <title>FIND</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style type="text/css">
    .enter{
      width: 60%;
    }
  </style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>  

  <script type="text/javascript">
    function f() {
      $.ajax({
        url: '',
        method: 'post',
        dataType: 'html',
        data: {req: $('.a').val(), count: $('.b').val()},
        success: function(data){
          $('body').append(data);
        }
      });
    }
  </script>  
</head>
<body>
  <center>
    <div class="form-text enter">
      <label for="v">Поиск людей по запросу (ФИО)</label>
      <input type="text" class="form-control a" id="v" name="req" placeholder="Введите запрос">
      <input type="number" class="form-control b" id="v" name="count" placeholder="Количество">
    </div>  
    <button type="submit" onclick="f();" class="btn btn-primary">Найти</button>
  </center>
</body>
</html>