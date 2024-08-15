<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class ProdukFrontend extends Controller
{
    public function produk()
    {
        return view('frontend.produk.index');
    }
}
