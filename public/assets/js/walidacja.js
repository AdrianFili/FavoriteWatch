/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function sprawdzPole(pole_id,obiektRegex) {
    var obiektPole = document.getElementById(pole_id);
    if(!obiektRegex.test(obiektPole.value)) return (false);
    else return (true);
}
function sprawdz_radio(nazwa_radio){
    var obiekt=document.getElementsByName(nazwa_radio);
    for (i=0; i<obiekt.length; i++){
        wybrany=obiekt[i].checked;
        if (wybrany) return obiekt[i].value; 
    }
    return false;
}
function sprawdz_box(box_id)
{
    var obiekt=document.getElementById(box_id);
    if (obiekt.checked) return true;
    else return false;

}
function delete_order(i){
    var list = JSON.parse(localStorage.getItem('list'));
    if (confirm("Usunąć zadanie?")) list.splice(i,1);
    localStorage.setItem('list', JSON.stringify(list));
    show_orders();
}

function edited_values(i){
    //Zczytać wartości pól z formularza i spróbować dodąc to do local storeage za pomocą split
    var read={};
    read.name = document.getElementById("name_shopper").value;
    read.surname = document.getElementById("surname").value;
    read.tel = document.getElementById("tel").value;
    read.email = document.getElementById("email").value;
    read.country = document.getElementById("country").value;
    read.city = document.getElementById("City").value;
    read.street = document.getElementById("street").value;
    read.house = document.getElementById("house").value;
    read.postalcode = document.getElementById("postal_code").value;
    read.rental = document.getElementById("time_rent").value;
    read.model = document.getElementById("model").value;
    read.paynament= sprawdz_radio("payment");
    var list = JSON.parse(localStorage.getItem('list'));
    list.splice(i,1);
    list.splice(i,0,read);
    localStorage.setItem('list', JSON.stringify(list));
    show_orders();
    document.getElementById('buttons').innerHTML=" ";
}
function edit(i){
    Swal.fire("Check all the data again");
    var list = JSON.parse(localStorage.getItem('list'));
    document.getElementById('name_shopper').value=list[i].name;
    document.getElementById('surname').value=list[i].surname;
    document.getElementById('tel').value=list[i].tel;
    document.getElementById('email').value=list[i].email;
    document.getElementById('City').value=list[i].city;
    document.getElementById('street').value=list[i].street;
    document.getElementById('house').value=list[i].house;
    document.getElementById('postal_code').value=list[i].postalcode;
    document.getElementById('time_rent').value=list[i].rental;
    document.getElementById('model').value=list[i].postalcode;
    document.getElementById('orders').innerHTML=" ";
    document.getElementById('buttons').innerHTML='<button class="btn btn-primary mb-3" onclick="edited_values('+i+')">Edit</button>';
}

function preview(i){
    var list = JSON.parse(localStorage.getItem('list'));
    var show = "Name: " + list[i].name + "\n" +
                "Surname: " + list[i].surname + "\n" +
                    "Tel: " + list[i].tel + "\n" +
                        "Email: " + list[i].email + "\n" +
                            "Country: " + list[i].country + "\n" +
                                "City: " + list[i].city + "\n" +
                                    "Street: " + list[i].street + "\n" +
                                        "House: " + list[i].house + "\n" +
                                            "Postalcode: " + list[i].postalcode + "\n" +
                                                "Time rental: " + list[i].rental + "\n" +
                                                    "Model: " + list[i].postalcode + "\n" +
                                                        "Paynament method: " + list[i].paynament + "\n" ;
    //alert(show);
    Swal.fire(show);
}

