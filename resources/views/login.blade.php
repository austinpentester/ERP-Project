@include('layout/head')
<style>
    .bg {
        @if (!empty($company_dts->company_img))
            background-image: url('{{ asset($company_dts->company_img) }}');
        @else
            background-image: none;
        @endif
        /* Ensure the background properties are set */
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
    }
</style>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper bg" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                @if (isset($company_dts))
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="{{ asset($company_dts->company_logo) }}" width="80" alt="">
                </a>
                @else
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="" width="80" alt="">
                </a>
                @endif
                <div>
                    @if(session('login_msg'))
                        <div class="alert alert-danger">
                            {{ session('login_msg') }}
                        </div>
                    @endif
                </div>
                {{-- <p class="text-center">Your Social Campaigns</p> --}}
                <form action="{{route('login_ck')}}" method="post">
                @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username">
                    </div>
                    <div class="mb-4">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" id="showPassword">
                            <label class="form-check-label form-label" for="showPassword">
                                Show Password
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="form-check">
                            <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                            <label class="form-check-label text-dark" for="flexCheckChecked">
                                Remember this Device
                            </label>
                        </div>
                        <a class="text-primary fw-bold" href="{{url('forget_pass_link')}}">Forgot Password?</a>
                    </div>
                    <div>
                      <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Log in</button>
                    </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    document.getElementById('showPassword').addEventListener('change', function() {
        var passwordInput = document.getElementById('exampleInputPassword1');
        if (this.checked) {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    });
</script>
  <!-- @include('layout/script') -->
</body>

</html>
