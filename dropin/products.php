<?php
require("includes/common.php");

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Products | DROP.in</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php
        include 'includes/header.php';
        include 'includes/check-if-added.php';
        ?>
        <div class="container" id="content">
            <div class="jumbotron home-spacer" id="products-jumbotron">
                <h1>Welcome to DROP.in</h1>
                <p>We change the way of shopping.</p>

            </div>
            <hr>

            <div class="row text-center" id="cameras">
			

<?php 
$dsn='mysql:host=localhost;dbname=store';
$username='root';
$password='';
try{
	$con=new PDO($dsn,$username,$password);
	$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(Exception $ex){
	echo'NotConnected'.$ex->getMessage();
}
$stmt = $con->prepare("SELECT * FROM items");
$stmt->execute();
//$resultSet = $stmt->get_result();
//$results = $resultSet->fetch_all();
//$resultSet = $stmt->get_result();

//pull all results as an associative array
$results=$stmt->fetchAll(PDO::FETCH_OBJ);
foreach($results as $result)
{
	?>
			
			
                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thusmbnail">
                        <img src="admin/itemimages/<?php echo htmlentities($result->Image);?>" alt="">
                        <div class="caption">
                            <h3><?php echo htmlentities($result->name);?> </h3>
                            <p>Price: Rs.<?php echo htmlentities($result->price);?></p>
                            <?php if (!isset($_SESSION['email'])) { ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } 
							else
							{
	
                                if (check_if_added_to_cart(htmlentities($result->id))) {
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } 
								else
								{
                                    ?>
                                    <a href="cart-add.php?id=<?php echo htmlentities($result->id);?>" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>

<?php } ?>         

              

            </div>

            
               

               

            

           
               

           
        </div>

        <?php include("includes/footer.php"); ?>
    </body>

</html>
