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
                                <h5 class="card-title fw-semibold mb-4">Branch Table</h5>
                            </div>

                            <div class="col-md-6 text-right">
                                <a href="{{route('branch')}}" class="btn btn-dark py-8 fs-4 mb-4 rounded-2">Add</a>
                            </div>
                        </div>
                        <div>
                            @if(session('ins'))
                                <div class="alert alert-success">
                                    {{ session('ins') }}
                                </div>
                            @endif
                        </div>
                        <div class="table-responsive">
    <table class="table table-bordered" id="example" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th class="text-center">S.NO</th>
                <th class="text-center">Id</th>
                <th class="text-center">Company Name</th>
                <th class="text-center">Company Email</th>
                <th class="text-center">Company Address</th>
                <th class="text-center">Company Mobile</th>
                <th class="text-center">GST</th>
                <th class="text-center">PAN</th>
                <th class="text-center">Login Background Image</th>
                <th class="text-center">Company Logo</th>
                <th class="text-center">Bank Name</th>
                <th class="text-center">Accountant Name</th>
                <th class="text-center">Account No</th>
                <th class="text-center">Branch Name</th>
                <th class="text-center">IFSC</th>
                <th class="text-center">MICR</th>
                <th class="text-center">Branch Code</th>
                <th class="text-center">Swift Code</th>
                <th class="text-center">Create Date</th>
                <th class="text-center">Edit/Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1 ?>
            @foreach($datas as $data)
                <tr>
                    <td class="text-center">{{$i}}</td>
                    <td class="text-center">{{$data->id}}</td>
                    <td>{{$data->company_name}}</td>
                    <td>{{$data->company_email}}</td>
                    <td>{{$data->company_address}}</td>
                    <td>{{$data->company_mobile_number}}</td>
                    <td>{{$data->gst}}</td>
                    <td>{{$data->pan}}</td>
                    <td><img src="{{asset($data->company_img)}}" alt="" width="50px"></td>
                    <td><img src="{{asset($data->company_logo)}}" alt="" width="50px"></td>
                    <td>{{$data->bank_name}}</td>
                    <td>{{$data->ac_name}}</td>
                    <td>{{$data->ac_no}}</td>
                    <td>{{$data->branch_name}}</td>
                    <td>{{$data->ifsc}}</td>
                    <td>{{$data->micr}}</td>
                    <td>{{$data->branch_code}}</td>
                    <td>{{$data->swift_code}}</td>
                    <td>{{$data->entry_date}}</td>
                    <td class="text-center">
                        <a href="{{route('company_details_edit',['id'=>$data->id])}}" class="btn btn-sm btn-primary" title="Edit"><i class="fas fa-edit"></i></a>
                        <a href="{{route('company_details_delete',['id'=>$data->id])}}" class="btn btn-sm btn-danger" title="Delete"><i class="fas fa-trash"></i></a>
                        <a href="{{route('company_details_view',['id'=>$data->id])}}" class="btn btn-sm btn-success" title="View"><i class="fas fa-eye"></i></a>
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
    </div>
    @include('layout/script')
</body>

</html>
