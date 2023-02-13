<?php
class order{
    function show_order(){
        ?>
        <form method="POST">
        <table>
                <tr><td colspan="2"><h1>RENT YOUR DREAM WATCH!</h1></tr>
              <tr><td>Name: </td><td><input type="text" name="name" id="name_shopper" class="form-control rounded-1"/> </td><td id="name_shopper_error"></td></tr>
                <tr><td>Surname: </td><td><input type="text" name="surname" id="surname" class=" form-control rounded-1"/> </td><td id="surname_shopper_error"></td></tr>
                <tr><td>Number phone: </td><td><input type="text" name="tel" id="tel" class="form-control rounded-1" placeholder="888-888-888"/> </td><td id="tel_error"></td></tr>
                <tr><td>E-mail: </td><td><input type="email" name="email" id="email" class="form-control rounded-1"> </td><td id="email_error"></td></tr>
                <tr><td colspan="2"><h3>Give your adress</h3></tr>
                <tr>
                    <td>Country:</td>
                    <td>
                        <select name="country" id="country" class="rounded-end-0 form-control rounded-1">
                              <option value="Pl" selected="selected">Poland</option>
                              <option value="Gb">United Kingdom</option>
                              <option value="US">United States</option>
                              <option value="RU">Russia</option>
                        </select>
                    </td>
                </tr>
                <tr><td>City: </td><td><input type="text" name="City" id="City" class="rounded-end-0 form-control rounded-1"/> </td><td id="city_error"></td></tr>
                <tr><td>Street: </td><td><input type="text" name="street" id="street" class="rounded-end-0 form-control rounded-1"/> </td><td id="street_error"></td></tr>
                <tr><td>House / flat number: </td><td><input type="text" name="house" id="house" class="rounded-end-0 form-control rounded-1"/> </td><td id="house_error"></td></tr>
                <tr><td>Postal Code: </td><td><input type="text" name="postal_code" placeholder="XX-XXX" id="postal_code" class="rounded-end-0 form-control rounded-1"/> </td><td id="postal_code_error"></td></tr>
                <tr><td colspan="2"><h3>Order details</h3><td><tr>
                <tr>
                    <td>Rental time:</td> 
                    <td><select name="time_rent" id="time_rent" class="rounded-end-0 form-control rounded-1">
                          <option value="one_day" selected="selected">One day</option>
                          <option value="four_days">Four days</option>
                          <option value="one_week">One week</option>
                          <option value="two_week">Two_weeks</option>
                        </select></td>
                </tr>
                <tr><td>Model: </td><td><input type="text" name="model" id="model" class="rounded-end-0 form-control rounded-1"/> </td><td id="model_error"></td></tr>
                <tr><td colspan="2"><h3>Payment details</h3><td><tr>
                <tr>
                    <td><input type="radio" name="payment" id="payment_euro" value="euro" class="form-check-input" />eurocard</td>
                    <td><input type="radio" name="payment" id="payment_visa" value= "visa" class="form-check-input" />visa</td>
                    <td id="payment_error"></td>
                </tr>
                <tr><td><br /></td></tr>
                <tr><td colspan="2"><input type="checkbox" name="policies" id="policies"><a href="https://policies.google.com" style="color:white;">*Accept policies</a></td><td id="policies_error"></td></tr>
                <tr><td colspan="2"><input type="checkbox" name="consent" id="consent"> I consent to the processing of my personal data</td></tr>
                <tr><td colspan="2"><input type="checkbox" name="spam" id="spam"> I consent to the sending of marketing offers</td></tr>
                <tr><td colspan="2" style="text-align: center;"><button type="submit" class="btn btn-primary mb-3" onclick="walidacja()">Send</button></td></tr>
                <input type="submit" name="send" />
                <tr><td id="orders" colspan="3"></td></tr>
              </table>
        </form>
        <?php
    } 
    function ordered(){
        echo "abc";
        $args = [
            'name',
            'surname',
            'nr_phone',
            'email',
            'country',
            'city',
            'street',
            'house',
            'pc',
            'rental_time',
            'model',
            'payment',
            'policies'
        ];
        //$dane = filter_input_array(INPUT_POST, $args);
        $this->user = new order1($dane['userName'], $dane['userSurname'], $dane['login'], $dane['email'], $dane['passwd'], $dane['phone'], $dane['adress']);
        return $this->user;
    }

    function saveDB($db){
        $dane = $this->toArray();  
        echo $db->insert("INSERT INTO orders VALUES (NULL, '".$dane['name']."', '".$dane['surname']."', '".$dane['nr_phone']."', '".$dane['email']."','".$dane['country']."', '".$dane['city']."', '".$dane['street']."','".$dane['house']."','".$dane['pc']."','".$dane['rental_time']."','".$dane['model']."','".$dane['payment']."','".$dane['policies']."')");
    }
    function getAllUsersFromDB($db){
         //echo $bd->select("select UserName,fullName,email,passwd,status,date from klienci", ["userName","fullName","email","passwd","status","status"]); 
         echo $db->select("select name,surname,nr_phone,email,country,city,street,house,pc,rental_time,model,payment,policies from users", ["name","surname","nr_phone","email","country","city","street","house","pc","rental_time","model","payment","policies"]);
         
    }
    
} 
?>