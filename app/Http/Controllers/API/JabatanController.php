<?php

namespace App\Http\Controllers\API;

use App\Models\Jabatan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index','show']]);
    }

    public function index()
    {
        $jabatans = Jabatan::all();
        return response()->json($jabatans);
    }

    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
                            'jabatan' => 'required',
                            'bagian' => 'required'
        ]);
        if ($validate->passes()) {
            $jabatans = Jabatan::create($request->all());
            return response()->json([
                'message' => 'Data Berhasil Disimpan',
                'data' => $jabatans
            ]);
    }else{

        return response()->json([
            'message' => 'Data Gagal Disimpan',
            'data' => $validate->errors()->all()
        ]);

         }
    
    }

   
    public function show($jabatans)
    {
        $jabatans = Jabatan::where('id', $id)->first();
                if (!empty($jabatans)) {
                    return $jabatans;
        }
        return response()->json(['message' => 'data tidak ditemukan'], 404);
    }

    
    public function edit(Jabatan $jabatan)
    {
        //
    }

    
    public function update(Request $request, $jabatans)
    {
        $jabatans = Jabatan::where('id', $jabatans)->first();
                if (!empty($jabatans)) {
                    $validate = Validator::make($request->all(), [
                            'jabatan' => 'required',
                            'bagian' => 'required'
        ]);

        if ($validate->passes()) {
            $jabatans->update($request->all());
            return response()->json([
                'message' => 'Data Berhasil Disimpan',
                'data' => $jabatans
            ]);
        }else{
        return response()->json([
            'message' => 'Data Gagal Disimpan',
            'data' => $validate->errors()->all()
        ]);

        }
        }
        return response()->json(['message' => 'data tidak ditemukan'], 404);

        //cara singkat
        //$jabatans->update($request->all());
        //return response()->json([
        //    'message' => 'Data Berhasil Diupdate',
        //    'data' =>  $jabatans
        //]);
    }
    public function destroy($jabatans)
        {
            $jabatans = Jabatan::where('id', $jabatans)->first();
            if (empty($jabatans)) {
                return response()->json(['message' => 'data tidak ditemukan'], 404);
            }
            $jabatans->delete();
            return response()->json([
    
                'message' => 'data berhasil dihapus'
            ], 200);
        }
}
