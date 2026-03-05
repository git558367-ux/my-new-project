@extends('layout.app')

@section('title', 'Login Page')

@section('main')

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- Particles JS -->
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>

<div id="particles-js"></div>

<div class="login-wrapper d-flex justify-content-center align-items-center">

    <div class="login-card">

        <div class="login-header text-center">
            <h2>Welcome Back</h2>
            <p>Login to access your dashboard</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input-group-custom">
                <i class="fa-solid fa-envelope icon"></i>
                <input type="email" name="email" placeholder="Email Address" required autofocus>
            </div>

            <div class="input-group-custom">
                <i class="fa-solid fa-lock icon"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <button type="submit" class="login-btn">
                <i class="fa-solid fa-right-to-bracket me-2"></i> Login
            </button>

        </form>

    </div>
</div>

<style>

/* Fullscreen particles background */
#particles-js {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #0f0f0f;
    z-index: 0;   /* -1 mat rakho */
}

/* Center wrapper */
.login-wrapper {
    min-height: 100vh;
    position: relative;
    z-index: 2;
}

/* Glass card */
.login-card {
    width: 420px;
    padding: 40px;
    border-radius: 20px;
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(15px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.6);
    color: #fff;
}

.login-header h2 {
    font-weight: 700;
}

.login-header p {
    font-size: 14px;
    opacity: 0.7;
    margin-bottom: 30px;
}

/* Input with icon */
.input-group-custom {
    position: relative;
    margin-bottom: 20px;
}

.input-group-custom input {
    width: 100%;
    padding: 12px 15px 12px 45px;
    border-radius: 12px;
    border: none;
    background: #1f1f1f;
    color: #fff;
}

.input-group-custom input:focus {
    outline: none;
    box-shadow: 0 0 0 2px #667eea;
}

.icon {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #888;
}

/* Button */
.login-btn {
    width: 100%;
    padding: 12px;
    border-radius: 30px;
    border: none;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    font-weight: 600;
    transition: 0.3s;
}

.login-btn:hover {
    box-shadow: 0 0 20px #667eea;
}
#particles-js canvas {
    pointer-events: auto;
}

</style>

<script>
document.addEventListener("DOMContentLoaded", function () {

particlesJS("particles-js", {
  "particles": {
    "number": { "value": 80 },
    "color": { "value": "#667eea" },
    "shape": { "type": "circle" },
    "opacity": { "value": 0.5 },
    "size": { "value": 3, "random": true },
    "line_linked": {
      "enable": true,
      "distance": 150,
      "color": "#667eea",
      "opacity": 0.4,
      "width": 1
    },
    "move": {
      "enable": true,
      "speed": 2,
      "attract": {
        "enable": true,
        "rotateX": 1000,
        "rotateY": 1000
      }
    }
  },
  "interactivity": {
    "detect_on": "window",   /* THIS IS THE KEY FIX */
    "events": {
      "onhover": {
        "enable": true,
        "mode": "grab"
      },
      "onclick": {
        "enable": true,
        "mode": "push"
      }
    },
    "modes": {
      "grab": {
        "distance": 200,
        "line_linked": { "opacity": 1 }
      },
      "push": {
        "particles_nb": 4
      }
    }
  },
  "retina_detect": true
});

});
</script>
@endsection