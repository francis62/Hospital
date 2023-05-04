<?php
    session_start();
    include("config.php");
    error_reporting(0);

    if(isset($_POST['submit'])){
        $ret=mysqli_query($con,"SELECT * FROM principalUsers WHERE doctorEmail='".$_POST['username']."' and doctorPassword='".md5($_POST['password'])."'");
        $num=mysqli_fetch_array($ret);

        if($num>0 && $num["userType"]=="admin"){

            header("Location: http://localhost/TestingHospital/medicalRols/admin/dashboard.php");
            $_SESSION['id']=$num['id'];
            exit();

        }else if($num>0 && $num["userType"]=="doctor"){

            header("Location: http://localhost/TestingHospital/medicalRols/doctor/principalPanel.php");
            $_SESSION['id']=$num['id'];
            exit();

        }else{
            echo '<script>alert("Usuario / Contraseñe incorrectos")</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/png" sizes="32x32" href="resources/images/1.png">
        <link rel="stylesheet" href="resources/css/login.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <script src="https://kit.fontawesome.com/36defbaad1.js" crossorigin="anonymous"></script>
        <title>Medical History</title>
    </head>
    <body>   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 d-none d-md-block imageContainer"></div>
    
                <div class="col-lg-6 col-md-6 formContainer">
                    <div class="col-lg-8 col-md-12 col-sm-9 col-xs-12 formBox text-sm-center">
                        <div class="logo mb-5">
                            <a href="index.php"><img src="resources/images/2.png" width="300px"></a>
                        </div>

                        <div class="mb-4">
                            <h3 class="formTitle">
                                Ingresa a tu cuenta
                            </h3>
                        </div>

                        <form action="login.php" method="post" name="loginForm">
                            <div class="form-input">
                                <span><i class="fa fa-envelope"></i></span>
                                <input name="username" type="text" placeholder="Email" required>
                            </div>
                            <div class="form-input">
                                <span><i class="fa fa-lock"></i></span>
                                <input name="password" type="password" placeholder="Contraseña" required>
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="submit" class="ingresarButton">Ingresar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
	
		<script src="resources/js/main.js"></script>

		<script src="resources/js/login.js"></script>
        
        <script>
            function submitForm() {
                document.loginForm.submit();
                document.loginForm.reset();
            }
        </script>
    </body>
</html>