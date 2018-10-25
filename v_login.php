<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        if (isset($_SESSION['crm-username'])) {
            redirect(base_url("core"));
        }
        ?>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Customer Relationship Management INS </title>

        <!-- Bootstrap -->
        <link href="<?= base_url() ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?= base_url() ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="<?= base_url() ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- Animate.css -->
        <link href="<?= base_url() ?>assets/vendors/animate.css/animate.min.css" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="<?= base_url() ?>assets/build/css/custom.min.css" rel="stylesheet">
        <style>
            .login{
                background-image: url("<?= base_url() ?>assets/production/images/crm.png"); 
                height: 100%;
                background-size: cover;
            }
        </style>
    </head>

    <body class="login">
        <div>
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>
            <br />
            <br />
            <br />
            <br />
            <div class="login_wrapper">
                <div class="animate form login_form">
                    <section class="login_content">
                        <form action="<?= base_url('login/log_in'); ?>" method="post">
                            
                            <h1 style="font-family: Book Antiqua; color: #f85110"><i>PT Pura Barutama</i> <br><br> Unit Indostamping</h1>
                            <h2 style="font-family: TREBUCHET MS; font-size: 18px; color: #5f6c6c">CUSTOMER RELATIONSHIP MANAGEMENT</h2>
                            <br>
                            <div>
                                <input type="text" class="form-control" placeholder="Username" required="" name="USERNAME"/>
                            </div>
                            <div>
                                <input type="password" class="form-control" placeholder="Password" required="" name="PASSWORD"/>
                            </div>
                            <div>
                                <input class="btn btn-primary submit pull-right" type="submit" value="Log in"/>
                            </div>

                            
                            
                            <!--<div class="separator"> </div>-->
                                <div class="clearfix"></div>
                                
                                <br />
                                <br />
                                
                                <div style="color: #5f6c6c">
                                    <p>©2018 All Rights Reserved <b>-SC</b> Internship-INS</p>
                                </div>
                           
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </body>
</html>
