<?php
/* template head */
if (class_exists('Dwoo\Plugins\Functions\PluginInclude')===false)
	$this->getLoader()->loadPlugin('PluginInclude');
/* end template head */ ob_start(); /* template body */ ;
'';// checking for modification in file:public/pages\\layouts/base.tpl
if (!("1583343862" == filemtime('public/pages//layouts/base.tpl'))) { ob_end_clean(); return false; };?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>HTV Politie</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="/htvedu-dwoo/public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="/htvedu-dwoo/public/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
<div id="wrapper">

    <?php echo $this->classCall('Dwoo\Plugins\Functions\Plugininclude',
                        array('/blocks/sidebar.tpl', null, null, null, '_root', null));?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <?php echo $this->classCall('Dwoo\Plugins\Functions\Plugininclude',
                        array('blocks/topbar.tpl', null, null, null, '_root', null));?>

               <?php if ((isset($this->scope["subject"]) ? $this->scope["subject"] : null) === "sport") {
?>
      <?php echo $this->classCall('Dwoo\Plugins\Functions\Plugininclude',
                        array("assessmentpages/sportform.tpl", null, null, null, '_root', null));?>
   <?php 
}?>
   <?php if ((isset($this->scope["subject"]) ? $this->scope["subject"] : null) === 'assignment') {
?>
      <?php echo $this->classCall('Dwoo\Plugins\Functions\Plugininclude',
                        array("assessmentpages/assignmentform.tpl", null, null, null, '_root', null));?>
   <?php 
}?>
   <?php if ((isset($this->scope["subject"]) ? $this->scope["subject"] : null) === 'group') {
?>
      <?php echo $this->classCall('Dwoo\Plugins\Functions\Plugininclude',
                        array("assessmentpages/groupform.tpl", null, null, null, '_root', null));?>
   <?php 
}?>

            <?php echo $this->classCall('Dwoo\Plugins\Functions\Plugininclude',
                        array('blocks/footer.tpl', null, null, null, '_root', null));?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <?php echo $this->classCall('Dwoo\Plugins\Functions\Plugininclude',
                        array('/blocks/logoutmodal.tpl', null, null, null, '_root', null));?>
    <!-- Bootstrap core JavaScript-->
    <script src="/htvedu-dwoo/public/vendor/jquery/jquery.min.js"></script>
    <script src="/htvedu-dwoo/public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/htvedu-dwoo/public/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/htvedu-dwoo/public/js/sb-admin-2.min.js"></script>

    <!-- Main script for custom functions -->
    <script src="/htvedu-dwoo/public/js/main.js"></script>
</body>
</html>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>