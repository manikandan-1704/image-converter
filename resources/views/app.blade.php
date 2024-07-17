<!-- resources/views/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EzConvert</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">


    <!-- Include any custom CSS stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        
        html, body {
            height: 100%;
        }
       
        .footer {
            height: 100px;
        }
    </style>
</head>
<body class="d-flex flex-column">
    <!-- Header -->
    @include('includes.header')

    <!-- Main content -->
    <main class="flex-grow-1">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('includes.footer')


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
    <!-- Include any custom JS files or libraries -->
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
</body>
</html>
