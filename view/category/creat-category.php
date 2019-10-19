
<?php
include "../layout/header.php";
include "../../database/database.php";
include '../../model/categories.php';


//database
$db= new database();
$conn=$db->connect();

$new_category="";


if(isset($_POST['add-category'])){

    $category= new categories($conn);
    $category->setName($_POST['name']);
    $new_category=$category->create();


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
    <h1>ADD NEW CATEGORY</h1>
    <?php
    if ($new_category) {
        echo "<div class='alert alert-success'>Product was created.</div>";
    }

    ?>
    <div class="main-agileinfo">
        <div class="agileits-top">
            <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                <input class="text" type="text" name="name" placeholder="name" required="">


                <input type="submit" value="ADD CATEGORY" name="add-category">
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

