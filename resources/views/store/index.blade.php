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
    <div class="container my-4 col-12">
        <span class="display-3" style="text-center">Buru Covid</span>

        @if (Session::has('success'))
            <div class="alert alert-success " role="alert">
                {{ Session::get('success') }}
            </div>
        @endif

        @if (Session::has('error'))
            <div class="alert alert-danger " role="alert">
                {{ Session::get('error') }}
            </div>
        @endif
        <div class="row justify-content-center mt-4" style="width: 100%">

            <form class="col-12 col-md-8 col-sm-12 col-lg-6" action="{{ route('store.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name-store">Store Name</label>
                    <input type="text" class="form-control" id="name-store" name="name">
                </div>
                <div class="form-group">
                    <label for="lat">Latitude</label>
                    <input type="text" class="form-control" id="lat" name="lat">
                </div>
                <div class="form-group">
                    <label for="long">Longtitude</label>
                    <input type="text" class="form-control" id="long" name="long">
                </div>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
            </form>
        </div>
    </div>
</body>

</html>
