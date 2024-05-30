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
            <h5 class="card-title fw-semibold mb-4">Product Details</h5>
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
              @csrf

               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="branchName" class="form-label">Branch Name</label>
                            <input type="text" class="form-control" id="branchName" name="branch_name" aria-describedby="branchNameHelp">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-control form-select select2" id="category" name="category" aria-label="Default select example">
                                <option selected>Select Category</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="productName" class="form-label required-field">Product Name</label>
                            <input type="text" class="form-control" id="productName" name="product_name" aria-describedby="productNameHelp" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="measurement" class="form-label required-field">Measurement</label>
                            <input type="text" class="form-control" id="measurement" name="measurement" aria-describedby="measurementHelp" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="hsnCode" class="form-label required-field">HSN / Code</label>
                            <input type="text" class="form-control" id="hsnCode" name="hsn_code" aria-describedby="hsnCodeHelp" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="initialStocks" class="form-label required-field">Initial Stocks</label>
                            <input type="number" class="form-control" id="initialStocks" name="initial_stocks" aria-describedby="initialStocksHelp" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="lotNo" class="form-label">Lot No</label>
                            <input type="number" class="form-control" id="lotNo" name="lot_no" aria-describedby="lotNoHelp">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="quantityAlert" class="form-label">Quantity Alert</label>
                            <input type="number" class="form-control" id="quantityAlert" name="quantity_alert" aria-describedby="quantityAlertHelp">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="productionPrize" class="form-label required-field">Production Prize</label>
                            <input type="number" class="form-control" id="productionPrize" name="production_prize" aria-describedby="productionPrizeHelp" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="mrp" class="form-label required-field">MRP</label>
                            <input type="number" class="form-control" id="mrp" name="mrp" aria-describedby="mrpHelp" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="salePrize" class="form-label required-field">Sale Prize</label>
                            <input type="number" class="form-control" id="salePrize" name="sale_prize" aria-describedby="salePrizeHelp" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="expiryDate" class="form-label required-field">Expiry Date</label>
                            <input type="date" class="form-control" id="expiryDate" name="expiry_date" aria-describedby="expiryDateHelp" required>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="input-group">
                            <label class="input-group-text required-field" for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>
                        <img id="imagePreview" class="image-preview" src="#" alt="Your image will appear here" style="display: none;">
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="form-group mb-3">
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
    document.getElementById('image').addEventListener('change', function(event) {
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

  <script>
    $(document).ready(function() {
        $('.select2').select2();
    });
  </script>

  @include('layout/script')
</body>
</html>
