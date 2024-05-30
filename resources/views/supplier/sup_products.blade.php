@include('layout/head')
<?php use Illuminate\Support\Facades\DB;
?>
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
                                <h5 class="card-title fw-semibold mb-4">Supplier Products List</h5>
                            </div>
                            <div>
                                @if(session('ins'))
                                    <div class="alert alert-success">
                                        {{ session('ins') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6 text-right" style="width: -webkit-fill-available;">
                                <a href="{{route('sup_product_cr')}}" class="btn btn-dark py-8 fs-4 mb-4 rounded-2" style="float: right;">Create New Product</a>
                            </div>
                        </div>
                        <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>S.NO</th>
                                    <th>Product Name</th>
                                    <th>Product Category</th>
                                    <th>Branch</th>
                                    <th>Product Image</th>
                                    <th>Stock</th>
                                    <th>MRP</th>
                                    <th>Sale</th>
                                    <th>Expiry Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; ?>
                                @foreach ($datas as $data)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$data->pr_name}}</td>
                                        <td>{{$data->pr_cat}}</td>
                                        <td>{{$data->branch}}</td>
                                        <td>{{$data->pr_img}}</td>
                                        <td>{{$data->stock}}</td>
                                        <td>{{$data->mrp}}</td>
                                        <td>{{$data->sale}}</td>
                                        <td>{{$data->exp_date}}</td>
                                        <td>
                                            <a href="{{url('c_edit',['id'=>$data->id])}}" class="btn btn-sm btn-primary" title="Edit"><i
                                                    class="fas fa-edit"></i></a>
                                            <a href="{{url('c_dlt',['id'=>$data->id])}}" class="btn btn-sm btn-danger" title="Delete"><i
                                                    class="fas fa-trash"></i></a>
                                            <a href="{{url('c_view',['id'=>$data->id])}}" class="btn btn-sm btn-success" title="View"><i 
                                                    class="fas fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++ ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout/script')
</body>

</html>
