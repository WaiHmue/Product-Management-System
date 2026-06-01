<?php
    require_once("../../db/dbconnect.php");
    require_once("../helper/head.php");

    $query = "SELECT product_list.id,product_list.name AS product_name, product_list.price , product_list.description , product_list.image , product_list.catego_id, categolist.name AS category_name
              FROM product_list
              LEFT JOIN categolist
              ON product_list.catego_id = categolist.id
              ORDER BY product_list.created_at DESC";
    $rep = $pdo->prepare($query);
    $rep->execute();

    $data = $rep->fetchAll(PDO::FETCH_ASSOC);
?>
    <div class="container">
        <div class="row">
            <div class="mt-3">
                <table class="table">
                    <thead>
                        <tr>
                        <th class="col-3">Picture</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Category_Id</th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach($data as $item){

                            echo "
                                    <tr class='mt-2'>
                                        <td><img src='../../image/".$item['image']."' class='w-50'></td>
                                        <td>".$item['product_name']."</td>
                                        <td>".$item['price']."</td>
                                        <td>".$item['description']."</td>
                                        <td>".$item['category_name']."</td>
                                        <td>
                                            <a href='product_update.php?id=".$item['id']."'><i class='fa-solid fa-pen-to-square'></i></a>
                                            <a href='product_delete.php?id=".$item['id']."'><i class='fa-solid fa-trash'></i></a>
                                        </td>
                                    </tr>
                            ";
                        }
                      ?>
                    </tbody>
                    </table>
            </div>
        </div>
    </div>
<?php
    require_once("../helper/footer.php");
?>