<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class order1{
    protected $name,
            $surname,
            $nr_phone,
            $email,
            $country,
            $city,
            $street,
            $house,
            $pc,
            $rental_time,
            $model,
            $payment,
            $policies;
    function __construct($name, $surname, $nr_phone, $email, $country, $city, $street, $house, $pc, $rental_time, $model, $payment, $policies){
        $this->name=$name;
        $this->surname=$surname;
        $this->nr_phone=$nr_phone;
        $this->email=$email;
        $this->country=$country;
        $this->city=$city;
        $this->street=$street;
        $this->house=$house;
        $this->pc=$pc;
        $this->rental_time=$rental_time;
        $this->model=$model;
        $this->payment=$payment;
        $this->policies=$policies;
    }
    function toArray(){
        $arr = [
            "name" => $this->name,
            "surname" => $this->surname,
            "nr_phone" => $this->nr_phone,
            "email" => $this->email,
            "country" => $this->country,
            "city" => $this->city,
            "street" => $this->street,
            "house" => $this->house,
            "pc" => $this->pc,
            "rental_time" => $this->rental_time,
            "model" => $this->model,
            "payment" => $this->payment,
            "policies" => $this->policies
            //"date" => date_format($this->date, 'Y-m-d')
        ];
        return $arr;
    }
     public function show() {
        echo $this->name." ";
        echo $this->surname." ";
        echo $this->nr_phone." ";
        echo $this->email." ";
        echo $this->country." ";
        echo $this->city." ";
        echo $this->street." ";
        echo $this->house." ";
        echo $this->pc." ";
        echo $this->rental_time." ";
        echo $this->model." ";
        echo $this->payment." ";
        echo $this->policies." ";
        echo "<br />";
    }
    
    public function setname($name){
        $this->name=$name;
    }
    public function getname(){
        return $this->name;
    }
    public function setsurname($surname){
        $this->surname=$surname;
    }
    public function getsurname(){
        return $this->surname;
    }
    public function setnr_phone($nr_phone){
        $this->nr_phone=$nr_phone;
    }
    public function getnr_phone(){
        return $this->nr_phone;
    }
    public function setemail($email){
        $this->email=$email;
    }
    public function getemail(){
        return $this->email;
    }
    public function setcountry($country){
        $this->country=$country;
    }
    public function getcountry(){
        return $this->country;
    }
    public function setcity($city){
        $this->city=$city;
    }
    public function getcity(){
        return $this->city;
    }
    public function setstreet($street){
        $this->street=$street;
    }
    public function getstreet(){
        return $this->street;
    }
    public function sethouse($house){
        $this->house=$house;
    }
    public function gethouse(){
        return $this->house;
    }
    public function setpc($pc){
        $this->pc=$pc;
    }
    public function getpc(){
        return $this->pc;
    }
    public function setrental_time($rental_time){
        $this->rental_time=$rental_time;
    }
    public function getrental_time(){
        return $this->rental_time;
    }
    public function setmodel($model){
        $this->model=$model;
    }
    public function getmodel(){
        return $this->model;
    }
    public function setpayment($paument){
        $this->paument=$paument;
    }
    public function getpayment(){
        return $this->paument;
    }
    public function setpolicies($policies){
        $this->policies=$policies;
    }
    public function getpolicies(){
        return $this-$policies;
    }
   
}