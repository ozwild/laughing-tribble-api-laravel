<container class="mt-2">
    <row>
        <grid :size="6">
            <a href="/tracks">Tracks</a>
            <a href="/collections">Collections</a>
        </grid>
        <grid :size="6" class="align-right">
            @guest
                @if (Route::has('login'))
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                @endif

                @if (Route::has('register'))
                    <a class="ml-1" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            @else

                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            @endguest
        </grid>
    </row>
</container>
