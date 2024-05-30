<!-- resources/views/master/Category.blade.php -->
@include('layout/head')

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        @include('layout/sidebar')
        <div class="body-wrapper">
            @include('layout/header')
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
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
                            <div class="col-md-6">
                                <h5 class="card-title fw-semibold mb-4">Category Table</h5>

                            </div>
                            <div class="col-md-6 text-right">
                                <a href="/Category" class="btn btn-dark py-8 fs-4 mb-4 rounded-2">Add</a>
                            </div>
                        </div>
                        <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>S.NO</th>
                                    <th>Category Name</th>
                                    <th>Sub Category Name</th>
                                    <th>OPTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $index => $category)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $category->Category }}</td>
                                    <td>{{ $category->sub_Category }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary edit-button" title="Edit"
                                            data-id="{{ $category->id }}"
                                            data-category="{{ $category->Category }}"
                                            data-sub-category="{{ $category->sub_Category }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <a href="{{ route('delete', $category->id) }}" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this category?');"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>S.NO</th>
                                    <th>Category Name</th>
                                    <th>Sub Category Name</th>
                                    <th>OPTIONS</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="POST" action="">
                        @csrf
                        <div class="mb-3">
                            <label for="Category" class="form-label required-field">Category Name</label>
                            <input type="text" class="form-control" id="Category" name="Category" required>
                        </div>
                        <div class="mb-3">
                            <label for="SubCategory" class="form-label required-field">Sub Category Name</label>
                            <input type="text" class="form-control" id="SubCategory" name="SubCategory" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-dark">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var editButtons = document.querySelectorAll('.edit-button');
            var editModal = new bootstrap.Modal(document.getElementById('editModal'));
            var editForm = document.getElementById('editForm');
            var categoryInput = document.getElementById('Category');
            var subCategoryInput = document.getElementById('SubCategory');

            editButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var id = button.getAttribute('data-id');
                    var category = button.getAttribute('data-category');
                    var subCategory = button.getAttribute('data-sub-category');

                    // Set the form action
                    editForm.action = '/Category/update/' + id;

                    // Set the input values
                    categoryInput.value = category;
                    subCategoryInput.value = subCategory;

                    // Show the modal
                    editModal.show();
                });
            });
        });
    </script>

    @include('layout/script')
</body>

</html>
