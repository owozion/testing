<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <title>Registration Form</title>
</head>
<body>
    <div class="container bg-primary">
        <div class="row">
            <div class="col-8 m-4">
                <form action="process/process_registration.php" method="post">
                    <h3 class="text-bolder">Registration Form</h3>
                    <div>
                    <?php
                if (isset($_SESSION["feedback"])){
                    echo "<div class='alert alert-success'>".$_SESSION["feedback"]."</div>";
                    unset($_SESSION["feedback"]);
                }
                if (isset($_SESSION["errormsg"])){
                    echo "<div class='alert alert-danger'>".$_SESSION["errormsg"]."</div>";
                    unset($_SESSION["errormsg"]);
                }
                ?>
                    </div>
                    <div>
                        <label for="" class="m-2">Name</label>
                        <input class="form-control m-2" type="text" name="name" placeholder="Please enter your name">
                    </div>
                    <div>
                        <label for="" class="m-2">Phone number</label>
                        <input class="form-control m-2" type="number" name="number" placeholder="Please enter your phone number (should be 11 digits)">
                    </div>
                    <div>
                        <label for="" class="m-2">Email</label>
                        <input class="form-control m-2" type="email" name="email" placeholder="Please enter your Email address">
                    </div>
                    <input type="submit" value="Submit" class="btn btn-warning m-3" name="btn" id="btn">
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>