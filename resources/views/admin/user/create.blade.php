@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="h-custom py-3" id="">
            <div class="card card-primary w-50">
                <div class="card-header">
                    <h3 class="card-title">Add User <small>form</small></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('admin.user.store')}}" novalidate method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">User name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                   placeholder="Enter name" value="{{ old('name') }}">
                            @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                   placeholder="Enter email" value="{{ old('email') }}">
                            @error('email')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                   placeholder="Password">
                            @error('password')
                            <div class="alert alert-danger">This field is required.</div>
                            @enderror
                        </div>
                        <div class="form-group w-50">
                            <label for="Category" class="form-label">Chooses a role</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                    aria-hidden="true" name="role">
                                @foreach($roles as $id => $role)
                                    <option
                                        {{old('role') == $id ? 'selected': ''}}
                                        value="{{$id}}">{{$role}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </section>
@endsection
