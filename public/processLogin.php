<?php

include_once 'assets/php/Baza.php';
include_once 'assets/php/User.php';
include_once 'assets/php/UserManager.php';
include_once 'login.php';
$db = new Baza("localhost", "root", "", "klienci");
//$um = new UserManager();
$um = new login();
//parametr z GET – akcja = wyloguj 
if (filter_input(INPUT_GET, "akcja") == "wyloguj") {
    $um->logout($db);
}
//kliknięto przycisk submit z name = zaloguj 
if (filter_input(INPUT_POST, "zaloguj")) {
    $userId = $um->login($db); //sprawdź parametry logowania 
    if ($userId > 0) {
        //session_start();
        echo "<p>Poprawne logowanie.<br />";
        echo "Zalogowany użytkownik o id=$userId <br />";
        //pokaż link wyloguj lub przekieruj 
        // użytkownika na inną stronę dla zalogowanych  
        echo "<a href='processLogin.php?akcja=wyloguj'>Wyloguj</a> </p>";
        //logged($db, $userId);
        header("location:testLogin.php");
    } else {
        echo "<p>Błędna nazwa użytkownika lub hasło</p>";
        $um->loginForm(); //Pokaż formularz logowania  
    }
    
} else {
    //pierwsze uruchomienie skryptu processLogin 
    $um->loginForm();
}

/*function logged($db, $userId){
    $sql = "SELECT * FROM users WHERE id = ?;";
    $stmt= mysqli_stmt_init($db);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../processLogin.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s",$userId);
    mysqli_stmt_execute($stmt);
    
    $resultData= mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result= false;
        return $result;
    }
    
}*/
?>
