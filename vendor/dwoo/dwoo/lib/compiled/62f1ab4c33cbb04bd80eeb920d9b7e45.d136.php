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

                <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h4 mb-0 text-gray-800">Beoordelen</h1>
        </div>
        <div class="card shadow h-100 py-2">
            <div class="card-body">
                <p>Kies een student om te beoordelen:</p>
                <div class="d-flex flex-column">
                    <?php if (empty($this->scope["users"])) {
?>
                        <em>Alle studenten zijn beoordeeld.</em>
                    <?php 
}
else {
?>
                        <?php 
$_fh0_data = (isset($this->scope["users"]) ? $this->scope["users"] : null);
if ($this->isTraversable($_fh0_data) == true)
{
	foreach ($_fh0_data as $this->scope['as']=>$this->scope['user'])
	{
/* -- foreach start output */
?>
                            <div class="border p-2 m-2">
                                <span class="font-weight-bold"><?php echo $this->scope["user"]["username"];?></span>
                                <span><?php echo $this->scope["user"]["firstname"];?> <?php echo $this->scope["user"]["lastname"];?></span>
                                <a href="index.php?p=assessment-form&subject=<?php echo $this->scope["subject"];?>&id=<?php echo $this->scope["user"]["id"];?>"><button type="button" class="btn btn-outline-primary btn-sm float-right">Beoordeel</button></a>
                            </div>
                        <?php 
/* -- foreach end output */
	}
}?>
                    <?php 
}?>
                </div>
            </div>
        </div>
    </div>


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