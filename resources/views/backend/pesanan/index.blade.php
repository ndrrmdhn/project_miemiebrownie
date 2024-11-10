@extends('backend.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $sub }} <br><br>
                    <a href="{{ route('pesanan.create') }}" title="Tambah data">
                        <button type="button" class="btn btn-success btn-xs waves-effect waves-light">Tambah</button>
                    </a>
                </h5>
                <table id="example" class="table-striped table-bordered display table" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Pesanan</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Nama Customer</th>
                            <th>Alamat Lengkap</th>
                            <th>No HP</th>
                            <th>Produk</th>
                            <th>Total</th>
                            <th>Metode Pengiriman</th>
                            <th>Metode Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pesanan as $index => $row)
                            <tr>
                                <td align="center">{{ $index + 1 }}</td>
                                <td>{{ $row->no_pesanan }}</td>
                                <td align="center">
                                    @switch($row->status_pesanan)
                                        @case('pending')
                                            <span class="badge badge-secondary">Pending</span>
                                            @break
                                        @case('proses')
                                            <span class="badge badge-info">Proses</span>
                                            @break
                                        @case('selesai')
                                            <span class="badge badge-success">Selesai</span>
                                            @break
                                        @case('batal')
                                            <span class="badge badge-danger">Batal</span>
                                            @break
                                        @default
                                            <span class="badge badge-warning">Tidak Diketahui</span>
                                    @endswitch
                                </td>
                                <!-- Format tanggal ke WIB -->
                                <td>{{ \Carbon\Carbon::parse($row->tanggal)->timezone('Asia/Jakarta')->format('d M Y H:i') }}</td>
                                <td>{{ $row->nama_customer }}</td>
                                <td>{{ $row->alamat }}</td>
                                <td>{{ $row->no_hp }}</td>
                                <!-- Tampilkan nama produk menggunakan relasi produk -->
                                <td>
                                    @foreach($row->items as $item)
    {{ $item->produk->nama_produk }} ({{ $item->jumlah_pesanan }}){{ !$loop->last ? ',' : '' }}
@endforeach
                                </td>
                                <td>Rp. {{ number_format($row->total, 0, ',', '.') }}</td>
                                <td>
                                    {{ $row->metode_pengiriman }}
                                </td>
                                <td>
                                    @if($row->metode_pembayaran === 'bank_transfer')
                                        <span>Transfer Bank</span>
                                    @else
                                        <span>Qris</span>
                                    @endif
                                </td>                                                                                 
                                <td align="center">
                                    <a href="{{ route('pesanan.edit', $row->id) }}" title="Ubah Data" class="btn btn-success btn-xs">
                                        <i class="fa fa-edit"></i> Ubah
                                    </a>
                                    <form method="POST" action="{{ route('pesanan.destroy', $row->id) }}" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-xs show_confirm" data-konf-delete="{{ $row->no_pesanan }}">
                                            <i class="fa fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>                             
                </table>
            </div>
        </div>
    </div>
</div>
@endsection