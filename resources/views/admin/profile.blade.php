@extends('admin.layout.app')

@section('title', 'Admin Profile')

@section('content')

    <style>
        /* BACKGROUND */
        body {
            background: #0f172a;
        }

        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: radial-gradient(circle at 20% 20%, #1e293b, #020617);
            overflow: hidden;
        }

        .bg-animation span {
            position: absolute;
            width: 6px;
            height: 6px;
            background: white;
            border-radius: 50%;
            animation: move 15s linear infinite;
            opacity: 0.6;
        }

        @keyframes move {
            0% {
                transform: translateY(100vh) scale(0);
            }

            100% {
                transform: translateY(-10vh) scale(1);
            }
        }

        /* PROFILE CONTAINER */
        .profile-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 85vh;
        }

        /* PROFILE CARD */
        .profile-card {
            width: 750px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 50px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.6);
            color: white;
            transition: 0.4s;
            animation: fadeUp 1s ease;
        }

        .profile-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.7);
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* 🔥 PROFILE HEADER CENTER FIX */
        .profile-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin-bottom: 35px;
        }

        /* AVATAR */
        .profile-avatar {
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: white;
            object-fit: cover;
            cursor: pointer;
            transition: 0.4s;
        }

        /* Size */
        .profile-avatar.profile {
            width: 130px;
            height: 130px;
            font-size: 50px;
            border: 4px solid rgba(255, 255, 255, 0.2);
            margin-bottom: 15px;
        }

        .profile-avatar.navbar {
            width: 38px;
            height: 38px;
            font-size: 15px;
            border: 2px solid #3b82f6;
        }

        /* TEXT */
        .profile-name {
            font-size: 28px;
            font-weight: 600;
        }

        .profile-email {
            color: #94a3b8;
            font-size: 14px;
        }

        /* INFO */
        .profile-info {
            margin-top: 25px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 15px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            transition: 0.3s;
        }

        .info-row:hover {
            padding-left: 10px;
            background: rgba(255, 255, 255, 0.04);
        }

        .info-title {
            font-weight: 500;
            color: #94a3b8;
        }

        .info-value {
            font-weight: 600;
        }

        /* ROLE */
        .role {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            background: #22c55e;
        }

        /* BUTTON */
        .profile-actions {
            margin-top: 35px;
            text-align: center;
        }

        .edit-btn {
            background: linear-gradient(45deg, #6366f1, #8b5cf6);
            border: none;
            padding: 12px 35px;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            transition: 0.3s;
        }

        .edit-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 30px rgba(99, 102, 241, 0.6);
        }
    </style>

    <!-- BACKGROUND -->
    <div class="bg-animation">
        <span style="left:10%;animation-delay:0s"></span>
        <span style="left:20%;animation-delay:2s"></span>
        <span style="left:30%;animation-delay:4s"></span>
        <span style="left:40%;animation-delay:1s"></span>
        <span style="left:50%;animation-delay:3s"></span>
        <span style="left:60%;animation-delay:6s"></span>
        <span style="left:70%;animation-delay:2s"></span>
        <span style="left:80%;animation-delay:5s"></span>
        <span style="left:90%;animation-delay:7s"></span>
    </div>

    <!-- PROFILE -->
    <div class="profile-container">
        <div class="profile-card">

            @php $user = Auth::user(); @endphp

            <!-- HEADER -->
            <div class="profile-header">


                @php
                    $colors = [
                        'linear-gradient(135deg,#3b82f6,#6366f1)',
                        'linear-gradient(135deg,#f59e0b,#ef4444)',
                        'linear-gradient(135deg,#10b981,#06b6d4)',
                        'linear-gradient(135deg,#8b5cf6,#ec4899)',
                        'linear-gradient(135deg,#22c55e,#4ade80)',
                        'linear-gradient(135deg,#f43f5e,#fb7185)',
                    ];

                    $index = ord(strtoupper($user->name[0])) % count($colors);
                    $bg = $colors[$index];
                @endphp


                @if ($user->image)
                    <img src="{{ asset('storage/' . $user->image) }}" class="profile-avatar profile">
                @else
                    <div class="profile-avatar profile" style="background: {{ $bg }}">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                @endif

                <div class="profile-name">{{ $user->name }}</div>
                <div class="profile-email">{{ $user->email }}</div>

            </div>

            <!-- INFO -->
            <div class="profile-info">

                <div class="info-row">
                    <div class="info-title">User ID</div>
                    <div class="info-value">{{ $user->id }}</div>
                </div>

                <div class="info-row">
                    <div class="info-title">Full Name</div>
                    <div class="info-value">{{ $user->name }}</div>
                </div>

                <div class="info-row">
                    <div class="info-title">Email Address</div>
                    <div class="info-value">{{ $user->email }}</div>
                </div>

                <div class="info-row">
                    <div class="info-title">Role</div>
                    <div class="info-value">
                        @if ($user->role == 'admin')
                            <span class="role">Admin</span>
                        @else
                            <span class="role">User</span>
                        @endif
                    </div>
                </div>

            </div>

            <!-- BUTTON -->
            <div class="profile-actions">
                <a href="{{ route('admin.profile.edit') }}" class="edit-btn">
                    Edit Profile
                </a>
            </div>

        </div>
    </div>

@endsection
