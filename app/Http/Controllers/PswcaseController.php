<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pswcase;

class PswcaseController extends Controller
{
    public function index(Request $request) {

        if($request->has('cari')) {
            $data_pswcase = Pswcase::where('psw_problem',  'LIKE', '%'.$request->cari.'%')
                                    ->orwhere('psw_action',  'LIKE', '%'.$request->cari.'%')
                                    ->orwhere('info',  'LIKE', '%'.$request->cari.'%')
                                    ->get();
        } else {
            $data_pswcase = Pswcase::all();     
        }

        return view('pswcase.index', ['data_pswcase' => $data_pswcase]);
    }

    public function create(Request $request) {
        
        $this->validate($request, [
            'psw_problem' => 'required | min:5',
            'psw_action' => 'required | min:5',
            'info' => 'required | min:3 '
        ]);
        
        Pswcase::create($request->all());
        // return $request->all();
        return redirect('/pswcase')->with('sukses', 'Data Saved');
    }

    public function edit($id) {
        $data_pswcase = Pswcase::find($id);
        // print($data_pswcase);
        return view('pswcase.edit', ['data_pswcase' => $data_pswcase]);
    }

    public function update(Request $request, $id) {
        $data_pswcase = Pswcase::find($id);
        $data_pswcase->update($request->all());
        return redirect('/pswcase')->with('sukses', 'Data Updated');
    }

    public function delete($id) {
        $data_pswcase = Pswcase::find($id);
        $data_pswcase->delete();
        return redirect('/pswcase')->with('sukses', 'Data Deleted');
    }

    public function case($id) {
        $data_pswcase = Pswcase::find($id);
        return view('pswcase.case', ['data_pswcase' => $data_pswcase]);
    }

 }
