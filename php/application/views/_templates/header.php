<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link href="<?php echo URL; ?>public/css/style.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    <!-- our JavaScript -->
    <script src="<?php echo URL; ?>public/js/application.js"></script>
</head>
<body>
<!-- header -->
<div class="container">
    <!-- Info -->
   <form action="index.php?url=user/login">
    <label>Логин</label>
    <input type="text" name="log" value="" required />
    <label>Пароль</label>
    <input type="text" name="pass" value="" required />
    <input type="submit" name="login" value="Отправить" />
   </form>
   <div class="container"></div>
</div>
