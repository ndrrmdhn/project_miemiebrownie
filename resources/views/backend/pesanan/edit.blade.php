@extends('backend.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $sub }}</h5>
                <form action="{{ route('pesanan.update', $edit->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="nama_customer">Nama Customer</label>
                        <input type="text" class="form-control" id="nama_customer" name="nama_customer" value="{{ $edit->nama_customer }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ $edit->alamat }}</textarea>
                    </div>
                    
                    <!-- Tambahkan kolom input untuk nomor HP -->
                    <div class="form-group">
                        <label for="no_hp">Nomor HP</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $edit->no_hp }}" required>
                    </div>

                    <div class="form-group">
                        <label for="status_pesanan">Status Pesanan</label>
                        <select class="form-control" id="status_pesanan" name="status_pesanan" required>
                            <option value="pending" {{ $edit->status_pesanan == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="proses" {{ $edit->status_pesanan == 'proses' ? 'selected' : '' }}>Proses</option>
                            <option value="selesai" {{ $edit->status_pesanan == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="batal" {{ $edit->status_pesanan == 'batal' ? 'selected' : '' }}>Batal</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
