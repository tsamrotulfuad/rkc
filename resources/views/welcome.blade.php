<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reka Karsa Cipta 2024</title>
    <link rel="shortcut icon" href="{{ asset('img/rkc-logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('/img/background.png'); /* Change to your desired image URL */
            background-size: cover; /* Cover the entire viewport */
            background-position: center; /* Center the image */
            height: 100vh; /* Full viewport height */
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column; /* Stack items vertically */
        }
        .card-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 75px; /* Space between cards */
        }
        .logo {
            width: 450px; /* Adjust logo width */
            height: auto; /* Maintain aspect ratio */
            margin-bottom: 75px; /* Space below logo */
        }
        .card {
            width: 18rem;
            text-align: center; /* Center text in card */
        }
        .icon {
            font-size: 2rem; /* Size of the icon */
            margin-bottom: 15px; /* Space below the icon */
        }

    </style>
</head>
<body>
    <img src="{{ asset('img/rkc-logo.png')}}" alt="Logo" class="logo"> <!-- Replace with your logo URL -->
    <div class="card-container">
        <div class="card">
            <div class="card-header">
                Kategori
            </div>
            <div class="card-body">
                <i class="bi bi-heart-fill icon text-danger"></i> <!-- Heart icon -->
                <h5 class="card-title fw-bold">Instansi Perangkat Daerah</h5>
            </div>
            <div class="card-footer">
                <a href="http://103.165.154.47:8000/instansiperangkatdaerah" type="button" class="btn btn-outline-primary">Daftar</a>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                Kategori
            </div>
            <div class="card-body">
                <i class="bi bi-heart-fill icon text-danger"></i> <!-- Heart icon -->
                <h5 class="card-title fw-bold">Masyarakat</h5>
            </div>
            <div class="card-footer">
                <a href="http://103.165.154.47:8000/masyarakat" type="button" class="btn btn-outline-primary">Daftar</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
