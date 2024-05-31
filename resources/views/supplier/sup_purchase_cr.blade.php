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
                <!--  -->
                <div>
                    <div class="text-center mb-5">
                        <h2>Make Purchase Order</h2>
                    </div>
                    <div>
                        @if(session('ins'))
                            <div class="alert alert-danger">
                                {{ session('ins') }}
                            </div>
                        @endif
                    </div>
                    <div>
                        <form action="{{route('sup_purchase_ins')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div>
                                <!-- <input type="hidden" name="pr_name[]" class="pr_name_input">
                                <input type="hidden" name="quantity[]" class="quantity_input">
                                <input type="hidden" name="pr_prize[]" class="pr_prize_input">
                                <input type="hidden" name="pr_img[]" class="pr_img_input">
                                <input type="hidden" name="stock[]" class="stock_input">
                                <input type="hidden" name="mrp[]" class="mrp_input">
                                <input type="hidden" name="sale[]" class="sale_input">
                                <input type="hidden" name="exp_date[]" class="exp_date_input"> -->
                                <!-- <input type="hidden" name="sub_total_v[]" class="sub_total_v_input"> -->
                                <input type="hidden" name="grandTotal_v" id="grandTotal_v">
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="" class="form-label">Invoice Number</label>
                                    <input type="text" name="invoice" id="" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="form-label">Supplier</label>
                                    <input type="text" name="supplier" id="" list="suppliers" class="form-control" required>
                                    <datalist id="suppliers">
                                        <option value=""></option>
                                        @foreach ($datas['sup_dts'] as $data)
                                            <option value="{{$data->id}}">{{$data->supplierName}}</option>
                                        @endforeach
                                    </datalist>
                                </div>
                                <div class="col-md-4">
                                    <label for="date" class="form-label">Purchase Date</label>
                                    <input type="date" class="form-control" id="date" name="purchase_date" min="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="pr_name" class="form-label">Product Name</label>
                                    <input type="text" name="pr_name1" id="pr_name" class="form-control" list="pr_names">
                                    <datalist id="pr_names">
                                        <option value=""></option>
                                        @foreach ($datas['sup_prd'] as $data)
                                            <option value="{{$data->id}}">{{$data->pr_name}}</option>
                                        @endforeach
                                    </datalist>
                                </div>
                            </div>
                            <div class="mt-5">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>S.NO</th>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Unit Price</th>
                                                <th>Product Image</th>
                                                <th>Stock</th>
                                                <th>MRP</th>
                                                <th>Sale</th>
                                                <th>Expiry Date</th>
                                                <th>Sub Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="product_table_body">
                                            <!-- Product rows will be dynamically added here -->
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th>Grand Total = </th>
                                                <th id="grand_total"></th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
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
    @include('layout/script')
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.getElementById('pr_name').addEventListener('change', function() {
        var pr_id = this.value;
        if (pr_id.trim() !== '') {
            // Add product to table
            $.ajax({
                type: "POST",
                url: "{{ route('sup_prd_dts_ajx') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: { pr_id: pr_id },
                dataType: 'json',
                cache: false,
                success: function(result) {
                    if ('error' in result) {
                        console.error(result.error);
                    } else {
                        addProductToTable(result);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
            // Clear input field
            this.value = '';
        }
    });

    function addProductToTable(result) {
        var tableBody = document.getElementById('product_table_body');
        var newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td></td>
            <td><input type="hidden" name="pr_name[]" class="pr_name" value="${result[0].pr_name}">${result[0].pr_name}</td>
            <td><input type="number" name="quantity[]" class="qtyInput" oninput="calc_qty(this)"></td>
            <td><input type="hidden" name="pr_prize[]" class="pr_prize" value="${result[0].pr_prize}">${result[0].pr_prize}</td>
            <td>
                <img src="${result[0].pr_img}" alt="bg_img" width="50px">
                <input type="hidden" name="pr_img[]" class="pr_img" value="${result[0].pr_img}">
            </td>
            <td><input type="hidden" name="stock[]" class="stock" value="${result[0].stock}">${result[0].stock}</td>
            <td><input type="hidden" name="mrp[]" class="mrp" value="${result[0].mrp}">${result[0].mrp}</td>
            <td class="sale"><input type="hidden" name="sale[]" class="sale" value="${result[0].sale}">${result[0].sale}</td>
            <td><input type="hidden" name="exp_date[]" class="exp_date" value="${result[0].exp_date}">${result[0].exp_date}</td>
            <td class="sub_total"></td>
            <td><button type="button" class="btn btn-danger btn-sm" onclick="deleteRow(this)">Delete</button></td>
        `;

        tableBody.appendChild(newRow);
        updateSerialNumbers();
        // Set values for hidden input fields
        // newRow.querySelector('.pr_name_input').value = result[0].pr_name;
        // newRow.querySelector('.pr_prize_input').value = result[0].pr_prize;
        // newRow.querySelector('.pr_img_input').value = result[0].pr_img;
        // newRow.querySelector('.stock_input').value = result[0].stock;
        // newRow.querySelector('.mrp_input').value = result[0].mrp;
        // newRow.querySelector('.sale_input').value = result[0].sale;
        // newRow.querySelector('.exp_date_input').value = result[0].exp_date;
    }

    // Function to calculate the grand total
    function calculateGrandTotal() {
        var subTotalCells = document.querySelectorAll('.sub_total');
        var grandTotal = 0;
        subTotalCells.forEach(function(cell) {
            grandTotal += parseFloat(cell.textContent);
        });
        document.getElementById('grand_total').textContent = grandTotal.toFixed(2); // Display the grand total
        document.getElementById('grandTotal_v').value = grandTotal;
    }

    // Function to update the subtotal when quantity changes
    function calc_qty(input) {
    var row = input.closest('tr');
    var qty = input.value;
    var sale = row.querySelector('.sale').textContent;
    var total = parseFloat(sale) * parseFloat(qty);

    // Update subtotal cell content
    var subTotalCell = row.querySelector('.sub_total');
    subTotalCell.textContent = total.toFixed(2);

    // Update or create hidden input for subtotal
    var subTotalInput = row.querySelector('.sub_total_input');
    if (!subTotalInput) {
        subTotalInput = document.createElement('input');
        subTotalInput.type = 'hidden';
        subTotalInput.className = 'sub_total_input';
        subTotalInput.name = 'sub_total[]';
        row.appendChild(subTotalInput);
    }
    subTotalInput.value = total.toFixed(2);

    calculateGrandTotal(); // Recalculate grand total
}


    function updateSerialNumbers() {
        var serialNumberCells = document.querySelectorAll('#product_table_body tr td:first-child');
        serialNumberCells.forEach(function(cell, index) {
            cell.textContent = index + 1;
        });
    }

    function deleteRow(button) {
        var row = button.closest('tr');
        row.remove();
        updateSerialNumbers();
    }
</script>



<!-- <script>
    window.onload = function() {
        getDate();
    };

    function getDate() {
        var today = new Date();
        var formattedDate = today.toISOString().slice(0, 10);
        document.getElementById("date").value = formattedDate;
    }
</script> -->
</html>
