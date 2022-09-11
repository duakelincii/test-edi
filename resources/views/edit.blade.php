@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" align='center'>{{ __('Silahkan Mengisi Biodata Berikut') }}</div>

                <div class="card-body">
                    <form action="{{route('simpan.data')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$data->id}}" name="id">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" class="form-control" value="{{$data->name}}" name="name"  >
                            </div>
                            <div class="col-sm-6">
                                <label for="name">NIK</label>
                                <input type="text" class="form-control" name="nik" value="{{$data->nik}}" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3">
                                <label for="name">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="birthday" value="{{$data->birthday}}" >
                            </div>
                            <div class="col-sm-6">
                                <label for="name">Jenis Kelamin</label>
                                <select name="jk" id="" class="form-control">
                                    <option value="" {{ $data->jk == '' ? 'selected' : '' }} disabled>Jenis Kelamin</option>
                                    <option value="Laki-laki" {{ $data->jk == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ $data->jk == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3">
                                <label for="name">Alamat KTP</label>
                                <textarea type="text" class="form-control" name="alamat_ktp" value="{{$data->alamat->alamat_ktp}}"></textarea>
                            </div>
                            <div class="col-sm-6">
                                <label for="name">Alamat Domisili</label>
                                <textarea type="text" class="form-control" name="alamat_dom" value="{{$data->alamat->alamat_dom}}"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3">
                                <label for="name">Status</label>
                                <select name="status" id="" class="form-control">
                                    <option value="" {{ $data->status == '' ? 'selected' : '' }}>Pilih Status</option>
                                    <option value="Single" {{ $data->status == 'Single' ? 'selected' : '' }}>Single</option>
                                    <option value="Menikah" {{ $data->status == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                                    <option value="Janda" {{ $data->status == 'Janda' ? 'selected' : '' }}>Janda</option>
                                    <option value="Duda" {{ $data->status == 'Duda' ? 'selected' : '' }}>Duda</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="name">Agama</label>
                                <select name="agama" id="" class="form-control">
                                    <option value=""{{ $data->agama == '' ? 'selected' : '' }}>Pilih Agama</option>
                                    <option value="Islam" {{ $data->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="Katolik" {{ $data->agama == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                    <option value="Protestan" {{ $data->agama == 'Protestan' ? 'selected' : '' }}>Protestan</option>
                                    <option value="Hindu" {{ $data->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                    <option value="Buddha" {{ $data->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3">
                                <label for="name">Golongan Darah</label>
                                <select name="goldar" class="form-control">
                                    <option value="" {{ $data->goldar == '' ? 'selected' : '' }}>Pilih Golongan Darah</option>
                                    <option value="A" {{ $data->goldar == 'A' ? 'selected' : '' }}>A</option>
                                    <option value="B" {{ $data->goldar == 'B' ? 'selected' : '' }}>B</option>
                                    <option value="AB" {{ $data->goldar == 'AB' ? 'selected' : '' }}>AB</option>
                                    <option value="O" {{ $data->goldar == 'O' ? 'selected' : '' }}>O</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="name">Emergency Call</label>
                                <input type="text" class="form-control" name="emergency_call" value="{{$data->emergency_call}}"  >
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3">
                                <label for="name">No Handphone</label>
                                <input type="text" class="form-control" name="nomor_telpon" value="{{$data->phone->nomor_telepon}}">
                            </div>
                            <div class="col-sm-6">
                                <label for="name">Bersedia Ditempatkan Diseluruh Kantor Perusahaan</label>
                                <select name="penempatan" class="form-control">
                                    <option value="" {{ $data->penempatan == '' ? 'selected' : '' }}></option>
                                    <option value="Ya" {{ $data->penempatan == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ $data->penempatan == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3">
                                <label for="name">Expected Salary</label>
                                <input type="number" class="form-control" name="ex_salary" value="{{$data->ex_salary}}">
                            </div>
                            <div class="col-sm-6">
                                <label for="name">Photo </label>
                                <span style="color: red">Ukuran 4x6</span>
                                <input type="file" class="form-control" name="pic_profile"  >
                            </div>
                        </div>

                        {{--Pendidikan --}}
                        <div class="card">
                            <div class="card-header">
                                Pendidikan
                            </div>

                            <div class="card-body">
                                <table class="table" id="pendidikan_table">
                                    <thead>
                                        <tr>
                                            <th>Pendidikan</th>
                                            <th>Nama Pendidikan</th>
                                            <th>Jurusan</th>
                                            <th>Tanggal Lulus</th>
                                            <th>Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr id="pendidikan0">
                                            <td>
                                                <select name="id_pendidikan[]" class="form-control">
                                                    @foreach ($pendidikan as $data )
                                                        <option value="{{$data->id}}" {{ $data->id == '' ? 'selected' : '' }}>{{$data->nama}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name="nama_pendidikan[]"  class="form-control" />
                                            </td>
                                            <td>
                                                <input type="text" name="jurusan[]" class="form-control" />
                                            </td>
                                            <td>
                                                <input type="date" name="tgl_lulus[]" class="form-control" />
                                            </td>
                                            <td>
                                                <input type="text" name="nilai[]" class="form-control" />
                                            </td>
                                        </tr>
                                        <tr id="pendidikan1"></tr>
                                    </tbody>
                                </table>

                                <div class="row">
                                    <div class="col-md-12">
                                        <button id="add_row" class="btn btn-success pull-left">+ Add Row</button>
                                        <button id='delete_row' class="pull-right btn btn-danger">- Delete Row</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--Riwayat Pekerjaan --}}
                        <div class="card mt-3">
                            <div class="card-header">
                                Riwayat Pekerjaan
                            </div>

                            <div class="card-body">
                                <table class="table" id="pekerjaan_table">
                                    <thead>
                                        <tr>
                                            <th>Nama Perusahaan</th>
                                            <th>Jabatan</th>
                                            <th>Gaji Terakhir</th>
                                            <th>Tanggal Keluar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr id="pekerjaan0">
                                            <td>
                                                <input type="text" name="company_name[]" class="form-control" />
                                            </td>
                                            <td>
                                                <input type="text" name="position[]" class="form-control" />
                                            </td>
                                            <td>
                                                <input type="text" name="last_salary[]" class="form-control" />
                                            </td>
                                            <td>
                                                <input type="date" name="tgl_exit[]" class="form-control" />
                                            </td>
                                        </tr>
                                        <tr id="pekerjaan1"></tr>
                                    </tbody>
                                </table>

                                <div class="row">
                                    <div class="col-md-12">
                                        <button id="add_pekerjaan" class="btn btn-success pull-left">+ Add Row</button>
                                        <button id='delete_pekerjaan' class="pull-right btn btn-danger">- Delete Row</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block mt-3">
                            <i class="fas fa-save fa-fw"></i> Simpan
                        </button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function() {
        let row_number = 1;
        $("#add_row").click(function(e) {
            e.preventDefault();
            let new_row_number = row_number - 1;
            $('#pendidikan' + row_number).html($('#pendidikan' + new_row_number).html()).find(
                'td:first-child');
            $('#pendidikan_table').append('<tr id="pendidikan' + (row_number + 1) + '"></tr>');
            row_number++;
        });

        $("#delete_row").click(function(e) {
            e.preventDefault();
            if (row_number > 1) {
                $("#pendidikan" + (row_number - 1)).html('');
                row_number--;
            }
        });
    });

    $(document).ready(function() {
        let row_number = 1;
        $("#add_pekerjaan").click(function(e) {
            e.preventDefault();
            let new_row_number = row_number - 1;
            $('#pekerjaan' + row_number).html($('#pekerjaan' + new_row_number).html()).find(
                'td:first-child');
            $('#pekerjaan_table').append('<tr id="pekerjaan' + (row_number + 1) + '"></tr>');
            row_number++;
        });

        $("#delete_pekerjaan").click(function(e) {
            e.preventDefault();
            if (row_number > 1) {
                $("#pekerjaan" + (row_number - 1)).html('');
                row_number--;
            }
        });
    });
</script>
@endsection
