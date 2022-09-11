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
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3">
                                <label for="position">Posisi Yang Dilamar</label>
                                <input type="text" class="form-control" name="position"  >
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" class="form-control" name="name"  >
                            </div>
                            <div class="col-sm-6">
                                <label for="name">NIK</label>
                                <input type="text" class="form-control" name="nik"  >
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3">
                                <label for="name">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="birthday" >
                            </div>
                            <div class="col-sm-6">
                                <label for="name">Jenis Kelamin</label>
                                <select name="jk" id="" class="form-control">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3">
                                <label for="name">Alamat KTP</label>
                                <textarea type="text" class="form-control" name="alamat_ktp"></textarea>
                            </div>
                            <div class="col-sm-6">
                                <label for="name">Alamat Domisili</label>
                                <textarea type="text" class="form-control" name="alamat_dom"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3">
                                <label for="name">Status</label>
                                <select name="status" id="" class="form-control">
                                    <option value="">Pilih Status</option>
                                    <option value="Single">Single</option>
                                    <option value="Menikah">Menikah</option>
                                    <option value="Janda">Janda</option>
                                    <option value="Duda">Duda</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="name">Agama</label>
                                <select name="agama" id="" class="form-control">
                                    <option value="">Pilih Agama</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Protestan">Protestan</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3">
                                <label for="name">Golongan Darah</label>
                                <select name="goldar" class="form-control">
                                    <option value="">Pilih Golongan Darah</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="name">Emergency Call</label>
                                <input type="text" class="form-control" name="emergency_call"  >
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3">
                                <label for="name">No Handphone</label>
                                <input type="text" class="form-control" name="nomor_telpon" >
                            </div>
                            <div class="col-sm-6">
                                <label for="name">Bersedia Ditempatkan Diseluruh Kantor Perusahaan</label>
                                <select name="penempatan" class="form-control">
                                    <option value=""></option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3">
                                <label for="name">Expected Salary</label>
                                <input type="number" class="form-control" name="ex_salary" >
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
                                                    <option value="">Jenjang Pendidikan</option>
                                                    @foreach ($pendidikan as $data )
                                                        <option value="{{$data->id}}">{{$data->nama}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name="nama_pendidikan[]" class="form-control" />
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
                                        <button id="add_pendidikan" class="btn btn-success pull-left">Tambah Pendidikan</button>
                                        <button id='delete_pendidikan' class="pull-right btn btn-danger">Delete</button>
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
                                                <input type="text" name="last_position[]" class="form-control" />
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
                                        <button id="add_pekerjaan" class="btn btn-success pull-left">Tambah History Pekerjaan</button>
                                        <button id='delete_pekerjaan' class="pull-right btn btn-danger">Delete</button>
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
        $("#add_pendidikan").click(function(e) {
            e.preventDefault();
            let new_row_number = row_number - 1;
            $('#pendidikan' + row_number).html($('#pendidikan' + new_row_number).html()).find(
                'td:first-child');
            $('#pendidikan_table').append('<tr id="pendidikan' + (row_number + 1) + '"></tr>');
            row_number++;
        });

        $("#delete_pendidikan").click(function(e) {
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
