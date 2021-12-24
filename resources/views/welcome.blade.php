<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    @yield('css')
    <style>
        * {
            font-family: 'Open Sans', sans-serif;
        }

        .container {
            padding-top: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

    </style>
    <title>Dashboard</title>
</head>

<body>
    <div class="container my-4">
        <span class="display-3" style="text-center">Locatopia</span>
        <span class="text-muted mt-2" style="text-center">Website Originally Build by Daffa Yagrariksa</span>
        <hr>
        <div class="card-pack">
            <a href="{{ route('umkm.index') }}" class="btn btn-outline-dark">List UMKM</a>
            @auth
                <a href="{{ route('produk.index') }}" class="btn btn-outline-info">List Produk</a>
                <a href="{{ route('logout') }}" class="btn btn-outline-danger">Log Out</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-primary">Log In</a>
                <a href="{{ route('register') }}" class="btn btn-outline-info">Register</a>
            @endauth
        </div>
        <hr>
        <div class="row">
            <span class="h3 col-12 text-center">Route Documentation</span>
            <div class="col-md-6">
                <div class="row justify-content-md-center">
                    <span class="h3 col-12 text-center">Website</span>
                </div>
                <div class="card bg-light mb-3">
                    <div class="card-header">General</div>
                    <div class="card-body">
                        <h5 class="card-title">Dashboard
                            <span class="badge badge-success">GET</span>
                            <span class="badge badge-secondary text-monospace">/</span>
                        </h5>
                        <p class="card-text">Halaman ini menampilkan daftar dari seluruh routing yang ada</p>
                    </div>
                </div>
                <div class="card bg-light mb-3">
                    <div class="card-header">Authenticating</div>
                    <div class="card-body">
                        <h5 class="card-title">Login
                            <span class="badge badge-success">GET</span>
                            <span class="badge badge-secondary text-monospace">/login</span>
                        </h5>
                        <p class="card-text">Halaman untuk memasukkan kredensial untuk mengaksis routing khusus.</p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Login
                            <span class="badge badge-warning">POST</span>
                            <span class="badge badge-secondary text-monospace">/login</span>
                        </h5>
                        <p class="card-text">routing untuk memverifikasi kredensial yang dimasukkan.</p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Register
                            <span class="badge badge-success">GET</span>
                            <span class="badge badge-secondary text-monospace">/register</span>
                        </h5>
                        <p class="card-text">Halaman untuk memasukkan informasi untuk membuat akun kredensial baru.</p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Register
                            <span class="badge badge-warning">POST</span>
                            <span class="badge badge-secondary text-monospace">/register</span>
                        </h5>
                        <p class="card-text">routing untuk memverifikasi informasi yang dimasukkan lalu memberikan
                            akses.</p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Logout
                            <span class="badge badge-success">GET</span>
                            <span class="badge badge-secondary text-monospace">/logout</span>
                        </h5>
                        <p class="card-text">Halaman untuk memasukkan kredensial untuk mengaksis routing khusus.</p>
                    </div>
                </div>
                <div class="card bg-light mb-3">
                    <div class="card-header">CRUD</div>
                    <div class="card-body">
                        <h5 class="card-title">List Data
                            <span class="badge badge-success">GET</span>
                            <span class="badge badge-secondary text-monospace">/produk</span>
                        </h5>
                        <p class="card-text">Halaman ini menampilkan daftar dari seluruh data dari tabel Produk yang ada
                        </p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Create Data
                            <span class="badge badge-success">GET</span>
                            <span class="badge badge-secondary text-monospace">/produk/create</span>
                        </h5>
                        <p class="card-text">Halaman ini menampilkan formulir untuk menambahkan data produk </p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Store Data
                            <span class="badge badge-warning">POST</span>
                            <span class="badge badge-secondary text-monospace">/produk/create</span>
                        </h5>
                        <p class="card-text">Routing ini digunakan untuk menambah data produk dari informasi yang sudah
                            dimasukkan </p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Edit Data
                            <span class="badge badge-success">GET</span>
                            <span class="badge badge-secondary text-monospace">/produk/{id}</span>
                        </h5>
                        <p class="card-text">Halaman ini menampilkan formulir untuk memperbarui data produk dengan id
                            tertentu</p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Update Data
                            <span class="badge badge-warning">POST</span>
                            <span class="badge badge-secondary text-monospace">/produk/{id}</span>
                        </h5>
                        <p class="card-text">Routing ini digunakan untuk memperbarui informasi dari produk dengan id
                            tertentu</p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Delete Data
                            <span class="badge badge-danger">DELETE</span>
                            <span class="badge badge-secondary text-monospace">/produk/{id}</span>
                        </h5>
                        <p class="card-text">Routing ini digunakan untuk menghapus suatu produk dengan id tertentu dari
                            database</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row justify-content-md-center">
                    <span class="h3 col-12 text-center">REST API</span>
                </div>
                <div class="card bg-light mb-3">
                    <div class="card-header">General and Authenticating</div>
                    <div class="card-body">
                        <h5 class="card-title">Base
                            <span class="badge badge-success">GET</span>
                            <span class="badge badge-secondary text-monospace">/api</span>
                        </h5>
                        <p class="card-text">Mengembalikan Seluruh Daftar Routing yang tersedia pada REST API server ini
                        </p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Login
                            <span class="badge badge-warning">POST</span>
                            <span class="badge badge-secondary text-monospace">/api/login</span>
                        </h5>
                        <p class="card-text">Mengembalikan token akses setelah memverifikasi kredensial yang dikirim
                        </p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Sign Up
                            <span class="badge badge-warning">POST</span>
                            <span class="badge badge-secondary text-monospace">/api/signup</span>
                        </h5>
                        <p class="card-text">Mengembalikan token akses setelah memverifikasi kredensial yang dikirim
                        </p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Token for Debugging
                            <span class="badge badge-success">GET</span>
                            <span class="badge badge-secondary text-monospace">/api/token</span>
                        </h5>
                        <p class="card-text">Mengembalikan token akses yang dapat digunakan untuk kepentingan debugging
                        </p>
                    </div>
                </div>
                <div class="card bg-light mb-3">
                    <div class="card-header">Public CRUD (no need Authorization Token on Header)</div>
                    <div class="card-body">
                        <h5 class="card-title">Get All Data
                            <span class="badge badge-success">GET</span>
                            <span class="badge badge-secondary text-monospace">/api/public</span>
                        </h5>
                        <p class="card-text">Mengembalikan Seluruh Data Produk yang ada pada Database
                        </p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Create New Data
                            <span class="badge badge-warning">POST</span>
                            <span class="badge badge-secondary text-monospace">/api/public</span>
                        </h5>
                        <p class="card-text">menggunakan form-data untuk mengirim data (name: String, price: Int, pict:
                            Image) dan menambahkan data tersebut pada database
                        </p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Get Spesific Data
                            <span class="badge badge-success">GET</span>
                            <span class="badge badge-secondary text-monospace">/api/public/{id}</span>
                        </h5>
                        <p class="card-text">Mengembalikan Data Produk dengan id tertentu
                        </p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Update Spesific Data
                            <span class="badge badge-warning">POST</span>
                            <span class="badge badge-secondary text-monospace">/api/public/{id}</span>
                        </h5>
                        <p class="card-text">menggunakan form-data untuk mengirim data (name: String, price: Int, pict:
                            Image) dan memperbarui data tersebut pada produk dengan id tertentu
                        </p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Update Spesific Data
                            <span class="badge badge-danger">DELETE</span>
                            <span class="badge badge-secondary text-monospace">/api/public/{id}</span>
                        </h5>
                        <p class="card-text">digunakan untuk menghapus suatu data produk dengan id tertentu
                        </p>
                    </div>
                </div>
                <div class="card bg-light mb-3">
                    <div class="card-header">Private CRUD ( <strong>NEED</strong> Authorization Token on Header)</div>
                    <div class="alert alert-warning" role="alert">
                        Use  <span class="text-monospace">Bearer {token}</span>  on Authorization Header
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Get All Data
                            <span class="badge badge-success">GET</span>
                            <span class="badge badge-secondary text-monospace">/api/private</span>
                        </h5>
                        <p class="card-text">Mengembalikan Seluruh Data Produk yang ada pada Database
                        </p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Create New Data
                            <span class="badge badge-warning">POST</span>
                            <span class="badge badge-secondary text-monospace">/api/private</span>
                        </h5>
                        <p class="card-text">menggunakan form-data untuk mengirim data (name: String, price: Int, pict:
                            Image) dan menambahkan data tersebut pada database
                        </p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Get Spesific Data
                            <span class="badge badge-success">GET</span>
                            <span class="badge badge-secondary text-monospace">/api/private/{id}</span>
                        </h5>
                        <p class="card-text">Mengembalikan Data Produk dengan id tertentu
                        </p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Update Spesific Data
                            <span class="badge badge-warning">POST</span>
                            <span class="badge badge-secondary text-monospace">/api/private/{id}</span>
                        </h5>
                        <p class="card-text">menggunakan form-data untuk mengirim data (name: String, price: Int, pict:
                            Image) dan memperbarui data tersebut pada produk dengan id tertentu
                        </p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Update Spesific Data
                            <span class="badge badge-danger">DELETE</span>
                            <span class="badge badge-secondary text-monospace">/api/private/{id}</span>
                        </h5>
                        <p class="card-text">digunakan untuk menghapus suatu data produk dengan id tertentu
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
        </script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
