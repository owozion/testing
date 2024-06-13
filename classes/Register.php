<?php

    error_reporting(E_ALL);
    require_once('Db.php');

    class Register extends Db
    {
        private $dbconn;

        public function __construct(){
            $this->dbconn = $this->connect();
        }

       
        public function register($name,$number, $email){
           try{
            $query = "INSERT INTO registration(registration_name, registration_phone, registration_email) VALUES (?,?,?)";
            $stmt = $this->dbconn->prepare($query);
            $result = $stmt->execute([$name, $number, $email]);
            $id = $this->dbconn->lastInsertId();
            return $id;
           }catch(PDOException $e){
            echo $e->getMessage();
            $_SESSION['errormsg']= "An error occured";
            return 0;
           }catch(Exception $e){
            $_SESSION['errormsg']= "An error occured";
            return 0;
           }
          
        }
    }
?>