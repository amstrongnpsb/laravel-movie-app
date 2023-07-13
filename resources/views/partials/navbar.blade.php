<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/home">Movies21</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ ($active == 'home') ? 'active' : '' }} " aria-current="page" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($active == 'genre') ? 'active' : '' }} " aria-current="page" href="/categories">Genre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($active == 'film') ? 'active' : '' }}" href="/data">Film</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="text-transform: capitalize; ">
                        Welcome back, {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-window-reverse m-2"></i>My Dashboard</a></li>
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="bi bi-box-arrow-right m-2"></i>LogOut
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
                @else
                <!-- ketika belum login -->
                <li class="nav-item">
                    <a class="nav-link {{ ($active == 'login') ? 'active' : '' }}" href="/login"><i class="bi bi-box-arrow-in-right m-2"></i>Login</a>
                </li>
            </ul>
            @endauth
        </div>
    </div>
</nav>