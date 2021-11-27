<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Page Title -->
    <title>Hotel Pirus</title>
    <!-- Rencang Icon -->
    <link rel="shorcut icon" href="{{ asset('images/public/logo-rencang.png') }}">
    <!-- CSS -->
    <!-- Bootstraps 5 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- JQuery UI -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" />
    <!-- Custom CSS Navigation Bar -->
    <link rel="stylesheet" href="{{ asset('css/navbar/navbar.css') }}">
    <!-- Custom CSS Footer -->
    <link rel="stylesheet" href="{{ asset('css/footer/footer.css') }}">

    <!-- Custom CSS -->
    @yield('custom-css')
</head>

<body>

    @yield('content-login')

    <!-- Javascript -->

    <!-- dataTable -->
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- JQuery UI -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <!-- Bootstrap & Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script> -->


    <script src="{{ asset('js/sweetalert/sweetalert.js') }}"></script>

    <!-- Custom JS Navigation Bar -->
    <script>
        $(document).ready(function(){
            $('#myModal').modal({
            keyboard: false,
            show: true,
            backdrop: 'static'
        	});
        });
    </script>
    @yield('custom-js')
</body>
</html>