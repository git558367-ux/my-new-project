@extends('admin.layout.app')

@section('title', 'User Management')

@section('content')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* PAGE TITLE */

        .page-title {
            color: white;
            font-weight: 600;
            margin-bottom: 20px;
        }

        /* STATS GRID */

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: #020617;
            border: 1px solid #1e293b;
            border-radius: 12px;
            padding: 18px;
            color: white;
            transition: .3s;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, .4);
        }

        .stat-title {
            font-size: 13px;
            color: #94a3b8;
        }

        .stat-number {
            font-size: 24px;
            font-weight: 600;
        }

        /* TOOLBAR */

        .toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .search-input {
            background: #020617;
            border: 1px solid #334155;
            color: white;
            padding: 8px 12px;
            border-radius: 8px;
            width: 250px;
        }

        /* USER CARD LIST */

        .users-wrapper {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .user-card {
            background: #020617;
            border: 1px solid #1e293b;
            border-radius: 12px;
            padding: 15px 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: .25s;
        }

        .user-card:hover {
            background: #1e293b;
            transform: translateY(-3px);
        }

        /* LEFT */

        .user-left {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        /* AVATAR */

        .avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: white;
        }

        /* USER INFO */

        .user-name {
            color: white;
            font-weight: 500;
            margin: 0;
        }

        .user-email {
            font-size: 13px;
            color: #94a3b8;
            margin: 0;
        }

        /* ROLE BADGE */

        .role {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
        }

        .role-admin {
            background: #ef444433;
            color: #ef4444;
        }

        .role-user {
            background: #22c55e33;
            color: #22c55e;
        }

        /* ACTIONS */

        .actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .delete-btn {
            background: #ef4444;
            border: none;
            color: white;
            padding: 7px 10px;
            border-radius: 6px;
            transition: .2s;
        }

        .delete-btn:hover {
            background: #dc2626;
            transform: scale(1.1);
        }
    </style>

    <div class="container-fluid">

        <h3 class="page-title">User Management</h3>

        <!-- ===== STATS ===== -->

        <div class="stats-grid">

            <div class="stat-card">

                <div class="stat-title">Total Users</div>

                <div class="stat-number">{{ $users->count() }}</div>

            </div>

            <div class="stat-card">

                <div class="stat-title">Admins</div>

                <div class="stat-number">{{ $users->where('role', 'admin')->count() }}</div>

            </div>

            <div class="stat-card">

                <div class="stat-title">Normal Users</div>

                <div class="stat-number">{{ $users->where('role', 'user')->count() }}</div>

            </div>

        </div>

        <!-- SEARCH -->

        <div class="toolbar">

            <input type="text" id="searchUser" class="search-input" placeholder="Search user...">

        </div>

        <!-- USERS LIST -->

        <div class="users-wrapper" id="usersList">

            @foreach ($users as $user)
                <div class="user-card">

                    <div class="user-left">

                        <div class="avatar">

                            {{ strtoupper(substr($user->name, 0, 1)) }}

                        </div>

                        <div>

                            <p class="user-name">{{ $user->name }}</p>

                            <p class="user-email">{{ $user->email }}</p>

                        </div>

                    </div>

                    <div class="actions">

                        @if ($user->role == 'admin')
                            <span class="role role-admin">Admin</span>
                        @else
                            <span class="role role-user">User</span>
                        @endif

                        <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" class="deleteForm">

                            @csrf
                            @method('DELETE')

                            <button class="delete-btn">

                                <i class="bi bi-trash"></i>

                            </button>

                        </form>

                    </div>

                </div>
            @endforeach

        </div>

    </div>

    <script>
        /* SEARCH USER */

        document.getElementById("searchUser").addEventListener("keyup", function() {

            let value = this.value.toLowerCase()

            document.querySelectorAll(".user-card").forEach(card => {

                let name = card.querySelector(".user-name").innerText.toLowerCase()

                let email = card.querySelector(".user-email").innerText.toLowerCase()

                if (name.includes(value) || email.includes(value)) {

                    card.style.display = "flex"

                } else {

                    card.style.display = "none"

                }

            })

        })


        /* DELETE CONFIRM */

        document.querySelectorAll(".deleteForm").forEach(form => {

            form.addEventListener("submit", function(e) {

                e.preventDefault()

                Swal.fire({

                    title: "Delete User?",
                    text: "This cannot be undone",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Delete"

                }).then(result => {

                    if (result.isConfirmed) {

                        form.submit()

                    }

                })

            })

        })
    </script>

@endsection
