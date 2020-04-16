@extends('layouts.admin')

@section('title', 'Authors')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="" class="btn btn-primary"><i class="fas fa-plus"></i> Add author</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>First name</th>
                        <th>Middle name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>First name</th>
                        <th>Middle name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                    </tr>
                    </tfoot>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