function show_orders(){
    var list = JSON.parse(localStorage.getItem('list'));
    var el=document.getElementById('orders');
    var str= "<h3>Your active orders:</h3>";
    str+='<table>';
    str+='<tr><th>Edit:</th><th>Purchaser:</th></tr>';
    if (list===null) el.innerHTML="<h2>Podsumowanie:</h2>"+"<p>No active orders.</p>";
    else {
        for(i=0;i<list.length;i++) 
        {
            str+='<tr><td>' + '<button type="button" class="btn btn-primary mb-3" onclick="preview('+i+')">Preview</button>' + '<button type="button" class="btn btn-primary mb-3" onclick="edit('+i+')">Edit</button>' + '<button type="button" class="btn btn-primary mb-3" onclick="delete_order('+i+')">Usuń</button>' + '</td><td><h6>' + list[i].name  + ' ' + list[i].surname + '</h6></td></tr>';
        }
        str+='</table>';
        el.innerHTML=str;
    }
}
function take_date(){

    var read={};
    read.name = document.getElementById("name_shopper").value;
    read.surname = document.getElementById("surname").value;
    read.tel = document.getElementById("tel").value;
    read.email = document.getElementById("email").value;
    read.country = document.getElementById("country").value;
    read.city = document.getElementById("City").value;
    read.street = document.getElementById("street").value;
    read.house = document.getElementById("house").value;
    read.postalcode = document.getElementById("postal_code").value;
    read.rental = document.getElementById("time_rent").value;
    read.model = document.getElementById("model").value;
    read.paynament= sprawdz_radio("payment");
    var list = JSON.parse(localStorage.getItem('list'));
    if (list===null) list=[]; 
    list.push(read); 
    localStorage.setItem('list', JSON.stringify(list));
    show_orders();
}
function walidacja(){
    var dok = true;
    obiektNazw = /^[a-zA-Z]{2,20}$/; //wyrażenie regularne dla nazwiska
    obiektEmail = /^([a-zA-Z0-9])+([.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-]+)+/;
    obiektWiek=/^[1-9][0-9]{1,2}$/;
    obiektNumer=/^[0-9]{3}-[0-9]{3}-[0-9]{3}/;
    obiektHouse=/^[0-9]{1,3}[a-zA-Z]{0,2}$/;
    obiektCode=/^[0-9]{2}-[0-9]{3}$/;
    if (!sprawdzPole("name_shopper",obiektNazw))
    { 
        dok=false;
        document.getElementById("name_shopper_error").innerHTML="Enter your name!".fontcolor( "red" );
    }
    else document.getElementById("name_shopper_error").innerHTML="";
    
    if (!sprawdzPole("surname",obiektNazw))
    { 
        dok=false;
        document.getElementById("surname_shopper_error").innerHTML="Enter your surname!".fontcolor( "red" );
    }
    else document.getElementById("surname_shopper_error").innerHTML="";
    
    if (!sprawdzPole("tel",obiektNumer))
    { 
        dok=false;
        document.getElementById("tel_error").innerHTML="Enter your phone number!".fontcolor( "red" );
    }
    else document.getElementById("tel_error").innerHTML="";
    
    if (!sprawdzPole("email",obiektEmail))
    { 
        dok=false;
        document.getElementById("email_error").innerHTML="Chceck emial!".fontcolor( "red" );
    }
    else document.getElementById("email_error").innerHTML="";
    
    if (!sprawdzPole("City",obiektNazw))
    { 
        dok=false;
        document.getElementById("city_error").innerHTML="Enter your city!".fontcolor( "red" );
    }
    else document.getElementById("city_error").innerHTML="";
    
    if (!sprawdzPole("street",obiektNazw))
    { 
        dok=false;
        document.getElementById("street_error").innerHTML="Enter your city!".fontcolor( "red" );
    }
    else document.getElementById("street_error").innerHTML="";
    
    if (!sprawdzPole("house",obiektHouse))
    { 
        dok=false;
        document.getElementById("house_error").innerHTML="Enter your flat number!".fontcolor( "red" );
    }
    else document.getElementById("house_error").innerHTML="";
    
    if (!sprawdzPole("postal_code",obiektCode))
    { 
        dok=false;
        document.getElementById("postal_code_error").innerHTML="Enter your Pc!".fontcolor( "red" );
    }
    else document.getElementById("postal_code_error").innerHTML="";model_error
    if (!sprawdzPole("model",obiektNazw))
    { 
        dok=false;
        document.getElementById("model_error").innerHTML="Enter your watch model!".fontcolor( "red" );
    }
    else document.getElementById("model_error").innerHTML="";
    
    if (!sprawdz_radio("payment"))
    { 
        ok=false;
        document.getElementById("payment_error").innerHTML="Check paynament method".fontcolor( "red" );
    }
    else document.getElementById("payment_error").innerHTML="";
    
    if (!sprawdz_box("policies"))
    { 
        ok=false;
        document.getElementById("policies_error").innerHTML=" You must accept policies".fontcolor( "red" );
    }
    else document.getElementById("policies_error").innerHTML="";
    
    
    if(dok){
        take_date();
        
    }else{
        return false;
    }
}