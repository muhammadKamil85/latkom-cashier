<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">MyCashier</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                @guest
                    <button type="button" class="bg-transparent nav-link border-0 position-absolute end-0 me-3 top-0 mt-2"
                        data-bs-toggle="modal" data-bs-target="#login">Login</button>
                    @include('partials.login')
                @endguest
                @auth
                    <a class="nav-link" aria-current="page" href="{{ route('dashboard') }}">Dashboard</a>
                    <a class="nav-link" href="#">Product</a>
                    <a class="nav-link" href="#">User</a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit"
                            class="bg-transparent nav-link border-0 position-absolute end-0 me-3">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</nav>
