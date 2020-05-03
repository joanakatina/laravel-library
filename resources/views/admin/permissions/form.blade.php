@extends('layouts.admin')

@section('title', 'Permissions')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                @if(isset($permission))
                    Edit exist permission
                @else
                    Create new permission
                @endif
            </h6>
        </div>
        <div class="card-body">
            @if(isset($permission))
                {!! Form::model($permission, ['url' => ['admin/permissions', $permission->id], 'method' => 'patch', 'class' => 'needs-validation']) !!}
            @else
                {!! Form::open(['url' => 'admin/permissions', 'class' => 'needs-validation']) !!}
            @endif

            <div class="form-group">
                {!! Form::label('name', 'Name: ', ['class' => 'col-sm-3']) !!}
                <div class="col-sm-6">
                    {!! Form::text('name', null, ['class' => 'form-control'.($errors->has('name') ? ' is-invalid' : ''), 'required' => 'required']) !!}
                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-3">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
