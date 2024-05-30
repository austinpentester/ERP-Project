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
                                <h5 class="card-title fw-semibold mb-4">Major Heads  Table</h5>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="/Major_Heads" class="btn btn-dark py-8 fs-4 mb-4 rounded-2">Add</a>
                            </div>
                        </div>
                        <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>S.NO</th>
                                    <th>Major Heads
                                    </th>

                                    <th>OPTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($major_heads as $index => $major_head)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $major_head->Major_Heads }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary edit-button" title="Edit"
                                                data-id="{{ $major_head->id }}"
                                                data-major-head="{{ $major_head->Major_Heads }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <a href="{{ route('deleteMajor_Heads', $major_head->id) }}" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this category?');">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>S.NO</th>
                                    <th>Major Heads</th>

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
                <h5 class="modal-title" id="editModalLabel">Edit Major Head</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST" action="">
                    @csrf
                    <div class="mb-3">
                        <label for="editMajorHead" class="form-label required-field">Major Head</label>
                        <input type="text" class="form-control" id="editMajorHead" name="Major_Heads" required>
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

    @include('layout/script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var editButtons = document.querySelectorAll('.edit-button');
            var editModal = new bootstrap.Modal(document.getElementById('editModal'));
            var editForm = document.getElementById('editForm');
            var editMajorHeadInput = document.getElementById('editMajorHead');

            editButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var majorHead = button.getAttribute('data-major-head');
                    var id = button.getAttribute('data-id');

                    // Set the form action
                    editForm.action = '/editMajorHead/' + id;

                    // Set the input value
                    editMajorHeadInput.value = majorHead;

                    // Show the modal
                    editModal.show();
                });
            });
        });
    </script>

</body>

</html>
