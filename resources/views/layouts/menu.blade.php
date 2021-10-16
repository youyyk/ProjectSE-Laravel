<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class=" container-fluid navbar-brand m-lg-1 ">ResManage
        <div class="collapse navbar-collapse fs-6 ms-1" id="navbarScroll">
            @if(Auth::check())
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                @if(Auth::user()->isAdmin())
                <li class="nav-item active">
                    <a class="nav-link
                              @if(\Request::routeIs('charts.*')) bg-dark text-white rounded-3 @endif"
                       href="{{route("charts.index")}}">สรุปยอด</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link
                              @if(\Request::routeIs('users.*')) bg-dark text-white rounded-3 @endif"
                       href="{{route("users.index")}}">พนักงาน</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link
                          @if(\Request::routeIs('menus.*')) bg-dark text-white rounded-3 @endif"
                       href="{{route("menus.index")}}">รายการอาหาร</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link
                          @if(\Request::routeIs('departments.*')) bg-dark text-white rounded-3 @endif"
                       href="{{route("departments.index")}}">แผนกอาหาร</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link
                              @if(\Request::routeIs('showAllResTable')) bg-dark text-white rounded-3 @endif"
                       href="{{route("showAllResTable")}}">รายการโต๊ะ</a>
                </li>
                @endif
                @if(!(Auth::user()->isBackWorker()))
                <li class="nav-item active">
                    <a class="nav-link
                              @if(\Request::routeIs('resTables.*')) bg-dark text-white rounded-3 @endif"
                       href="{{route("resTables.index")}}">การจัดการโต๊ะ</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link
                              @if(\Request::routeIs('bills.*')) bg-dark text-white rounded-3 @endif"
                       href="{{route("bills.index")}}">รายการบิล</a>
                </li>
                    @endif
                    @if(!(Auth::user()->isFrontWorker()))
                <li class="nav-item active">
                    <a class="nav-link
                              @if(\Request::routeIs('backWorker')) bg-dark text-white rounded-3 @endif"
                       href="{{route("backWorker")}}">ครัว</a>
                </li>
                    @endif
            </ul>
            @endif
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

{{--                    <form action="{{ route('register') }}" class="px-2">--}}
{{--                        @csrf--}}
{{--                        <button class="btn btn-outline-primary " type="submit">--}}
{{--                            Register--}}
{{--                        </button>--}}
{{--                    </form>--}}
                @endif
        </div>
    </div>
</nav>
