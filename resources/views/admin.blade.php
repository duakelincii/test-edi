@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="entrydata" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Posisi Yang Dilamar</th>
                                        <th>Pendidikan Terakhir</th>
                                        <th>Nama Universitas</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $data )
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->position}}</td>
                                        <td>{{$data->pendidikandata->pendidikan->nama}}</td>
                                        <td>{{$data->pendidikandata->nama_pendidikan}}</td>
                                        <td>
                                            <a class="btn btn-secondary btn-sm" href="{{route('pdf',$data->id)}}" target="_blank">PDF</a>
                                            <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$data->id}})" data-target="#DeleteModal" class="btn btn-circle btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('#entrydata').DataTable();
    });

    function deleteData(id)
     {
         var id = id;
         var url = '{{ route("delete", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteform").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteform").submit();
     }

</script>
@endsection
