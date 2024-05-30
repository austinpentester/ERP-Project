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

                    <button class="btn btn-dark mt-3" onclick="history.back()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16" style="margin-right: 5px;">
                            <path fill-rule="evenodd" d="M5.854 3.646a.5.5 0 0 0-.708 0L1.5 7.293a.5.5 0 0 0 0 .707l3.646 3.647a.5.5 0 0 0 .708-.708L2.707 8H13.5a.5.5 0 0 0 0-1H2.707l3.147-3.146a.5.5 0 0 0 0-.708z"/>
                        </svg>
                        Back
                    </button>


                <div class="card mt-3">
                    <div class="card-body">

                        <h5 class="card-title fw-semibold mb-4">Position  Details</h5>
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                        <form action="{{ route('insertPosition') }}" method="POST">
                            @csrf
                            <div class="row">

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="exampleInputEmail1" class="form-label required-field">Position
                                        </label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="Position" required>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class="mb-3 form-group">
                                        <button type="submit" class="btn btn-dark">Submit</button>
                                    </div>
                                </div>

                            </div>
                        </form>


                    </div>
                </div>



            </div>
        </div>
        <script>
             document.getElementById('inputGroupFile01').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.getElementById('imagePreview');
                img.src = e.target.result;
                img.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            const img = document.getElementById('imagePreview');
            img.style.display = 'none';
            img.src = '#';
        }
    });
        </script>
        @include('layout/head')
</body>

</html>
