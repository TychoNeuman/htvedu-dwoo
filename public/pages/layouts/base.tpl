<!DOCTYPE html>
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

    {include('/blocks/sidebar.tpl')}

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            {include('blocks/topbar.tpl')}

            {block "content"}{/block}

            {include('blocks/footer.tpl')}

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    {include('/blocks/logoutmodal.tpl')}
    <!-- Bootstrap core JavaScript-->
    <script src="/htvedu-dwoo/public/vendor/jquery/jquery.min.js"></script>
    <script src="/htvedu-dwoo/public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/htvedu-dwoo/public/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/htvedu-dwoo/public/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/htvedu-dwoo/public/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/htvedu-dwoo/public/js/demo/chart-area-demo.js"></script>
    <script src="/htvedu-dwoo/public/js/demo/chart-pie-demo.js"></script>
</body>
</html>
