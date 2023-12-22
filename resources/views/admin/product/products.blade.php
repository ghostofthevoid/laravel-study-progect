@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Products</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="col-1">
            <a href="{{route('admin.product.create')}}" class="btn btn-block btn-primary ">Add</a>
        </div>
        <div class="row mt-3">
            <div class="col-8">
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap text-center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th colspan="3">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td><a href="{{route('admin.product.show', $product->id)}}" class="text-indigo"><i
                                                class="fas fa-regular fa-eye"></i></a></td>
                                    <td><a href="{{route('admin.product.edit', $product->id)}}"
                                           class="text-success"><i class="fas fa-solid fa-pen"></i></a></td>

                                    <td>
                                        <form action="{{route('admin.product.delete',  $product->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="border-0 bg-transparent">
                                            <i class="fas fa-solid fa-trash text-danger"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div>
                    {{$products->links()}}
                </div>
            </div>
        </div>

@endsection
