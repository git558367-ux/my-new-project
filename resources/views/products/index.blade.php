@extends('layout.app')

@section('title', 'Products')

@section('main')

    <div id="particles-js"></div>

    <style>
        /* ===== background ===== */

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

        /* ===== title ===== */

        .page-title {
            color: white;
            text-align: center;
            margin-top: 60px;
            margin-bottom: 20px;
            font-size: 40px;
            letter-spacing: 3px;
            text-shadow: 0 0 20px #a855f7;
            background: transparent;
        }

        /* ===== add button ===== */

        .btn-add {
            background: linear-gradient(135deg, #9333ea, #6366f1);
            border: none;
            color: white;
            padding: 10px 30px;
            border-radius: 10px;
            font-weight: 500;
            transition: .3s;
        }

        .btn-add:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(168, 85, 247, 0.6);
            color: white;
        }

        /* ===== product card ===== */

        .product-card {
            background: rgba(255, 255, 255, 0);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 18px;
            padding: 18px;
            transition: .4s;
            height: 100%;
            overflow: hidden;
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(168, 85, 247, 0.4);
        }
        .card-p{
            margin: 80px ;
        }

        /* ===== product image ===== */

        .product-img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 12px;
            transition: 0.4s;
        }

        .product-card:hover .product-img {
            transform: scale(1.08);
        }

        /* ===== name ===== */

        .product-name {
            color: white;
            font-size: 20px;
            font-weight: 600;
            margin-top: 12px;
        }

        /* ===== price ===== */

        .product-price {
            color: #a855f7;
            font-size: 18px;
            font-weight: 600;
        }

        .container {
            background: transparent !important;
        }

        /* ===== buttons ===== */

        .btn-edit {
            background: #22c55e;
            border: none;
            padding: 7px 18px;
            color: white;
            border-radius: 7px;
            margin-right: 5px;
            transition: .3s;
        }

        .btn-delete {
            background: #ef4444;
            border: none;
            padding: 7px 18px;
            color: white;
            border-radius: 7px;
            transition: .3s;
        }

        .btn-edit:hover,
        .btn-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
        }
    </style>


    <div class="container">

        <h1 class="page-title">PRODUCTS</h1>

        <div class="text-center mb-4">

            <a href="{{ route('products.create') }}" class="btn-add">
                + Add Product
            </a>

        </div>

        <div class="row g-4 card-p">

            @foreach ($products as $product)
                <div class="col-md-4">

                    <div class="product-card">

                        <img src="{{ asset('uploads/' . $product->image) }}" class="product-img">

                        <h4 class="product-name">
                            {{ $product->name }}
                        </h4>

                        <p class="product-price">
                            ₹ {{ $product->price }}
                        </p>

                        <div class="mt-3">

                            <a href="{{ route('products.edit', $product->id) }}" class="btn-edit">
                                Edit
                            </a>

                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                style="display:inline">

                                @csrf
                                @method('DELETE')

                                <button class="btn-delete">
                                    Delete
                                </button>

                            </form>

                        </div>

                    </div>

                </div>
            @endforeach

        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script>
        particlesJS("particles-js", {

            particles: {

                number: {
                    value: 180,
                    density: {
                        enable: true,
                        value_area: 900
                    }
                },

                color: {
                    value: "#a855f7"
                },

                shape: {
                    type: "circle"
                },

                opacity: {
                    value: 0.6,
                    random: true,
                    anim: {
                        enable: true,
                        speed: 1,
                        opacity_min: 0.2
                    }
                },

                size: {
                    value: 2,
                    random: true,
                    anim: {
                        enable: true,
                        speed: 2,
                        size_min: 0.5
                    }
                },

                line_linked: {
                    enable: false
                },

                move: {
                    enable: true,
                    speed: 0.8,
                    direction: "none",
                    random: true,
                    straight: false,
                    out_mode: "out",
                    attract: {
                        enable: true,
                        rotateX: 600,
                        rotateY: 1200
                    }
                }

            },

            interactivity: {

                detect_on: "window",

                events: {

                    onhover: {
                        enable: true,
                        mode: ["repulse", "grab"]
                    },

                    onclick: {
                        enable: true,
                        mode: "push"
                    },

                    resize: true
                },

                modes: {

                    repulse: {
                        distance: 120,
                        duration: 0.6
                    },

                    grab: {
                        distance: 140,
                        line_linked: {
                            opacity: 0.3
                        }
                    },

                    push: {
                        particles_nb: 4
                    }

                }

            },

            retina_detect: true

        });
    </script>


@endsection
