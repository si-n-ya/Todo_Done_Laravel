<header class="header header_design">
    <!-- <div class="header_container">
        <p class="header_title"><a href="{{ url('/') }}" class="top_link">Todo_Done</a></p>
        <a class="logout_box"><a href="" class="logout">ログアウト</a></p>
    </div> .header_container -->
    @if (Route::has('login'))
    <div class="header_container"> @auth
        <p class="header_title">
            <a href="{{ url('/') }}" class="top_link">Todo_Done</a>
        </p>
        <form action="{{ route('logout') }}" method="POST" id="logout-form" class="logout_box">
            {{ csrf_field() }}
            <a href="{{ route('logout') }}" class="logout"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a></form>
        @else
        <a href="{{ route('login') }}">Login</a>
        @if (Route::has('register'))
        <a href="{{ route('register') }}">Register</a>
        @endif
        @endauth
    </div> <!-- .header_container -->
    @endif
</header>