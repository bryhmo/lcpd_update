

@extends('cards.sub_header')


@section('content')
    


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>lcpd.com</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('adminlin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('adminlin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminlin/dist/css/adminlte.min.css')}}">
  <style>
    .boll{
      border:5px solid hsla(0, 100%, 50%,0.3);
    }
    h1{
      color:red;
      font-size: 20px;
      text-align: center;
    }
    #countdown{
      color: red;
      font-family: Arial, Helvetica, sans-serif;
      border: 3px solid rgba(222, 184, 135, 0.193);
      background-color:transparent;
      padding:15px;
     
      font-size: 70px;
    }
    p{
      color: blue;
      font-size: 10px;
      text-align: center;
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box boll">
  
  
<h1>The Registration Page will be here!</h1>

  <h1>Website Under Development!</h1>

  <p>We're working hard to bring you an amazing website. <br><span style="font-size:30px">It will be ready by:</span></p>
  
  <div id="countdown"></div>
  
  <script>
  // Set the date for when the website will be ready (today's date plus 1 month)
  var endDate = new Date();
  endDate.setMonth(endDate.getMonth() + 1);
  
  // Update the countdown every second
  var countdownInterval = setInterval(updateCountdown, 1000);
  
  function updateCountdown() {
    var now = new Date().getTime();
    var distance = endDate - now;
  
    // Calculate days, hours, minutes, and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  
    // Display the countdown
    document.getElementById("countdown").innerHTML = days + "d :" + hours + "h "
    + minutes + "m " + seconds + "s ";
  
    // If the countdown is over, display a message
    if (distance < 0) {
      clearInterval(countdownInterval);
      document.getElementById("countdown").innerHTML = "Website is ready!";
    }
  }
  </script>


</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('adminlin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlin/dist/js/adminlte.min.js')}}"></script>
</body>
</html>

@endsection