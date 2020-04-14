@extends('staff.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Rayon</div>

                <div class="panel-body">
                    <a class="btn btn-primary pull-right" href="{{ route('staff.rayon.create') }}">Tambah Rayon</a>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Rayon</th>
                                <th>Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Rayons as $Index => $Rayon)
                            <tr>
                                <td>{{ $Index + 1 }}</td>
                                <td>{{ $Rayon->name }}</td>
                                <td>{{ $Rayon->description }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection