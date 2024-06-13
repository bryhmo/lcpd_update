<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Lincoln Continuing Professional Development</title>
  <meta content="Education for All,
  Impacting Lives,
  Get Certified by Continuing Your Professional Development,  Lincoln Continuing Professional Development Institution is the premier academy offering a range of professional training courses." name="description">
  <meta content="Lincoln CPD, lcpd, Education, continuing professional development, Education for all, Impacting lives, Get certified" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/licon.png" rel="icon">
  <link href="assets/img/licon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/animate.css/animate.min.css}')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <!-- <h1 class="logo me-auto"><a href="index.html">LCPD</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="/" class="logo me-auto"><img src="{{('assets/img/lcpd.png')}}" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="active" href="/">Home</a></li>
          <li class="dropdown"><a href="#"><span>Welcome to LCPD</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="#">About LCPD</a></li>
              <li><a href="#">Collaboration</a></li>
              <li><a href="#">Activities</a></li>
              <li><a href="#">International Information</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Programs</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="#">Short Courses</a></li>
              <li><a href="#">Master Programs</a></li>
              <li><a href="#">Undergraduate programmes</a></li>
              <li><a href="#">Faculties</a></li>
            </ul>
          </li>
          <li><a href="{{route('courses')}}">All Courses</a></li>
          <li class="dropdown"><a href="#"><span>who we are</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="#">What do we aim to achieve</a></li>
              <li><a href="#">How do we Achieve this</a></li>
              <li><a href="#">Our Drive</a></li>
              <li><a href="#">what do we have to offer</a></li>
            </ul>
          </li>
          
          <!-- <li><a href="events.html">Events</a></li> -->
          

           
          <li><a href="contact.html">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="{{route('apply')}}" class="get-started-btn" title="Enroll now and start learning">Apply Now</a>
      <a href="{{route('register')}}" class="get-started-btn" title="Enroll now and start learning">Login</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center">
    
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>Education for All,<br>Impacting Lives</h1>
      <h2>Get Certified by Continuing Your Professional Development</h2>
      <a href="{{route('apply')}}" class="btn-get-started">Apply Now</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

 @yield('content')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>LCPD</h3>
            <p>
              <strong>Malaysian Campus:</strong> Wisma Lincoln, No. 12-18, Jalan SS 6/12, <br> 47301 Petaling Jaya, Selangor Darul Ehsan, Malaysia.<br>
              <br>
              <strong> Nigerian Campus:</strong> Along Jikwoyi-Karshi road 
              Nyaya, FCT Abuja
              Nigeria <br><br>

              
              <strong>Phone:</strong> +2349079811960<br>
              <strong>Email:</strong> lcpd@lincoln.edu.ng<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Dashboard</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Courses</a></li>
              
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Courses</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="./courses.html#jj">Forensic Studies</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Human Resource Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Project Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Tech Recruitment</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">UI/UX Design  </a></li>
            </ul>
          </div>

          

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>LCPD</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          
           Designed by <a href="">codewithbryhmo</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js')}}"></script>

</body>

</html>