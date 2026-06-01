<?php
    require_once("../../db/dbconnect.php");
    require_once("../helper/head.php");

    require_once("./source/catego_list.php");

    $query = "SELECT * FROM product_list WHERE id=?";
    $rep = $pdo->prepare($query);
    $rep->execute([$_GET['id']]);

    $stmt = $rep->fetch(PDO::FETCH_ASSOC);
?>
    <div class="container">
       <div class="col-6 offset-3">


            
            <form action="" method="post" enctype="multipart/form-data">
                        <div class="my-2 d-flex justify-content-center">
                            <img src="../../image/<?php echo $stmt['image'] ?>" id="output" class="w-50">
                        </div>

                <input type="file" name="pic" onchange="loadFile(event)" class="form-control mt-2">
                
                <input type="text" name="pname" value="<?php echo $_POST['pname'] ?? $stmt['name'];?>" class="form-control mt-2">
                <?php
                    if(isset($_POST['btn-up'])){
                        $caName = $_POST['pname'] == "" ? false : true;
                        echo $caName ? "" : "<small class='text-danger'>Name filed is required...</small>";
                    }
                ?>
                <input type="number" name="price" class="form-control mt-2" value="<?php echo $_POST['price'] ?? $stmt['price'];?>">
                <?php
                    if(isset($_POST['btn-up'])){
                        $price = $_POST['price'] == "" ? false : true;
                        echo $price ? "" : "<small class='text-danger'>Price filed is required...</small>";
                    }
                ?>
                <textarea name="desc" class="form-control mt-2" rows="8"><?php echo $_POST['desc'] ?? $stmt['description'];?></textarea>
                <?php
                    if(isset($_POST['btn-up'])){
                        $desc = $_POST['desc'] == "" ? false : true;
                        echo $desc ? "" : "<small class='text-danger'>Description field is required....</small>";
                    }
                ?>
                <select name="catList" class="form-control mt-2">
                  <option value="">Choose Category Name</option>
                   <?php
                       foreach($data as $item){

                        echo '<option value="'.$item['id'].'"'.($item['id'] == $stmt['catego_id'] ? "selected" : "").'>'.$item['name'].'</option>';
                       }
                   ?>
                </select>
                <?php
                    if(isset($_POST['btn-up'])){
                        $catList = $_POST['catList'] == "" ? false : true;
                        echo $catList ? "" : "<small class='text-danger'>Need to choose category name....</small>";
                    }
                ?>
                <input type="submit" name="btn-up" value="ADD" class="form-control mt-2 bg-dark text-white">
             </form>

     <?php  
        if(isset($_POST['btn-up'])){

            if($caName && $price && $desc && $catList){

               if($_FILES['pic']['name'] != ""){

                $oldPhoto = $stmt['image'];
                unlink("../../image/$oldPhoto");

                $imgName = uniqid() . $_FILES['pic']['name'];
                $tmpName = $_FILES['pic']['tmp_name'];

                $targetFile = "../../image/". $imgName;

                move_uploaded_file($tmpName,$targetFile);

                $addQuery = "UPDATE product_list SET name=?, price=?, description=?, image=? , catego_id=? WHERE id=?";
                $req = $pdo->prepare($addQuery);
                $req->execute([$_POST['pname'],$_POST['price'],$_POST['desc'],$imgName,$_POST['catList'],$_GET['id']]);

               }else{

                $upQuery = "UPDATE product_list SET name=?, price=?, description=?, catego_id=? WHERE id=?";
                $qk = $pdo->prepare($upQuery);
                $qk->execute([$_POST['pname'],$_POST['price'],$_POST['desc'],$_POST['catList'],$_GET['id']]);


                 header("Location:list.php");

               }


               
            }
        }
    ?>
       </div>
    </div>
   

<?php 
    require_once("../helper/footer.php");
?>
