
@extends('layouts.app')

@section('content')



<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="color: red">Student Course Materials and Handout</h1>
        </div>

        <div class="col-sm-6" style="text-align: right;">
            <!-- Hidden file input -->
            <input type="file" id="courseMaterialUpload" style="display: none;">

            <!-- Button that triggers the file input -->
            <button class="btn btn-primary" onclick="document.getElementById('courseMaterialUpload').click();">
                Upload Course Material
            </button>
        </div>

        {{-- <div class="col-sm-6" style="text-align: right;">
            <button class="btn btn-primary">Upload Course Material</button>
          </div> --}}
      </div>
    </div><!-- /.container-fluid -->
  </section>



  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <div class="col-md-12">



          @include('_message')
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Course Materials </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Code</th>
                    <th>units</th>
                    <th>handout</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Data Structure and Algorithm</td>
                        <td>Theory</td>
                        <td>DSA6081</td>
                        <td>6</td>
                        <td style="width: 300px; padding: 10px;">
                            <div style="display: flex; flex-direction: column; align-items: center;">
                                <h4 style="margin: 5px 0;">Handout Overview</h4>
                                <img src="https://i.imgur.com/VYZ9MTW.png" alt="Data Structures Handout" style="width: 100%; height: auto; margin-bottom: 10px;">
                                <a href="https://www.cs.bham.ac.uk/~jxb/DSA/dsa.pdf" target="_blank" style="text-decoration: none; color: blue; font-weight: bold;">Open Handout</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Database Management Systems</td>
                        <td>Theory</td>
                        <td>DBMS5012</td>
                        <td>4</td>
                        <td style="width: 300px; padding: 10px;">
                            <div style="display: flex; flex-direction: column; align-items: center;">
                                <h4 style="margin: 5px 0;">Handout Overview</h4>
                                <img src="https://i.imgur.com/UqP9L8L.png" alt="DBMS Handout" style="width: 100%; height: auto; margin-bottom: 10px;">
                                <a href="https://mrcet.com/downloads/digital_notes/ECE/III%20Year/DATABASE%20MANAGEMENT%20SYSTEMS.pdf" target="_blank" style="text-decoration: none; color: blue; font-weight: bold;">Open Handout</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Operating Systems</td>
                        <td>Theory</td>
                        <td>OS3091</td>
                        <td>5</td>
                        <td style="width: 300px; padding: 10px;">
                            <div style="display: flex; flex-direction: column; align-items: center;">
                                <h4 style="margin: 5px 0;">Handout Overview</h4>
                                <img src="https://i.imgur.com/LVBqVZA.png" alt="Operating Systems Handout" style="width: 100%; height: auto; margin-bottom: 10px;">
                                <a href="https://www.cl.cam.ac.uk/teaching/1011/OpSystems/os1a-slides.pdf" target="_blank" style="text-decoration: none; color: blue; font-weight: bold;">Open Handout</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Software Engineering</td>
                        <td>Theory</td>
                        <td>SE4043</td>
                        <td>4</td>
                        <td style="width: 300px; padding: 10px;">
                            <div style="display: flex; flex-direction: column; align-items: center;">
                                <h4 style="margin: 5px 0;">Handout Overview</h4>
                                <img src="https://i.imgur.com/EXVWGGJ.png" alt="Software Engineering Handout" style="width: 100%; height: auto; margin-bottom: 10px;">
                                <a href="https://vssut.ac.in/lecture_notes/lecture1428551142.pdf" target="_blank" style="text-decoration: none; color: blue; font-weight: bold;">Open Handout</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Web Development</td>
                        <td>Practical</td>
                        <td>WEB3054</td>
                        <td>5</td>
                        <td style="width: 300px; padding: 10px;">
                            <div style="display: flex; flex-direction: column; align-items: center;">
                                <h4 style="margin: 5px 0;">Handout Overview</h4>
                                <img src="https://i.imgur.com/4WX4Azt.png" alt="Web Development Handout" style="width: 100%; height: auto; margin-bottom: 10px;">
                                <a href="https://nou.edu.ng/coursewarecontent/CIT484.pdf" target="_blank" style="text-decoration: none; color: blue; font-weight: bold;">Open Handout</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Computer Networks</td>
                        <td>Theory</td>
                        <td>CN3026</td>
                        <td>5</td>
                        <td style="width: 300px; padding: 10px;">
                            <div style="display: flex; flex-direction: column; align-items: center;">
                                <h4 style="margin: 5px 0;">Handout Overview</h4>
                                <img src="https://i.imgur.com/vq5hwVx.png" alt="Computer Networks Handout" style="width: 100%; height: auto; margin-bottom: 10px;">
                                <a href="https://ncert.nic.in/textbook/pdf/lecs110.pdf" target="_blank" style="text-decoration: none; color: blue; font-weight: bold;">Open Handout</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
              </table>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

@endsection
