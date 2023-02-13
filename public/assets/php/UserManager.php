<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of UserManager
 *
 * @author student
 */
class UserManager { 
    
    function loginForm() { 
   ?>      
       <form action="processLogin.php" method="POST">
                <input type="text" name="login" class="form-control" placeholder="Login">
                <input type="password" name="passwd" class="form-control" id="myPsw" placeholder="Your password">
                <input type="submit" value="Login" name="zaloguj" class="btn btn-sm btn-outline-primary me-3"/>
              </form>
       <?php 
  } 
    
  function login($db) { 
      echo $_POST['login'];
   $args = ['login' => FILTER_SANITIZE_ADD_SLASHES, 
       'passwd' => FILTER_SANITIZE_ADD_SLASHES]; 
   $dane = filter_input_array(INPUT_POST, $args); 
   //sprawdź czy użytkownik o loginie istnieje w tabeli users  
   //i czy podane hasło jest poprawne 
   $login = $dane["login"]; 
   $passwd = $dane["passwd"];
   $userId = $db->selectUser($login, $passwd, "users"); 
   if ($userId >= 0) { 
    session_start();
    //usuń wszystkie wpisy historyczne dla użytkownika o $userId 
    //unset($_SESSION[$userId]);
    $date = new DateTime(); 
    //$current_date = $date->format('Y-m-d H:i:s');
    $db->delete("DELETE FROM logged_in_users WHERE userId='$userId'");
    $id_sesji= session_id(); 
    $_SESSION["id"]=$userId;
    $db->insert("INSERT INTO logged_in_users VALUES('".$id_sesji."', '".$userId."', '".$date->format("Y-m-d H:i:s")."')");
    //$db->insert("insert into logged_in_users values('session_id()','$userId','$current_date')");
    //ustaw datę - format("Y-m-d H:i:s"); 
    //pobierz id sesji i dodaj wpis do tabeli logged_in_users 
    
   } 
   return $userId; 
  } 
  function logout($db) { 
    //pobierz id bieżącej sesji (pamiętaj o session_start() 
    //usuń sesję (łącznie z ciasteczkiem sesyjnym) 
    //usuń wpis z id bieżącej sesji z tabeli logged_in_users 
    session_start();
    $id_sesji= session_id();
    $sql="DELETE FROM logged_in_users WHERE sessionId='$id_sesji'";
    $db->delete($sql);
    if(isset($_COOKIE[session_name()]) ) { 
        setcookie(session_name(),'', time() - 42000, '/'); 
    } 
    session_destroy();
  } 
  function getLoggedInUser($db, $sessionId) { 
        //wynik $userId - znaleziono wpis z id sesji w tabeli logged_in_users  
        //wynik -1 - nie ma wpisu dla tego id sesji w tabeli logged_in_users 
      $sqlExist="select count(*) from logged_in_users where session_id=$sessionId";
        if(($db->exist($sqlExist))>0)
        {
            return 1; 
        }
        return -1;
    } 
}