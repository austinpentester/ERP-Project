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
                                <h5 class="card-title fw-semibold mb-4">Taxes Table</h5>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="/Taxes" class="btn btn-dark py-8 fs-4 mb-4 rounded-2">Add</a>
                            </div>
                        </div>
                        <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>S.NO</th>
                                    <th>Taxes</th>
                                    <th>Percentage
                                    </th>


                                    </th>

                                    <th>OPTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($taxes as $index => $tax)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $tax->Taxes }}</td>
                <td>{{ $tax->Percentage }}%</td>
                <td>
                    <button class="btn btn-sm btn-primary edit-button" title="Edit"
                                            data-id="{{ $tax->id }}"
                                            data-taxes="{{ $tax->Taxes }}"
                                            data-percentage="{{ $tax->Percentage }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                    <a href="{{ route('deleteTaxes', $tax->id) }}" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this tax?');"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>S.NO</th>
                                    <th>Taxes</th>
                                    <th>Percentage
                                    </th>

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
                    <h5 class="modal-title" id="editModalLabel">Edit Tax</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="POST" action="">
                        @csrf
                        <div class="mb-3">
                            <label for="Taxes" class="form-label required-field">Taxes</label>
                            <input type="text" class="form-control" id="Taxes" name="Taxes" required>
                        </div>
                        <div class="mb-3">
                            <label for="Percentage" class="form-label required-field">Percentage</label>
                            <input type="number" class="form-control" id="Percentage" name="Percentage" required>
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
            var taxesInput = document.getElementById('Taxes');
            var percentageInput = document.getElementById('Percentage');

            editButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var id = button.getAttribute('data-id');
                    var taxes = button.getAttribute('data-taxes');
                    var percentage = button.getAttribute('data-percentage');

                    // Set the form action
                    editForm.action = '/Taxes/update/' + id;

                    // Set the input values
                    taxesInput.value = taxes;
                    percentageInput.value = percentage;

                    // Show the modal
                    editModal.show();
                });
            });
        });
        </script>
    @include('layout/script')
</body>

</html>
