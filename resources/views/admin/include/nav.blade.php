<!-- NAVBAR -->
<style>
.admin-navbar {
    background: rgba(2, 6, 23, 0.8);
    backdrop-filter: blur(10px);
    border-bottom: 1px solid #1e293b;
    padding: 10px 25px;
    position: sticky;
    top: 0;
    z-index: 1000;
}

.navbar-brand {
    font-weight: 600;
    font-size: 18px;
    color: white;
}

.nav-right {
    display: flex;
    align-items: center;
    gap: 20px;
}

.admin-name {
    color: #cbd5f5;
    font-size: 14px;
}

.icon-btn {
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    background: #1e293b;
    color: #cbd5f5;
    cursor: pointer;
    transition: 0.3s;
}

.icon-btn:hover {
    background: #2563eb;
    color: white;
    transform: translateY(-2px);
}

/* AVATAR */
.profile-avatar {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    color: white;
    background: linear-gradient(135deg, #3b82f6, #6366f1);
    border: 2px solid #3b82f6;
    cursor: pointer;
    transition: 0.3s;
}

.profile-avatar:hover {
    transform: scale(1.15);
    box-shadow: 0 0 15px rgba(59, 130, 246, 0.8);
}

/* DROPDOWN */
.dropdown-menu {
    background: #020617;
    border: 1px solid #1e293b;
    border-radius: 10px;
    padding: 8px;
}

.dropdown-item {
    color: #cbd5f5;
    border-radius: 6px;
}

.dropdown-item:hover {
    background: #1e293b;
    color: white;
}
</style>

<nav class="navbar admin-navbar">
<div class="container-fluid">

    <!-- LOGO -->
    <a class="navbar-brand">
        <i class="bi bi-speedometer2"></i> Admin Dashboard
    </a>

    <!-- RIGHT -->
    <div class="nav-right">

        <!-- Notification -->
        <div class="icon-btn">
            <i class="bi bi-bell"></i>
        </div>

        <!-- Name -->
        <span class="admin-name">
            {{ Auth::user()->name }}
        </span>

        <!-- PROFILE DROPDOWN -->
        @php $user = Auth::user(); @endphp

        <div class="dropdown">

            <a class="d-flex align-items-center text-decoration-none" data-bs-toggle="dropdown">

                @if($user->image)
                    <img src="{{ asset('storage/'.$user->image) }}" class="profile-avatar">
                @else
                    <div class="profile-avatar">
                        {{ strtoupper(substr($user->name,0,1)) }}
                    </div>
                @endif

            </a>

            <ul class="dropdown-menu dropdown-menu-end">

                <li>
                    <a class="dropdown-item" href="{{ route('admin.profile') }}">
                        <i class="bi bi-person me-2"></i> Profile
                    </a>
                </li>

                <li>
                    <a class="dropdown-item" href="{{ route('admin.profile.edit') }}">
                        <i class="bi bi-pencil me-2"></i> Edit Profile
                    </a>
                </li>

                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item text-danger">
                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                        </button>
                    </form>
                </li>

            </ul>

        </div>

    </div>

</div>
</nav>