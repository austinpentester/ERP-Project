@include('layout/head')
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
        <div class="card mt-5">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Product</h5>
            <form action="{{ route('products.update', $updatedProduct->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" value="{{ $updatedProduct->id }}" name="id">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="branchName" class="form-label">Branch Name</label>
                    <input type="text" class="form-control" id="branchName" name="branch_name" value="{{ $updatedProduct->branch_name }}" aria-describedby="branchNameHelp" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3 form-group">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-control form-select select2" id="category" name="category" aria-label="Default select example" required>
                      <option value="{{ $updatedProduct->category }}">{{ $updatedProduct->category }}</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="productName" class="form-label required-field">Product Name</label>
                    <input type="text" class="form-control" id="productName" name="product_name" value="{{ $updatedProduct->product_name }}" aria-describedby="productNameHelp" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="measurement" class="form-label required-field">Measurement</label>
                    <input type="text" class="form-control" id="measurement" name="measurement" value="{{ $updatedProduct->measurement }}" aria-describedby="measurementHelp" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="hsnCode" class="form-label required-field">HSN / Code</label>
                    <input type="text" class="form-control" id="hsnCode" name="hsn_code" value="{{ $updatedProduct->hsn_code }}" aria-describedby="hsnCodeHelp" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ $updatedProduct->description }}</textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="initialStocks" class="form-label required-field">Initial Stocks</label>
                    <input type="number" class="form-control" id="initialStocks" name="initial_stocks" value="{{ $updatedProduct->initial_stocks }}" aria-describedby="initialStocksHelp" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="lotNo" class="form-label">Lot No</label>
                    <input type="number" class="form-control" id="lotNo" name="lot_no" value="{{ $updatedProduct->lot_no }}" aria-describedby="lotNoHelp">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="quantityAlert" class="form-label">Quantity Alert</label>
                    <input type="number" class="form-control" id="quantityAlert" name="quantity_alert" value="{{ $updatedProduct->quantity_alert }}" aria-describedby="quantityAlertHelp">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="productionPrize" class="form-label required-field">Production Prize</label>
                    <input type="text" class="form-control" id="productionPrize" name="production_prize" value="{{ $updatedProduct->production_prize }}" aria-describedby="productionPrizeHelp" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="mrp" class="form-label required-field">MRP</label>
                    <input type="text" class="form-control" id="mrp" name="mrp" value="{{ $updatedProduct->mrp }}" aria-describedby="mrpHelp" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="salePrize" class="form-label required-field">Sale Prize</label>
                    <input type="text" class="form-control" id="salePrize" name="sale_prize" value="{{ $updatedProduct->sale_prize }}" aria-describedby="salePrizeHelp" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="expiryDate" class="form-label required-field">Expiry Date</label>
                    <input type="date" class="form-control" id="expiryDate" name="expiry_date" value="{{ $updatedProduct->expiry_date }}" aria-describedby="expiryDateHelp" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image" aria-describedby="imageHelp">
                    @if($updatedProduct->image)
                      <img id="imagePreview" src="{{ asset('images/'.$updatedProduct->image) }}" alt="Product Image" style="display: block; width: 100px; height: 100px; margin-top: 10px;">
                    @else
                      <img id="imagePreview" src="#" alt="Image Preview" style="display: none; width: 100px; height: 100px; margin-top: 10px;">
                    @endif
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Update Product</button>
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
