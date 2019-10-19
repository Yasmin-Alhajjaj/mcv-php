
<?php
include "../layout/header.php";
include "../../database/database.php";
include '../../model/products.php';
include '../../model/categories.php';


//database
$db= new database();
$conn=$db->connect();


$new_category= new categories($conn);
$category= $new_category->getAll();

$new_products="";

//$category
if(isset($_POST['add-product'])){

    $product= new products($conn);
    $product->setName($_POST['name']);
    $product->setDescription($_POST['description']);
    $product->setPrice($_POST['price']);
    $product->setCategoryId($_POST['category_id']);
    $new_products=$product->create();


};

?>
<!DOCTYPE html>
<html>
<head>
    <title>Creative Colorlib SignUp Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Custom Theme files -->
    <link href="../css/form.css" rel="stylesheet" type="text/css" media="all" />
    <!-- //Custom Theme files -->
    <!-- web font -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- //web font -->
</head>
<body>
<!-- main -->
<div class="main-w3layouts wrapper">
    <h1>ADD NEW PRODUCT</h1>
    <?php
        if ($new_products) {
            echo "<div class='alert alert-success'>Product was created.</div>";
        }
    ?>
    <div class="main-agileinfo">
        <div class="agileits-top">
            <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                <input class="text" type="text" name="name" placeholder="name" required="">
                <input class="text email" type="text" name="description" placeholder="description" required="">
                <input class="form-control text email"  type="number" min="1" name="price" placeholder="price" required="">

<!--               select-->
                <select name="category_id" class="text form-control" >
                   <option selected >Category </option>
                    <?php
                    foreach ($category as $row){
                        $id=$row['id'];
                        $name = $row['name'];
                  echo "<option value=$id >$name</option>";
                    }

                    ?>
                </select>
                <input type="submit" value="ADD PRODUCT" name="add-product">
            </form>
        </div>
    </div>
    <!-- copyright -->
    <div class="colorlibcopy-agile">
        <?php
        include "../layout/footer.php";
        ?>
    </div>
    <!-- //copyright -->
    <ul class="colorlib-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
<!-- //main -->
</body>
</html>

