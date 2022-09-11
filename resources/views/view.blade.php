@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card shadow mb-4">
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="entrydata" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Posisi Yang Dilamar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @foreach ($datas as $data )
                                <tbody>
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->position}}</td>
                                        <td>
                                            <a class="btn btn-secondary btn-sm" href="{{route('pdf',$data->id)}}" target="_blank">View</a>
                                            <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$data->id}})" data-target="#DeleteModal" class="btn btn-circle btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</div>
@section('script')
    <script>

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
