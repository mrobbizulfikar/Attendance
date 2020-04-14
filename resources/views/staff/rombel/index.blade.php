@extends('staff.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Rombel</div>

                <div class="panel-body">
                    <a class="btn btn-primary pull-right" href="{{ route('staff.rombel.create') }}">Tambah Rombel</a>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Rombel</th>
                                <th>Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Rombels as $Index => $Rombel)
                            <tr>
                                <td>{{ $Index + 1 }}</td>
                                <td>{{ $Rombel->name }}</td>
                                <td>{{ $Rombel->description }}</td>
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