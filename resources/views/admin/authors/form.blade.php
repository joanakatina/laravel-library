@extends('layouts.admin')

@section('title', 'Authors')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create new author</h6>
        </div>
        <div class="card-body">
            {{-- @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif --}}

            {{-- Form::model ir Form::open metodai automatiškai prideda prie formos CSRF žetoną, todėl atskirai jo aprašyti nereikia --}}
            @if(isset($author))
                {!! Form::model($author, ['url' => ['admin/authors', $author->id], 'method' => 'patch', 'class' => 'needs-validation', 'novalidate' => '']) !!}
            @else
                {!! Form::open(['url' => 'admin/authors', 'class' => 'needs-validation', 'novalidate' => '']) !!}
            @endif

            <div class="form-group">
                {!! Form::label('first_name', 'First name: ', ['class' => 'col-sm-3']) !!}
                <div class="col-sm-6">
                    {!! Form::text('first_name', null, ['class' => 'form-control'.($errors->has('first_name') ? ' is-invalid' : ''), 'required' => 'required']) !!}
                    {!! $errors->first('first_name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('middle_name', 'Middle name: ', ['class' => 'col-sm-3']) !!}
                <div class="col-sm-6">
                    {!! Form::text('middle_name', null, ['class' => 'form-control'.($errors->has('middle_name') ? ' is-invalid' : '')]) !!}
                    {!! $errors->first('middle_name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('last_name', 'Last name: ', ['class' => 'col-sm-3']) !!}
                <div class="col-sm-6">
                    {!! Form::text('last_name', null, ['class' => 'form-control'.($errors->has('last_name') ? ' is-invalid' : ''), 'required' => 'required']) !!}
                    {!! $errors->first('last_name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <div class="form-check form-check-inline">
                        {!! Form::radio('gender', '1', false, ['class' => 'form-check-input']) !!}
                        {!! Form::label('gender', 'Man', ['class' => 'form-check-label']) !!}
                    </div>
                    <div class="form-check form-check-inline">
                        {!! Form::radio('gender', '2', false, ['class' => 'form-check-input']) !!}
                        {!! Form::label('gender', 'Woman', ['class' => 'form-check-label']) !!}
                    </div>
                    {!! $errors->first('gender', '<div class="invalid-feedback" style="display: block;">:message</div>') !!}
                </div>
            </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-3">
                        {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
