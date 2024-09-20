@extends('backend.layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$sub}} <br><br>
                    <a href="{{ route('diskon.create') }}" title="Tambah data">
                        <button type="button" class="btn btn-success btn-xs waves-effect waves-light">Tambah Kupon</button>
                    </a>
                </h5>
                <table id="example" class="table-striped table-bordered display table" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Kupon</th>
                            <th>Diskon</th>
                            <th>Tanggal Kadaluarsa</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    <tbody>
                        @foreach($kupons as $index => $kupon)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td> {{ $kupon->kode }} </td>
                                <td> {{ $kupon->diskon }}% </td>
                                <td> {{ $kupon->tanggal_kadaluarsa }} </td>
                                <td> {{ $kupon->status ? 'Aktif' : 'Non-aktif' }} </td>
                                <td align="center">
                                    <a href="{{ route('diskon.edit', $kupon->id) }}" title="Ubah Data">
                                        <span class="btn btn-success btn-xs waves-effect waves-light"><i class="fa fa-edit"></i> Ubah</span>
                                    </a>
                                    <form method="POST" action="{{ route('diskon.destroy', $kupon->id) }}" style="display: inline-block;">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-xs waves-effect waves-light show_confirm" 
                                            data-toggle="tooltip" title="Hapus">
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
