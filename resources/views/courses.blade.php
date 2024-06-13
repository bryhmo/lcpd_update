@extends('layouts.base')

@section('content')


   <!-- ======= Breadcrumbs ======= -->
   <style>
        .sticky{
            position: sticky;
            top:0;
            z-index: 1
        }
   </style>
   <div class="breadcrumbs sticky">
    <div class="container" >
      <h2>Courses</h2>
         <h5>There are numerous taught modules available at the University of Lincoln Nigeria and Malaysia that can be taken at any time of the year. </h5>
         <div class="form-outline  mt-1/2 ">
            <input type="search" class="form-control" id="datatable-search-input" placeholder="search by course name">
            <label class="form-label ml-3 " for="datatable-search-input"><h4>Search</h4></label>
        </div>
        </div>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Courses Section ======= -->
  
  <section id="courses" class="courses">
    <div class="container" data-aos="fade-up">

      <div class="row" data-aos="zoom-in" data-aos-delay="100">

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <div class="course-item">
            <img src="assets/img/course-1.jpg" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Human Resource Management</h4>
                <p class="price">N55,000</p>
              </div>

              <h3><a href="">Duration: 1 Month</a></h3>
              <p>This consist of the necessary skills for a person to become a good HR which includes: recruiting excellent staff, smooth onboarding process and training, counseling staff</p>
              <div class="trainer d-flex justify-content-between align-items-center">
                
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bx bx-user"></i>&nbsp;50
                  &nbsp;&nbsp;
                  <i class="bx bx-heart"></i>&nbsp;65
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
          <div class="course-item">
            <img src="assets/img/course-2.jpg" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Hospitality and Culinary Act</h4>
                <p class="price">N40,000</p>
              </div>

              <h3><a href="">Duration: 1 Month</a></h3>
              <p>The programs and majors in Hospitality and Culinary Arts can lead to careers in the hotel, gaming, restaurant, tourism, and food service industries.

                </p>
              <div class="trainer d-flex justify-content-between align-items-center">
                
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bx bx-user"></i>&nbsp;35
                  &nbsp;&nbsp;
                  <i class="bx bx-heart"></i>&nbsp;42
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
          <div class="course-item">
            <img src="assets/img/cctv.jpg" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>CCTV Installation </h4>
                <p class="price">N50,000</p>
              </div>

              <h3><a href="">Duration: 1 Month</a></h3>
              <p>Installing a CCTV camera system can be an expensive affair, in this course you would be taught the step by step guide on how to do the installation.</p>
              <div class="trainer d-flex justify-content-between align-items-center">
                
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bx bx-user"></i>&nbsp;20
                  &nbsp;&nbsp;
                  <i class="bx bx-heart"></i>&nbsp;85
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->

      </div>
      <hr>
      <div class="row" data-aos="zoom-in" data-aos-delay="100">

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <div class="course-item">
            <img src="assets/img/course-1.jpg" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>UI/UX Design</h4>
                <p class="price">NGN40,000</p>
              </div>

              <h3><a href="">Duration: 1 Month</a></h3>
              <p>User Interface and User Experience design both require an understanding of what users need</p>
              <div class="trainer d-flex justify-content-between align-items-center">
                
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bx bx-user"></i>&nbsp;50
                  &nbsp;&nbsp;
                  <i class="bx bx-heart"></i>&nbsp;65
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
          <div class="course-item" id="jj">
            <img src="assets/img/course-2.jpg" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Forensic Studies</h4>
                <p class="price">NGN150,000</p>
              </div>

              <h3><a href="">Duration: 1 Month</a></h3>
              <p>This course includes: Cyber security, Medical forensic studies, security intelligence and investigation forensic studies </p>
              <div class="trainer d-flex justify-content-between align-items-center">
                
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bx bx-user"></i>&nbsp;35
                  &nbsp;&nbsp;
                  <i class="bx bx-heart"></i>&nbsp;42
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
          <div class="course-item">
            <img src="assets/img/course-3.jpg" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Project Management</h4>
                <p class="price">N45,000</p>
              </div>
              <h3><a href="">Duration: 1 Month</a></h3>
              <!-- <h3><a href="">Copywriting</a></h3> -->
              <p>Leading the work of a team to achieve all project goals within the given contraints, is not easy, with this course you would be taught the most effective way to lead a team to achieve the desired goals </p>
              <div class="trainer d-flex justify-content-between align-items-center">
                
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bx bx-user"></i>&nbsp;20
                  &nbsp;&nbsp;
                  <i class="bx bx-heart"></i>&nbsp;85
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->

      </div>
      <hr>
      <div class="row" data-aos="zoom-in" data-aos-delay="100">
        <!-- <a href="HRM_course_details.html"> -->
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <img src="assets/img/course-1.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>Tech Recruitment</h4>
                  <p class="price">NGN100,000</p>
                </div>

                <h3>Duration: 1 Month</h3>
                <p>In this course you would be taught the practical, theoritical skills and best practices needed to succeed at technical recruiting, by avoiding mis-hires in the process of hiring talents</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-user"></i>&nbsp;50
                    &nbsp;&nbsp;
                    <i class="bx bx-heart"></i>&nbsp;65
                  </div>
                </div>
              </div>
            </div>
          </div>
       <!-- </a> -->
        <!-- End Course Item-->

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
          <div class="course-item">
            <img src="assets/img/environment.jpg" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Health Safety and Environment Management</h4>
                <p class="price">NGN150,000</p>
              </div>

              <h3><a href="course-details.html">Duration: 3 Month</a></h3>
              <p>A HSE Management system is an integreted approach where all the 3 HSE factors are effectively managed to reduce risks in the workplace.
                 </p>
              <div class="trainer d-flex justify-content-between align-items-center">
                <!--  -->
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bx bx-user"></i>&nbsp;35
                  &nbsp;&nbsp;
                  <i class="bx bx-heart"></i>&nbsp;42
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
          <div class="course-item">
            <img src="assets/img/environment.jpg" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Health Safety and Environment Management</h4>
                <p class="price">NGN150,000</p>
              </div>

              <h3><a href="course-details.html">Duration: 3 Month</a></h3>
              <p>A HSE Management system is an integreted approach where all the 3 HSE factors are effectively managed to reduce risks in the workplace.
                 </p>
              <div class="trainer d-flex justify-content-between align-items-center">
                <!--  -->
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bx bx-user"></i>&nbsp;35
                  &nbsp;&nbsp;
                  <i class="bx bx-heart"></i>&nbsp;42
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->

        <!-- Masters programs  -->
        <h3 class="mt-5 mb-0 text-danger text-center">Masters in Faculty of Social Science Arts and Humanities</h3>
        <hr>
      </div>
      <div class="row" data-aos="zoom-in" data-aos-delay="100">

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <div class="course-item">
            <a href="master-of-education(BYRESEARCH).html">
              <img src="assets/img/course-1.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>Master of Education</h4>
                  <p class="price">NGN600,000</p>
                </div>

                <h3>Duration: 1 year 6 Month</h3>
                <p>In this course you would be taught the practical, theoritical skills and best practices needed to succeed at technical recruiting, by avoiding mis-hires in the process of hiring talents</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-user"></i>&nbsp;50
                    &nbsp;&nbsp;
                    <i class="bx bx-heart"></i>&nbsp;65
                  </div>
                </div>
              </div>
           </a> 
          </div>
        </div> <!-- End Course Item-->

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
          <div class="course-item">
            <a href="master-of-communication.html" >
              <img src="assets/img/environment.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>Master of Communication</h4>
                  <p class="price">NGN600,000</p>
                </div>

                <h3>Duration: 1 year 6 Month</h3>
                <p>A Master programme in Communication at LUC aims to imbue the ‘rich content’ to construct views, communicate ideas, bridge communication gaps in all spheres as in media, development sectors, organizations, public and advanced research set in local and international market.
                  </p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <!--  -->
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-user"></i>&nbsp;35
                    &nbsp;&nbsp;
                    <i class="bx bx-heart"></i>&nbsp;42
                  </div>
                </div>
              </div>
           </a>
          </div>
        </div> <!-- End Course Item-->
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
          <div class="course-item">
            <a href="master-of-ATESL.html" >
              <img src="assets/img/environment.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>Master of Arts in Teaching English as a Second Language</h4>
                  <p class="price">NGN600,000</p>
                </div>

                <h3>Duration: 1 year 6 Month</h3>
                <p>A HSE Management system is an integreted approach where all the 3 HSE factors are effectively managed to reduce risks in the workplace.
                  </p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <!--  -->
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-user"></i>&nbsp;35
                    &nbsp;&nbsp;
                    <i class="bx bx-heart"></i>&nbsp;42
                  </div>
                </div>
              </div>
          </a>
          </div>
        </div> <!-- End Course Item-->
        <hr>
      </div>
      <div class="row" data-aos="zoom-in" data-aos-delay="100">

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <div class="course-item">
            <img src="assets/img/course-1.jpg" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Master of International Relation</h4>
                <p class="price">NGN600,000 (50k/course)</p>
              </div>

              <h3><a href="master-of-international-relation(BYRESEARCH).html" >Duration: 1 year 6 Month</a></h3>
              <p>In this course you would be taught the practical, theoritical skills and best practices needed to succeed at technical recruiting, by avoiding mis-hires in the process of hiring talents</p>
              <div class="trainer d-flex justify-content-between align-items-center">
                
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bx bx-user"></i>&nbsp;50
                  &nbsp;&nbsp;
                  <i class="bx bx-heart"></i>&nbsp;65
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
          <div class="course-item">
            <img src="assets/img/environment.jpg" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Master of Mass Communication</h4>
                <p class="price">NGN600,000</p>
              </div>

              <h3><a href="master-of-communication.html" >Duration: 1 year 6 Month</a></h3>
              <p>A HSE Management system is an integreted approach where all the 3 HSE factors are effectively managed to reduce risks in the workplace.
                 </p>
              <div class="trainer d-flex justify-content-between align-items-center">
                <!--  -->
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bx bx-user"></i>&nbsp;35
                  &nbsp;&nbsp;
                  <i class="bx bx-heart"></i>&nbsp;42
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
          <div class="course-item">
            <img src="assets/img/environment.jpg" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Master of Science in Psychology</h4>
                <p class="price">NGN600,000</p>
              </div>

              <h3><a href="master-of-science-in-psychology(BYRESEARCH).html" >Duration: 1 year 6 Month</a></h3>
              <p>A HSE Management system is an integreted approach where all the 3 HSE factors are effectively managed to reduce risks in the workplace.
                 </p>
              <div class="trainer d-flex justify-content-between align-items-center">
                <!--  -->
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bx bx-user"></i>&nbsp;35
                  &nbsp;&nbsp;
                  <i class="bx bx-heart"></i>&nbsp;42
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->
        <hr>
      </div>
      <div class="row" data-aos="zoom-in" data-aos-delay="100" >

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <div class="course-item">
            <img src="assets/img/course-1.jpg" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Postgraduate Diploma in Education</h4>
                <p class="price">NGN600,000 (50k/course)</p>
              </div>

              <h3><a href="postgraduate-diploma-in-education.html" >Duration: 1 year 6 Month</a></h3>
              <p>In this course you would be taught the practical, theoritical skills and best practices needed to succeed at technical recruiting, by avoiding mis-hires in the process of hiring talents</p>
              <div class="trainer d-flex justify-content-between align-items-center">
                
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bx bx-user"></i>&nbsp;50
                  &nbsp;&nbsp;
                  <i class="bx bx-heart"></i>&nbsp;65
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
          <div class="course-item">
            <img src="assets/img/environment.jpg" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Postgraduate Diploma in Teaching</h4>
                <p class="price">NGN600,000</p>
              </div>

              <h3><a href="postgraduate-diploma-in-teaching.html" >Duration: 1 year 6 Month</a></h3>
              <p>A HSE Management system is an integreted approach where all the 3 HSE factors are effectively managed to reduce risks in the workplace.
                 </p>
              <div class="trainer d-flex justify-content-between align-items-center">
                <!--  -->
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bx bx-user"></i>&nbsp;35
                  &nbsp;&nbsp;
                  <i class="bx bx-heart"></i>&nbsp;42
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0 ">
          <div class="course-item">
            <img src="assets/img/environment.jpg" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Master in Social Work</h4>
                <p class="price">NGN600,000</p>
              </div>

              <h3><a href="master-of-social-work.html" >Duration: 1 year 6 Month</a></h3>
              <p>A HSE Management system is an integreted approach where all the 3 HSE factors are effectively managed to reduce risks in the workplace.
                 </p>
              <div class="trainer d-flex justify-content-between align-items-center">
                <!--  -->
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bx bx-user"></i>&nbsp;35
                  &nbsp;&nbsp;
                  <i class="bx bx-heart"></i>&nbsp;42
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->
        <!-- Masters programs  -->
        <h3 class="mt-5 mb-0 text-danger text-center">Masters in Faculty of Business and Accounting</h3>
        <hr>
      </div>
      <div class="row" data-aos="zoom-in" data-aos-delay="100">

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <div class="course-item">
            <img src="assets/img/course-1.jpg" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Master of Accounting and Finance</h4>
                <p class="price">NGN600,000</p>
              </div>

              <h3><a href="master-of-accounting-and-finance.html" >Duration: 1 year 6 Month</a></h3>
              <p>In this course you would be taught the practical, theoritical skills and best practices needed to succeed at technical recruiting, by avoiding mis-hires in the process of hiring talents</p>
              <div class="trainer d-flex justify-content-between align-items-center">
                
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bx bx-user"></i>&nbsp;50
                  &nbsp;&nbsp;
                  <i class="bx bx-heart"></i>&nbsp;65
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
          <div class="course-item">
            <img src="assets/img/environment.jpg" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Master of Islamic Banking </h4>
                <p class="price">NGN600,000</p>
              </div>

              <h3><a href="master-of-islamic-banking(BYRESEARCH).html" >Duration: 1 year 6 Month</a></h3>
              <p>A Master programme in Communication at LUC aims to imbue the ‘rich content’ to construct views, communicate ideas, bridge communication gaps in all spheres as in media, development sectors, organizations, public and advanced research set in local and international market.
                 </p>
              <div class="trainer d-flex justify-content-between align-items-center">
                <!--  -->
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bx bx-user"></i>&nbsp;35
                  &nbsp;&nbsp;
                  <i class="bx bx-heart"></i>&nbsp;42
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
          <div class="course-item">
            <img src="assets/img/environment.jpg" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Master of Economics</h4>
                <p class="price">NGN600,000</p>
              </div>

              <h3><a href="master-of-economics.html" >Duration: 1 year 6 Month</a></h3>
              <p>A HSE Management system is an integreted approach where all the 3 HSE factors are effectively managed to reduce risks in the workplace.
                 </p>
              <div class="trainer d-flex justify-content-between align-items-center">
                <!--  -->
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bx bx-user"></i>&nbsp;35
                  &nbsp;&nbsp;
                  <i class="bx bx-heart"></i>&nbsp;42
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->
        <hr>
      </div>
      <div class="row" data-aos="zoom-in" data-aos-delay="100">

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <div class="course-item">
            <img src="assets/img/course-1.jpg" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Master of Business Administration in Human Resource Management</h4>
                <p class="price">NGN600,000</p>
              </div>

              <h3><a href="master-of-business-administration-in-human-resource-management.html" >Duration: 1 year 6 Month</a></h3>
              <p>In this course you would be taught the practical, theoritical skills and best practices needed to succeed at technical recruiting, by avoiding mis-hires in the process of hiring talents</p>
              <div class="trainer d-flex justify-content-between align-items-center">
                
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bx bx-user"></i>&nbsp;50
                  &nbsp;&nbsp;
                  <i class="bx bx-heart"></i>&nbsp;65
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
          <div class="course-item">
            <img src="assets/img/environment.jpg" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Master of Business Administration in Project Management</h4>
                <p class="price">NGN600,000</p>
              </div>

              <h3><a href="master-of-busness-administration-in-project-management.html" >Duration: 1 year 6 Month</a></h3>
              <p>A HSE Management system is an integreted approach where all the 3 HSE factors are effectively managed to reduce risks in the workplace.
                 </p>
              <div class="trainer d-flex justify-content-between align-items-center">
                <!--  -->
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bx bx-user"></i>&nbsp;35
                  &nbsp;&nbsp;
                  <i class="bx bx-heart"></i>&nbsp;42
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
          <div class="course-item">
            <img src="assets/img/environment.jpg" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Master of Business Administration</h4>
                <p class="price">NGN600,000</p>
              </div>

              <h3><a href="master-of-business-administration.html" >Duration: 1 year 6 Month</a></h3>
              <p>A HSE Management system is an integreted approach where all the 3 HSE factors are effectively managed to reduce risks in the workplace.
                 </p>
              <div class="trainer d-flex justify-content-between align-items-center">
                <!--  -->
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bx bx-user"></i>&nbsp;35
                  &nbsp;&nbsp;
                  <i class="bx bx-heart"></i>&nbsp;42
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->
        <hr>
      </div>
      <div class="row" data-aos="zoom-in" data-aos-delay="100" >

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <div class="course-item">
            <img src="assets/img/course-1.jpg" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Master of Public Administration</h4>
                <p class="price">NGN600,000</p>
              </div>

              <h3><a href="master-of-public-administration(BYRESEARCH).html" >Duration: 1 year 6 Month</a></h3>
              <p>In this course you would be taught the practical, theoritical skills and best practices needed to succeed at technical recruiting, by avoiding mis-hires in the process of hiring talents</p>
              <div class="trainer d-flex justify-content-between align-items-center">
                
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bx bx-user"></i>&nbsp;50
                  &nbsp;&nbsp;
                  <i class="bx bx-heart"></i>&nbsp;65
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
          <div class="course-item">
            <img src="assets/img/environment.jpg" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Master of Business Administration (Global Business)
                </h4>
                <p class="price">NGN600,000</p>
              </div>

              <h3><a href="master-of-business-administration(global-business).html" >Duration: 1 year 6 Month</a></h3>
              <p>A HSE Management system is an integreted approach where all the 3 HSE factors are effectively managed to reduce risks in the workplace.
                 </p>
              <div class="trainer d-flex justify-content-between align-items-center">
                <!--  -->
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bx bx-user"></i>&nbsp;35
                  &nbsp;&nbsp;
                  <i class="bx bx-heart"></i>&nbsp;42
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0 ">
          <div class="course-item">
            <img src="assets/img/environment.jpg" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Master of Business Administration in Health Care Management
                </h4>
                <p class="price">NGN600,000</p>
              </div>

              <h3><a href="master-of-business-administration-in-health-care-management.html" >Duration: 1 year 6 Month</a></h3>
              <p>A HSE Management system is an integreted approach where all the 3 HSE factors are effectively managed to reduce risks in the workplace.
                 </p>
              <div class="trainer d-flex justify-content-between align-items-center">
                <!--  -->
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bx bx-user"></i>&nbsp;35
                  &nbsp;&nbsp;
                  <i class="bx bx-heart"></i>&nbsp;42
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->


      </div>
      <div class="row" data-aos="zoom-in" data-aos-delay="100" >

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <div class="course-item">
            <img src="assets/img/course-1.jpg" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Master of Management
                </h4>
                <p class="price">NGN600,000</p>
              </div>

              <h3><a href="master-of-management(BYRESEARCH).html" >Duration: 1 year 6 Month</a></h3>
              <p>In this course you would be taught the practical, theoritical skills and best practices needed to succeed at technical recruiting, by avoiding mis-hires in the process of hiring talents</p>
              <div class="trainer d-flex justify-content-between align-items-center">
                
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bx bx-user"></i>&nbsp;50
                  &nbsp;&nbsp;
                  <i class="bx bx-heart"></i>&nbsp;65
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
          <div class="course-item">
            <img src="assets/img/environment.jpg" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Master of Business Information Systems

                </h4>
                <p class="price">NGN600,000</p>
              </div>

              <h3><a href="master-of-business-information-systems.html" >Duration: 1 year 6 Month</a></h3>
              <p>A HSE Management system is an integreted approach where all the 3 HSE factors are effectively managed to reduce risks in the workplace.
                 </p>
              <div class="trainer d-flex justify-content-between align-items-center">
                <!--  -->
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bx bx-user"></i>&nbsp;35
                  &nbsp;&nbsp;
                  <i class="bx bx-heart"></i>&nbsp;42
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0 ">
          <div class="course-item">
            <img src="assets/img/environment.jpg" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Master in Railway Infrastructure Management
                </h4>
                <p class="price">NGN600,000</p>
              </div>

              <h3><a href="master-in-railway-infrastructure-management.html" >Duration: 1 year 6 Month</a></h3>
              <p>A HSE Management system is an integreted approach where all the 3 HSE factors are effectively managed to reduce risks in the workplace.
                 </p>
              <div class="trainer d-flex justify-content-between align-items-center">
                <!--  -->
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bx bx-user"></i>&nbsp;35
                  &nbsp;&nbsp;
                  <i class="bx bx-heart"></i>&nbsp;42
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->


      </div>
      <!-- Masters programs  -->
      <h3 class="mt-5 mb-0 text-danger text-center">Masters in Faculty of Computer Science and Multimedia
      </h3>
      <hr>
    </div>
    <div class="row" data-aos="zoom-in" data-aos-delay="100">

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
        <div class="course-item">
          <img src="assets/img/course-1.jpg" class="img-fluid" alt="...">
          <div class="course-content">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h4>Master of Computer Science
              </h4>
              <p class="price">NGN600,000</p>
            </div>

            <h3><a href="master-of-computer-science.html" >Duration: 1 year 6 Month</a></h3>
            <p>In this course you would be taught the practical, theoritical skills and best practices needed to succeed at technical recruiting, by avoiding mis-hires in the process of hiring talents</p>
            <div class="trainer d-flex justify-content-between align-items-center">
              
              <div class="trainer-rank d-flex align-items-center">
                <i class="bx bx-user"></i>&nbsp;50
                &nbsp;&nbsp;
                <i class="bx bx-heart"></i>&nbsp;65
              </div>
            </div>
          </div>
        </div>
      </div> <!-- End Course Item-->

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
        <div class="course-item">
          <img src="assets/img/environment.jpg" class="img-fluid" alt="...">
          <div class="course-content">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h4>Master of Science (Data Science and Analytics)

              </h4>
              <p class="price">NGN600,000</p>
            </div>

            <h3><a href="master-of-science(data-science-and-analytics).html" >Duration: 1 year 6 Month</a></h3>
            <p>A Master programme in Communication at LUC aims to imbue the ‘rich content’ to construct views, communicate ideas, bridge communication gaps in all spheres as in media, development sectors, organizations, public and advanced research set in local and international market.
               </p>
            <div class="trainer d-flex justify-content-between align-items-center">
              <!--  -->
              <div class="trainer-rank d-flex align-items-center">
                <i class="bx bx-user"></i>&nbsp;35
                &nbsp;&nbsp;
                <i class="bx bx-heart"></i>&nbsp;42
              </div>
            </div>
          </div>
        </div>
      </div> <!-- End Course Item-->
      <hr>
    </div>
    <div class="row" data-aos="zoom-in" data-aos-delay="100">

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
        <div class="course-item">
          <img src="assets/img/course-1.jpg" class="img-fluid" alt="...">
          <div class="course-content">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h4>Master of Science in Dentistry(By Research)
              </h4>
              <p class="price">NGN600,000</p>
            </div>

            <h3><a href="master-of-science-in-dentistry(BYRESEARCH).html" >Duration: 1 year 6 Month</a></h3>
            <p>In this course you would be taught the practical, theoritical skills and best practices needed to succeed at technical recruiting, by avoiding mis-hires in the process of hiring talents</p>
            <div class="trainer d-flex justify-content-between align-items-center">
              
              <div class="trainer-rank d-flex align-items-center">
                <i class="bx bx-user"></i>&nbsp;50
                &nbsp;&nbsp;
                <i class="bx bx-heart"></i>&nbsp;65
              </div>
            </div>
          </div>
        </div>
      </div> <!-- End Course Item-->

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
        <div class="course-item">
          <img src="assets/img/environment.jpg" class="img-fluid" alt="...">
          <div class="course-content">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h4>Master of Medical Sciences(By Research)

              </h4>
              <p class="price">NGN600,000</p>
            </div>

            <h3><a href="master-of-medical-sciences(BYRESEARCH).html" >Duration: 1 year 6 Month</a></h3>
            <p>A Master programme in Communication at LUC aims to imbue the ‘rich content’ to construct views, communicate ideas, bridge communication gaps in all spheres as in media, development sectors, organizations, public and advanced research set in local and international market.
               </p>
            <div class="trainer d-flex justify-content-between align-items-center">
              <!--  -->
              <div class="trainer-rank d-flex align-items-center">
                <i class="bx bx-user"></i>&nbsp;35
                &nbsp;&nbsp;
                <i class="bx bx-heart"></i>&nbsp;42
              </div>
            </div>
          </div>
        </div>
      </div> <!-- End Course Item-->

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
        <div class="course-item">
          <img src="assets/img/environment.jpg" class="img-fluid" alt="...">
          <div class="course-content">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h4>Master in Nursing(By Research)

              </h4>
              <p class="price">NGN600,000</p>
            </div>

            <h3><a href="master-in-nursing(BYRESEARCH).html" >Duration: 1 year 6 Month</a></h3>
            <p>A Master programme in Communication at LUC aims to imbue the ‘rich content’ to construct views, communicate ideas, bridge communication gaps in all spheres as in media, development sectors, organizations, public and advanced research set in local and international market.
               </p>
            <div class="trainer d-flex justify-content-between align-items-center">
              <!--  -->
              <div class="trainer-rank d-flex align-items-center">
                <i class="bx bx-user"></i>&nbsp;35
                &nbsp;&nbsp;
                <i class="bx bx-heart"></i>&nbsp;42
              </div>
            </div>
          </div>
        </div>
      </div> <!-- End Course Item-->
      <hr>
    </div>
  <div class="row" data-aos="zoom-in" data-aos-delay="100">

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
        <div class="course-item">
          <img src="assets/img/course-1.jpg" class="img-fluid" alt="...">
          <div class="course-content">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h4>Master of Pharmacy(By Research)
              </h4>
              <p class="price">NGN600,000</p>
            </div>

            <h3><a href="master-of-pharmacy(BYRESEARCH).html" >Duration: 1 year 6 Month</a></h3>
            <p>In this course you would be taught the practical, theoritical skills and best practices needed to succeed at technical recruiting, by avoiding mis-hires in the process of hiring talents</p>
            <div class="trainer d-flex justify-content-between align-items-center">
              
              <div class="trainer-rank d-flex align-items-center">
                <i class="bx bx-user"></i>&nbsp;50
                &nbsp;&nbsp;
                <i class="bx bx-heart"></i>&nbsp;65
              </div>
            </div>
          </div>
        </div>
      </div> <!-- End Course Item-->

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
        <div class="course-item">
          <img src="assets/img/environment.jpg" class="img-fluid" alt="...">
          <div class="course-content">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h4>Master of Science in Biotechnology(By Research)

              </h4>
              <p class="price">NGN600,000</p>
            </div>

            <h3><a href="master-of-science-in-biotechnology(BYRESEARCH).html" >Duration: 1 year 6 Month</a></h3>
            <p>A Master programme in Communication at LUC aims to imbue the ‘rich content’ to construct views, communicate ideas, bridge communication gaps in all spheres as in media, development sectors, organizations, public and advanced research set in local and international market.
               </p>
            <div class="trainer d-flex justify-content-between align-items-center">
              <!--  -->
              <div class="trainer-rank d-flex align-items-center">
                <i class="bx bx-user"></i>&nbsp;35
                &nbsp;&nbsp;
                <i class="bx bx-heart"></i>&nbsp;42
              </div>
            </div>
          </div>
        </div>
      </div> <!-- End Course Item-->

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
        <div class="course-item">
          <img src="assets/img/environment.jpg" class="img-fluid" alt="...">
          <div class="course-content">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h4>Master of Physiotherapy(By Research)

              </h4>
              <p class="price">NGN600,000</p>
            </div>

            <h3><a href="master-of-physiotherapy(BYRESEARCH).html" >Duration: 1 year 6 Month</a></h3>
            <p>A Master programme in Communication at LUC aims to imbue the ‘rich content’ to construct views, communicate ideas, bridge communication gaps in all spheres as in media, development sectors, organizations, public and advanced research set in local and international market.
               </p>
            <div class="trainer d-flex justify-content-between align-items-center">
              <!--  -->
              <div class="trainer-rank d-flex align-items-center">
                <i class="bx bx-user"></i>&nbsp;35
                &nbsp;&nbsp;
                <i class="bx bx-heart"></i>&nbsp;42
              </div>
            </div>
          </div>
        </div>
      </div> <!-- End Course Item-->
      <hr>
    </div>
  <div class="row" data-aos="zoom-in" data-aos-delay="100">

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
        <div class="course-item">
          <img src="assets/img/course-1.jpg" class="img-fluid" alt="...">
          <div class="course-content">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h4>Master of Traditional Chinese Medicine(By Research)
              </h4>
              <p class="price">NGN600,000</p>
            </div>

            <h3><a href="master-of-traditional-chinese-medicine(BYRESEARCH).html" >Duration: 1 year 6 Month</a></h3>
            <p>In this course you would be taught the practical, theoritical skills and best practices needed to succeed at technical recruiting, by avoiding mis-hires in the process of hiring talents</p>
            <div class="trainer d-flex justify-content-between align-items-center">
              
              <div class="trainer-rank d-flex align-items-center">
                <i class="bx bx-user"></i>&nbsp;50
                &nbsp;&nbsp;
                <i class="bx bx-heart"></i>&nbsp;65
              </div>
            </div>
          </div>
        </div>
      </div> <!-- End Course Item-->

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
        <div class="course-item">
          <img src="assets/img/environment.jpg" class="img-fluid" alt="...">
          <div class="course-content">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h4>Master of Agriculture(By Research)

              </h4>
              <p class="price">NGN600,000</p>
            </div>

            <h3><a href="master-of-agriculture(BYRESEARCH).html" >Duration: 1 year 6 Month</a></h3>
            <p>A Master programme in Communication at LUC aims to imbue the ‘rich content’ to construct views, communicate ideas, bridge communication gaps in all spheres as in media, development sectors, organizations, public and advanced research set in local and international market.
               </p>
            <div class="trainer d-flex justify-content-between align-items-center">
              <!--  -->
              <div class="trainer-rank d-flex align-items-center">
                <i class="bx bx-user"></i>&nbsp;35
                &nbsp;&nbsp;
                <i class="bx bx-heart"></i>&nbsp;42
              </div>
            </div>
          </div>
        </div>
      </div> <!-- End Course Item-->

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
        <div class="course-item">
          <img src="assets/img/environment.jpg" class="img-fluid" alt="...">
          <div class="course-content">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h4>Master of Science in Nutrition(By Research)

              </h4>
              <p class="price">NGN600,000</p>
            </div>

            <h3><a href="master-of-science-in-nutrition(BYRESEARCH).html" >Duration: 1 year 6 Month</a></h3>
            <p>A Master programme in Communication at LUC aims to imbue the ‘rich content’ to construct views, communicate ideas, bridge communication gaps in all spheres as in media, development sectors, organizations, public and advanced research set in local and international market.
               </p>
            <div class="trainer d-flex justify-content-between align-items-center">
              <!--  -->
              <div class="trainer-rank d-flex align-items-center">
                <i class="bx bx-user"></i>&nbsp;35
                &nbsp;&nbsp;
                <i class="bx bx-heart"></i>&nbsp;42
              </div>
            </div>
          </div>
        </div>
      </div> <!-- End Course Item-->
      <hr>
    </div>
  <div class="row" data-aos="zoom-in" data-aos-delay="100">

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
        <div class="course-item">
          <img src="assets/img/course-1.jpg" class="img-fluid" alt="...">
          <div class="course-content">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h4>Master of Water Resource Management(By Research)

              </h4>
              <p class="price">NGN600,000</p>
            </div>

            <h3><a href="master-of-water-resource-management(BYRESEARCH).html" >Duration: 1 year 6 Month</a></h3>
            <p>In this course you would be taught the practical, theoritical skills and best practices needed to succeed at technical recruiting, by avoiding mis-hires in the process of hiring talents</p>
            <div class="trainer d-flex justify-content-between align-items-center">
              
              <div class="trainer-rank d-flex align-items-center">
                <i class="bx bx-user"></i>&nbsp;50
                &nbsp;&nbsp;
                <i class="bx bx-heart"></i>&nbsp;65
              </div>
            </div>
          </div>
        </div>
      </div> <!-- End Course Item-->

      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
        <div class="course-item">
          <img src="assets/img/environment.jpg" class="img-fluid" alt="...">
          <div class="course-content">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h4>Master of Engineering(By Research)

              </h4>
              <p class="price">NGN600,000</p>
            </div>

            <h3><a href="master-of-science(data-science-and-analytics).html" >Duration: 1 year 6 Month</a></h3>
            <p>A Master programme in Communication at LUC aims to imbue the ‘rich content’ to construct views, communicate ideas, bridge communication gaps in all spheres as in media, development sectors, organizations, public and advanced research set in local and international market.
               </p>
            <div class="trainer d-flex justify-content-between align-items-center">
              <!--  -->
              <div class="trainer-rank d-flex align-items-center">
                <i class="bx bx-user"></i>&nbsp;35
                &nbsp;&nbsp;
                <i class="bx bx-heart"></i>&nbsp;42
              </div>
            </div>
          </div>
        </div>
      </div> <!-- End Course Item-->
      <hr>
    </div>
    
    </div>
  </section><!-- End Courses Section -->


@endsection