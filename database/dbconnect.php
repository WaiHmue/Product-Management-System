<?php
    try{

        $pdo = new PDO("mysql:host=localhost;dbname=final_crud","root","");

        //echo "db connected";
    }catch(PDOException $error){

        echo "Error is" . $error;
    }



?>
