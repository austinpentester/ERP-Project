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
        <div class="card mt-5">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Company Details</h5>
            <div>
                @if(session('ins'))
                    <div class="alert alert-danger">
                        {{ session('ins') }}
                    </div>
                @endif
            </div>
            <form action="{{route('branch_ins')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row" id="companyDetails">
                    <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="companyName" class="form-label">Company Name</label>
                        <input type="text" class="form-control" id="companyName" aria-describedby="emailHelp" name="company_name" required>
                    </div>
                    </div>
                    <!-- Existing company details fields -->
                    <div class="col-md-6">
                    <div class="mb-3 form-group">
                        <label for="companyEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="companyEmail" aria-describedby="emailHelp" name="company_email" required>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="companyAddress">Address</label>
                        <textarea class="form-control" id="companyAddress" rows="3" name="company_address" required></textarea>
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                        <label for="gst" class="form-label">Gst No</label>
                        <input type="text" class="form-control" id="gst" aria-describedby="emailHelp" name="gst" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                        <label for="pan" class="form-label">Pan No</label>
                        <input type="text" class="form-control" id="pan" aria-describedby="emailHelp" name="pan" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                        <label class="input-group-text" for="companyImg" name="company_img">Background Image</label>
                        <input type="file" class="form-control" id="companyImg" name="company_img" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                        <label class="input-group-text" for="companyLogo">Logo Image</label>
                        <input type="file" class="form-control" id="companyLogo" name="company_logo" required>
                        </div>
                    </div>
                    <div class="col-md-6 mt-4 company-mobile-field">
                        <div class="form-group mb-3">
                            <label for="companyMobileNumber" class="form-label">Company Mobile Number</label>
                            <input type="text" class="form-control" id="companyMobileNumber" aria-describedby="emailHelp" name="company_mobile_number[]" oninput="validateMobileNumber_1(this)" minlength="10" maxlength="10" required>
                            <label for="companyMobileNumber" id="ph_valid" class="error-label"></label>
                            <button type="button" onclick="dlt(this)" class="btn btn-danger btn-sm mt-2">Delete</button>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3 mt-4 col-6">
                    <button type="button" onclick="addMore()" class="btn btn-success">Add more</button>
                </div>
          </div>

        </div>
        <!-- Bank Details -->
        <div class="card mt-5">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Bank Details</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="bankName" class="form-label">Bank Name</label>
                            <input type="text" class="form-control" id="bankName" aria-describedby="emailHelp" name="b_name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="accountName" class="form-label">Account Name </label>
                            <input type="text" class="form-control" id="accountName" aria-describedby="emailHelp" name="ac_name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="accountNo" class="form-label">Account Number </label>
                            <input type="number" class="form-control" id="accountNo" aria-describedby="emailHelp" name="ac_no" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="branchName" class="form-label">Branch Name</label>
                            <input type="text" class="form-control" id="branchName" aria-describedby="emailHelp" name="branch" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="ifscCode" class="form-label">IFSC Code</label>
                            <input type="text" class="form-control" id="ifscCode" aria-describedby="emailHelp" name="ifsc" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="micr" class="form-label">MICR</label>
                            <input type="text" class="form-control" id="micr" aria-describedby="emailHelp" name="micr" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="branchCode" class="form-label">Branch Code</label>
                            <input type="text" class="form-control" id="branchCode" aria-describedby="emailHelp" name="branch_code" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="swiftCode" class="form-label">Swift Code</label>
                            <input type="text" class="form-control" id="swiftCode" aria-describedby="emailHelp" name="swift_code" required>
                        </div>
                    </div>
                </div>
          </div>
        </div>
        <div class="text-center mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </div>
  @include('layout/head')
</body>
<script>
    function addMore() {
        // Create a new company mobile number field
        var newField = document.createElement('div');
        newField.classList.add('col-md-6', 'mt-4');
        newField.innerHTML = `
                            <div class="form-group mb-3">
                                <label for="companyMobileNumber" class="form-label">Company Mobile Number</label>
                                <input type="text" class="form-control" id="companyMobileNumber" aria-describedby="emailHelp" name="company_mobile_number[]" oninput="validateMobileNumber_1(this)" minlength="10" maxlength="10">
                                <label for="companyMobileNumber" id="ph_valid" class="error-label"></label>
                                <button type="button" onclick="dlt(this)" class="btn btn-danger btn-sm mt-2">Delete</button>
                            </div>
        `;
        // Append the new field to the companyDetails section
        document.getElementById('companyDetails').appendChild(newField);
    }

    function deleteField(button)
    {
        // Get the parent div containing the company mobile number field
        var fieldDiv = button.parentElement.parentElement;
        // Remove the entire div from the DOM
        fieldDiv.remove();
    }

    function dlt(button)
    {
        // Get the input value
        var fieldValue = button.parentElement.querySelector('input[type="text"]').value;
        // Call the function to print the value
        // dlt_value(fieldValue);
        // Get the parent div containing the company mobile number field
        var fieldDiv = button.parentElement.parentElement;
        // Remove the entire div from the DOM
        fieldDiv.remove();
    }
    function dlt_value(val) {
    // Wrap your code inside a document ready function to ensure jQuery is loaded
    $(document).ready(function() {
        var id = $('#companyId').val(); // Use jQuery to get the value
        console.log(id);
        console.log(val);

        // Send the value to the backend via AJAX
        $.ajax({
            type: "POST",
            url: "{{ route('delete_value') }}", // Use the correct route name
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { value: val, id: id },
            dataType: 'json',
            cache: false,
            success: function(result) {
                if ('error' in result) {
                    console.error(result.error);
                } else {
                    // Update the input values with the received data
                    console.log('Response from backend:', result);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
}

function validateMobileNumber(input) {
    // Get the input value
    let mobileNumber = input.value;
    let index = input.id.slice(-1); // Extract index from input id
    let errorLabel = document.getElementById('ph_valid' + index);

    // Check if the length is less than 10 characters
    if (mobileNumber.length < 10) {
        errorLabel.textContent = "Mobile number must be at least 10 characters long.";
    } else if (mobileNumber.length > 10) { // Check if the length is more than 10 characters
        errorLabel.textContent = "Mobile number cannot exceed 10 characters.";
    } else { // Reset error label if length is correct
        errorLabel.textContent = "";
    }
}

function validateMobileNumber_1(input) {
    // Get the input value
    let mobileNumber = input.value;
    let errorLabel = document.getElementById('ph_valid');

    // Check if the length is less than 10 characters
    if (mobileNumber.length < 10) {
        errorLabel.textContent = "Mobile number must be at least 10 characters long.";
    } else if (mobileNumber.length > 10) { // Check if the length is more than 10 characters
        errorLabel.textContent = "Mobile number cannot exceed 10 characters.";
    } else { // Reset error label if length is correct
        errorLabel.textContent = "";
    }
}



</script>
</html>
