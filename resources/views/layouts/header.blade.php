<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">LMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <form class="d-flex ms-auto">
                    <input class="form-control me-2" type="search" placeholder="Search courses" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
                </form>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('courses.index') }}">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('discussions.index') }}">Discussions</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary text-white" href="{{ route('register') }}">Sign Up</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('images/user-avatar.png') }}" alt="User Avatar" class="rounded-circle me-1" width="30" height="30">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('profile') }}">My Profile</a></li>
                                <li><a class="dropdown-item" href="{{ route('enrollments.index') }}">My Courses</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>
