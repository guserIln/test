
<?php require 'application/controller/user.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="<?php echo URL; ?>public/css/style.css" rel="stylesheet">

    <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>

    <script src="<?php echo URL; ?>public/js/application.js"></script>
</head>
<body bgcolor="#66ccff">

<div class="main-wrapper">
  <header class="header">
<div class="container-fluid">

    <?php if (User::isGuest()) { ?>
   <form action="index.php?url=user/login" method="POST">
    <label>Логин</label>
    <input type="text" name="log" value="" required />
    <label>Пароль</label>
    <input type="text" name="pass" value="" required />
    <input type="submit" name="login" value="Войти" />
   </form>
   <?php } else {?>
             <a href="index.php?url=user/logout">Выход</a>
   <?php } ?>

