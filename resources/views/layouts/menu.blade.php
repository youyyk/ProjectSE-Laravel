<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="navbar-brand m-lg-1">Header </div>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
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
        </ul>
    </div>
</nav>
