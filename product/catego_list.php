<?php
$query = "SELECT * FROM categolist";
    $rep = $pdo->prepare($query);
    $rep->execute();

    $data = $rep->fetchAll(PDO::FETCH_ASSOC);
?>