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
                <!--  -->
                <div>
                    <div class="text-center mb-5">
                        <h2>Make Quotation</h2>
                    </div>
                    <div>
                        @if(session('ins'))
                            <div class="alert alert-danger">
                                {{ session('ins') }}
                            </div>
                        @endif
                    </div>
                    <div>
                        <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                            <div>
                                <input type="hidden" name="grandTotal_v" id="grandTotal_v">
                            </div>
                            <div class="row">
                                <div class="mb-3 form-group col-md-3">
                                    <label for="customer_name" class="form-label">Customer Name</label>
                                    <select class="form-control form-select select2" id="customer_name" name="customer_name" aria-label="Default select example">
                                        <option selected>Select Customer</option>
                                        @foreach($datas as $data)
                                            <option value="{{ $data->id }}">{{ $data->customerName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 form-group col-md-3">
                                    <label for="contact_person" class="form-label">Contact Person</label>
                                    <select class="form-control form-select select2" id="contact_person" name="contact_person" aria-label="Default select example">
                                        <option selected>Select Contact Person</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="quotation_number" class="form-label">Quotation Number</label>
                                    <input type="text" class="form-control" id="quotation_number" name="quotation_number" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="quotation_date" class="form-label">Quotation Date</label>
                                    <input type="date" class="form-control" id="quotation_date" name="quotation_date" value="{{ date('Y-m-d') }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="quotation_valid_date" class="form-label">Quotation Valid Date</label>
                                    <input type="date" class="form-control" id="quotation_valid_date" name="quotation_valid_date" value="{{ date('Y-m-d') }}" required>
                                </div>
                                <div class="mb-3 form-group col-md-3">
                                    <label for="employee_name" class="form-label">Employee Name</label>
                                    <select class="form-control form-select select2" id="employee_name" name="employee_name" aria-label="Default select example">
                                        <option selected>Select Employee</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="quotation_time" class="form-label">Quotation Time</label>
                                    <input type="time" class="form-control" id="quotation_time" name="quotation_time" required>
                                </div>
                                <div class="mb-3 form-group col-md-3">
                                    <label for="tax_type" class="form-label">Tax Type</label>
                                    <select class="form-control form-select select2" id="tax_type" name="tax_type" aria-label="Default select example">
                                        <option selected>Select Tax Type</option>
                                        @foreach($taxes as $tax)
                                        <option value="{{ $tax->Taxes }}">{{ $tax->Taxes}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="client_reference" class="form-label">Client Reference</label>
                                    <input type="text" class="form-control" id="client_reference" name="client_reference" required>
                                </div>
                                <div class="mb-3 form-group col-md-6">
                                    <label for="product_name" class="form-label">Product Name</label>
                                    <select class="form-control form-select select2" id="product_name" name="product_name" aria-label="Default select example">
                                        <option selected>Select Product</option>
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->product_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mt-5">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>S.NO</th>
                                                <th>Product Name</th>
                                                <th>Major Head</th>
                                                <th>HSN Code</th>
                                                <th>UOM</th>
                                                <th>Length</th>
                                                <th>Width</th>
                                                <th>QTY</th>
                                                <th>Unit Price</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="product_table_body">
                                            <!-- Product rows will be dynamically added here -->
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="8"></th>
                                                <th>Grand Total = </th>
                                                <th id="grand_total"></th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-dark">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout/script')
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    // this is for used to het custome name to get contact person name
   $('#customer_name').change(function() {
    var customerId = $(this).val();
    if (customerId) {
        $.ajax({
            type: "POST",
            url: "{{ route('getContactPersons') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { customerId: customerId },
            dataType: 'json',
            cache: false,
            success: function(result) {
                if ('error' in result) {
                    console.error(result.error);
                } else {
                    console.log('Success');
                    // Clear existing options
                    $('#contact_person').html('<option selected>Select Contact Person</option>');
                    // Append new options
                    $.each(result, function(index, contactPerson) {
                        $('#contact_person').append('<option value="' + contactPerson.id + '">' + contactPerson.contactPersonName + '</option>');
                    });

                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
});


// this is use to product to get product detials in table
$('#product_name').change(function() {
    var product_Id = $(this).val();
    console.log(product_Id);
    if (product_Id) {
        $.ajax({
            type: "POST",
            url: "{{ route('getproductDetails') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { product_Id: product_Id },
            dataType: 'json',
            cache: false,
            success: function(result) {
                if ('error' in result) {
                    console.error(result.error);
                } else {
                    if (result.length > 0) {
                        console.log(result[0].product_name); // Access the first product's name
                    } else {
                        console.log('No products found');
                    }


                    var tableBody = $('#product_table_body');
                    // Check if there are any rows in the table body
                    if (tableBody.find('tr').length === 0) {
                        var id = 1;
                    } else {
                        var lastRow = tableBody.find('tr').last();
                        var id = parseInt(lastRow.find('td').first().text(), 10) + 1; // Convert the text to an integer and increment by 1

                    }
                    var html = '';
                        html += '<tr>';
                        html += '<td>' + id + '</td>';
                        html += '<td>' + result[0].product_name + '</td>';
                        html += '<td>' + result[0].category + '</td>';
                        html += '<td>' + result[0].hsn_code + '</td>';
                        html += '<td>' + result[0].category + '</td>';
                        html += '<td>' + result[0].measurement + '</td>';
                        html += '<td>' + result[0].measurement + '</td>';
                        html += '<td><input class="small-input" type="text" /></td>';
                        html += '<td>' + result[0].mrp + '</td>';
                        html += '<td>' + result[0].mrp + '</td>';
                        html += '<td><button type="button" class="delete-btn btn btn-danger">Delete</button></td>';
                        // Add more columns as needed
                        html += '</tr>';
                        tableBody.append(html);
                        // Attach a click event handler to the delete button
                        tableBody.on('click', '.delete-btn', function() {
                            $(this).closest('tr').remove();
                        });

                }
                $('#product_name').val('');

            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
});



// this code is used to store this all  data into database



$('form').submit(function(e) {
    e.preventDefault();

    var formData = {}; // Object to hold quotation data

    // Get form input field values
    formData.customer_name = $('#customer_name').val();
    formData.contact_person = $('#contact_person').val();
    formData.quotation_number = $('#quotation_number').val();
    formData.quotation_date = $('#quotation_date').val();
    formData.quotation_valid_date = $('#quotation_valid_date').val();
    formData.employee_name = $('#employee_name').val();
    formData.quotation_time = $('#quotation_time').val();
    formData.tax_type = $('#tax_type').val();
    formData.client_reference = $('#client_reference').val();

    // Initialize array to hold table row data
    formData.quotation_data = [];

    // Loop through each table row
    $('#product_table_body tr').each(function() {
        var rowData = {
            product_name: $(this).find('td:eq(1)').text(),
            major_head: $(this).find('td:eq(2)').text(),
            hsn_code: $(this).find('td:eq(3)').text(),
            uom: $(this).find('td:eq(4)').text(),
            length: $(this).find('td:eq(5)').text(),
            width: $(this).find('td:eq(6)').text(),
            qty: $(this).find('td:eq(7) input').val(),
            unit_price: $(this).find('td:eq(8)').text(),
            total: $(this).find('td:eq(9)').text()
        };
        formData.quotation_data.push(rowData); // Add row data to the array
    });
    console.log(formData)
    // Send the data to the server
    $.ajax({
        type: 'POST',
        url: '{{ route("quotation.store") }}',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: { quotation_data: formData },
        dataType: 'json',
        success: function(response) {
            // Handle success response
            // console.log(response);
            console.log('sucess coming');
            if (response.success) {
            window.location.href = response.redirect_url;
        } else {
            // Handle failure (optional)
            alert('Failed to create quotation.');
        }
            // Optionally, redirect the user or show a success message
        },
        error: function(xhr, status, error) {
            // Handle error response
            console.error(xhr.responseText);
        }
    });
});
</script>
</html>

