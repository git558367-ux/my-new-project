  <header id="header" class="header fixed-top">

      <div class="branding d-flex align-items-cente">

          <div class="container position-relative d-flex align-items-center justify-content-between">
              <a href="index-2.html" class="logo d-flex align-items-center">
                  <!-- Uncomment the line below if you also wish to use an image logo -->
                  <!-- <img src="frontend/assets/img/logo.webp" alt=""> -->
                  <h1 class="sitename">Clinic</h1>
              </a>

              <nav id="navmenu" class="navmenu">
                  <ul>
                      <li><a href="index-2.html" class="active">Home</a></li>
                      <li><a href="about.html">About</a></li>
                      <li><a href="departments.html">Departments</a></li>
                      <li><a href="services.html">Services</a></li>
                      <li><a href="doctors.html">Doctors</a></li>
                      <li class="dropdown"><a href="#"><span>More Pages</span> <i
                                  class="bi bi-chevron-down toggle-dropdown"></i></a>
                          <ul>
                              <li><a href="department-details.html">Department Details</a></li>
                              <li><a href="service-details.html">Service Details</a></li>
                              <li><a href="appointment.html">Appointment</a></li>
                              <li><a href="testimonials.html">Testimonials</a></li>
                              <li><a href="faq.html">Frequently Asked Questions</a></li>
                              <li><a href="gallery.html">Gallery</a></li>
                              <li><a href="terms.html">Terms</a></li>
                              <li><a href="privacy.html">Privacy</a></li>
                              <li><a href="404.html">404</a></li>
                          </ul>
                      </li>
                      <li class="dropdown"><a href="#"><span>Dropdown</span> <i
                                  class="bi bi-chevron-down toggle-dropdown"></i></a>
                          <ul>
                              <li><a href="#">Dropdown 1</a></li>
                              <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i
                                          class="bi bi-chevron-down toggle-dropdown"></i></a>
                                  <ul>
                                      <li><a href="#">Deep Dropdown 1</a></li>
                                      <li><a href="#">Deep Dropdown 2</a></li>
                                      <li><a href="#">Deep Dropdown 3</a></li>
                                      <li><a href="#">Deep Dropdown 4</a></li>
                                      <li><a href="#">Deep Dropdown 5</a></li>
                                  </ul>
                              </li>
                              <li><a href="#">Dropdown 2</a></li>
                              <li><a href="#">Dropdown 3</a></li>
                              <li><a href="#">Dropdown 4</a></li>
                          </ul>
                      </li>
                      <li><a href="contact.html">Contact</a></li>
                      @auth
                          <li class="dropdown">
                              <a href="#">
                                  {{ auth()->user()->name }}
                                  <i class="bi bi-chevron-down toggle-dropdown"></i>
                              </a>
                              <ul>
                                  <li>
                                      <a href="{{ route('dashboard') }}">Dashboard</a>
                                  </li>

                                  <li>
                                      <a href="{{ route('profile.edit') }}">My Profile</a>
                                  </li>

                                  <li>
                                      <form method="POST" action="{{ route('logout') }}">
                                          @csrf
                                          <button type="submit"
                                              style="background:none;border:none;padding:8px 15px;width:100%;text-align:left;">
                                              Logout
                                          </button>
                                      </form>
                                  </li>
                              </ul>
                          </li>
                      @else
                          <li><a href="{{ route('login') }}">Login</a></li>
                          <li><a href="{{ route('register') }}">Register</a></li>
                      @endauth
                  </ul>

                  <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
              </nav>

          </div>

      </div>

  </header>
