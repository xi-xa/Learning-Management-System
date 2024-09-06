<?php include('header.php') ?>
<link rel="stylesheet" type="text/css" href="/css/home_logins.css">


  <!--Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom-color">
    <a class="navbar-brand" href="#"><b>ASAC Elms</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
      aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Courses</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto nav-flex-icons">
        <li class="nav-item">
          <?php if(isset($_SESSION['login'])) { ?>
            <a class="nav-link" href="#"><i class="fas fa-user"></i> Account</a>
            <a class="nav-link" href="#">Log out</a>
          <?php } else { ?>
            <a href="../admin/userlogin.php" class="nav-link"><i class="fa fa-user mr-2"></i> UserLogin</a>
          <?php } ?>
        </li>

        <li class="nav-item">
        </li>
      </ul>
    </div>
  </nav>
  <!--/.Navbar-->

  
  <div class="d-flex shadow interactive-background">
  <div class="container-fluid my-auto">
    <div class="row">
      <div class="col-lg-7 my-auto">
        <h1 class="display-2 font-weight-bold">Academy of St.Andrew - Caloocan (ASAC)</h1>
        <p>We continue to make a difference by Teaching Minds, Touching Hearts, and Transforming Lives.</p>
      </div>
      <div class="col-lg-3 my-auto text-right logo-container">
        <img src="/photos/acac_logo.png" alt="Logo" class="img-fluid logo">
      </div>
    </div>
  </div>
</div>


  <!-- About Us -->
  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 py-5">
          <h2 class="font-weight-bold">About Us<br> Academy of St. Andrew - Caloocan (ASAC), Inc.</h2>
          <div class="pr-5">
            <p>The school was founded as Saint Andrew School, Merles Inc. in 1973 by Mr. and Mrs. Romeo Sales.</p>
            <p>In 2008, the management was transferred to Mrs. Floramae B. Nater. It was renamed Academy of Saint Andrew – Caloocan (ASAC), Inc.</p>
          </div>
          <a href="https://www.facebook.com/ASAC1973" class="btn btn-secondary">Click here to know more</a>
        </div>
        <div class="col-lg-6" style="background:url(/photos/asac_building.jpg) no-repeat center center; background-size: cover;">
        </div>
      </div>
    </div>
  </section>

  <!-- Our Courses -->
  <section class="py-5 bg-light">
    <div class="text-center mb-10">
      <h2 class="font-weight-bold">Our Courses</h2>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="card">
            <div>
              <img src="/photos/abm.jpg" alt="" class="img-fluid rounded-top">
            </div>
            <div class="card-body">
              <center>
              <h3>ABM</h3>
              <p class="card-text">Accountancy, Business and Management</p>
              </center>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card">
            <div>
              <img src="/photos/HUMSS.jpg" alt="" class="img-fluid rounded-top">
            </div>
            <div class="card-body">
              <center>
              <h3>HUMSS</h3>
              <p class="card-text">Humanities and Social Sciences</p>
              </center>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card">
            <div>
              <img src="/photos/TECHVOC.jpg" alt="" class="img-fluid rounded-top">
            </div>
            <div class="card-body">
              <center>
              <h3>TECHVOC</h3>
              <p class="card-text">Technical-Vocational-Livelihood Strand</p>
              </center>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card">
            <div>
              <img src="/photos/GAS.jpg" alt="" class="img-fluid rounded-top">
            </div>
            <div class="card-body">
              <center>
              <h3>GAS</h3>
              <p class="card-text">General Academic Strand</p>
              </center>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-5 bg-dark text-white">
  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-4 mb-md-0">
        <h5 class="mb-3">Connect with us:</h5>
        <div class="social-icons">
          <a href="#" class="text-white mr-3" onclick="location.href='https://www.facebook.com/ASAC1973';" title="Facebook"><i class="fab fa-facebook fa-lg"></i></a>
          <a href="#" class="text-white" onclick="location.href='https://www.instagram.com/';" title="Instagram"><i class="fab fa-instagram fa-lg"></i></a>
        </div>
      </div>
      <div class="col-md-4 mb-4 mb-md-0">
        <h5 class="mb-3">Contact us:</h5>
        <p class="mb-1"><i class="fas fa-envelope"></i> asac_inc@yahoo.com</p>
        <p class="mb-0"><i class="fas fa-phone"></i> 0999 877 3187</p>
      </div>
      <div class="col-md-4">
        <h5 class="mb-3">Visit us:</h5>
        <p class="mb-0"><i class="fas fa-map-marker-alt"></i> 79 Ninong Leoncio, Novaliches, Caloocan, 1400 Metro Manila</p>
      </div>
    </div>
  </div>
</footer>

<?php include('footer.php') ?>
