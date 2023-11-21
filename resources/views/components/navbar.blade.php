<nav class="navbar navbar-expand-lg navbar-light bg-light mt-4">
    <div>
        <a class="navbar-brand" href="/">Home,</a>
        <a class="navbar-brand" href="/about">Over ons,</a>
        <a class="navbar-brand" href="/appointments">Mijn Afspraken,</a>
        @auth
            @if (Auth::user()->role == 'admin'  || Auth::user()->role == 'employee' )
                <a class="navbar-brand" href="/dashboard">Dashboard,</a>
            @endif

        @endauth
        @guest
            <a class="navbar-brand" href="/Loginklant">Inloggen,</a>
            <a class="navbar-brand" href="/register">
                Registreren,</a>
        @endguest

        @auth
            <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="mdi mdi-power text-danger"></i> {{ __('Uitloggen') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
        @endauth

    </div>
</nav>
