<?php
    
    require_once("../../db/dbconnect.php");
    
    $id = $_GET['id'];
    $query = "DELETE FROM categolist WHERE id=?";
    $rep = $pdo->prepare($query);
    $rep->execute([$id]);

    header("Location:allcategory.php");
?>