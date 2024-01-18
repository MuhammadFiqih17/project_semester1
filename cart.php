<?php
session_start();
 include "oke.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FQ|Mechanic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CarServ - Car Repair HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@600;700&family=Ubuntu:wght@400;500&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.min.css" rel="stylesheet">
    <link href="css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    
    <!-- Topbar Start -->
    <div class="container-fluid bg-light p-0">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small>Jakarta, INDONESIA</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-3">
                    <small class="far fa-clock text-primary me-2"></small>
                    <small>Mon - Fri : 08.00 AM - 09.00 PM</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small>+6287729344111</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-0" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="indek.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-car me-3"></i>FQ|Mechanic</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="indek.php" class="nav-item nav-link active">Home</a>
                <a href="about.php" class="nav-item nav-link">About</a>
                <a href="cart.php" class="nav-item nav-link">Cart</a>
                <a href="service.php" class="nav-item nav-link">Services</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-up m-0">
                        <a href="booking.php" class="dropdown-item">Booking</a>
                        <a href="team.php" class="dropdown-item">Technicians</a>
                        <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                        <a href="404.php" class="dropdown-item">404 Page</a>
                    </div>
                </div>
                <a href="contact.php" class="nav-item nav-link">Contact</a>
            </div>
            <?php if(!isset($_SESSION['username']) AND !isset($_SESSION['usern'])){?>
                    <a href="login.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Login / SignUp<i class="fa fa-arrow-right ms-3"></i></a>
                <?php }else{?>
                    <a href="logout.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Logout<i class="fa fa-arrow-right ms-3"></i></a>
                <?php }?>
        </div>
    </nav>
    <!-- Navbar End -->
<div class="content-wrapper">
<form action="" method="POST" enctype="multipart/form-data">
    <!-- main content -->
    <div class="content mt-4">
        <div class="container-fluid">
            <div class="row">
             <div class="col-lg-12">
                <div class="col-md-12">
                    <div class="card">
                        <div class="class-body">
                           <?php
                           if(empty($_SESSION['keranjang']) | !isset($_SESSION['keranjang'])){
                           ?>
                           <center>
                            <img src="img/cart_empty.png" width="200px" alt="">
                            <h2>anda belum menambah apapun kedalam keranjang :)</h2>
                           </center>
                           <?php }else{ ?>
                            <div class="row">
                                <div class="col-md-9">
                                    <?php foreach ($_SESSION['keranjang'] as $prod => $jumlah): ?>
                                    <?php
                                    $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang = '$prod' ");
                                    $sql = mysqli_fetch_assoc($query);
                                    $sub = $sql['harga_barang']*$jumlah;    
                                    ?>
                                    <center>
                                     <div class="row">
                                        <div class="col-md-3">
                                        <img src="img/<?php echo $sql['foto'];?>" class="img-fluid rounded-start" alt="" width="400px">
                                        </div>
                                        <div class="col-md-7">
                                        <div class="card-body border-2">
                                         <h5 class="card-title"><?php echo $sql['nama_barang']; ?></h5>
                                         <p class="card-text text-left">Qty:</p>

                                         <div class="row">
                                            <div class="col-md-3">
                                                <input type="hidden" name="update" value="1">
                                                <input type="number" min="1" name="updatee" value="<?php echo $jumlah; ?>" style="width: 8rem;">
                                            </div>
                                            <div class="col-md-2 offset-2">
                                                <a type="submit" href="cart.php?ubah=1" class="btn btn-success"><i class="fa fa-arrow-up" aria-hidden="true"></i></i></a>
                                            </div>
                                            <div class="col-md-2">
                                                <a type="submit" id="del" href="hapus.php?hapus=<?php echo $sql['id_barang']; ?>" class="btn btn-danger" onclick="return confirm('Remove product from the cart')"><i class="fas fa-trash"></i></a>
                                            </div>
                                         </div>
                                        </div>
                                        </div>
                                     </div>
                                     <?php endforeach; ?>   
                                    </center><a href="produk.php" class="btn btn secondary d-block btn-sm">Continue shopping</a>
                                    <?php }?>
                                </div>
                                <?php
                                if(empty($_SESSION['keranjang']) | !isset($_SESSION['keranjang'])){
                                ?>
                            <?php }else{ ?>
                              <div class="col-md-3">
                              <div class="card shadow">
                              <?php $grand=0; ?>
                              <?php foreach ($_SESSION['keranjang'] as $prod => $jumlah):
                              $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang = $prod");
                              $sql = mysqli_fetch_assoc($query);
                              $sub = $sql['harga_barang']*$jumlah;  
                              ?>
                              <li class="list-group-item d-flex justify-content-between lh-sm border-1">
                                <div>
                                <h6><strong><?php echo $sql['nama_barang']; ?></strong></h6>
                                <small class="text-body-secondary">Quantity: <?php echo $jumlah; ?>x</small>
                                </div>
                                <span class="text-body-secondary">Rp.<?php echo number_format($sub); ?>,-</span>
                              </li>
                              <?php $grand=$grand+$sub; endforeach ?>

                              <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div class="col-md-12">
                                    <div class="row">
                                    <div class="col-md-6"><h6><strong>Grand total: </strong></h6></div>
                                    <div class="col-md-6">
                                        <span class="text-body-secondary">Rp.<?php echo number_format($grand); ?>,-</span>
                                        </div>
                                    </div>
                                    <a href="check.php" class="btn btn-primary d-blok btn-sm">Checkout</a>
                                </div>
                              </li>
                              <?php } ?>
                              </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
            </div>
        </div>
    </div>
</form>
</div>


<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Opening Hours</h4>
                    <h6 class="text-light">Monday - Friday:</h6>
                    <p class="mb-4">09.00 AM - 09.00 PM</p>
                    <h6 class="text-light">Saturday - Sunday:</h6>
                    <p class="mb-0">09.00 AM - 12.00 PM</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Services</h4>
                    <a class="btn btn-link" href="">Diagnostic Test</a>
                    <a class="btn btn-link" href="">Engine Servicing</a>
                    <a class="btn btn-link" href="">Tires Replacement</a>
                    <a class="btn btn-link" href="">Oil Changing</a>
                    <a class="btn btn-link" href="">Vacuam Cleaning</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="wow.min.js"></script>
    <script src="easing.min.js"></script>
    <script src="waypoints.min.js"></script>
    <script src="counterup.min.js"></script>
    <script src="owl.carousel.min.js"></script>
    <script src="moment.min.js"></script>
    <script src="moment-timezone.min.js"></script>
    <script src="tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="main.js"></script>
</body>

</html>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>