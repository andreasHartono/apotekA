<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kementrian Kesehatan Republik Indonesia</title>
    <link rel="icon" href="https://isoman.kemkes.go.id/images/kemkes.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato" />
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3G84467XDE"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-3G84467XDE');
    </script>
    <style type="text/css">
        body {
            font-family: "Lato";
        }

        .navbar {
            margin-top: 1rem;
            margin-bottom: 2rem;
        }

        .navbar-nav .nav-link {
            color: #00897b !important;
            padding-left: 1rem !important;
            padding-right: 1rem !important;
            font-size: 1.2rem;
        }

        .card {
            border: 0;
            padding: 1rem 0;
        }

        .btn-nik {
            color: #fff;
            background: #00897b;
            border: 1px solid #dddddd;
            width: 120px;
        }

        .btn-nik:hover {
            color: #00897b;
            border: 1px solid #00897b;
            background: #fff;
        }

        .footer {
            padding-top: 4rem;
        }

        .footer .copyright {
            padding: 0.5rem 1rem;
            margin-bottom: 0;
        }

        .footer .nav-link {
            color: #6c757d !important;
            text-align: left;
        }

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="https://isoman.kemkes.go.id/images/kemkes.png" alt="" height="50" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav d-inline-flex ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">BERANDA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/catalog">CATALOG</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-6 col-xl-6 order-lg-2 order-xl-2">
                <img class="img-fluid" src="https://isoman.kemkes.go.id/images/home-banner.png" alt="" />
            </div>
            <div class="col-sm-12 col-lg-6 col-xl-6 order-lg-1 order-xl-1">
                <div class="card">
                    <div class="card-body"></div>
                    <div class="card-title">
                        <h1 class="fs-2 fw-bold">
                            Selamat datang di Layanan Medicines kementrian Kesehatan Republik Indonesia
                        </h1>
                    </div>
                    <p class="card-text">
                        Pemerintah memperkirakan puncak gelombang kenaikan kasus Omicron
                        di Indonesia terjadi pada pertengahan Februari hingga awal Maret.
                        Hal ini merupakan dampak dari kenaikan kasus Omicron yang terjadi
                        di seluruh dunia.
                    </p>
                    <p class="card-text">
                        "Di Indonesia kita mengidentifikasi kasus pertama pada pertengahan
                        Desember, tapi kasus mulai naiknya di awal Januari. Kita hitung
                        antara 35-65 hari akan terjadi kenaikan yang cukup cepat dan tinggi.
                        Itu yang memang harus dipersiapkan oleh masyarakat."
                    </p>
                    <p class="card-text">
                        "Dengan layanan telemedisin ini semua pasien COVID-19 konfirmasi
                        positif mendapatkan layanan medis tepat waktu, tanpa perlu antri
                        di RS. Dengan demikian layanan rumah sakit dapat diprioritaskan
                        untuk pasien dengan gejala sedang dan berat"
                    </p>
                    <a class="btn btn-light btn-nik" href="/panduan">CATALOG</a>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="copyright text-muted small">
                        Copyright © 2021 Kementerian Kesehatan Republik Indonesia. All
                        rights reserved.
                    </p>
                </div>
                <div class="col">
                    <nav class="nav small justify-content-start">
                        <a class="nav-link" href="/privacy">Kebijakan Privasi</a>
                        <a class="nav-link" href="/tos">Ketentuan Layanan</a>
                        <a class="nav-link" href="/about">Tentang</a>
                        <a class="nav-link" href="/contactus">Hubungi Kami</a>
                    </nav>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
