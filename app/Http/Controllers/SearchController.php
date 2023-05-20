<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SearchController extends Controller
{
    //
    public function cari(Request $request)
    {
        # code...
        // dd($request->srch);
        // if($request->srch != ""){
        //     $test = "$request->srch";
        // }
        // return "$test";
        $posts = Mahasiswa::where('Nim', 'LIKE', "%". $request->cari. "%")
        ->orWhere('Nama', 'LIKE', "%". $request->cari. "%")
        ->paginate(5);
        return view('mahasiswas.index', compact('posts'));
        
    }
}
