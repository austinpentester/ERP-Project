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
                <!--  -->
                <div>
                    <div class="text-center">
                        <h2>View Products</h2>
                    </div>
                    <div>
                        @if(session('ins'))
                            <div class="alert alert-danger">
                                {{ session('ins') }}
                            </div>
                        @endif
                    </div>
                    <div>
                        <!-- <form action="{{route('sup_product_upd',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                        @csrf -->
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="" class="form-label">Product Name</label>
                                    <input type="text" name="pr_name" id="" class="form-control" required value="{{$data->pr_name}}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Product Category</label>
                                    <input type="text" name="pr_cat" id="" class="form-control" value="{{$data->pr_cat}}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Branch</label>
                                    <input type="text" name="branch" id="" class="form-control" value="{{$data->branch}}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Product Image</label>
                                    <img src="{{ asset($data->pr_img) }}" alt="bg_img" width="100px">
                                    <!-- <input type="file" name="pr_img" id="" class="form-control"> -->
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Measurement</label>
                                    <input type="text" name="measurement" id="" class="form-control" value="{{$data->measurement}}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">HSN / Code</label>
                                    <input type="text" name="hsn_code" id="" class="form-control" value="{{$data->hsn_code}}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Description</label>
                                    <textarea class="form-control" id="" rows="3" name="desc" readonly>{{$data->description}}</textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Initial Stocks</label>
                                    <input type="number" name="stock" id="" class="form-control" value="{{$data->stock}}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Lot No</label>
                                    <input type="text" name="lot_no" id="" class="form-control" value="{{$data->stock}}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Quantity Alert</label>
                                    <input type="number" name="qty" id="" class="form-control" value="{{$data->qty}}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Production Prize</label>
                                    <input type="number" name="pr_prize" id="" class="form-control" value="{{$data->pr_prize}}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">MRP</label>
                                    <input type="number" name="mrp" id="" class="form-control" value="{{$data->mrp}}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Sale Prize</label>
                                    <input type="number" name="sale" id="" class="form-control" value="{{$data->sale}}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Expiry Date</label>
                                    <input type="date" name="exp_date" id="" class="form-control" value="{{$data->exp_date}}" readonly>
                                </div>
                            </div>
                            <!-- <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div> -->
                        <!-- </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout/script')
</body>

</html>
