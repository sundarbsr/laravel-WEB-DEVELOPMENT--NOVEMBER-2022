@extends('emps.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Project</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('projects.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Project Name:</strong>
                {{ $project->project_name }}
            </div>
        </div>

    </div>

    <body>
        <div class="container mt-2">

              <div class="row">
                  <div class="col-lg-12 margin-tb">
                      <div class="pull-left">
                          <h2>Project table</h2>
                      </div>
                      <div class="pull-right mb-2">
                          <a class="btn btn-success" href="{{ route('projects.create') }}"> Create Project</a>
                      </div>
                  </div>
              </div>

              @if ($message = Session::get('success'))
                  <div class="alert alert-success">
                      <p>{{ $message }}</p>
                  </div>
              @endif

              <table class="table table-bordered">
                  <tr>
                      <th>Employee No</th>
                      <th>Department Name</th>
                      <th>Salary</th>
                      <th>Target</th>
                      <th>Project Name</th>
                      <th width="280px">Action</th>
                  </tr>

                  @foreach ($emps as $emp)
                      <tr>
                          <td>{{ $emp->id }}</td>
                          <td>{{ $emp->department }}</td>
                          <td>{{ $emp->salary }}</td>
                          <td>{{ $emp->target }}</td>
                          <td>{{ $emp->projects->project_name }}</td>
                          <td>
                              <form action="{{ route('emps.destroy',$emp->id) }}" method="Post">
                                  <a class="btn btn-primary" href="{{ route('emps.edit',$emp->id) }}">Edit</a>
                                  <a class="btn btn-info " href="{{ route('emps.show',$emp->id) }}">Show</a>
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                          </td>
                      </tr>
                  @endforeach
              </table>
          </div>
     </body>
@endsection
