@extends('employees.layout.layout')

@section('content')

<section>
    <div class="container">
        <div class="py-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Employee
                                <a href="{{ url('employee/') }}"><button class="btn btn-primary float-end">Back</button></a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('employee/update/') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <label for="">First Name <span class="req"></span></label>
                                            <input type="text" value="{{ $employee->first_name }}" name="first_name" class="form-control">

                                            <input type="hidden" name="id" value="{{ $employee->id }}">
                                            @error('first_name')
                                                <span class="req">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <label for="">Last Name <span class="req"></span></label>
                                            <input type="text" value="{{ $employee->last_name }}" name="last_name" class="form-control">
                                            @error('last_name')
                                                <span class="req">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <label for="">Email <span class="req"></span></label>
                                            <input type="text" value="{{ $employee->email }}" name="email" class="form-control">
                                            @error('email')
                                                <span class="req">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <label for="">Gender: <span class="req"></span></label>
                                            Male <input type="radio" value="male" name="gender" {{ $employee-> gender == 'male' ? 'checked':'' }}>
                                            Female <input type="radio" value="female" name="gender" {{ $employee-> gender == 'female' ? 'checked':'' }}>
                                            @error('gender')
                                                <span class="req">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <label for="">Department <span class="req"></span></label>
                                            <select name="department" id="" class="form-control">
                                                <option value="">
                                                    --select--
                                                </option>
                                                <option value="purchaser" {{ $employee-> department == 'purchaser' ? 'selected':'' }}>Purchaser</option>>
                                                    Purchaser
                                                </option>
                                                <option value="it" {{ $employee-> department == 'it' ? 'selected':'' }}>IT</option>>
                                                    IT
                                                </option>
                                                <option value="hr" {{ $employee-> department == 'hr' ? 'selected':'' }}>HR</option>>
                                                    HR
                                                </option>
                                            </select>
                                            @error('department')
                                                <span class="req">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="form-group">
                                            <label for="">Phone <span class="req"></span></label>
                                            <input type="text" value="{{ $employee->phone }}" name="phone" class="form-control">
                                            @error('phone')
                                                <span class="req">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="card-footer">
                                        <button type="submit" class="btn btn-sm btn-primary float-end">Update</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection