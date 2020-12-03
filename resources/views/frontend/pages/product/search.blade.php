@extends('frontend.layouts.master')

@section('content')



    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.partials.product-sidebar')
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="{{ route('search') }}" method="get">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
      
                        <div class="widget">
							<h3>
								<span class="badge badge-secondary">
									Search Item : 
									<a href="" class="badge badge-light">
										{{ $search }}
									</a>			
								</span>
							</h3><br>
							@include('frontend.pages.product.partials.all_products')
						</div>
  
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

@endsection
