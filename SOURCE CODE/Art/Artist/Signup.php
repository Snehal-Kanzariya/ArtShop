<?php include("connection.php"); ?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Artist Registeration </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/flaticon.css">
        <link rel="stylesheet" href="assets/css/slicknav.css">
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/css/themify-icons.css">
        <link rel="stylesheet" href="assets/css/slick.css">
        <link rel="stylesheet" href="assets/css/nice-select.css">
        <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                   <b>Art Shopee</b>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Preloader Start -->

    <!--header part calling -->
    <?php
        include("layout/header.php");
    ?>
    <!-- header over -->

    <!--================login_part Area =================-->
    <?php
        if (isset($_SESSION['done'])) {
            echo '<font color ="green">'.$_SESSION['done'].'</font><br/>';
            unset($_SESSION['done']);
        }
        else if(!empty($_SESSION['error'])){
            foreach($_SESSION['error'] as $er){
                echo '<font color ="red">'.$er.'</font><br/>';
            }
            echo '<br />';
        }

        
    ?>
    <div class="top-5 start-5 translate-middle">
    <div class="login_part_form">
    <section class="login_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-1">
                        <div class="login_part_form_iner">

        
                            <h2 class="m-2 p-0 "><b>Sign Up</b></h2><br/>
                            <form class="row contact_form " action="Signup_process.php" method="post" novalidate="novalidate">
                           

                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="username" name="name" value=""
                                        placeholder="Name">
                                </div>

								<div class="col-md-12 form-group p_star">
                                    <input type="email" class="form-control" id="email" name="email" value=""
                                        placeholder="Email">
                                    
                                </div>
                                
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password_1" name="password_1" value=""
                                        placeholder="Password">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password_2" name="password_2" value=""
                                        placeholder="Retype Password">
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" id="f-option" name="selector">
                                        <label for="f-option">Remember me</label>
                                    </div>
                                    <input type="submit" value="Sign up" name="submit" class="btn_3">
                                       
                            
                                Already Have an Account?    <a class="lost_pass" href="login.php">Login here</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
        </div>
    </section>
 
</body>
<!--footer part calling -->
<?php
        include("layout/footer.php");
    ?>

        <!-- footer over -->
    
</html>