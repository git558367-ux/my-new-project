 <style>
     /* ================= HEADER DARK ================= */

     /* Header Background */
     #header {
         background: #0f172a !important;
         border-bottom: 1px solid #1e293b;
     }

     /* Logo */
     #header .sitename {
         color: #f8fafc !important;
     }

     /* Nav Links */
     .navmenu ul li a {
         color: #cbd5e1 !important;
         font-weight: 500;
         transition: 0.3s;
     }

     /* Hover */
     .navmenu ul li a:hover {
         color: #60a5fa !important;
     }

     /* Active Link */
     .navmenu ul li a.active {
         color: #3b82f6 !important;
     }

     /* Dropdown */
     .navmenu ul li ul {
         background: #1e293b !important;
     }

     /* Dropdown Links */
     .navmenu ul li ul li a {
         color: #cbd5e1 !important;
     }

<<<<<<< HEAD
     .navmenu ul li ul li a:hover {
         background: #334155;
         color: #ffffff !important;
     }
 </style>
=======
.dropdown-item {
    color: #cbd5e1 !important;
}

.dropdown-item:hover {
    background: #334155 !important;
    color: #fff !important;
}

/* Navbar Toggle (Mobile) */
.navbar-toggler {
    border: 1px solid #334155;
}

.navbar-toggler-icon {
    filter: invert(1);
}



</style>
>>>>>>> 1324548b355a2047cc5dbe4a592c7cce3df1f44c
 <header id="header" class="header fixed-top">

     <div class="branding d-flex align-items-cente">

         <div class="container position-relative d-flex align-items-center justify-content-between">
             <a href="{{route('home')}}" class="logo d-flex align-items-center">
                 <!-- Uncomment the line below if you also wish to use an image logo -->
                 <!-- <img src="frontend/assets/img/logo.webp" alt=""> -->
                 <h1 class="sitename">Clinic</h1>
             </a>

             <nav id="navmenu" class="navmenu">
                 <ul>
                     <li><a href="{{ route('home') }}" class="active">Home</a></li>
                     <li><a href="{{ route('about') }}">About</a></li>
                     <li><a href="{{ route('products.index') }}">Products</a></li>
                     <li><a href="{{route('contact')}}">Contact</a></li>
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
