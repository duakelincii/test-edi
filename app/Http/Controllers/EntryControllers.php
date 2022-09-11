<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Entrydata;
use App\Models\Historycompany;
use App\Models\Pendidikan;
use App\Models\PendidikanData;
use App\Models\Telpon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;
use Alert;

class EntryControllers extends Controller
{
    public function index()
    {
        $pendidikan = Pendidikan::all();
        return view('user',compact('pendidikan'));
    }

    public function view()
    {
        $datas = Entrydata::where(['user_id' => Auth::user()->id])->get();
        return view('view',compact('datas'));
    }


    public function pdfdata($id)
    {
        $entry = Entrydata::findOrFail($id);
        $pendidikan = PendidikanData::where(['id_entry' => $id])->get();
        $company = Historycompany::where(['id_entry' => $id])->get();

        $pdf = PDF::loadview('pdfdata',compact('entry','pendidikan','company'))->setPaper('a4','potrait');
        return $pdf->stream();
    }

    public function simpan(Request $request)
    {
        DB::beginTransaction();
        try {
            $image = $request->pic_profile;
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('profile'), $imageName);
            $entry = Entrydata::create([
                'name' => $request->name,
                'nik' => $request->nik,
                'birthday' => $request->birthday,
                'position' => $request->position,
                'jk' => $request->jk,
                'agama' => $request->agama,
                'status' => $request->status,
                'goldar' => $request->goldar,
                'ex_salary' => $request->ex_salary,
                'penempatan' => $request->penempatan,
                'emergency_call' => $request->emergency_call,
                'pic_profile' => $imageName,
                'user_id' => Auth::user()->id,
            ]);

        Alamat::insert([
            'id_entry' => $entry->id,
            'alamat_ktp' => $request->alamat_ktp,
            'alamat_dom' => $request->alamat_dom,
        ]);

        Telpon::insert([
            'id_entry' => $entry->id,
            'nomor_telepon' => $request->nomor_telpon,
        ]);

        if(count($request->id_pendidikan) > 0){
            foreach ($request->id_pendidikan as $item=>$v)
            {
                $detail[] = array(
                    'id_entry'  => $entry->id,
                    'id_pendidikan' => $request->id_pendidikan[$item],
                    'nama_pendidikan' => $request->nama_pendidikan[$item],
                    'jurusan' => $request->jurusan[$item],
                    'tgl_lulus' => $request->tgl_lulus[$item],
                    'nilai' => $request->nilai[$item],
                );
            }
                PendidikanData::insert($detail);
        }

        if(count($request->company_name) > 0){
            foreach ($request->company_name as $item=>$v)
            {
                $pekerjaan[] = array(
                    'id_entry'  => $entry->id,
                    'company_name' => $request->company_name[$item],
                    'last_position' => $request->last_position[$item],
                    'last_salary' => $request->last_salary[$item],
                    'tgl_exit' => $request->tgl_exit[$item],
                );
            }
            Historycompany::insert($pekerjaan);
        }
            Alert::success('Success','Data Entry Berhasil diinput');
            DB::commit();
            return redirect(route('home'));

        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
        }

    }


    public function delete($id)
    {
        $entry = Entrydata::findOrFail($id);
        $entry->delete();
        Alert::warning('Delete Success','Data Entry Berhasil Dihapus');
        return redirect(route('home'));
    }
}
