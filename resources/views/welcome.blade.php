<!doctype html>
<html lang="en" data-bs-theme="light">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Reka Karsa Cipta 2024</title>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/bootstrap/rkc.css') }}" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-md fixed-top border-bottom">
        <div class="container">
            <img src="{{ asset('img/kotapasuruan-logo.png')}}" width="45px">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link px-4" aria-current="page" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-4" aria-current="page" href="#">Panduan Pengisian</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="content">
        <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="{{ asset('img/rkc-logo.png')}}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-3">Lomba Inovasi Daerah</h1>
                    <h1 class="display-6 fw-medium text-body-emphasis lh-1 mb-3">Kota Pasuruan</h1>
                </div>
            </div>
        </div>
        <div class="container text-center text-countdown mt-5">
            Hitung Mundur Pengisian REKA KARSA CIPTA 2024
        </div>
        <div class="container text-center mt-3 timer">
            <div id="countdown">
            </div>
        </div>
        <div class="kategori">
            <div class="container text-center my-5 text-kategori">
                Kategori Inovasi
            </div>
            <div class="container mt-5 mb-5">
                <div class="row">
                    <div class="col-md-6 py-2">
                        <a href="http://103.165.154.47:8000/instansiperangkatdaerah/login" class="text-decoration-none">
                            <div class="card">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                    <img src="{{ asset('img/office.png')}}" class="img-fluid my-2 center" width="45px">
                                    </div>
                                    <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold">Instansi Perangkat Daerah</h5>
                                        <p class="card-text">Perangkat Daerah (PD), Unit Pelaksana Teknis (UPT)</p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 py-2">
                        <a href="http://103.165.154.47:8000/masyarakat/login" class="text-decoration-none">
                            <div class="card">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                    <img src="{{ asset('img/partners.png')}}" class="img-fluid my-2 center" width="45px">
                                    </div>
                                    <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold">Masyarakat</h5>
                                        <p class="card-text">Individu, Kelompok/Komunitas, Lembaga/Organisasi</p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="container text-center my-5 dokumentasi border-top">
            <div class="py-3">
                Dokumentasi IGA 2023
            </div> 
            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <img src="{{ asset('img/rkc2023/rkc2023-1.jpeg')}}" class="img-fluid" alt="Image 1">
                    </div>
                    <div class="col-md-4 mb-4">
                        <img src="{{ asset('img/rkc2023/rkc2023-2.jpeg')}}" class="img-fluid" alt="Image 1">
                    </div>
                    <div class="col-md-4 mb-4">
                        <img src="{{ asset('img/rkc2023/rkc2023-3.jpeg')}}" class="img-fluid" alt="Image 1">
                    </div>
                    <div class="col-md-4 mb-4">
                        <img src="{{ asset('img/rkc2023/rkc2023-4.jpeg')}}" class="img-fluid" alt="Image 1">
                    </div>
                    <div class="col-md-4 mb-4">
                        <img src="{{ asset('img/rkc2023/rkc2023-5.jpeg')}}" class="img-fluid" alt="Image 1">
                    </div>
                    <div class="col-md-4 mb-4">
                        <img src="{{ asset('img/rkc2023/rkc2023-6.jpeg')}}" class="img-fluid" alt="Image 1">
                    </div>
                    <div class="col-md-4 mb-4">
                        <img src="{{ asset('img/rkc2023/rkc2023-7.jpeg')}}" class="img-fluid" alt="Image 1">
                    </div>
                    <div class="col-md-4 mb-4">
                        <img src="{{ asset('img/rkc2023/rkc2023-8.jpeg')}}" class="img-fluid" alt="Image 1">
                    </div>
                </div>
                
            </div>
        </div>
    </main>
    <footer class="text-center">
        <div class="container">
            <p class="mb-0">&copy; 2024 Bappelitbangda. Pemerintah Kota Pasuruan.</p>
        </div>
    </footer>
    <script src="{{ asset('js/bootstrap/counter.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    </body>
</html>