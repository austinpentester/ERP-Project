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
                                <h5 class="card-title fw-semibold mb-4">Units Table</h5>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="/Units" class="btn btn-dark py-8 fs-4 mb-4 rounded-2">Add</a>
                            </div>
                        </div>
                        <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>S.NO</th>
                                    <th>Unit Name</th>
                                    <th>Symbol</th>
                                    <th>OPTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($units as $index => $unit)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $unit->unit_name }}</td>
                                    <td>{{ $unit->symbol }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary edit-button" title="Edit"
                                            data-id="{{ $unit->id }}"
                                            data-unit="{{ $unit->unit_name }}"
                                            data-symbol="{{ $unit->symbol }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <a href="{{ route('deleteUnit', $unit->id) }}" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this unit?');"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>S.NO</th>
                                    <th>Unit Name</th>
                                    <th>Symbol</th>
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
                    <h5 class="modal-title" id="editModalLabel">Edit Unit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="POST" action="">
                        @csrf
                        <div class="mb-3">
                            <label for="Unit" class="form-label required-field">Unit Name</label>
                            <input type="text" class="form-control" id="Unit" name="Unit" required>
                        </div>
                        <div class="mb-3">
                            <label for="Symbol" class="form-label required-field">Symbol</label>
                            <input type="text" class="form-control" id="Symbol" name="Symbol" required>
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
            var unitInput = document.getElementById('Unit');
            var symbolInput = document.getElementById('Symbol');

            editButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var id = button.getAttribute('data-id');
                    var unit = button.getAttribute('data-unit');
                    var symbol = button.getAttribute('data-symbol');

                    // Set the form action
                    editForm.action = '/Units/update/' + id;

                    // Set the input values
                    unitInput.value = unit;
                    symbolInput.value = symbol;

                    // Show the modal
                    editModal.show();
                });
            });
        });
    </script>

    @include('layout/script')
</body>

</html>
