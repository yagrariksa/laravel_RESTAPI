<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('home') }}">Yagrariksa</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>
        <ul class="navbar-nav mr-0">
            <li class="nav-item">
                <a class="btn btn-outline-success" href="{{ route('home') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-outline-info ml-2" href="{{ route('baju.index') }}">List Baju</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-outline-danger ml-2" href="{{ route('logout') }}">Log Out</a>
            </li>
        </ul>
    </div>
</nav>
