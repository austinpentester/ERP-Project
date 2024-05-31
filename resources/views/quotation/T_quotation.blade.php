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
                                <h5 class="card-title fw-semibold mb-4">Quotation List</h5>
                            </div>
                            <div>
                                @if(session('ins'))
                                <div class="alert alert-success">
                                    {{ session('ins') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-md-6 text-right" style="width: -webkit-fill-available;">
                                <a href="/quotation" class="btn btn-dark py-8 fs-4 mb-4 rounded-2" style="float: right;"> New Quotation </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>S.NO</th>
                                        <th>Quotation Number</th>
                                        <th>Customer Name</th>
                                        <th>Quotation Date</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

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
