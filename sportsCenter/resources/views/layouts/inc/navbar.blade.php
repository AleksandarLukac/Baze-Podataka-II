
<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="/">Sportakos</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="btn btn-outline-primary" href="/" style="margin:5px">Početna <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="btn btn-outline-success" href="/about_us" style="margin:5px">O nama</a>
        </li>
        <li class="nav-item">
            <a class="btn btn-outline-warning" href="/clubs" style="margin:5px">Škole sporta</a>
        </li>
        <li class="nav-item">
            <a class="btn btn-outline-info" href="/coaches" style="margin:5px">Treneri</a>
        </li>
        <li class="nav-item">
            <a class="btn btn-outline-danger" href="/appointments/create" style="margin:5px">Rezerviši termin</a>
        </li>
    </ul>
          <div class="top-right links">
            <ul class="navbar-nav ml-auto">

                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="btn btn-outline-success my-2 my-sm-0" type="submit" class="nav-link" href="{{ route('login') }}" style="margin:5px">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="btn btn-outline-success my-2 my-sm-0" type="submit" class="nav-link" href="{{ route('register') }}" style="margin:5px">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('/user-appointments')}}">{{ __('Tvoji zakazani termini') }}</a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
                </div>
    </div>
  </nav>
