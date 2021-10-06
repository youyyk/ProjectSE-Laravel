<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class=" container-fluid navbar-brand m-lg-1 ">Restaurant
        <div class="collapse navbar-collapse fs-6 ms-1" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item active">
                    <a class="nav-link
                              @if(\Request::routeIs('users.*')) bg-dark text-white rounded-3 @endif"
                       href="{{route("users.index")}}">Users</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link
                              @if(\Request::routeIs('menus.*')) bg-dark text-white rounded-3 @endif"
                              href="{{route("menus.index")}}">Menu</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link
                              @if(\Request::routeIs('resTables.*')) bg-dark text-white rounded-3 @endif"
                       href="{{route("resTables.index")}}">ResTables</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link
                              @if(\Request::routeIs('departments.*')) bg-dark text-white rounded-3 @endif"
                       href="{{route("departments.index")}}">Departments</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link
                              @if(\Request::routeIs('bills.*')) bg-dark text-white rounded-3 @endif"
                       href="{{route("bills.index")}}">Bills</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link
                              @if(\Request::routeIs('backWorker')) bg-dark text-white rounded-3 @endif"
                       href="{{route("backWorker")}}">Back-Worker</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
                @if(Auth::check())
                    <li class="navbar-nav nav-item active">
                        <a class="nav-link"
                           href="#">
                            {{ Auth::user()->name }}
                        </a>
                    </li>

                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="btn btn-outline-danger " type="submit">
                            LOGOUT
                        </button>
                    </form>
                @else
                    <form action="{{ route('login') }}">
                        @csrf
                        <button class="btn btn-outline-success" type="submit">
                            Login
                        </button>
                    </form>

                    <form action="{{ route('register') }}" class="px-2">
                        @csrf
                        <button class="btn btn-outline-primary " type="submit">
                            Register
                        </button>
                    </form>
                @endif
        </div>
    </div>
</nav>
