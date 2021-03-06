@extends('staff.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
            <div class="panel panel-default">
                <div class="panel-heading">Absensi</div>
                <div class="panel-body">
                    
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('staff.attendance.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('rombel_id') ? ' has-error' : '' }}">
                            <label for="rombel_id" class="col-md-4 control-label">Rombel</label>

                            <div class="col-md-6">
                                <select id="rombel_id" class="form-control" name="rombel_id" onchange="filter(this)" required>
                                    @foreach($Rombels as $Rombel)
                                    <option value="{{ $Rombel->id }}">{{ $Rombel->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('rombel_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rombel_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('batch') ? ' has-error' : '' }}">
                            <label for="batch" class="col-md-4 control-label">Tahun Gabung (Angkatan)</label>

                            <div class="col-md-6">
                                <input id="batch" type="text" class="form-control" name="batch" value="{{ old('batch') }}" data-toggle="datepicker-year" onchange="filter(this)" required>

                                @if ($errors->has('batch'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('batch') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                            <label for="date" class="col-md-4 control-label">Tanggal Absen</label>

                            <div class="col-md-6">
                                <input id="date" type="text" class="form-control" name="date" value="{{ old('date') }}" data-toggle="datepicker" required>

                                @if ($errors->has('date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <table class="table table-hover" id="datatable">
                            <thead>
                                <tr>
                                    <th>NIS</th>
                                    <th>Email</th>
                                    <th>Nama Depan</th>
                                    <th>Nama Belakang</th>
                                    <th>Attendance</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function() {

    window.datatable = $('#datatable').DataTable( {
        data: [],
        columns: [
            { title: "NIS" },
            { title: "Email" },
            { title: "Nama Depan" },
            { title: "Nama Belakang" },
            { title: "Attendance" }
        ]
    });

    var filter_data = {
        rombel_id: {{ count($Rombels) ? $Rombels[0]->id : 'null' }},
        batch: null
    }

    window.filter = function filter(input) {
        datatable.clear().draw();
        filter_data[input.name] = input.value;
        if(filter_data.rombel_id != null && filter_data.batch != null) {
            load_data()
        }
    }

    function load_data() {
        $.ajax({
            url: '{{ route('staff.student.index') }}',
            dataType: 'json',
            headers: {'X-CSRF-TOKEN': window.Laravel.csrfToken },
            type: 'GET',
            data: filter_data,
            success: function(data) {
                compile_datatable(data);
            }
        });
    }

    function compile_datatable(students) {
        var compiled = [];
        // console.log('students', students);
        datatable.clear();
        $.each(students, function(index, value) {
            // console.log(compiled);
            datatable.row.add([
                value.nis,
                value.email,
                value.first_name,
                value.last_name,
                '<div class="form-group">'+
                    '<label class="radio-inline">'+
                        '<input type="radio" name="'+value.id+'" value="1"> Present'+
                    '</label>'+
                    '<label class="radio-inline">'+
                        '<input type="radio" name="'+value.id+'" value="0"> Absent'+
                    '</label>'+
                '</div>'
            ]).draw();
        })
    }

});
</script>
@endsection