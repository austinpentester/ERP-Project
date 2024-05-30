<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout/head')
</head>
<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        @include('layout/sidebar')

        <div class="body-wrapper">

            @include('layout/header')

            <div class="container-fluid">
                <button class="btn btn-dark mt-3" onclick="history.back()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16" style="margin-right: 5px;">
                        <path fill-rule="evenodd" d="M5.854 3.646a.5.5 0 0 0-.708 0L1.5 7.293a.5.5 0 0 0 0 .707l3.646 3.647a.5.5 0 0 0 .708-.708L2.707 8H13.5a.5.5 0 0 0 0-1H2.707l3.147-3.146a.5.5 0 0 0 0-.708z"/>
                    </svg>
                    Back
                </button>

                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">Distributor Details</h5>
                        <form id="distributorForm" action="{{ route('distributor.details.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- Main Form Fields -->
                                @if ($data!=null)
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="cus_id" class="form-label">Distributor ID :</label>
                                        <label for="cus_id" class="form-label">Dis - {{$data->dis_id+1}}</label>
                                        <input type="hidden" name="dis_id" value="{{$data->dis_id+1}}">
                                    </div>
                                </div>
                            @else
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="cus_id" class="form-label">Distributor ID :</label>
                                        <label for="cus_id" class="form-label">Dis - 1</label>
                                        <input type="hidden" name="dis_id" value="1">
                                    </div>
                                </div>
                            @endif
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="branch" class="form-label">Branch Name</label>
                                        <input type="text" class="form-control" id="branch" name="branch">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="customerName" class="form-label required-field">Distributor Name</label>
                                        <input type="text" class="form-control" id="distributorName" name="distributorName" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 form-group">
                                        <label for="email" class="form-label required-field">Email address</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="website" class="form-label">Website</label>
                                        <input type="text" class="form-control" id="website" name="website">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="mobileNumber" class="form-label required-field">Mobile Number</label>
                                        <input type="text" class="form-control" id="mobileNumber" name="mobileNumber" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="gstNo" class="form-label">Gst No</label>
                                        <input type="text" class="form-control" id="gstNo" name="gstNo">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="panNo" class="form-label">Pan No</label>
                                        <input type="text" class="form-control" id="panNo" name="panNo">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group ">
                                        <label class="input-group-text " for="imageUpload">Image Upload</label>
                                        <input type="file" class="form-control" id="imageUpload" name="imageUpload">
                                    </div>
                                    <img id="imagePreview" class="image-preview" src="#" alt="Your image will appear here" style="display: none;">
                                </div>
                                <h4 class="mt-2 mb-3">Address</h4>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="billingAddress" class="form-label required-field">Billing Address</label>
                                        <textarea class="form-control" id="billingAddress" name="billingAddress" rows="3" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="shippingAddress" class="form-label required-field">Shipping Address</label>
                                        <textarea class="form-control" id="shippingAddress" name="shippingAddress" rows="3" required></textarea>
                                    </div>
                                </div>
                                <h4 class="mt-2 mb-3">Contact Details</h4>
                                <div id="contactDetailsSection">
                                    <div class="row contact-detail">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="contactPersonName" class="form-label required-field">Contact Person Name</label>
                                                <input type="text" class="form-control contactPersonName" id="contactPersonName" name="contactPersonName[]" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="contactMobileNumber" class="form-label required-field">Mobile Number</label>
                                                <input type="text" class="form-control contactMobileNumber" id="contactMobileNumber" name="contactMobileNumber[]" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="designation" class="form-label required-field">Designation</label>
                                                <input type="text" class="form-control designation" id="designation" name="designation[]" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="contactEmail" class="form-label">Email address</label>
                                                <input type="email" class="form-control contactEmail" id="contactEmail" name="contactEmail[]">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <button type="button" class="btn btn-dark" id="addContactDetail">Add Contact</button>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3 form-group">
                                        <button type="submit" class="btn btn-dark">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <table  style="display: none;" class="table"  id="contactDetailsTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Contact Person Name</th>
                                    <th scope="col">Mobile Number</th>
                                    <th scope="col">Email address</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Dynamically added rows will appear here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.getElementById('imageUpload').addEventListener('change', function(event) {
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

            document.getElementById('addContactDetail').addEventListener('click', function() {
                const contactDetailsSection = document.getElementById('contactDetailsSection');
                const newContactDetail = contactDetailsSection.children[0].cloneNode(true);

                // Clear input values
                const inputs = newContactDetail.querySelectorAll('input');
                inputs.forEach(input => input.value = '');

                contactDetailsSection.appendChild(newContactDetail);
            });

            document.getElementById('distributorForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const contactDetailsTable = document.getElementById('contactDetailsTable').getElementsByTagName('tbody')[0];
    contactDetailsTable.innerHTML = '';

    const contactDetailsSection = document.getElementById('contactDetailsSection');
    const contactDetails = contactDetailsSection.getElementsByClassName('contact-detail');

    for (let i = 0; i < contactDetails.length; i++) {
        const contactDetail = contactDetails[i];
        const contactPersonName = contactDetail.querySelector('.contactPersonName').value;
        const contactMobileNumber = contactDetail.querySelector('.contactMobileNumber').value;
        const contactEmail = contactDetail.querySelector('.contactEmail').value;
        const designation = contactDetail.querySelector('.designation').value;

        const newRow = contactDetailsTable.insertRow();
        newRow.innerHTML = `
            <td>${i + 1}</td>
            <td>${contactPersonName}</td>
            <td>${contactMobileNumber}</td>
            <td>${contactEmail}</td>
            <td>${designation}</td>
            <td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">Remove</button></td>
        `;

        // Create hidden inputs and append them to the form
        const hiddenInputsHtml = `
            <input type="hidden" name="contactPersonName[]" value="${contactPersonName}">
            <input type="hidden" name="contactMobileNumber[]" value="${contactMobileNumber}">
            <input type="hidden" name="contactEmail[]" value="${contactEmail}">
            <input type="hidden" name="designation[]" value="${designation}">
        `;
        const hiddenInputsFragment = document.createRange().createContextualFragment(hiddenInputsHtml);
        this.appendChild(hiddenInputsFragment);
    }

    this.submit();
});

            function removeRow(button) {
                const row = button.closest('tr');
                row.remove();
            }
        </script>
    </div>
</body>
</html>
