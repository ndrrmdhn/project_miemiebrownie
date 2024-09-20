@extends('backend.layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="box-title">{{ $sub }}</h4>
        <div class="card white box-content">
            <div class="card-body">
                <form action="{{ route('diskon.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Kode Kupon</label>
                        <input type="text" name="kode" value="{{ old('kode') }}"
                            class="form-control @error('kode') is-invalid @enderror" placeholder="Masukkan Kode Kupon">
                        @error('kode')
                            <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Diskon (%)</label>
                        <input type="number" name="diskon" value="{{ old('diskon') }}"
                            class="form-control @error('diskon') is-invalid @enderror" placeholder="Masukkan Diskon">
                        @error('diskon')
                            <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Tanggal Kadaluarsa</label>
                        <input type="date" name="tanggal_kadaluarsa" value="{{ old('tanggal_kadaluarsa') }}"
                            class="form-control @error('tanggal_kadaluarsa') is-invalid @enderror">
                        @error('tanggal_kadaluarsa')
                            <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror">
                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Non-aktif</option>
                        </select>
                        @error('status')
                            <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-success btn-xs waves-effect waves-light"
                                id="simpanButton">Simpan</button>
                            <a href="{{ route('diskon.index') }}">
                                <button type="button"
                                    class="btn btn-danger btn-xs waves-effect waves-light">Kembali</button>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
