@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-3 ">{{$category->title}}</h1>
                        <a href="{{route('admin.category.edit', $category->id)}}" class="text-success"><i class="fas fa-solid fa-pen"></i></a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="card col-7">
            <div class="row align-items-start justify-content-center ">
                <div class=" card-body table-responsive rounded-10">
                    <table class="table table-hover text-nowrap " style="text-align: center">
                        <tbody>
                        <tr>
                            <td>ID</td>
                            <td>{{$category->id}}</td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{$category->title}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
