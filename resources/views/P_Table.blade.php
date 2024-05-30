@include('layout/head')

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        @include('layout/sidebar')
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            @include('layout/header')
            <!--  Header End -->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title fw-semibold mb-4">Product Table</h5>

                            </div>
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="col-md-6 text-right">
                                <a href="/Product " class="btn btn-dark py-8 fs-4 mb-4 rounded-2">Add</a>
                            </div>
                        </div>
                        <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>S.NO</th>
                                    <th>CATEGORY</th>
                                    <th>HSN/TARIFF</th>
                                    <th>DIVISION</th>
                                    <th>MAJOR HEADS</th>
                                    <th>DESCRIPTION</th>
                                    <th>UOM</th>
                                    <th>PRICE</th>
                                    <th>OPTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $index => $product)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $product->category }}</td>
                                        <td>{{$product->hsn_code }}</td>
                                        <td>-----</td>
                                        <td>------</td>
                                        <td>{{ $product->description }}</td>
                                        <td>------</td>
                                        <td>₹{{ $product->production_prize }}</td>
                                        <td>
                                            <a href="/EditProduct/{{ $product->id }}" class="btn btn-sm btn-primary"
                                                title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                                style="display:inline;"
                                                onsubmit="return confirm('Are you sure you want to delete this product?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            <a href="/ViewProduct/{{ $product->id }}" class="btn btn-sm btn-dark" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>S.NO</th>
                                    <th>CATEGORY</th>
                                    <th>HSN/TARIFF</th>
                                    <th>DIVISION</th>
                                    <th>MAJOR HEADS</th>
                                    <th>DESCRIPTION</th>
                                    <th>UOM</th>
                                    <th>PRICE</th>
                                    <th>OPTIONS</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('.alert-success').style.display = 'none';
        }, 3000);

        // Remove error message after 3 seconds
        setTimeout(function() {
            document.getElementById('errorMessage').style.display = 'none';
        }, 3000);
    </script>
    @include('layout/script')
</body>

</html>
