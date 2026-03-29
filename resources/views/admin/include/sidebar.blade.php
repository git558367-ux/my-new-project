<style>

.sidebar{
width:260px;
height:100vh;
background:linear-gradient(180deg,#020617,#020617,#0f172a);
position:fixed;
left:0;
top:0;
padding-top:20px;
box-shadow:5px 0 30px rgba(0,0,0,.5);
border-right:1px solid #1e293b;
overflow-y:auto;
}

/* LOGO */

.sidebar-logo{
color:white;
font-size:22px;
font-weight:600;
text-align:center;
padding:20px;
margin-bottom:25px;
letter-spacing:1px;
border-bottom:1px solid #1e293b;
}

/* MENU LINKS */

.sidebar a{
display:flex;
align-items:center;
gap:14px;
padding:14px 25px;
color:#94a3b8;
text-decoration:none;
font-size:15px;
margin:6px 10px;
border-radius:10px;
transition:all .3s ease;
position:relative;
}

/* ICON */

.sidebar a i{
font-size:18px;
transition:.3s;
}

/* HOVER EFFECT */

.sidebar a:hover{
background:#1e293b;
color:white;
transform:translateX(6px);
}

.sidebar a:hover i{
color:#3b82f6;
}

/* ACTIVE MENU */

.sidebar a.active{
background:#1e293b;
color:white;
}

.sidebar a.active::before{
content:"";
position:absolute;
left:-10px;
top:0;
height:100%;
width:4px;
background:#3b82f6;
border-radius:5px;
}

/* SCROLLBAR */

.sidebar::-webkit-scrollbar{
width:5px;
}

.sidebar::-webkit-scrollbar-thumb{
background:#334155;
border-radius:10px;
}

/* MENU GROUP TITLE */

.menu-title{
color:#475569;
font-size:12px;
padding:10px 25px;
margin-top:10px;
text-transform:uppercase;
letter-spacing:1px;
}

</style>


<div class="sidebar">

<div class="sidebar-logo">
<i class="bi bi-hospital"></i> Clinic Admin
</div>

<div class="menu-title">Main</div>

<a href="{{ route('admin.index') }}" class="active">
<i class="bi bi-speedometer2"></i>
Dashboard
</a>

<a href="{{ route('admin.users') }}">
<i class="bi bi-people"></i>
Users
</a>

<a href="{{ route('products.index') }}">
<i class="bi bi-box-seam"></i>
Products
</a>

<div class="menu-title">Management</div>

<a href="#">
<i class="bi bi-cart"></i>
Orders
</a>

<a href="#">
<i class="bi bi-gear"></i>
Settings
</a>

</div>