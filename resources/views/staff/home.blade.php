@extends('staff.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h4>Rayon</h4>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="{{ route('staff.rayon.index') }}">Daftar Rayon</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ route('staff.rayon.create') }}">Tambah Rayon</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h4>Rombel</h4>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="{{ route('staff.rombel.index') }}">Daftar Rombel</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ route('staff.rombel.create') }}">Tambah Rombel</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h4>Siswa</h4>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="{{ route('staff.student.index') }}">Daftar Siswa</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ route('staff.student.create') }}">Tambah Siswa</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h4>Kehadiran</h4>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="{{ route('staff.attendance.create') }}">Perbarui Kehadiran</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
