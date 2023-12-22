@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-3 ">{{$product->name}}</h1>
                        <a href="{{route('admin.product.edit', $product->id)}}" class="text-success"><i
                                class="fas fa-solid fa-pen"></i></a>
                        <form action="{{route('admin.product.delete',  $product->id)}}" method="POST" class="ml-3">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="border-0 bg-transparent">
                                <i class="fas fa-solid fa-trash text-danger"></i>
                            </button>
                        </form>
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
                            <td>{{$product->id}}</td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{$product->name}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
