<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Data Pelamar</title>
</head>

<style type="text/css">

    #datadiri{
        font-size: 12px;
        margin-left: 2cm;
    }
    #pendidikan{
        font-size: 12px;
        align-content: center;
        width: 100%;
        margin-top:3px;
    }
    #pekerjaan{
        font-size: 12px;
        align-content: center;
        width: 100%;
        margin-top:3px;
    }
    #penempatan{
        font-size: 12px;
        margin-left: 1cm;
        margin-top: 1cm
    }
    #tanggal{
        margin-top: 1cm;
    }

</style>

<body>
    <div align="center">
        <img src="{{URL::asset('assets/img/edi.png')}}" alt="" width="30%">
    </div>

    <div>
        <h3 align='center'><u>DATA PRIBADI PELAMAR</u></h3>
    </div>
    <div>
        <table id="datadiri">
            <tr>
                <td width="200px">POSISI YANG DILAMAR</td>
                <td> : <b>{{$entry->position}}</b></td>
            </tr>
            <tr>
                <td width="200px">NAMA LENGKAP</td>
                <td> : <b>{{strtoupper($entry->name)}}</b></td>
            </tr>
            <tr>
                <td width="200px">NIK</td>
                <td> : <b>{{$entry->nik}}</b></td>
            </tr>
            <tr>
                <td width="200px">TANGGAL LAHIR</td>
                <td> : <b>{{ \Carbon\Carbon::parse($entry->birthday)->format('d M Y')}}</b></td>
            </tr>
            <tr>
                <td width="200px">JENIS KELAMIN</td>
                <td> : <b>{{strtoupper($entry->jk)}}</b></td>
            </tr>
            <tr>
                <td width="200px">AGAMA</td>
                <td> : <b>{{strtoupper($entry->agama)}}</b></td>
            </tr>
            <tr>
                <td width="200px">STATUS</td>
                <td> : <b>{{strtoupper($entry->status)}}</b></td>
            </tr>
            <tr>
                <td width="200px">ALAMAT KTP</td>
                <td> : <b>{{$entry->alamat->alamat_ktp}}</b></td>
            </tr>
            <tr>
                <td width="200px">ALAMAT Domisili</td>
                <td> : <b>{{$entry->alamat->alamat_dom}}</b></td>
            </tr>
            <tr>
                <td width="200px">EMAIL</td>
                <td> : <b>{{$entry->user->email}}</b></td>
            </tr>
            <tr>
                <td width="200px">ORANG YANG DAPAT DIHUBUNGI</td>
                <td> : <b>{{$entry->emergency_call}}</b></td>
            </tr>
        </table>
        <br>
    </div>
    <div>
        <u>Pendidikan Terakhir</u>
        <table id="pendidikan" class="table table-striped">
            <thead>
                <tr>
                    <th>Jenjang Pendidikan</th>
                    <th>Nama Pendidikan</th>
                    <th>Jurusan</th>
                    <th>Tahun Lulus</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($pendidikan as $data )
                <tr>
                    <td>{{$data->pendidikan->nama}}</td>
                    <td>{{$data->nama_pendidikan}}</td>
                    <td>{{$data->jurusan}}</td>
                    <td>{{\Carbon\Carbon::parse($data->tgl_lulus)->format('Y')}}</td>
                    <td>{{$data->nilai}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div style="margin-top: 1cm">
        <u>Riwayat Pekerjaan</u>
        <table id="pekerjaan" class="table table-striped">
            <thead>
                <tr>
                    <th>Nama Perusahaan</th>
                    <th>Jabatan</th>
                    <th>Salary Terakhir</th>
                    <th>Tahun Resign</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($company as $data )
                <tr>
                    <td>{{$data->company_name}}</td>
                    <td>{{$data->last_position}}</td>
                    <td>@rupiah($data->last_salary)</td>
                    <td>{{\Carbon\Carbon::parse($data->tgl_exit)->format('Y')}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div>
        <table id="penempatan">
            <tr>
                <td width="500px">BERSEDIA DITEMPATKAN DISELURUH KANTOR PERUSAHAAN</td>
                <td> : <b>{{$entry->penempatan}}</b></td>
            </tr>
            <tr>
                <td width="500px">PENGHASILAN YANG DIHARAPKAN</td>
                <td> : <b>@rupiah($entry->ex_salary)</b>/Bulan</td>
            </tr>
        </table>
    </div>
    <div>
        <table align="right" id="tanggal">
            <tr>
                <th>Jakarta , {{\Carbon\Carbon::now()->isoFormat('D MMMM Y')}} </th>
            </tr>
            <br><br><br><br>
            <tr>
                <td>( <u>{{strtoupper($entry->name)}}</u> )</td>
            </tr>
        </table>
    </div>
</body>
</html>
