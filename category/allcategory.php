<?php 
    require_once("../../db/dbconnect.php");
    require_once("../helper/head.php");

    $query = "SELECT * FROM categoList ORDER BY created_at";
    $rep = $pdo->prepare($query);
    $rep->execute();

    $data = $rep->fetchAll(PDO::FETCH_ASSOC);
?>

    <div class="container">
        <div class="row">
            <div class="col-4">
                <form action="" method="post">
                    <input type="text" name="categoName" class="form-control my-2" placeholder="Enter Category Name">
                    <?php
                    if(isset($_POST['btn-create'])){
                        $categoName = $_POST['categoName'] == "" ? false : true;
                        echo $categoName ? "" : "<small class='text-danger'>Category Field is required....</small>";
                    } 
                     ?>
                    <input type="submit" name="btn-create" class="form-control mt-3 bg-dark text-white" value="ADD">
                </form>
            </div>
            <?php 
                if(isset($_POST['btn-create'])){
                    $categoName = $_POST['categoName'];

                    $addQuery = "INSERT INTO categoList (name) VALUES (?) ";
                    $res = $pdo->prepare($addQuery);
                    $res->execute([$categoName]);

                    header("Location:allcategory.php");
                }
            ?>
            <div class="col">
                <table class="table">
                    <?php 
                       
                        foreach($data as $item){

                             $name = $item['name'];
                             $id = $item['id'];
                            echo "<div class='card my-2'>
                                            <div class='card-body'>
                                                <div class='row my-2'>
                                                    <div class='col-10'>
                                                        <div class='mt-2'>
                                                            $name
                                                        </div>
                                                    </div>
                                                    <div class='col'>
                                                        <a href='edit.php?id=".$id."'><i class='fa-solid fa-pen-to-square'></i></a>
                                                        <a href='delete.php?id=".$id."'><i class='fa-solid fa-trash'></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>";
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>







                                        







<?php 
    require_once("../helper/footer.php");
?>
