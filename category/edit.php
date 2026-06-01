<?php 
    require_once("../../db/dbconnect.php");
    require_once("../helper/head.php");

    $id = $_GET['id'];

    $query = "SELECT * FROM categolist WHERE id=?";
    $rep = $pdo->prepare($query);
    $rep->execute([$id]);

    $data = $rep->fetch(PDO::FETCH_ASSOC);
?>

    <div class="container my-2">
        <div class="row">
            <div class="col-6 offset-3">
               
                    <form action="" method="post">
                    <input type="text" name="upName" class="form-control" value="<?php echo $_POST['upName'] ?? $data['name'] ; ?>" >
                        <?php
                        if(isset($_POST['btn-update'])){
                            $upName = $_POST['upName'] == "" ? false : true;
                            echo $upName ? "" : "<small class='text-danger'>Category Field is required....</small>";
                        } 
                        ?>
                        <input type="submit" name="btn-update" class="form-control mt-3 bg-dark text-white" value="UPDATE">
                    </form>
                
            </div>
            <?php 
                if(isset($_POST['btn-update'])){
                    $upName = $_POST['upName'];

                    $addQuery = "UPDATE categolist SET name=? WHERE id=?";
                    $res = $pdo->prepare($addQuery);
                    $res->execute([$upName,$id]);

                    header("Location:allcategory.php");
                }
            ?>
        </div>
    </div>



    <?php  
        require_once("../helper/footer.php");
    ?>
