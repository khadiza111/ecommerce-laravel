      {{-- Navigation --}}

<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-light">      
        
  <div class="container"> 
    <a class="navbar-brand nav-lg" href="{{ route('index') }}">LR_EC</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
{{--bootstrap responsive

<div class="navbar">
  <a class="active" href="#"><i class="fa fa-fw fa-home"></i> Home</a> 
  <a href="#"><i class="fa fa-fw fa-search"></i> Search</a> 
  <a href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a> 
  <a href="#"><i class="fa fa-fw fa-user"></i> Login</a>
</div>

end --}}
          <li class="nav-item {{ Route::is('index') ? 'active' : '' }}">
            <a class="nav-link" style="margin-top: 10px;" href="{{ route('index') }}"><i class="fa fa-fw fa-home"></i>Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item {{ Route::is('products') ? 'active' : '' }}">
            <a class="nav-link" style="margin-top: 10px;" href="{{ route('products') }}"><i class="fa fa-fw fa-cart-arrow-down"></i>Products</a>
          </li>
          <li class="nav-item {{ Route::is('contact') ? 'active' : '' }}">
            <a class="nav-link" style="margin-top: 10px;" href="{{ route('contact') }}"><i class="fa fa-fw fa-envelope"></i>Contact</a>
          </li>
          <li class="nav-item">
            <form class="form-inline my-2 my-lg-0" action="{{ route('search') }}" method="get">
              {{-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> --}}
            <div class="input-group mb-3" style="padding-left: 30px; margin-top: 10px;">
              <input type="text" class="form-control" name="search" placeholder="Search...." aria-label="Search...." aria-describedby="button-addon2">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary search-icon-button" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
              </div>
            </div>
            </form>
          </li>
          {{--<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>--}}
        </ul>

        <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                                {{--
                                <a href="{{ route('carts') }}" class="btn btn-danger mt-2">
                        <span class="mt-1"><i class="icon-shopping-cart"></i></span>
                        <span class="badge badge-warning">
                          {{ App\Models\Cart::totalItems() }}
                        </span>
                    </a>
                --}}

                    <a href="{{ route('carts') }}" class="btn btn-danger mt-2">
                        <span class="mt-1"><img src="{{ asset('public/images/defaults/cart-ec.png') }}" style="width: 30px"></span>&nbsp;
                        <span class="badge badge-warning" id="totalItems">
                          {{ App\Models\Cart::totalItems() }}
                        </span>
                    </a>
                            </li>
          
              @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" class="img rounded-circle" style="width: 40px;">
                                &nbsp;&nbsp;       
                                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} |  {{ Auth::user()->username }}<span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="background: grey;">
                                  <a class="dropdown-item" href="{{ route('user.dashboard') }}">
                                        {{ __('Dashborad') }}
                                    </a>
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
  {{--End of navigation--}}