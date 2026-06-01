<?php
    require_once("../../db/dbconnect.php");
    require_once("../helper/head.php");

    require_once("./source/catego_list.php");

?>
    <div class="container">
       <div class="col-6 offset-3">
            <div class="d-flex justify-content-end">

                <a href="list.php" class="btn btn-dark text-white m-3 rounded shadow-sm">Products List</a>

            </div>

            <div class="my-2 d-flex justify-content-center">
                    <img src="" id="output" class="w-50">
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                

                <input type="file" name="pic" onchange="loadFile(event)" class="form-control mt-2">
                <?php
                    if(isset($_POST['btn-add'])){
                        $doc = $_FILES['pic'] == "" ? false : true;
                        echo $doc ? "" : "<small class='text-danger'>Need to upload picture..</small>";
                    }
                ?>
                <input type="text" name="name" class="form-control mt-2" value="<?php echo $_POST['name'] ?? ""; ?>" placeholder="Enter Name.....">
                <?php
                    if(isset($_POST['btn-add'])){
                        $caName = $_POST['name'] == "" ? false : true;
                        echo $caName ? "" : "<small class='text-danger'>Name filed is required...</small>";
                    }
                ?>
                <input type="number" name="price" class="form-control mt-2" value="<?php echo $_POST['price'] ?? ""; ?>" placeholder="Enter Price.....">
                <?php
                    if(isset($_POST['btn-add'])){
                        $price = $_POST['price'] == "" ? false : true;
                        echo $price ? "" : "<small class='text-danger'>Price filed is required...</small>";
                    }
                ?>
                <textarea name="desc" class="form-control mt-2" rows="8"  placeholder="Enter description....."><?php echo $_POST['desc'] ?? "";?></textarea>
                <?php
                    if(isset($_POST['btn-add'])){
                        $desc = $_POST['desc'] == "" ? false : true;
                        echo $desc ? "" : "<small class='text-danger'>Description field is required....</small>";
                    }
                ?>
                <select name="catList" class="form-control mt-2">
                  <option value="">Choose Category Name</option>
                   <?php
                       foreach($data as $item){
                        echo '<option value="'.$item['id'].'"'.(isset($_POST['catList']) && $item['id'] ==$_POST['catList'] ? "selected" : "").'>'.$item['name'].'</option>';
                       }
                   ?>
                </select>
                <?php
                    if(isset($_POST['btn-add'])){
                        $catList = $_POST['catList'] == "" ? false : true;
                        echo $catList ? "" : "<small class='text-danger'>Need to choose category name....</small>";
                    }
                ?>
                <input type="submit" name="btn-add" value="ADD" class="form-control mt-2 bg-dark text-white">
             </form>

     <?php  
        if(isset($_POST['btn-add'])){

            if($doc && $caName && $price && $desc && $catList){

                $imgName = uniqid() . $_FILES['pic']['name'];
                $tmpName = $_FILES['pic']['tmp_name'];

                $targetFile = "../../image/". $imgName;

                move_uploaded_file($tmpName,$targetFile);

                $addQuery = "INSERT INTO product_list (name,price,description,image,catego_id) VALUES (?,?,?,?,?)";
                $req = $pdo->prepare($addQuery);
                $req->execute([$_POST['name'],$_POST['price'],$_POST['desc'],$imgName,$_POST['catList']]);


                header("Location:addproduct.php");
            }
        }
    ?>
       </div>
    </div>
   

<?php 
    require_once("../helper/footer.php");
?>
