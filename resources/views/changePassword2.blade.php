@include('layout/head')
<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="{{asset($data->company_img)}}" width="180" alt="">
                </a>
                <p class="text-center">Change Password</p>
                <div>
                @if(session('ck_pass'))
                    <div class="alert alert-danger">
                        {{ session('ck_pass') }}
                    </div>
                @endif
            </div>
                <form action="{{route('changePass_upd',['id'=>$data->id])}}" method="post">
                @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label required-field">Current Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword3" aria-describedby="emailHelp" name="c_pass" required>
                      </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label required-field">New Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" name="n_pass" required>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label required-field">Conform Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword2" name="n2_pass" required>
                  </div>
                  <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="showPassword">
                    <label class="form-check-label form-label" for="showPassword">
                        Show Password
                    </label>
                </div>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- <script>

    document.getElementById('showPassword').addEventListener('change', function() {
        var passwordInput = document.getElementById('exampleInputPassword1');
        var passwordInput2 = document.getElementById('exampleInputPassword2');
        var passwordInput3 = document.getElementById('exampleInputPassword3');
        if (this.checked) {
            passwordInput.type = 'text';
            passwordInput2.type = 'text';
            passwordInput3.type = 'text';
        } else {
            passwordInput.type = 'password';
            passwordInput2.type = 'password';
            passwordInput3.type = 'password';
        }
    });
</script> --}}


  @include('layout/script')

<script>

$(document).ready(function() {
    // Function to check if passwords match
    function checkPasswords() {
        var newPassword = $('#exampleInputPassword1').val();
        var confirmPassword = $('#exampleInputPassword2').val();
        if (newPassword !== confirmPassword) {
            alert('New Password and Confirm Password do not match!');
            return false;
        }
        return true;
    }

    // Show or hide passwords
    $('#showPassword').on('change', function() {
        var passwordFields = ['#exampleInputPassword3', '#exampleInputPassword1', '#exampleInputPassword2'];
        passwordFields.forEach(function(field) {
            var type = $(field).attr('type') === 'password' ? 'text' : 'password';
            $(field).attr('type', type);
        });
    });

    // Validate passwords on form submission
    $('form').on('submit', function(event) {
        if (!checkPasswords()) {
            event.preventDefault(); // Prevent form submission if passwords do not match
        }
    });
});

</script>
</body>

</html>
