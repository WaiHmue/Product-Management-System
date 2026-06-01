<?php

require_once("../../db/dbconnect.php");
    $product_id = $_GET['id'];
    $query = "SELECT image 
          FROM product_list 
          WHERE id=?";

    $rep = $pdo->prepare($query);
    $rep->execute([$product_id]);

    $imageName = $rep->fetch(PDO::FETCH_ASSOC);
    
    if($imageName){
            $img = $imageName['image'];

            $filePath = "../../image/" .$img;

            if(file_exists($filePath) && !empty($img)){
                unlink($filePath);
            }
    }

    $delequery = "DELETE FROM product_list WHERE id=?";

    $delete = $pdo->prepare($delequery);
    $delete->execute([$product_id]);



    header("Location:list.php");

?>
