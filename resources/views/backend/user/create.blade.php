@extends('backend.layouts.app')
@section('content')
    <div class="row small-spacing">
        <div class="col-xs-12">
            <div class="card white box-content">
                <h4 class="box-title">{{ $sub }}</h4>
                <div class="card-content">
                    <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-4">
                            {{-- div left --}}
                            <div class="form-group">
                                <label>Foto</label>
                                <img class="foto-preview">
                                <input type="file" name="foto"
                                    class="form-control @error('foto') is-invalid @enderror" onchange="previewFoto()">
                                @error('foto')
                                    <div class="invalid-feedback alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8">
                            {{-- div right --}}
                            <div class="form-group">
                                <label>Hak Ases</label>
                                <select name="is_admin" class="form-control @error('is_admin') is-invalid @enderror">
                                    <option value="" {{ old('is_admin') == '' ? 'selected' : '' }}> -
                                        Pilih Hak Akses -</option>
                                    <option value="0" {{ old('is_admin') == '0' ? 'selected' : '' }}>
                                        Admin</option>
                                    <option value="1" {{ old('is_admin') == '1' ? 'selected' : '' }}>
                                        Super Admin</option>
                                </select>
                                @error('is_admin')
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" value="{{ old('nama') }}"
                                    class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama">
                                @error('nama')
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" value="{{ old('email') }}"
                                    class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email">
                                @error('email')
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Masukkan Password">
                                @error('password')
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="Konfirmasi Password">
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-success btn-xs waves-effect waves-light"
                                    id="simpanButton">
                                    Simpan
                                </button>
                                <a href="{{ route('user.index') }}">
                                    <button type="button" class="btn btn-danger btn-xs waves-effect waves-light">
                                        Kembali
                                    </button>
                                </a>                                
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box-content -->
            </div>
            <!-- /.col-xs-12 -->
        </div>
    </div>
@endsection
