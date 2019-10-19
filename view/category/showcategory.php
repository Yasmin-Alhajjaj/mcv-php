<?php
include "../layout/header.php";
include "../../database/database.php";
include '../../model/categories.php';

//database
$db= new database();
$conn=$db->connect();


$category= new categories($conn);
$new_category=$category->getAll();




if (isset($_POST['delete'])){
    $category->delete($_POST['id']);
};




?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Table V05</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../css/util.css">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <!--===============================================================================================-->
    </head>
    <body>

    <div class="limiter">
        <div class="container-table100">
            <div class="wrap-table100">
                <div class="table100 ver1">


                    <div class="table100">
                        <table  class="table table-striped">
                            <thead>
                            <tr class="row100 head table-dark">

                                <th class="cell100 column2">ID</th>
                                <th class="cell100 column3">Name</th>
                                <th class="cell100 column6">Created</th>
                                <th class="cell100 column7">Modified</th>
                                <th class="cell100 column9">DELETE</th>




                            </tr>
                            </thead>
                            <tbody>

                            <?php

                            foreach ($new_category as $row) {?>
                                <tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['created'] ?></td>
                                    <td><?php echo $row['modified'] ?></td>
                                    <td>
                                        <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                                            <input type="hidden" name="id" value="<?php echo $row['id']?>">
                                            <button class='btn btn-outline-danger' type="submit" name="delete" value="delete" > DELETE</button>

                                        </form>

                                        <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                                            <input type="hidden" name="id" value="<?php echo $row['id']?>">
                                            <button class='btn btn-outline-success' type="submit" name="edit" value="edit" > EDIT</button>

                                        </form>
                                    </td>
                                </tr>



                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script>
        $('.js-pscroll').each(function(){
            var ps = new PerfectScrollbar(this);

            $(window).on('resize', function(){
                ps.update();
            })

            $(this).on('ps-x-reach-start', function(){
                $(this).parent().find('.table100-firstcol').removeClass('shadow-table100-firstcol');
            });

            $(this).on('ps-scroll-x', function(){
                $(this).parent().find('.table100-firstcol').addClass('shadow-table100-firstcol');
            });

        });




    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

    </body>
    </html>
<?php
include "../layout/footer.php";
?>