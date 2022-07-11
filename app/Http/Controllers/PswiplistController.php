<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Iplist;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class PswiplistController extends Controller
{
    public function index(Request $request) {
        $data_pswip = DB::table('iplist')->paginate(3);
        
        if($request->has('cari')) {
            $data_pswip = Iplist::where('psw_servername', 'LIKE', '%'.$request->cari.'%')
                                  ->orwhere('psw_ip', 'LIKE', '%'.$request->cari.'%')
                                  ->get();
        } else {
            $data_pswip = DB::table('iplist')->paginate(3);
        }

        return view('pswiplist.index', ['data_pswip'=> $data_pswip]);

    } 

}
