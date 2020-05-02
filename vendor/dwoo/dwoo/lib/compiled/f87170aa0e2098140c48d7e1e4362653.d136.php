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
            <h1 class="h4 mb-0 text-gray-800">Gebruiker toevoegen</h1>
        </div>
        <div class="card shadow h-100 py-2">
            <div class="card-body">
                <form method="post">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputUsername">Studentnr./Gebruikersnaam</label>
                            <input type="text" class="form-control" id="inputUsername" placeholder="123456789" name="username" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword1">Wachtwoord</label>
                            <input type="password" class="form-control" id="inputPassword1" placeholder="Wachtwoord" name="password" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword2">Herhaal wachtwoord</label>
                            <input type="password" class="form-control" id="inputPassword2" placeholder="Wachtwoord" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputFirstname">Voornaam</label>
                            <input type="text" class="form-control" id="inputFirstname" placeholder="Jan" name="firstname" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputLastname">Achternaam</label>
                            <input type="text" class="form-control" id="inputLastname" placeholder="de Vries" name="lastname" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputDateOfBirth">Geboortedatum</label>
                            <input type="date" class="form-control" id="inputDateOfBirth" name="date-of-birth" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPhone">Telefoonnummer:</label>
                        <input type="text" class="form-control" id="inputPhone" placeholder="06123456789" name="phonenumber" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail1">E-mail:</label>
                            <input type="email" class="form-control" id="inputEmail1" placeholder="anoniem@gmail.com" name="email" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail2">E-mail eerste verzorger:</label>
                            <input type="email" class="form-control" id="inputEmail2" placeholder="anoniem@outlook.com" name="second_email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Straatnaam + huisnummer</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="Straatnaam 123" name="address" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="inputPostcode">Postcode</label>
                            <input type="text" class="form-control" id="inputPostcode" placeholder="1234AA" name="postcode" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputResidence">Woonplaats</label>
                            <input type="text" class="form-control" id="inputResidence" placeholder="Woonplaats" name="residence" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPermission">Permissie</label>
                            <select id="inputPermission" class="form-control" name="permission" required>
                                <option value="" selected disabled>Kiezen...</option>
                                <option value="Admin">Admin</option>
                                <option value="Docent">Docent</option>
                                <option value="Student">Student</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Toevoegen</button>
                </form>
            </div>
        </div>
        <br>
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