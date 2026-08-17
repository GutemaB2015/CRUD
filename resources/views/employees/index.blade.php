@extends('employees.layout.layout')
@section('content')
    <section>
        <div class="container">
            <div class="py-4">
                <div class="row">
                    <div class="col-md-12">
                        @if (session('success_message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{ session('success_message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <h2>
                                    Employees
                                    <a href="{{ url('employee/add') }}" class="btn btn-sm btn-primary float-end">Add Employee</a>
                                </h2>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="example">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Full Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">Department</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @foreach ($employees as $employee)
                                            <tr>
                                                <th scope="row">{{ $employee->id }}</th>
                                                <td>{{ $employee->first_name." ".$employee->last_name }}</td>
                                                <td>{{ $employee->email }}</td>
                                                <td>{{ ucfirst($employee->gender) }}</td>
                                                <td>{{ ucfirst($employee->department) }}</td>
                                                <td>{{ $employee->phone }}</td>
                                                <td>
                        <a href="{{ url('employee/edit/'.$employee->id) }}"><i class="fa-solid fa-pen-to-square" style="color: rgb(59, 120, 101);"></i></a>
                        <a href="{{ url('employee/delete/'.$employee->id) }}" onclick="return confirm('Are you sure you want to permanently delete this employee record? ')"><i class="fa-solid fa-trash-can" style="color: rgb(214, 45, 30);"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection