<?php
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of RegistrationForm
 *
 * @author student
 */
class RegistrationForm {

    protected $user;

    function __construct() {
        ?>
        <h3>Registration form</h3><p>
       <form method="POST" action="Register.php">
              Name:<input type="text" name="userName" class="form-control" placeholder="John">
              Surname:<input type="text" name="userSurname" class="form-control" placeholder="Smith Mas">
              Login:<input type="text" name="login" class="form-control" placeholder="John321">
              Password:<input type="text" name="passwd" class="form-control" placeholder="123">
              Email:<input type="email" name="email" class="form-control" placeholder="XXX@gmail.com">
              Number phone:<input type="text" name="phone" class="form-control" placeholder="888-888-888">
              Adress: <input type="text" name="adress" class="form-control" placeholder="ozone park, 11-416">
        
              <input class="btn btn-sm btn-outline-primary me-3" type="submit" name="submit" value="Register"/>
              </form></p>
        <?php
    }

    function checkUser() { // podobnie jak metoda validate z lab4
        
        $args = [
            'userName' => ['filter' => FILTER_VALIDATE_REGEXP,'options' => ['regexp' => '/^[0-9A-Za-ząęłńśćźżó-]{2,25}$/']],
            'userSurname' =>['filter'=>FILTER_VALIDATE_REGEXP,'options'=>['regexp' => '/^[A-Z]{1}[a-ząęłńśćźżó-]{1,15}[\s][A-ZŁŃŚĆŹŻ-]{1}[a-ząęłńśćźżó-]{2,15}$/']],
            'passwd' =>['filter'=>FILTER_VALIDATE_REGEXP,'options'=>['regexp' => '/.{3,15}/']],
            'email'=>FILTER_VALIDATE_EMAIL,
            'phone' => ['filter' => FILTER_VALIDATE_REGEXP,'options' => ['regexp' => '/^[0-9]{3}-[0-9]{3}-[0-9]{3}/']],
            'adress' => ['filter' => FILTER_VALIDATE_REGEXP,'options' => ['regexp' => '/^[A-Za-ząęłńśćźżó-]{2,25}[\s][0-9]{2}-[0-9]{3}$/']],
            'login' => ['filter' => FILTER_VALIDATE_REGEXP,'options' => ['regexp' => '/^[0-9A-Za-ząęłńśćźżó-]{2,25}$/']]
        ];
        //przefiltruj dane:
        $dane = filter_input_array(INPUT_POST, $args);
        //sprawdz czy są błędy walidacji $errors – jak w lab4
        $errors="";
        foreach ($dane as $key => $val) { 
            if ($val === false or $val === NULL) { 
                $errors .= $key . "<br />"; 
            } 
        }
        if ($errors === "") {

            //Dane poprawne – utwórz obiekt user
            $this->user = new User($dane['userName'], $dane['userSurname'], $dane['login'], $dane['email'],
                    $dane['passwd'], $dane['phone'], $dane['adress']);
        } else {
            echo "<p>Incorrect data: <br /> $errors</p>";
            $this->user = NULL;
        }
        return $this->user;
    }

}
