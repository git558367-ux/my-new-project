@extends('admin.layout.app')

@section('title', 'Add Product')

@section('content')

    <style>
        .container-fluid{
            background: linear-gradient(60deg, #cbdde9, #2872a1);
        }
        /* PAGE TITLE */

        .page-title {
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 20px;
            color: white;
        }

        /* FORM CARD */

        .form-card {
            background: #020617;
            border: 1px solid #1e293b;
            border-radius: 14px;
            padding: 25px;
            max-width: 650px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .4);
        }

        /* LABEL */

        .form-label {
            color: #94a3b8;
            font-size: 14px;
        }

        /* INPUT */

        .form-control {
            background: #020617;
            border: 1px solid #334155;
            color: white;
            border-radius: 8px;
        }

        .form-control:focus {
            background: #020617;
            color: white;
            border-color: #3b82f6;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, .2);
        }

        /* IMAGE UPLOAD */

        .upload-box {
            border: 2px dashed #334155;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: .3s;
        }

        .upload-box:hover {
            border-color: #3b82f6;
            background: #1e293b;
        }

        .upload-box img {
            max-width: 120px;
            margin-top: 10px;
            border-radius: 8px;
        }

        /* BUTTON */

        .btn-save {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            color: white;
        }

        .btn-save:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(59, 130, 246, .4);
        }
    </style>

    <div class="container-fluid">

        <div class="page-title">
            Add New Product
        </div>

        <div class="form-card">

            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <!-- NAME -->

                <div class="mb-3">

                    <label class="form-label">Product Name</label>

                    <input type="text" name="name" class="form-control" placeholder="Enter product name">

                </div>

                <!-- DESCRIPTION -->

                <div class="mb-3">

                    <label class="form-label">Description</label>

                    <textarea name="description" rows="4" class="form-control" placeholder="Product description"></textarea>

                </div>

                <!-- PRICE -->

                <div class="mb-3">

                    <label class="form-label">Price</label>

                    <input type="number" name="price" class="form-control" placeholder="Enter price">

                </div>

                <!-- IMAGE -->

                <div class="mb-3">

                    <label class="form-label">Product Image</label>

                    <div class="upload-box">

                        <input type="file" name="image" id="imageInput" hidden>

                        <div onclick="document.getElementById('imageInput').click()">

                            <i class="bi bi-cloud-upload fs-2 text-secondary"></i>

                            <p class="text-secondary mb-0">Click to upload image</p>

                            <img id="preview">

                        </div>

                    </div>

                </div>

                <button class="btn btn-save">

                    <i class="bi bi-check-circle"></i> Save Product

                </button>

            </form>

        </div>

    </div>

    <script>
        /* IMAGE PREVIEW */

        document.getElementById("imageInput").addEventListener("change", function(e) {

            let reader = new FileReader()

            reader.onload = function() {

                document.getElementById("preview").src = reader.result

            }

            reader.readAsDataURL(e.target.files[0])

        })
    </script>

@endsection
