<!DOCTYPE html>
<html lang="id" dir="ltr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('frontend/css/style-login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login dan Registrasi</title>
</head>
<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        {{-- <img src="{{ asset('frontend/images/frontImg.jpg') }}" alt=""> --}}
        {{-- <div class="text">
          <span class="text-1">Masuk ke akunmu dulu yuk, <br> Dapatkan banyak promo menarik di</span>
          <span class="text-2">Miemie Brownie</span>
        </div> --}}
      </div>
      <div class="back">
        {{-- <img class="backImg" src="{{ asset('frontend/images/backImg.jpg') }}" alt=""> --}}
        {{-- <div class="text">
          <span class="text-1">Daftarkan akunmu dulu yuk <br> Dapatkan banyak promo menarik di</span>
          <span class="text-2">Miemie Brownie</span>
        </div> --}}
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
        <div class="login-form">
    <div class="title">Login</div>
    @if(session('error'))
        <div class="alert alert-danger" style="color: red; margin-bottom: 15px;">
            {{ session('error') }}
        </div>
    @endif
    <form action="{{ route('customer.login') }}" method="POST">
        @csrf
        <div class="input-boxes">
            <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Masukkan email Anda" required>
            </div>
            <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Masukkan kata sandi (minimal 8 karakter)" minlength="8" required>
            </div>
            <div class="text"><a href="#">Lupa kata sandi?</a></div>
            <div class="button input-box">
                <input type="submit" value="Kirim">
            </div>
            <div class="text sign-up-text">Belum punya akun? <label for="flip">Daftar sekarang</label></div>
            <div class="text sign-up-text"><a style="color: #FF3A85" href="/"><span>&#8592;</span> Beranda</a></div>
        </div>
    </form>
</div>

        <div class="signup-form">
          <div class="title">Daftar</div>
        <form action="{{ route('customer.signup') }}" method="POST">
            @csrf
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="nama" placeholder="Masukkan nama Anda" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Masukkan email Anda" required>
              </div>
              <div class="input-box">
                <i class="fas fa-phone"></i>
                <input type="number" name="hp" placeholder="Masukkan nomor telepon Anda" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password (minimal 8 karakter)" required>
              </div>                           
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password (minimal 8 karakter)" required>
              </div>       
              <div class="button input-box">
                <input type="submit" value="Kirim">
              </div>
              <div class="text sign-up-text">Sudah punya akun? <label for="flip">Login sekarang</label></div>
            </div>
      </form>
    </div>
    </div>
    </div>
  </div>
</body>
</html>
