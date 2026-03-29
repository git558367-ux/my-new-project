@extends('admin.layout.app')

@section('title', 'Products')

@section('content')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* GLOBAL DARK FIX */
        body,
        .container,
        .container-fluid,
        .content,
        .main-content {
            background: linear-gradient(45deg, black ,#233d4c) !important;
        }

        /* Bootstrap override */
        .card,
        .table,
        .bg-white {
            background: transparent !important;
        }

        /* Remove white wrapper */
        div[class*="bg-"] {
            background: transparent !important;
        }

        /* ===== PAGE BACKGROUND ===== */
        body {
            background: linear-gradient(135deg, #020617, #0f172a, #1e1b4b);
        }

        /* ===== TITLE ===== */
        .page-title {
            color: white;
            font-weight: 600;
            margin-bottom: 20px;
        }

        /* ===== STATS ===== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 15px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 16px;
            padding: 20px;
            transition: .3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
        }

        .stat-title {
            color: #94a3b8;
            font-size: 13px;
        }

        .stat-number {
            color: white;
            font-size: 24px;
            font-weight: 600;
        }

        /* ===== TOOLBAR ===== */
        .toolbar {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 15px;
        }

        .search-box {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 10px 12px;
            color: white;
            width: 220px;
        }

        .filter-select {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 10px;
            color: white;
        }

        .btn-add {
            background: linear-gradient(45deg, #3b82f6, #6366f1);
            border: none;
            padding: 10px 18px;
            text-decoration-line: none;
            border-radius: 10px;
            color: white;
            font-weight: 500;
            transition: .3s;
        }

        .btn-add:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.5);
        }

        /* ===== TABLE CARD ===== */
        .product-card {
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(20px);
            border-radius: 18px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            padding: 15px;
            box-shadow:
                0 10px 40px rgba(0, 0, 0, 0.6),
                inset 0 0 20px rgba(255, 255, 255, 0.03);
        }

        /* ===== TABLE ===== */
        .table,
        .product-table,
        .product-table tbody,
        .product-table tr,
        .product-table td,
        .product-table th {
            background: transparent !important;
        }

        .product-table {
            color: white;
        }

        .product-table thead {
            background: rgba(255, 255, 255, 0.04);
        }

        .product-table th {
            color: #94a3b8;
            font-size: 13px;
            border: none;
        }

        .product-table td {
            border: none;
            vertical-align: middle;
            color: #e2e8f0;
        }

        .product-table tbody tr {
            background: rgba(255, 255, 255, 0.02);
            transition: .3s;
        }

        .product-table tbody tr:hover {
            background: rgba(59, 130, 246, 0.08);
            transform: scale(1.01);
        }

        /* REMOVE BOOTSTRAP WHITE */
        .table-striped>tbody>tr:nth-of-type(odd) {
            background: transparent !important;
        }

        /* ===== IMAGE ===== */
        .product-img {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            object-fit: cover;
            transition: .3s;
        }

        .product-img:hover {
            transform: scale(1.2);
        }

        /* ===== STATUS ===== */
        .status {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .active-status {
            background: rgba(34, 197, 94, 0.2);
            color: #22c55e;
        }

        /* ===== ACTION ===== */
        .btn-action {
            border: none;
            background: none;
            font-size: 18px;
            margin-right: 8px;
            transition: .3s;
        }

        .btn-edit {
            color: #60a5fa;
        }

        .btn-delete {
            color: #f87171;
        }

        .btn-action:hover {
            transform: scale(1.2);
        }

        /* ===== CHECKBOX ===== */
        input[type="checkbox"] {
            accent-color: #6366f1;
            transform: scale(1.2);
        }
    </style>

    <div class="container-fluid">

        <h3 class="page-title">🚀 Products Manager</h3>

        <!-- ===== STATS ===== -->
        <div class="stats-grid">

            <div class="stat-card">
                <div class="stat-title">Total Products</div>
                <div class="stat-number">{{ $products->count() }}</div>
            </div>

            <div class="stat-card">
                <div class="stat-title">Active Products</div>
                <div class="stat-number">{{ $products->count() }}</div>
            </div>

            <div class="stat-card">
                <div class="stat-title">Average Price</div>
                <div class="stat-number">₹{{ round($products->avg('price')) }}</div>
            </div>

        </div>

        <!-- ===== TOOLBAR ===== -->
        <div class="toolbar">

            <div>
                <input type="text" id="searchInput" class="search-box" placeholder="🔍 Search product...">

                <select id="priceFilter" class="filter-select">
                    <option value="">All Price</option>
                    <option value="100">Below ₹100</option>
                    <option value="500">Below ₹500</option>
                    <option value="1000">Below ₹1000</option>
                </select>
            </div>

            <a href="{{ route('products.create') }}" class="btn-add">
                <i class="bi bi-plus"></i> Add Product
            </a>

        </div>

        <!-- ===== TABLE ===== -->
        <div class="product-card">
            <div class="table-responsive">

                <table class="table product-table" id="productTable">

                    <thead>
                        <tr>
                            <th><input type="checkbox" id="selectAll"></th>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($products as $product)
                            <tr>

                                <td><input type="checkbox" class="row-check"></td>

                                <td>#{{ $product->id }}</td>

                                <td>
                                    @if ($product->image)
                                        <img src="{{ asset('products/' . $product->image) }}" class="product-img">
                                    @endif
                                </td>

                                <td>{{ $product->name }}</td>

                                <td class="text-success fw-bold">₹{{ $product->price }}</td>

                                <td>
                                    <span class="status active-status">Active</span>
                                </td>

                                <td>

                                    <a href="{{ route('products.edit', $product->id) }}" class="btn-action btn-edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                        class="d-inline deleteForm">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-action btn-delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>

                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>

    </div>

    <script>
        /* SEARCH */
        document.getElementById("searchInput").addEventListener("keyup", function() {
            let value = this.value.toLowerCase()
            document.querySelectorAll("#productTable tbody tr").forEach(row => {
                let name = row.children[3].innerText.toLowerCase()
                row.style.display = name.includes(value) ? "" : "none"
            })
        })

        /* FILTER */
        document.getElementById("priceFilter").addEventListener("change", function() {
            let price = this.value
            document.querySelectorAll("#productTable tbody tr").forEach(row => {
                let rowPrice = parseInt(row.children[4].innerText)
                row.style.display = (price == "" || rowPrice < price) ? "" : "none"
            })
        })

        /* SELECT ALL */
        document.getElementById("selectAll").addEventListener("click", function() {
            document.querySelectorAll(".row-check").forEach(cb => {
                cb.checked = this.checked
            })
        })

        /* DELETE ALERT */
        document.querySelectorAll(".deleteForm").forEach(form => {
            form.addEventListener("submit", function(e) {
                e.preventDefault()
                Swal.fire({
                    title: "Delete Product?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#6366f1",
                    confirmButtonText: "Yes Delete"
                }).then(result => {
                    if (result.isConfirmed) {
                        form.submit()
                    }
                })
            })
        })
    </script>

@endsection
