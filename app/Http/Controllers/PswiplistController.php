<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Iplist;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class PswiplistController extends Controller
{
    public function index(Request $request) {
        // $data_pswip = DB::table('iplist')->paginate(10);
        
        if($request->has('cari')) {
            $data_pswip = Iplist::where('psw_servername', 'LIKE', '%'.$request->cari.'%')
                                  ->orwhere('psw_ip', 'LIKE', '%'.$request->cari.'%')
                                  ->paginate(10);
        } else {
            $data_pswip = DB::table('iplist')->paginate(10);
        }

        return view('pswiplist.index', ['data_pswip' => $data_pswip]); 
    } 


    public function create(Request $request) {
        $this->validate($request, [
            'psw_servername' => 'required | min: 2',
            'psw_ip' => 'required | min: 1'
        ]);
        
        Iplist::create($request->all());

        return redirect('/pswiplist')->with('sukses', 'Data Added!');
    }

    public function edit($id) {
        $data_pswip = Iplist::find($id);
        return view('pswiplist.edit', ['data_pswip' => $data_pswip]);
    }


    public function update(Request $request, $id) {
        $data_pswip = Iplist::find($id);
        $data_pswip->update($request->all());
        return redirect('/pswiplist')->with('sukses', 'Data Updated');
    }

    public function delete($id) {
        $data_pswip = Iplist::find($id);
        // print($data_pswip);
        $data_pswip->delete();
        return redirect('/pswiplist')->with('sukses', 'Data Deleted');
    }

}
