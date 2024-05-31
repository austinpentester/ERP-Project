<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
      .sidebar {
          width: 250px;
          background-color: #343a40;
          position: fixed;
          top: 0;
          left: 0;
          height: 100%;
          color: #fff;
      }
      .sidebar .sidebar-item {
          padding: 10px;
      }
      .sidebar .sidebar-item a {
          color: #fff;
          text-decoration: none;
      }
      .sidebar-submenu {
          padding-left: 20px;
      }
      .required-field::after {
          content: ' *';
          color: red;
      }
      .image-preview {
          width: 100%;
          max-width: 200px;
          max-height: 200px;
          margin-top: 10px;
          border: 10px;
      }

/* CSS for smaller input fields */
.small-input {
    width: 80px; /* Adjust width as needed */
    padding: 2px; /* Adjust padding as needed */
    font-size: 12px; /* Adjust font size as needed */
}
    </style>
  </head>
