@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit User</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="h-custom py-3" id="">

            <div class="row align-items-start justify-content-center ">
                <div class="col-6 rounded-10">
                    <form action="{{route('admin.user.update', $user->id)}}" class="bg-gray-dark rounded-10"
                          method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="card-body ">
                            <div class="form-group">
                                <label for="exampleInputEmail1">User name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                       placeholder="Enter name" value="{{ $user->name }}">
                                @error('name')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                       placeholder="Enter email" value="{{ $user->email }}">
                                @error('email')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50" >
                                <label for="Category" class="form-label">Chooses a role</label>
                                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                        aria-hidden="true" name="role">
                                    @foreach($roles as $id => $role)
                                        <option
                                            {{$user->role == $id ? 'selected': ''}}
                                            value="{{$id}}">{{$role}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group w-50" >
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                            </div>
                            <div class="border-dark">
                                <button type="submit" class="btn btn-warning">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </section>
@endsection
