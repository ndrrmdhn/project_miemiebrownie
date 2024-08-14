<!doctype html>
<html lang="en">
  <head>
  	<title>Sidebar 01</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{ asset('backend/css/style.css')}}">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.jpg);"></a>
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
              <a href="{{ route('produk.index') }}">Produk</a>
	          </li>
            <li>
              <a href="{{ route('kategori.index') }}">Kategori</a>
	          </li>
            <li>
              <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Data Pesanan</a>
	            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="{{ route('pesanan.index') }}">Pesanan</a>
                </li>
                <li>
                    <a href="#">Pesanan Selesai</a>
                </li>
              </ul>
	          </li>
	        </ul>

	        <div class="footer">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>

	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

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
                    <a class="nav-link" href="{{ route('produk.index') }}">Produk</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

    <div id="wrapper">
      <div class="main-content">
          <!-- isi -->
          @yield('content')
          <!-- isi end -->
      </div>
  </div>

    <script src="{{ asset('backend/js/jquery.min.js')}}"></script>
    <script src="{{ asset('backend/js/popper.js')}}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('backend/js/main.js')}}"></script>

    <script>
      /****************************************
       *       Basic Table                   *
       ****************************************/
      $('#zero_config').DataTable();
  </script>
  <!-- tambahan -->
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

  <!-- ckeditor  -->
  <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
  <!-- <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script> -->
  <script>
      ClassicEditor
          .create(document.querySelector('#ckeditor'))
          .catch(error => {
              console.error(error);
          });
  </script>

  <script type="text/javascript">
      //sweetalert delete
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
  </script>



  <script type="text/javascript">
      //sweetalert delete
      $('.logout_confirm').click(function(event) {
          var form = $(this).closest("form");
          var konfdelete = $(this).data("konf-delete");
          event.preventDefault();
          Swal.fire({
              title: 'Apakah Anda ingin Log Out?',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, Log Out',
              cancelButtonText: 'Batal'
          }).then((result) => {
              if (result.isConfirmed) {
                  Swal.fire('Log Out Berhasil!', 'success')
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

      // previewImage
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

      // previewImgBerita
      function previewImgBerita() {
          const imgBerita = document.querySelector('input[name="img_berita"]');
          const imgBeritaPreview = document.querySelector('.img-berita-preview');
          imgBeritaPreview.style.display = 'block';
          const imgBeritaReader = new FileReader();
          imgBeritaReader.readAsDataURL(imgBerita.files[0]);
          imgBeritaReader.onload = function(imgBeritaEvent) {
              imgBeritaPreview.src = imgBeritaEvent.target.result;
              imgBeritaPreview.style.width = '100%';
          }
      }

      // previewImgProduk
      function previewImgProduk() {
          const imgProduk = document.querySelector('input[name="img_produk"]');
          const imgProdukPreview = document.querySelector('.img-produk-preview');
          imgProdukPreview.style.display = 'block';
          const imgProdukReader = new FileReader();
          imgProdukReader.readAsDataURL(imgProduk.files[0]);
          imgProdukReader.onload = function(imgProdukEvent) {
              imgProdukPreview.src = imgProdukEvent.target.result;
              imgProdukPreview.style.width = '100%';
          }
      }

      //Preview Image Produk Tampilan Depan
      function previewImgProdukDepan() {
          const imgProdukDepan = document.querySelector('input[name="img_produk_depan"]');
          const imgProdukDepanPreview = document.querySelector('.img-produk-depan-preview');
          imgProdukDepanPreview.style.display = 'block';
          const imgProdukDepanReader = new FileReader();
          imgProdukDepanReader.readAsDataURL(imgProdukDepan.files[0]);
          imgProdukDepanReader.onload = function(imgProdukDepanEvent) {
              imgProdukDepanPreview.src = imgProdukDepanEvent.target.result;
              imgProdukDepanPreview.style.width = '100%';
          }
      }

      //Preview Image Produk Tampilan Belakang
      function previewImgProdukBelakang() {
          const imgProdukBelakang = document.querySelector('input[name="img_produk_belakang"]');
          const imgProdukBelakangPreview = document.querySelector('.img-produk-belakang-preview');
          imgProdukBelakangPreview.style.display = 'block';
          const imgProdukBelakangReader = new FileReader();
          imgProdukBelakangReader.readAsDataURL(imgProdukBelakang.files[0]);
          imgProdukBelakangReader.onload = function(imgProdukBelakangEvent) {
              imgProdukBelakangPreview.src = imgProdukBelakangEvent.target.result;
              imgProdukBelakangPreview.style.width = '100%';
          }
      }

      //Preview Image Produk Tampilan Kanan
      function previewImgProdukKanan() {
          const imgProdukKanan = document.querySelector('input[name="img_produk_kanan"]');
          const imgProdukKananPreview = document.querySelector('.img-produk-kanan-preview');
          imgProdukKananPreview.style.display = 'block';
          const imgProdukKananReader = new FileReader();
          imgProdukKananReader.readAsDataURL(imgProdukKanan.files[0]);
          imgProdukKananReader.onload = function(imgProdukKananEvent) {
              imgProdukKananPreview.src = imgProdukKananEvent.target.result;
              imgProdukKananPreview.style.width = '100%';
          }
      }

      //Preview Image Produk Tampilan Kiri
      function previewImgProdukKiri() {
          const imgProdukKiri = document.querySelector('input[name="img_produk_kiri"]');
          const imgProdukKiriPreview = document.querySelector('.img-produk-kiri-preview');
          imgProdukKiriPreview.style.display = 'block';
          const imgProdukKiriReader = new FileReader();
          imgProdukKiriReader.readAsDataURL(imgProdukKiri.files[0]);
          imgProdukKiriReader.onload = function(imgProdukKiriEvent) {
              imgProdukKiriPreview.src = imgProdukKiriEvent.target.result;
              imgProdukKiriPreview.style.width = '100%';
          }
      }

      $(document).ready(function() {
          $('.btn-number').click(function(e) {
              e.preventDefault();

              var fieldName = $(this).attr('data-field');
              var type = $(this).attr('data-type');
              var input = $("input[name='" + fieldName + "']");
              var currentVal = parseInt(input.val());

              if (!isNaN(currentVal)) {
                  if (type == 'minus') {
                      input.val(currentVal - 1);
                  } else if (type == 'plus') {
                      input.val(currentVal + 1);
                  }
              } else {
                  input.val(1);
              }
          });
      });
  </script>
  </body>
</html>