<?php

namespace App\Http\Controllers\API;

use App\Models\Pegawai;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index','show']]);
    }

    public function index()
    {
        //$pegawais = Pegawai::all();
        $pegawais = Pegawai::with('jabatan','riwayatpendidikan')->get();
        return response()->json($pegawais);
    }

   
    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
                            'nip' => 'required',
                            'nama' => 'required',
                            'tgl_lahir' => 'required',
                            'jk' => 'required',
                            'telepon' => 'required'
        ]);
        if ($validate->passes()) {
            $pegawais = Pegawai::create($request->all());
            return response()->json([
                'message' => 'Data Berhasil Disimpan',
                'data' => $pegawais
            ]);
    }else{

        return response()->json([
            'message' => 'Data Gagal Disimpan',
            'data' => $validate->errors()->all()
        ]);

    }
    
    }

    public function show($pegawais)
    {
        $pegawais = Pegawai::with('jabatan','riwayatpendidikan')->where('id', $pegawais)->first();
                if (!empty($pegawais)) {
                    return $pegawais;
        }
        return response()->json(['message' => 'data tidak ditemukan'], 404);
    }
   
    public function edit(Pegawai $pegawai)
    {
        //
    }

 
    public function update(Request $request, $pegawais)
    {
        $pegawais = Pegawai::where('id', $pegawais)->first();
                if (!empty($pegawais)) {
                    $validate = Validator::make($request->all(), [
                            'nip' => 'required',
                            'nama' => 'required',
                            'tgl_lahir' => 'required',
                            'jk' => 'required',
                            'telepon' => 'required'
        ]);

        if ($validate->passes()) {
            $pegawais->update($request->all());
            return response()->json([
                'message' => 'Data Berhasil Disimpan',
                'data' => $pegawais
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
        //$pegawais->update($request->all());
        //return response()->json([
        //    'message' => 'Data Berhasil Diupdate',
        //    'data' =>  $pegawais
        //]);
    }

 
    public function destroy($pegawais)
    {
        $pegawais = Pegawai::where('id', $pegawais)->first();
        if (empty($pegawais)) {
            return response()->json(['message' => 'data tidak ditemukan'], 404);
        }
        $pegawais->delete();
        return response()->json([

            'message' => 'data berhasil dihapus'
        ], 200);
    }
}
