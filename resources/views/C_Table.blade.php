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
                                <h5 class="card-title fw-semibold mb-4">Customer Table</h5>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="/customer_details" class="btn btn-dark py-8 fs-4 mb-4 rounded-2">Add</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>S.NO</th>
                                        <th>Customer Id</th>
                                        <th>Branch</th>
                                        <th>Customer Name</th>
                                        <th>Phone No</th>
                                        <th>Email</th>
                                        <th>Contact Person Name</th>
                                        <th>Contact Person Number</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1 ?>
                                    @foreach ($datas as $data)
                                    <?php
                                        $data1 = DB::table('contact_details')->where('customerId',$data->id)->first();
                                        // dd($data1);
                                        // dd($data);
                                        // $data1 = $data1 ? $data1 : null;
                                    ?>
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$data->cus_id}}</td>
                                        <td>{{$data->branch}}</td>
                                        <td>{{$data->customerName}}</td>
                                        <td>{{$data->mobileNumber}}</td>
                                        <td>{{$data->email}}</td>
                                        @if ($data1)
                                            <td>{{$data1->contactPersonName}}</td>
                                            <td>{{$data1->contactMobileNumber}}</td>
                                        @else
                                            <td>-</td>
                                            <td>-</td>
                                        @endif
                                        <td>
                                            <a href="{{url('c_edit',['id'=>$data->id])}}" class="btn btn-sm btn-primary" title="Edit"><i
                                                    class="fas fa-edit"></i></a>
                                            <a href="{{url('c_dlt',['id'=>$data->id])}}" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this unit?');"><i
                                                    class="fas fa-trash"></i></a>
                                            <a href="{{url('c_view',['id'=>$data->id])}}" class="btn btn-sm btn-success" title="View"><i
                                                    class="fas fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++ ?>
                                    @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout/script')
</body>

</html>
