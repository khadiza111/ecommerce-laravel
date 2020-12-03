<!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="{{asset('public/images/faces/face8.jpg')}}" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">Allen Moreno</p>
                  <p class="designation">Premium user</p>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">Main Menu</li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.index') }}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#product-pages" aria-expanded="false" aria-controls="product-pages">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Products Control</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="product-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.all_products') }}">Manage Products</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.product.create') }}">Add Product</a>
                  </li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#criteria-pages" aria-expanded="false" aria-controls="criteria-pages">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Criteria Criteria</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="criteria-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.all_criterias') }}">Manage Criterias</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.criteria.create') }}">Add Criteria</a>
                  </li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#order-pages" aria-expanded="false" aria-controls="order-pages">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Orders Control</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="order-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.all_orders') }}">Manage Orders</a>
                  </li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#category-pages" aria-expanded="false" aria-controls="category-pages">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Categories Control</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="category-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.all_categories') }}">Manage Categories</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.category.create') }}">Add Category</a>
                  </li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#brand-pages" aria-expanded="false" aria-controls="brand-pages">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Brands Control</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="brand-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.all_brands') }}">Manage Brands</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.brand.create') }}">Add Brand</a>
                  </li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#division-pages" aria-expanded="false" aria-controls="division-pages">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Divisions Control</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="division-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.all_divisions') }}">Manage Divisions</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.division.create') }}">Add Division</a>
                  </li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#district-pages" aria-expanded="false" aria-controls="district-pages">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Districts Control</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="district-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.all_districts') }}">Manage Districts</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.district.create') }}">Add District</a>
                  </li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#slider-pages" aria-expanded="false" aria-controls="slider-pages">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Sliders Control</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="slider-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.all_sliders') }}">Manage Sliders</a>
                  </li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#contactDetails-pages" aria-expanded="false" aria-controls="contactDetails-pages">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Contact Info </span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="contactDetails-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.all_contactDetails') }}">Manage Details</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.all_contactEmails') }}">Users Email</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.all_contactMap') }}">Map Details</a>
                  </li>
                </ul>
              </div>
            </li>

            {{-- <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#contactEmails-pages" aria-expanded="false" aria-controls="contactEmails-pages">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Contact Emails </span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="contactEmails-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.all_contactEmails') }}">Users Email</a>
                  </li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#contactMap-pages" aria-expanded="false" aria-controls="contactMap-pages">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Contact Map </span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="contactMap-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.all_contactMap') }}">Map Details</a>
                  </li>
                </ul>
              </div>
            </li> --}}

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#blog-pages" aria-expanded="false" aria-controls="blog-pages">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Blog Control </span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="blog-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.all_blogPosts') }}">Blog Posts</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.all_blog_criterias') }}">Blog Criteria</a>
                  </li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#logout-pages">
                <form class="form-inline" action="{{ route('admin.logout') }}" method="post">
                  @csrf
                  <input type="submit" value="Log Out" class="btn btn-danger">
                </form>
              </a>
            </li>

          </ul>
        </nav>