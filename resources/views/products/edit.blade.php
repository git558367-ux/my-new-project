@extends('layout.app')

@section('title', 'Edit Product')

@section('main')

    <div id="particles-js"></div>

    <style>
        label {
            color: white;
        }

        /* background */

        #particles-js {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;

            background:
                radial-gradient(circle at 30% 40%, #2e1065 0%, transparent 40%),
                radial-gradient(circle at 70% 60%, #1e1b4b 0%, transparent 40%),
                #020617;
        }

        /* form */
        .form-card {

            background: rgba(255, 255, 255, 0);
            /* transparent background */

            /* backdrop-filter: blur(15px);          glass blur effect */
            /* -webkit-backdrop-filter: blur(15px); */

            border: 1px solid rgba(255, 255, 255, 0.15);

            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.6);

            border-radius: 16px;
            margin-bottom: 90px;
            margin-top: 70px;
            padding: 40px;

        }

        /* title */

        .form-title {
            color: white;
            text-align: center;
            font-size: 30px;
            margin-bottom: 25px;
            text-shadow: 0 0 15px #a855f7;
        }

        /* inputs */

        .form-control {
            background: #fdfcff;
            color: #fdfcff border:1px solid #4c1d95;
            color: rgb(18, 18, 18);
        }

        .form-control:focus {
            background: #0b0618;
            color: white;
            border-color: #a855f7;
            box-shadow: 0 0 10px #a855f7;
        }

        /* button */

        .btn-purple {
            background: #ffffff00;
            border: none;
            color: rgb(255, 255, 255);
            margin: 50px;
            padding: 10px 90px;
            !important color: rgb(239, 237, 237);
            border-radius: 8px;
            transition: .3s;
        }

        .btn-purple:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(168, 85, 247, 0.6);
        }
    </style>

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="form-card">

                    <h2 class="form-title">EDIT PRODUCT</h2>

                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Price</label>
                            <input type="text" name="price" value="{{ $product->price }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control">{{ $product->description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="text-center mt-3">
                            <button class="btn-purple">
                                Update Product
                            </button>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>

     <script>
     particlesJS("particles-js",{

particles:{

number:{
value:180,
density:{
enable:true,
value_area:900
}
},

color:{
value:"#a855f7"
},

shape:{
type:"star"
},

opacity:{
value:1,
random:true,
anim:{
enable:true,
speed:1,
opacity_min:0.2
}
},

size:{
value:2,
random:true,
anim:{
enable:true,
speed:2,
size_min:0.5
}
},

line_linked:{
enable:false
},

move:{
enable:true,
speed:0.8,
direction:"none",
random:true,
straight:false,
out_mode:"out",
attract:{
enable:true,
rotateX:600,
rotateY:1200
}
}

},

interactivity:{

detect_on:"window",

events:{

onhover:{
enable:true,
mode:["repulse","grab"]
},

onclick:{
enable:true,
mode:"push"
},

resize:true
},

modes:{

repulse:{
distance:120,
duration:0.6
},

grab:{
distance:140,
line_linked:{
opacity:0.3
}
},

push:{
particles_nb:4
}

}

},

retina_detect:true

});
    </script>


@endsection
