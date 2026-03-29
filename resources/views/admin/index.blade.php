@extends('admin.layout.app')

@section('title', 'Admin Dashboard')

@section('content')

<canvas id="canvas"></canvas>

<style>

/* Canvas Background */

#canvas{
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
z-index:-1;
background:#020617;
}

/* Dashboard wrapper */

.dashboard-content{
position:relative;
z-index:2;
padding-top:10px;
}

/* Title */

.dashboard-title{
font-size:26px;
font-weight:600;
margin-bottom:25px;
color:white;
}

/* Cards */

.card-dashboard{
border-radius:16px;
padding:22px;
color:white;
display:flex;
justify-content:space-between;
align-items:center;
transition:.35s;
backdrop-filter:blur(10px);
box-shadow:0 15px 40px rgba(0,0,0,.35);
position:relative;
overflow:hidden;
}

/* Hover */

.card-dashboard:hover{
transform:translateY(-8px) scale(1.02);
box-shadow:0 25px 50px rgba(0,0,0,.5);
}

/* Card Icon Box */

.icon-box{
width:55px;
height:55px;
display:flex;
align-items:center;
justify-content:center;
border-radius:14px;
font-size:26px;
background:rgba(255,255,255,.15);
}

/* Card Colors */

.card-users{
background:linear-gradient(135deg,#3b82f6,#2563eb);
}

.card-orders{
background:linear-gradient(135deg,#10b981,#059669);
}

.card-products{
background:linear-gradient(135deg,#f59e0b,#d97706);
}

.card-revenue{
background:linear-gradient(135deg,#ef4444,#dc2626);
}

/* Card text */

.card-dashboard h6{
font-size:14px;
opacity:.9;
}

.card-dashboard h2{
font-size:28px;
font-weight:600;
margin-top:4px;
}

/* Card link */

.card-link{
text-decoration:none;
color:white;
}

/* Row spacing */

.row-dashboard{
row-gap:25px;
}

</style>

<div class="dashboard-content">

<h2 class="dashboard-title">Admin Dashboard</h2>

<div class="row row-dashboard">

<div class="col-lg-3 col-md-6">

<a href="{{ route('admin.users') }}" class="card-link">

<div class="card-dashboard card-users">

<div>
<h6>Total Users</h6>
<h2>{{ $userCount }}</h2>
</div>

<div class="icon-box">
<i class="bi bi-people"></i>
</div>

</div>

</a>

</div>

<div class="col-lg-3 col-md-6">

<div class="card-dashboard card-orders">

<div>
<h6>Total Orders</h6>
<h2>80</h2>
</div>

<div class="icon-box">
<i class="bi bi-cart"></i>
</div>

</div>

</div>

<div class="col-lg-3 col-md-6">

<a href="{{ route('products.index') }}" class="card-link">

<div class="card-dashboard card-products">

<div>
<h6>Total Products</h6>
<h2>{{ $productCount }}</h2>
</div>

<div class="icon-box">
<i class="bi bi-box"></i>
</div>

</div>

</a>

</div>

<div class="col-lg-3 col-md-6">

<div class="card-dashboard card-revenue">

<div>
<h6>Revenue</h6>
<h2>₹25k</h2>
</div>

<div class="icon-box">
<i class="bi bi-currency-rupee"></i>
</div>

</div>

</div>

</div>

</div>

<script>

/* Canvas Spider Animation */

let w,h
const canvas=document.getElementById("canvas")
const ctx=canvas.getContext("2d")

const{sin,cos,PI,hypot,min,max}=Math

function spawn(){

const pts=Array.from({length:333},()=>({
x:Math.random()*innerWidth,
y:Math.random()*innerHeight,
len:0,r:0
}))

const pts2=Array.from({length:9},(_,i)=>({
x:cos(i/9*PI*2),
y:sin(i/9*PI*2)
}))

let seed=Math.random()*100
let tx=Math.random()*innerWidth
let ty=Math.random()*innerHeight
let x=Math.random()*innerWidth
let y=Math.random()*innerHeight
let kx=.5
let ky=.5
let walkRadius={x:50,y:50}
let r=innerWidth/120

function paintPt(pt){
pts2.forEach(pt2=>{
if(!pt.len)return
drawLine(
lerp(x+pt2.x*r,pt.x,pt.len*pt.len),
lerp(y+pt2.y*r,pt.y,pt.len*pt.len),
x+pt2.x*r,
y+pt2.y*r
)
})
drawCircle(pt.x,pt.y,pt.r)
}

return{

follow(x,y){
tx=x
ty=y
},

tick(t){

const selfMoveX=cos(t*kx+seed)*walkRadius.x
const selfMoveY=sin(t*ky+seed)*walkRadius.y

let fx=tx+selfMoveX
let fy=ty+selfMoveY

x+=min(innerWidth/100,(fx-x)/10)
y+=min(innerWidth/100,(fy-y)/10)

let i=0

pts.forEach(pt=>{

const dx=pt.x-x
const dy=pt.y-y

const len=hypot(dx,dy)

let r=min(2,innerWidth/len/5)

const increasing=len<innerWidth/10&&(i++)<8

let dir=increasing?.1:-.1

if(increasing)r*=1.5

pt.r=r
pt.len=max(0,min(pt.len+dir,1))

paintPt(pt)

})

}

}

}

const spiders=[spawn(),spawn()]

addEventListener("pointermove",e=>{
spiders.forEach(s=>s.follow(e.clientX,e.clientY))
})

requestAnimationFrame(function anim(t){

if(w!==innerWidth)w=canvas.width=innerWidth
if(h!==innerHeight)h=canvas.height=innerHeight

ctx.fillStyle="#020617"
ctx.fillRect(0,0,w,h)

ctx.strokeStyle="#ffffff"

t/=1000

spiders.forEach(s=>s.tick(t))

requestAnimationFrame(anim)

})

function drawCircle(x,y,r){
ctx.beginPath()
ctx.ellipse(x,y,r,r,0,0,PI*2)
ctx.fill()
}

function drawLine(x0,y0,x1,y1){

ctx.beginPath()
ctx.moveTo(x0,y0)

for(let i=0;i<100;i++){

let t=(i+1)/100
let x=lerp(x0,x1,t)
let y=lerp(y0,y1,t)

ctx.lineTo(x,y)

}

ctx.stroke()

}

function lerp(a,b,t){
return a+(b-a)*t
}

</script>

@endsection
