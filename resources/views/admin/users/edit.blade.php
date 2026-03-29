@extends('admin.layout.app')

@section('title','Edit Profile')

@section('content')

<style>

/* BACKGROUND */
body{
    background:#0f172a;
}

/* CONTAINER */
.edit-container{
    max-width:900px;
    margin:40px auto;
}

/* CARD */
.edit-card{
    background:rgba(255,255,255,0.05);
    backdrop-filter:blur(15px);
    border-radius:20px;
    padding:40px;
    box-shadow:0 20px 60px rgba(0,0,0,0.6);
    color:white;
    animation:fadeUp 0.8s ease;
}

@keyframes fadeUp{
    from{opacity:0;transform:translateY(40px);}
    to{opacity:1;transform:translateY(0);}
}

/* HEADER */
.edit-header{
    text-align:center;
    margin-bottom:30px;
}

.edit-title{
    font-size:28px;
    font-weight:600;
}

/* AVATAR */
.avatar-wrapper{
    display:flex;
    justify-content:center;
    margin-bottom:25px;
}

.avatar{
    width:120px;
    height:120px;
    border-radius:50%;
    object-fit:cover;
    border:3px solid rgba(255,255,255,0.2);
    cursor:pointer;
    transition:0.3s;
}

.avatar:hover{
    transform:scale(1.05);
}

/* FORM */
.form-group{
    margin-bottom:20px;
}

.form-label{
    color:#94a3b8;
    font-size:14px;
}

.form-control{
    background:rgba(255,255,255,0.05);
    border:none;
    color:white;
    padding:12px;
    border-radius:8px;
}

.form-control:focus{
    outline:none;
    box-shadow:0 0 10px rgba(99,102,241,0.5);
}

/* BUTTON */
.save-btn{
    background:linear-gradient(45deg,#6366f1,#8b5cf6);
    border:none;
    padding:12px 35px;
    border-radius:8px;
    color:white;
    font-weight:600;
    transition:0.3s;
}

.save-btn:hover{
    transform:scale(1.05);
    box-shadow:0 10px 30px rgba(99,102,241,0.6);
}

</style>

<div class="edit-container">

<div class="edit-card">

<div class="edit-header">
    <div class="edit-title">Edit Profile</div>
</div>

@php $user = Auth::user(); @endphp

<form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- AVATAR -->
    <div class="avatar-wrapper">

        @if($user->image)
            <img src="{{ asset('storage/'.$user->image) }}" class="avatar" id="preview">
        @else
            <img src="https://ui-avatars.com/api/?name={{ $user->name }}" class="avatar" id="preview">
        @endif

    </div>

    <div class="form-group">
        <label class="form-label">Upload Profile Image</label>
        <input type="file" name="image" class="form-control" onchange="previewImage(event)">
    </div>

    <!-- NAME -->
    <div class="form-group">
        <label class="form-label">Full Name</label>
        <input type="text" name="name" value="{{ $user->name }}" class="form-control">
    </div>

    <!-- EMAIL (readonly) -->
    <div class="form-group">
        <label class="form-label">Email</label>
        <input type="text" value="{{ $user->email }}" class="form-control" readonly>
    </div>

    <div class="text-center mt-4">
        <button class="save-btn">Update Profile</button>
    </div>

</form>

</div>

</div>

<script>
function previewImage(event){
    const reader = new FileReader();
    reader.onload = function(){
        document.getElementById('preview').src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}
</script>

@endsection