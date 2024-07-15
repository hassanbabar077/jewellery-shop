  <!-- navbar Section -->
  <div class="container-fluid py-2 fixed-top " id="navbar">
      <div class="container">
          <nav class="navbar navbar-dark navbar-expand-lg active" id="navbar">
              <a class="navbar-brand mr-auto" href="{{ route('index') }}">
                  <i class="fa-solid fa-gem text-light me-1" ></i> jewelry Shop</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                  aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav ms-auto">
                      <li class="nav-item active ">
                          <a class="nav-link fs-5" href="{{ route('index') }}">Home</a>
                      </li>
                      <li class="nav-item active ">
                          <a class="nav-link fs-5" href="{{ route('jewellery.shop') }}">Shop</a>
                      </li>
                      <li class="nav-item active ">
                          <a class="nav-link fs-5" href="{{ route('about') }}">About</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link fs-5" href="{{ route('contact.us') }}">Contact</a>
                      </li>
                  </ul>
              </div>
              <div class="dropdown">
                  <button class="btn btn-dark ms-3 dropdown-toggle" type="button" id="userDropdown"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-user"></i> <!-- User icon, you can use Bootstrap Icons -->
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="userDropdown">
                      <li class="dropdown-item "> {{ Auth::guard('web')->user()->name ?? '' }}</li>
                      <li><a class="dropdown-item" href="#"></a></li>
                      @auth('web')
                          <!-- Display the "Logout" link for authenticated users -->
                          <a class="dropdown-item" href="{{ route('visitor.order') }}">Order</a>
                          <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                      @else
                          <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                      @endauth
                      </li>
                  </ul>
              </div>
              <livewire:shoppin-cart />

          </nav>
      </div>
  </div>
  <!-- end navbar section -->
