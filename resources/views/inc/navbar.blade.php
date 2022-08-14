<nav class="navbar navbar-inverse">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>
            <ul class="nav navbar-nav">
                <li><a href="/laravel-domaci/public/home">Home</a></li>
                <li><a href="/laravel-domaci/public/houses">Publishing Houses</a></li>
                <li><a href="/laravel-domaci/public/books">Books</a></li>
                <li><a href="/laravel-domaci/public/authors">Authors</a></li>
              </ul>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} 
                        </a>

                        
                            
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>