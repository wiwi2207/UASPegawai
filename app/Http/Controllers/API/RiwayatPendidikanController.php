<?php

namespace App\Http\Controllers\API;

use App\Models\RiwayatPendidikan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RiwayatPendidikanController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index','show']]);
    }

    public function index()
    {
        $riwayatpendidikans = RiwayatPendidikan::all();
        return response()->json($riwayatpendidikans);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        
        $validate = Validator::make($request->all(), [
                            'jenjang' => 'required',
                            'jurusan' => 'required',
                            'tahun' => 'required'
        ]);
        if ($validate->passes()) {
            $riwayatpendidikans = RiwayatPendidikan::create($request->all());
            return response()->json([
                'message' => 'Data Berhasil Disimpan',
                'data' => $riwayatpendidikans
            ]);
        }else{

        return response()->json([
            'message' => 'Data Gagal Disimpan',
            'data' => $validate->errors()->all()
        ]);

         }
    }

    
    public function show($riwayatpendidikans)
    {
        $riwayatpendidikans = RiwayatPendidikan::where('id', $id)->first();
                if (!empty($riwayatpendidikans)) {
                    return $riwayatpendidikans;
        }
        return response()->json(['message' => 'data tidak ditemukan'], 404);
    }

    
    public function edit(RiwayatPendidikan $riwayatPendidikan)
    {
        //
    }

    
    public function update(Request $request, $riwayatpendidikans)
    {
        $riwayatpendidikans = RiwayatPendidikan::where('id', $riwayatpendidikans)->first();
                if (!empty($jabatans)) {
                    $validate = Validator::make($request->all(), [
                            'jabatan' => 'required',
                            'bagian' => 'required'
        ]);

        if ($validate->passes()) {
            $riwayatpendidikans->update($request->all());
            return response()->json([
                'message' => 'Data Berhasil Disimpan',
                'data' => $riwayatpendidikans
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
        //$riwayatpendidikans->update($request->all());
        //return response()->json([
        //    'message' => 'Data Berhasil Diupdate',
        //    'data' =>  $$riwayatpendidikans
        //]);
    }

    
        public function destroy($riwayatpendidikans)
        {
            $riwayatpendidikans = RiwayatPendidikan::where('id', $riwayatpendidikans)->first();
            if (empty($riwayatpendidikans)) {
                return response()->json(['message' => 'data tidak ditemukan'], 404);
            }
            $riwayatpendidikans->delete();
            return response()->json([
    
                'message' => 'data berhasil dihapus'
            ], 200);
        }
}
