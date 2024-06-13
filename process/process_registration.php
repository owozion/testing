<?php
session_start();
require_once "../classes/Register.php";
if($_POST["btn"]){

        $name = $_POST["name"];
        $email = $_POST["email"];
        $numb =  $_POST["number"];
        $number =  strlen($numb) === 11;
        $register = new Register;
    //    print_r($name);
    //    print_r($email);
    //    print_r($number);
    //     die(); 
   
            if(empty($name) || empty($email) || empty($number)){
                $_SESSION['errormsg'] = "All fields are required";
                header("location:../registration.php");
                exit();
            
            }else{
                $chk = $register->register($name,$number, $email);
                $_SESSION['feedback'] = "Registration Successful";
                header("location:../registration.php");
                exit();
            }
   
    }else{
        $_SESSION['errormsg'] = "Please visit the Page";
        header("location:../registration.php");
        exit();
    }
?>