@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    <div class="container">
        <a href="{{route('admin.category.create')}}" class="btn btn-block btn-primary col-1">Add</a>
    </div>
    <section class="h-50  h-custom py-5 justify-content-center" id="main-sectin" >
        <div class="container h-100 py-5 ">
            <div class="table-responsive-sm mx-5">
                <div class="container text-center">
                    <div class="row align-items-start">
                        <div class="col">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
