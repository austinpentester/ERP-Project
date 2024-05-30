@include('layout/head')
<body>
  <!-- Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    @include('layout/sidebar')
    <!-- Sidebar End -->
    <!-- Main wrapper -->
    <div class="body-wrapper">
      <!-- Header Start -->
      @include('layout/header')
      <!-- Header End -->
      @if ($count>0)

      <div class="container-fluid">
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
            <form action="{{route('company_details_upd',['id'=>$data->id])}}" method="post" enctype="multipart/form-data" id="companyDetailsForm">
                @csrf
                <div class="row" id="companyDetails">
                    <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="companyName" class="form-label">Company Name</label>
                        <input type="text" class="form-control" id="companyName" aria-describedby="emailHelp" name="company_name" value="{{$data->company_name}}">
                    </div>
                    </div>
                    <!-- Existing company details fields -->
                    <div class="col-md-6">
                    <div class="mb-3 form-group">
                        <label for="companyEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="companyEmail" aria-describedby="emailHelp" name="company_email" value="{{$data->company_email}}">
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="companyAddress">Address</label>
                        <textarea class="form-control" id="companyAddress" rows="3" name="company_address">{{ $data->company_address }}</textarea>
                    </div>
                    </div>
                    <!-- Add more company details fields -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                        <label for="gst" class="form-label">Gst No</label>
                        <input type="text" class="form-control" id="gst" aria-describedby="emailHelp" name="gst" value="{{$data->gst}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                        <label for="pan" class="form-label">Pan No</label>
                        <input type="text" class="form-control" id="pan" aria-describedby="emailHelp" name="pan" value="{{$data->pan}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                        <label class="input-group-text" for="companyImg" name="company_img">Background Image</label>
                        <img src="{{ asset($data->company_img) }}" alt="bg_img" width="130px">
                        <input type="file" class="form-control" id="companyImg" name="company_img">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                        <label class="input-group-text" for="companyLogo">Logo Image</label>
                        <img src="{{ asset($data->company_logo) }}" alt="bg_img" width="130px">
                        <input type="file" class="form-control" id="companyLogo" name="company_logo">
                        </div>
                    </div>
                    <input type="hidden" name="company_id" id="companyId" value="{{$data->id}}">
                    @foreach($pho as $index => $ph)
                        <div class="col-md-6 mt-4 company-mobile-field">
                            <div class="form-group mb-3">
                                <label for="companyMobileNumber{{$index}}" class="form-label">Company Mobile Number</label>
                                <input type="text" class="form-control" id="companyMobileNumber{{$index}}" aria-describedby="emailHelp" name="company_mobile_number[]" value="{{$ph}}" oninput="validateMobileNumber(this)" minlength="10" maxlength="10">
                                <label for="companyMobileNumber{{$index}}" id="ph_valid{{$index}}" class="error-label"></label>
                                <button type="button" onclick="dlt(this)" class="btn btn-danger btn-sm mt-2">Delete</button>
                            </div>
                        </div>
                    @endforeach
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
                            <input type="text" class="form-control" id="bankName" aria-describedby="emailHelp" name="b_name" value="{{$data->bank_name}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="accountName" class="form-label">Account Name </label>
                            <input type="text" class="form-control" id="accountName" aria-describedby="emailHelp" name="ac_name" value="{{$data->ac_name}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="accountNumber" class="form-label">Account Number </label>
                            <input type="number" class="form-control" id="accountNumber" aria-describedby="emailHelp" name="ac_no" value="{{$data->ac_no}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="branchName" class="form-label">Branch Name</label>
                            <input type="text" class="form-control" id="branchName" aria-describedby="emailHelp" name="branch" value="{{$data->branch_name}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="ifscCode" class="form-label">IFSC Code</label>
                            <input type="text" class="form-control" id="ifscCode" aria-describedby="emailHelp" name="ifsc" value="{{$data->ifsc}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="micr" class="form-label">MICR</label>
                            <input type="text" class="form-control" id="micr" aria-describedby="emailHelp" name="micr" value="{{$data->micr}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="branchCode" class="form-label">Branch Code</label>
                            <input type="text" class="form-control" id="branchCode" aria-describedby="emailHelp" name="branch_code" value="{{$data->branch_code}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="swiftCode" class="form-label">Swift Code</label>
                            <input type="text" class="form-control" id="swiftCode" aria-describedby="emailHelp" name="swift_code" value="{{$data->swift_code}}">
                        </div>
                    </div>
                </div>
          </div>
        </div>
        <div class="text-center mt-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </div>
      @else
      <div class="container-fluid">
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
            <form action="{{route('company_details')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row" id="companyDetails">
                    <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="companyName" class="form-label">Company Name</label>
                        <input type="text" class="form-control" id="companyName" aria-describedby="emailHelp" name="company_name">
                    </div>
                    </div>
                    <!-- Existing company details fields -->
                    <div class="col-md-6">
                    <div class="mb-3 form-group">
                        <label for="companyEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="companyEmail" aria-describedby="emailHelp" name="company_email">
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="companyAddress">Address</label>
                        <textarea class="form-control" id="companyAddress" rows="3" name="company_address"></textarea>
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                        <label for="gst" class="form-label">Gst No</label>
                        <input type="text" class="form-control" id="gst" aria-describedby="emailHelp" name="gst">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                        <label for="pan" class="form-label">Pan No</label>
                        <input type="text" class="form-control" id="pan" aria-describedby="emailHelp" name="pan">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                        <label class="input-group-text" for="companyImg" name="company_img">Background Image</label>
                        <input type="file" class="form-control" id="companyImg" name="company_img">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                        <label class="input-group-text" for="companyLogo">Logo Image</label>
                        <input type="file" class="form-control" id="companyLogo" name="company_logo">
                        </div>
                    </div>
                    <div class="col-md-6 mt-4 company-mobile-field">
                        <div class="form-group mb-3">
                            <label for="companyMobileNumber" class="form-label">Company Mobile Number</label>
                            <input type="text" class="form-control" id="companyMobileNumber" aria-describedby="emailHelp" name="company_mobile_number[]" oninput="validateMobileNumber_1(this)" minlength="10" maxlength="10">
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
                            <input type="text" class="form-control" id="bankName" aria-describedby="emailHelp" name="b_name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="accountName" class="form-label">Account Name </label>
                            <input type="text" class="form-control" id="accountName" aria-describedby="emailHelp" name="ac_name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="accountNo" class="form-label">Account Number </label>
                            <input type="number" class="form-control" id="accountNo" aria-describedby="emailHelp" name="ac_no">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="branchName" class="form-label">Branch Name</label>
                            <input type="text" class="form-control" id="branchName" aria-describedby="emailHelp" name="branch">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="ifscCode" class="form-label">IFSC Code</label>
                            <input type="text" class="form-control" id="ifscCode" aria-describedby="emailHelp" name="ifsc">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="micr" class="form-label">MICR</label>
                            <input type="text" class="form-control" id="micr" aria-describedby="emailHelp" name="micr">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="branchCode" class="form-label">Branch Code</label>
                            <input type="text" class="form-control" id="branchCode" aria-describedby="emailHelp" name="branch_code">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="swiftCode" class="form-label">Swift Code</label>
                            <input type="text" class="form-control" id="swiftCode" aria-describedby="emailHelp" name="swift_code">
                        </div>
                    </div>
                </div>
          </div>
        </div>
        <div class="text-center mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    @endif
    </div>
  </div>
  <!-- End wrapper -->
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
        dlt_value(fieldValue);
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
