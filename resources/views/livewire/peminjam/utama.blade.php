
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/homelte/css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Mashead header-->
        <header class="masthead">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        <!-- Mashead text and app badges-->
                        <div class="mb-5 mb-lg-0 text-center text-lg-start">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Perpustakaan Politeknik Negeri Lhokseumawe</h3>
                                    <h5 class="text-muted">“Library is the gate to knowledge”</h5>
                                </div>
                            </div>
                            <br>
                            <h1 class="display-4 lh-1 mb-3 text-warning">Ayo daftar sekarang !</h1>
                            <p class="lead fw-normal text-muted mb-5">Daftar sebagai anggota dan order buku secara online !</p>
                            <a class="btn btn-success btn-lg" href="{{ route('login') }}">Login</a>
                            -Or-
                            <a class="btn btn-warning btn-lg" href="{{ route('register') }}">Register</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!-- Masthead device mockup feature-->
                        <div class="masthead-device-mockup">
                            <svg class="circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <linearGradient id="circleGradient" gradientTransform="rotate(45)">
                                        <stop class="gradient-start-color" offset="0%"></stop>
                                        <stop class="gradient-end-color" offset="100%"></stop>
                                    </linearGradient>
                                </defs>
                                <circle cx="50" cy="50" r="50"></circle></svg
                            ><svg class="shape-1 d-none d-sm-block" viewBox="0 0 240.83 240.83" xmlns="http://www.w3.org/2000/svg">
                                <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03" transform="translate(120.42 -49.88) rotate(45)"></rect>
                                <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03" transform="translate(-49.88 120.42) rotate(-45)"></rect></svg
                            ><svg class="shape-2 d-none d-sm-block" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="50"></circle></svg>
                            <div class="device-wrapper">
                                <div class="device" data-device="iPhoneX" data-orientation="portrait" data-color="black">
                                    <div class="screen bg-black">
                                        <!-- PUT CONTENTS HERE:-->
                                        <!-- * * This can be a video, image, or just about anything else.-->
                                        <!-- * * Set the max width of your media to 100% and the height to-->
                                        <!-- * * 100% like the demo example below.-->
                                        <video muted="muted" autoplay="" loop="" style="max-width: 100%; height: 100%"><source src="homelte/assets/img/demo-screen.mp4" type="video/mp4" /></video>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Quote/testimonial aside-->
        <aside class="text-center bg-gradient-primary-to-secondary">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-xl-8">
                        <img src="/homelte/assets/img/poltek.png" style="height: 7rem" />
                        <br>
                        <br>
                        <div class="h2 fs-4 text-white mb-4">
                            Kami memiliki banyak jenis koleksi di perpustakaan kami, mulai dari Fiksi hingga Materi Ilmiah, dari bahan cetak hingga koleksi digital seperti CD-ROM, CD, VCD dan DVD.
                            <br>
                            <br>
                            Kami juga mengumpulkan serial terbitan harian seperti surat kabar dan juga serial bulanan seperti majalah.
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <!-- App features section-->
        <section id="features">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-8 order-lg-1 mb-5 mb-lg-0">
                        <div class="container-fluid px-5">
                            <div class="row gx-5">
                                <div class="col-md-6 mb-5">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <i class="bi-clock icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt">Opening Hours</h3>
                                        <p class="text-muted mb-0">Monday - Friday</p>
                                        <p class="text-muted mb-0">08.00 AM - 17.30 PM</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <i class="bi-envelope icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt">Email</h3>
                                        <p class="text-muted mb-0">librarypnl@yahoo.co.id</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-5 mb-md-0">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <i class="bi-phone icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt">Number</h3>
                                        <p class="text-muted mb-0">Phone Number : (0645) 42670</p>
                                        <p class="text-muted mb-0">Fax Number : (0645) 426--</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <i class="bi-pin icon-feature text-gradient d-block mb-3"></i>
                                        <h3 class="font-alt">Address</h3>
                                        <p class="text-muted mb-0">Banda Aceh - Medan Road, Buketrata, Indonesia - Postal Code : 24301</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 order-lg-0">
                        <img src="/homelte/assets/img/pp.png" style="height: 23rem" />
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic features section-->
        <section class="bg-light">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">
                    <div class="col-12 col-lg-5">
                        <center><h2 class="display-3 lh-1 mb-4">Visi & Misi</h2></center>
                        <p class="display-6 lh-1 mb-3">Visi</p>
                        <p class="lead fw-normal text-muted mb-5 mb-lg-5">Menjadi Unit Layanan Pustaka yang Berbasis Teknologi Informasi</p>
                        <p class="display-6 lh-1 mb-3">Misi</p>
                        <p class="lead fw-normal text-muted mb-5 mb-lg-3">1. Memberi pelayanan sesuai dengan kebutuhan pemustaka yang berbasis teknologi informasi</p>
                        <p class="lead fw-normal text-muted mb-5 mb-lg-3">2. Mengembangkan data repository yang open access</p>
                        <p class="lead fw-normal text-muted mb-5 mb-lg-3">3. Mengembangkan total quality manajemen dalam pengelolaan perpustakaan yang terakreditasi</p>     
                    </div>
                    <div class="col-sm-8 col-md-6">
                        <div class="px-5 px-sm-0"><img src="/homelte/assets/img/visi.png" style="height: 27rem" /></div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../../../../public/homelte/js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
