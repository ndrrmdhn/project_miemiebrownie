<!doctype html>
<html lang="en">
<head>
    <title>Admin Miemie Brownie</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{ asset('backend/login/images/icons/favicon.ico')}}"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- CKEditor CSS (optional if required) -->
    <link rel="stylesheet" href="path-to-ckeditor-css-if-required">
    <!-- Include other necessary CSS files here -->

</head>
<body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="p-4 pt-5">
                @if (auth()->user()->foto)
                <img src="{{ asset('storage/img-user/' . auth()->user()->foto) }}"  class="img logo rounded-circle mb-5">
                @endif
                <!-- Menu Sidebar -->
                <ul class="list-unstyled components mb-5">
                    <li class="active">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('user.index') }}">User</a>
                    </li>
                    <li>
                        <a href="{{ route('customer.index') }}">Customer</a>
                    </li>
                    <li>
                        <a href="{{ route('diskon.index') }}">Kupon Diskon</a>
                    </li>
                    <li>
                        <a href="{{ route('berita.index') }}">Berita</a>
                    </li>
                    <li>
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Data Produk</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li>
                                <a href="{{ route('kategori.index') }}">Kategori</a>
                            </li>
                            <li>
                                <a href="{{ route('produk.index') }}">Produk</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#kategoriSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Data Pesanan</a>
                        <ul class="collapse list-unstyled" id="kategoriSubmenu">
                            <li>
                                <a href="{{ route('pesanan.index') }}">Pesanan</a>
                            </li>
                            <li>
                                <a href="{{ route('pesanan.selesai') }}">Pesanan Selesai</a>
                            </li>
                            <li>
                                <a href="{{ route('pesanan.batal') }}">Pesanan Batal</a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <!-- Tombol Logout -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-block btn-logout">Logout</button>
                </form>

                <br/>
                <br/>

                <div class="footer">
                    <p><strong>&copy; 
                        <script>
                            document.write(new Date().getFullYear());
                        </script> 
                        All rights reserved
                    </strong></p>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <div id="content" class="p-4 p-md-5">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <!-- Tombol Sidebar -->
                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Navbar Links -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}">User</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('customer.index') }}">Customer</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('berita.index') }}">Berita</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('produk.index') }}">Produk</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Isi Konten -->
            <div id="wrapper">
                <div class="main-content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('backend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/js/popper.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/main.js') }}"></script>
    <script>
        // DataTables Initialization
        $('#zero_config').DataTable();
    </script>

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script> -->
<script>
    ClassicEditor
        .create(document.querySelector('#ckeditor'))
        .catch(error => {
            console.error(error);
        });
</script>


<!-- sweetalert -->
<script src="{{ asset('sweetalert/sweetalert2.all.min.js') }}"></script>

<!-- sweetalert success-->
@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: "{{ session('success') }}"
    });
</script>
@endif

<script type="text/javascript">
    //Konfirmasi delete
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var konfdelete = $(this).data("konf-delete");
        event.preventDefault();
        Swal.fire({
            title: 'Konfirmasi Hapus Data?',
            html: "Data yang dihapus <strong>" + konfdelete + "</strong> tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, dihapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire('Terhapus!', 'Data berhasil dihapus.', 'success')
                    .then(() => {
                        form.submit();
                    });
            }
        });
    });
    //Konfirmasi Status Selesai
    $('.show_confirm_selesai').click(function(event) {
        var form = $(this).closest("form");
        var konfselesai = $(this).data("konf-selesai");
        event.preventDefault();
        Swal.fire({
            title: 'Status Selesai',
            html: "Yakin mengubah kestatus <strong>Selesai</strong> dengan kode <strong>" + konfselesai + "</strong> ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, selesai',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire('selesai!', 'Data berhasil diubah keselesai.', 'success')
                    .then(() => {
                        form.submit();
                    });
            }
        });
    });
</script>

<script>
    //hanya angka
    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }

        // Preview Image Functions
        function previewFoto() {
            const foto = document.querySelector('input[name="foto"]');
            const fotoPreview = document.querySelector('.foto-preview');
            fotoPreview.style.display = 'block';
            const fotoReader = new FileReader();
            fotoReader.readAsDataURL(foto.files[0]);
            fotoReader.onload = function(fotoEvent) {
                fotoPreview.src = fotoEvent.target.result;
                fotoPreview.style.width = '100%';
            }
        }
        // Tambahkan fungsi preview lainnya sesuai kebutuhan
    </script>
</body>
</html>
    <!-- SweetAlert Script -->
    <script src="{{ asset('sweetalert/sweetalert2.all.min.js') }}"></script>
</body>
</html>