<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">

<title>@yield('title')</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

/* BODY */

body{
background:#020617;
font-family: 'Poppins', sans-serif;
color:white;
overflow-x:hidden;
}
.admin-navbar{
margin-left:260px;
}

/* Animated Background */

body::before{
content:"";
position:fixed;
width:100%;
height:100%;
background:
radial-gradient(circle at 20% 30%,#3b82f6 0%,transparent 25%),
radial-gradient(circle at 80% 70%,#9333ea 0%,transparent 25%),
radial-gradient(circle at 50% 90%,#06b6d4 0%,transparent 25%);
filter:blur(120px);
opacity:.4;
z-index:-1;
animation:bgmove 15s infinite alternate;
}

@keyframes bgmove{
0%{transform:scale(1);}
100%{transform:scale(1.3);}
}

/* WRAPPER */

.wrapper{
display:flex;
min-height:100vh;
}

/* CONTENT */

.content{
margin-left:260px;
padding:30px;
width:100%;
animation:fadeIn .6s ease;
}

/* FADE ANIMATION */

@keyframes fadeIn{
from{
opacity:0;
transform:translateY(10px);
}
to{
opacity:1;
transform:translateY(0);
}
}

/* DASHBOARD CARDS */

.card-dark{
background:rgba(30,41,59,.7);
backdrop-filter:blur(12px);
border:none;
border-radius:16px;
color:white;
transition:.3s;
box-shadow:0 10px 25px rgba(0,0,0,.3);
}

.card-dark:hover{
transform:translateY(-6px);
box-shadow:0 20px 40px rgba(0,0,0,.5);
}

/* TABLE */

.table{
border-radius:10px;
overflow:hidden;
}

.table thead{
background:#1e293b;
}

/* BUTTONS */

.btn-primary{
background:#2563eb;
border:none;
}

.btn-primary:hover{
background:#1d4ed8;
}

/* SCROLLBAR */

::-webkit-scrollbar{
width:6px;
}

::-webkit-scrollbar-thumb{
background:#475569;
border-radius:10px;
}

</style>

</head>

<body>

{{-- NAVBAR --}}
@include('admin.include.nav')

<div class="wrapper">

{{-- SIDEBAR --}}
@include('admin.include.sidebar')

{{-- MAIN CONTENT --}}
<div class="content">

@yield('content')

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>