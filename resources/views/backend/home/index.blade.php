@extends('backend.layouts.app')
@section('content')

<div class="row small-spacing">
  <div class="col-xs-12">
      <div class="box-content">
          <h4 class="card-title"><b>{{ $sub }}</b></h4>
          <div class="table-responsive">
            <h3>Selamat datang kembali <b>{{ auth()->user()->nama }}</b>, Semoga harimu menyenangkan :))</h3>
          </div>
      </div>

      <div class="table-responsive table-purchases">
        <table class="table-striped margin-bottom-10 table">
            <thead>
                <tr>
                    <th style="width:40%;">Data Penjualan</th>
                    <th>Price</th>
                    <th>Date</th>
                    <th>State</th>
                    <th style="width:5%;"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Bolen Pisang</td>
                    <td>$71</td>
                    <td>Nov 12,2016</td>
                    <td class="text-success">Completed</td>
                    <td><a href="#"><i class="fa fa-plus-circle"></i></a></td>
                </tr>
                <tr>
                    <td>Brownies</td>
                    <td>$142</td>
                    <td>Nov 10,2016</td>
                    <td class="text-danger">Cancelled</td>
                    <td><a href="#"><i class="fa fa-plus-circle"></i></a></td>
                </tr>
                <tr>
                    <td>Cofee</td>
                    <td>$200</td>
                    <td>Nov 01,2016</td>
                    <td class="text-warning">Pending</td>
                    <td><a href="#"><i class="fa fa-plus-circle"></i></a></td>
                </tr>
                <tr>
                    <td>Tea</td>
                    <td>$200</td>
                    <td>Oct 28,2016</td>
                    <td class="text-warning">Pending</td>
                    <td><a href="#"><i class="fa fa-plus-circle"></i></a></td>
                </tr>
                <tr>
                    <td>Kaya Kue</td>
                    <td>$200</td>
                    <td>Oct 28,2016</td>
                    <td class="text-success">Completed</td>
                    <td><a href="#"><i class="fa fa-plus-circle"></i></a></td>
                </tr>
                <tr>
                    <td>Souvenir</td>
                    <td>$71</td>
                    <td>Oct 22,2016</td>
                    <td class="text-success">Completed</td>
                    <td><a href="#"><i class="fa fa-plus-circle"></i></a></td>
                </tr>
                <tr>
                    <td>Pesanan</td>
                    <td>$10</td>
                    <td>Oct 15,2016</td>
                    <td class="text-success">Completed</td>
                    <td><a href="#"><i class="fa fa-plus-circle"></i></a></td>
                </tr>
                <tr>
                    <td>Coklat</td>
                    <td>$100</td>
                    <td>Oct 12,2016</td>
                    <td class="text-warning">Pending</td>
                    <td><a href="#"><i class="fa fa-plus-circle"></i></a></td>
                </tr>
                <tr>
                    <td>Pandan</td>
                    <td>$100</td>
                    <td>Oct 12,2016</td>
                    <td class="text-warning">Pending</td>
                    <td><a href="#"><i class="fa fa-plus-circle"></i></a></td>
                </tr>
                <tr>
                    <td>Cake</td>
                    <td>$35</td>
                    <td>Oct 12,2016</td>
                    <td class="text-warning">Pending</td>
                    <td><a href="#"><i class="fa fa-plus-circle"></i></a></td>
                </tr>
            </tbody>
        </table>
        <!-- /.table -->
    </div>
  </div>
</div>
 <!-- template end-->
 @endsection
