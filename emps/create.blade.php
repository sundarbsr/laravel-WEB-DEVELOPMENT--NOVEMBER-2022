@extends('emps.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Employee</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('emps.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('emps.store') }}" method="POST">
    @csrf

     <div class="row">
        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Department:</strong>
                <input type="text" name="department" class="form-control" placeholder="Department">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Salary:</strong>
                <textarea class="form-control" style="height:150px" name="salary" placeholder="Salary"></textarea>
            </div>
        </div> --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Department:</strong>
                <input type="text" name="department" class="form-control" placeholder="Department">
                @error('department')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Salary:</strong>
                <input type="text" name="salary" class="form-control" placeholder="Salary">
                @error('salary')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Target:</strong>
                <input type="text" name="target" class="form-control" placeholder="Target">
                @error('target')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Employee Projectid:</strong>
                <select name="projectid" class="form-control" placeholder="Employee Project">
                    @foreach ($project as $project)
                    <option value="{{$project->id}}">{{$project->project_name}}</option>
                    @endforeach
                </select>
                @error('projectid')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Target:</strong>
                <input type="text" name="Target" class="form-control" placeholder="Target">
            </div>
        </div> --}}
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection
