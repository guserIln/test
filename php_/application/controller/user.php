<?php


class User extends Controller
{

    public function login()
    {
     
         $log = false;
         $pass = false;
         if (isset($_POST['login'])) {
             $log = $_POST['log'];
             $pass = $_POST['pass'];
              $errors = false;
              $errors[] = 'Неправильный email';
          }
          $check = User::checkUserDataHash($log);
          if (isset($check['pass'])) {
          $hashed_password = $check['pass'];
          $userId = $check['id'];
            if ($this->verify($pass, $hashed_password)) {
              session_start();
                User::auth($userId);
                  header('location: ' . URL . 'index.php?url=tasks/add');
            
               return true;
             }
           }
           
           else {

            $errors[] = 'Неправильные данные для входа на сайт';
            exit('Неверный логин или пароль');
           
        }
    
        return true;
    }
    public static function auth($userId)
{
   
    $_SESSION['user'] = $userId;
}
    public function logout()
    {
    
          unset($_SESSION["user"]);
      session_destroy();
      header('location: ' . URL . 'index.php?url=tasks/add');

    return true;
    }
    function verify($password, $hashedPassword) {
    return $password== $hashedPassword;
}
public static function checkUserDataHash($login)
{
  $params = array (
    'host' => 'localhost',
    'dbname' => 'php-mvc',
    'user' => 'root',
    'password' => 'root',

);
$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";

$db = new PDO($dsn, $params['user'], $params['password']);
 
    $sql = 'SELECT * FROM user WHERE login = :email';
  
    $result = $db->prepare($sql);
    $result->bindParam(':email', $login, PDO::PARAM_STR);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute();
    return $result->fetch();

}
public static function isGuest()
{
    if (isset($_SESSION['user']) and $_SESSION['user']=='1') return false;
    else return true;
}
}
