@extends('layout.app')

@section('main')

<div class="animated-bg"></div>

<div class="container-fluid py-5 position-relative" style="z-index:2;">
    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="glass-card p-5">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="row">

                    {{-- LEFT PROFILE CARD --}}
                    <div class="col-md-4 text-center border-end border-secondary">
                        <div class="profile-box">
                            <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&background=111827&color=ffffff&size=200"
                                 class="rounded-circle profile-img mb-3">

                            <h4 class="text-white fw-bold">{{ auth()->user()->name }}</h4>
                            <p class="text-light small">{{ auth()->user()->email }}</p>
                        </div>
                    </div>

                    {{-- RIGHT FORM SECTION --}}
                    <div class="col-md-8 ps-md-5">

                        <h4 class="text-white mb-4 fw-bold">Account Settings</h4>

                        {{-- UPDATE PROFILE --}}
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf

                            <div class="mb-4">
                                <label class="text-light">Full Name</label>
                                <input type="text" name="name"
                                       value="{{ auth()->user()->name }}"
                                       class="form-control dark-input">
                            </div>

                            <div class="mb-4">
                                <label class="text-light">Email</label>
                                <input type="email" name="email"
                                       value="{{ auth()->user()->email }}"
                                       class="form-control dark-input">
                            </div>

                            <button class="btn btn-gradient px-4">
                                Save Changes
                            </button>
                        </form>

                        <hr class="my-5 border-secondary">

                        {{-- PASSWORD --}}
                        <h5 class="text-white mb-3">Change Password</h5>

                        <form method="POST" action="{{ route('profile.password') }}">
                            @csrf

                            <div class="mb-4">
                                <label class="text-light">New Password</label>
                                <input type="password" name="password"
                                       class="form-control dark-input">
                            </div>

                            <div class="mb-4">
                                <label class="text-light">Confirm Password</label>
                                <input type="password" name="password_confirmation"
                                       class="form-control dark-input">
                            </div>

                            <button class="btn btn-outline-light px-4">
                                Update Password
                            </button>
                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>


<style>

/* ===== MOVING GRADIENT BACKGROUND ===== */
.animated-bg {
    position: fixed;
    width: 100%;
    height: 100%;
    background: linear-gradient(-45deg, #0f2027, #203a43, #2c5364, #1f2937);
    background-size: 400% 400%;
    animation: gradientMove 12s ease infinite;
    top: 0;
    left: 0;
    z-index: 0;
}

@keyframes gradientMove {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* ===== GLASS EFFECT CARD ===== */
.glass-card {
    background: rgba(17, 24, 39, 0.85);
    backdrop-filter: blur(15px);
    border-radius: 20px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.6);
    animation: fadeUp 1s ease;
}

@keyframes fadeUp {
    from { opacity: 0; transform: translateY(40px); }
    to { opacity: 1; transform: translateY(0); }
}

/* PROFILE IMAGE FLOAT */
.profile-img {
    width: 120px;
    transition: 0.4s ease;
}

.profile-img:hover {
    transform: scale(1.08) translateY(-6px);
}

/* DARK INPUT */
.dark-input {
    background: #1f2937;
    border: 1px solid #374151;
    color: white;
    padding: 12px;
    border-radius: 12px;
    transition: 0.3s ease;
}

.dark-input:focus {
    background: #111827;
    border-color: #6366f1;
    box-shadow: 0 0 12px rgba(99,102,241,0.6);
    color: white;
}

/* GRADIENT BUTTON */
.btn-gradient {
    background: linear-gradient(90deg, #6366f1, #8b5cf6);
    border: none;
    color: white;
    padding: 10px 25px;
    border-radius: 30px;
    transition: 0.3s ease;
}

.btn-gradient:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(99,102,241,0.6);
}

</style>

@endsection