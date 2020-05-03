@extends('layouts.admin')

@section('title', 'Permission')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ url('/admin/permissions/'.$permission->id.'/edit') }}" class="btn btn-primary"><i class="fas fa-edit"></i> Edit permission</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td>ID</td>
                        <td>{{ $permission->id }}</td>
                    </tr>
                    <tr>
                        <td>Permission</td>
                        <td>{{ $permission->name }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
