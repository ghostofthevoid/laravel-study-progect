@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Adding Category</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    <section class="h-custom py-3" id="">

        <div class="row align-items-start justify-content-center ">
            <div class="col-6 rounded-10">
                <form action="{{route('admin.category.store')}}" class="bg-lightblue rounded-10" method="POST" >
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name="title" id="exampleInputEmail1"
                                   placeholder="Category name">
                            @error('title')
                            <div class="alert alert-danger">This field is required.</div>
                            @enderror
                        </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </section>
@endsection
