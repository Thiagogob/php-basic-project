<?php

class Dbh{
   protected function connect(){
        try{
            $username = "if0_35611127";
            $password = "kLIwPCpNJIx";
            $dbh = new PDO('mysql:host=sql205.infinityfree.com;dbname=if0_35611127_project', $username, $password);
            return $dbh;
        }   
    
        catch(PDOException $e){
             print("Error!: " . $e->getMessage(). "<br/>");
             die();          
        } 
    }
}