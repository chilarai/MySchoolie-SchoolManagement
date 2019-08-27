<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>MySchoolie | Admin</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    
    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="<?php echo BASE_URL?>plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
    <link href="<?php echo BASE_URL?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo BASE_URL?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo BASE_URL?>css/animate.min.css" rel="stylesheet" />
    <link href="<?php echo BASE_URL?>css/style.min.css" rel="stylesheet" />
    <link href="<?php echo BASE_URL?>css/style-responsive.min.css" rel="stylesheet" />
    <link href="<?php echo BASE_URL?>css/theme/orange.css" rel="stylesheet" id="theme" />
    <!-- ================== END BASE CSS STYLE ================== -->
    
    <!-- ================== BEGIN BASE JS ================== -->
    <script src="<?php echo BASE_URL?>plugins/pace/pace.min.js"></script>
    <!-- ================== END BASE JS ================== -->

        <!-- ================== BEGIN BASE JS ================== -->
    <script src="<?php echo BASE_URL?>plugins/jquery/jquery-3.4.1.min.js"></script>
    <script src="<?php echo BASE_URL?>plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
    <script src="<?php echo BASE_URL?>plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
    <script src="<?php echo BASE_URL?>plugins/bootstrap/js/bootstrap.min.js"></script>
    <!--[if lt IE 9]>
        <script src="assets/crossbrowserjs/html5shiv.js"></script>
        <script src="assets/crossbrowserjs/respond.min.js"></script>
        <script src="assets/crossbrowserjs/excanvas.min.js"></script>
    <![endif]-->
    <script src="<?php echo BASE_URL?>plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo BASE_URL?>plugins/jquery-cookie/jquery.cookie.js"></script>
    <!-- ================== END BASE JS ================== -->
    
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="<?php echo BASE_URL?>js/apps.min.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->
    
</head>
<body class="pace-top bg-white">
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade in"><span class="spinner"></span></div>
    <!-- end #page-loader -->
    
    <!-- begin #page-container -->
    <div id="page-container" class="fade">
        <?php echo $this->fetch('content');?>
        
    </div>
    <!-- end page container -->
    


    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
</body>
</html>
