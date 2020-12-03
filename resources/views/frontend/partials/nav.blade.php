{{--New theme Nav start - Ogani--}}

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="{{ asset('public/images/logo.png') }}" alt="logo" style="width:50px; height:60px;">
                <p>Big-shop</p>
            </a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>

                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>{{ App\Models\Cart::totalItems() }}</span></a></li> 
            </ul>

            @if(App\Models\Cart::totalCarts() == NULL)
                <div class="header__cart__price">empty <span></span></div>
            @else
                            @php
                                $total_price = 0;
                            @endphp
                            @foreach(App\Models\Cart::totalCarts() as $cart)

                                @php
                                    $total_price += $cart->product->price * $cart->product_quantity;
                                @endphp
                            @endforeach
                        
                            <div class="header__cart__price">price: <span>${{ $total_price }}</span></div>
            @endif
        
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{ route('index') }}">Home</a></li>
                <li><a href="{{ route('products') }}">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="{{ route('products') }}">Shop Details</a></li>
                        <li><a href="{{ route('carts') }}">Shoping Cart</a></li>
                        <li><a href="{{ route('checkouts') }}">Check Out</a></li>
                        <li><a href="{{ route('blog') }}">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('blog') }}">Blog</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> big-shop.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> big@shop.com</li>
                                <li>Free Shipping for all Order of $99</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="{{ asset('public/images/language.png') }}" alt="language">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanish</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                          @guest
                            <div class="header__top__right__auth">
                                <a href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a>
                            </div>
                          @else
                            <div class="header__top__right__auth nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  <img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" class="img rounded-circle" style="width: 40px;">
                                  &nbsp;&nbsp;       
                                    {{-- Auth::user()->first_name }} {{ Auth::user()->last_name --}} 
                                    {{ Auth::user()->email }}<span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                            </div>    
                          @endguest  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('public/images/logo.png') }}" alt="logo" style="width: 100px"></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{ route('index') }}">Home</a></li>
                            <li><a href="{{ route('products') }}">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="{{ route('products') }}">Shop Details</a></li>
                                    <li><a href="{{ route('carts') }}">Shoping Cart</a></li>
                                    <li><a href="{{ route('checkouts') }}">Check Out</a></li>
                                    <li><a href="{{ route('blog') }}">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('blog') }}">Blog</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            {{-- <li><a href="{{ route('carts') }}"><i class="fa fa-shopping-bag"></i> <span id="totalItems">{{ App\Models\Cart::totalItems() }}</span></a></li> --}}
                            <li><a href="{{ route('carts') }}"><i class="fa fa-shopping-bag"></i> <span id="totalItems">{{ App\Models\Cart::totalItems() }}</span></a></li>
                        </ul>
                        
                        @if(App\Models\Cart::totalCarts() == NULL)
                            <div class="header__cart__price"> <span>empty</span></div>
                        @else
                            @php
                                $total_price = 0;
                            @endphp
                            @foreach(App\Models\Cart::totalCarts() as $cart)

                                @php
                                    $total_price += $cart->product->price * $cart->product_quantity;
                                @endphp
                            @endforeach
                        
                            <div class="header__cart__price">price: <span>${{ $total_price }}</span></div>
                        @endif
                        
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

{{--New theme Nav end - Ogani--}}