<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Arsip Surat')</title>
    <style>
        body { font-family: sans-serif; margin: 0; background-color: #f4f4f9; display: flex; }
        .sidebar { width: 200px; background-color: #fff; padding: 20px; height: 100vh; border-right: 1px solid #ddd; }
        .sidebar h2 { font-size: 1.2em; }
        .sidebar ul { list-style: none; padding: 0; }
        .sidebar ul li { margin-bottom: 15px; }
        .sidebar ul li a { text-decoration: none; color: #333; font-weight: bold; }
        .main-content { flex-grow: 1; padding: 20px; }
        .container { background-color: #fff; padding: 20px; border-radius: 5px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #f2f2f2; }
        .btn { padding: 8px 12px; border: none; border-radius: 4px; color: #fff; text-decoration: none; cursor: pointer; display: inline-block; margin-right: 5px; }
        .btn-danger { background-color: #dc3545; }
        .btn-warning { background-color: #ffc107; color: #000; }
        .btn-info { background-color: #17a2b8; }
        .btn-primary { background-color: #007bff; }
        .search-form { display: flex; margin-bottom: 20px; }
        .search-form input[type="text"] { flex-grow: 1; padding: 8px; border: 1px solid #ccc; border-radius: 4px 0 0 4px; }
        .search-form input[type="submit"] { padding: 8px 12px; border: 1px solid #007bff; background: #007bff; color: white; border-radius: 0 4px 4px 0; cursor: pointer; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Menu</h2>
        <ul>
            <li>⭐ <a href="{{ route('surat.index') }}">Arsip</a></li>
            <li>🗂️ <a href="{{ route('kategori.index') }}">Kategori Surat</a></li>
            <li>ℹ️ <a href="{{ route('about') }}">About</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="container">
            @yield('content')
        </div>
    </div>

    <script>
        function confirmDelete(formId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data ini akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            })
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
