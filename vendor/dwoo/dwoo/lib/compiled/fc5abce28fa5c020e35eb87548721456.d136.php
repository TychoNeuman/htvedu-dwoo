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
    <div class="card shadow h-100 py-2">
        <div class="card-body">
            <h6 class="m-0 font-weight-bold text-primary">Slagingspercentage</h6>
            <br />
            <form method="post">
                <?php 
$_fh0_data = (isset($this->scope["percentagesettings"]) ? $this->scope["percentagesettings"] : null);
if ($this->isTraversable($_fh0_data) == true)
{
	foreach ($_fh0_data as $this->scope['as']=>$this->scope['setting'])
	{
/* -- foreach start output */
?>
                    <span class="mb-1"><strong><?php echo $this->scope["setting"]["type_name"];?></strong></span>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <input type="text" class="form-control" value="Onvoldoende" disabled>
                        </div>
                        <div class="form-group col-md-1">
                            <input type="text" value="<?php echo $this->scope["setting"]["percentage_low"];?>" name="percentage-low-<?php echo $this->scope["setting"]["id"];?>" class="form-control">
                        </div>
                        <div class="form-group col-md-1">
                            <input type="text" class="form-control" value="%" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <input type="text" class="form-control" value="Goed" disabled>
                        </div>
                        <div class="form-group col-md-1">
                            <input type="text" value="<?php echo $this->scope["setting"]["percentage_high"];?>" name="percentage-high-<?php echo $this->scope["setting"]["id"];?>" class="form-control">
                        </div>
                        <div class="form-group col-md-1">
                            <input type="text" class="form-control" value="%" disabled>
                        </div>
                    </div>
                <?php 
/* -- foreach end output */
	}
}?>
                <input type="submit" class="btn btn-primary" value="Opslaan">
            </form>
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