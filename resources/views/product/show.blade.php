@extends('layouts.main')
@section('content')
    <section class="h-50  h-custom py-5 justify-content-center" id="">
        <div class="container h-100 py-5 ">
            <div class="table-responsive-sm mx-5">
                <div class="container-sm">
                    {{$product->name}}
                    {{$product->price}}
                    <div>
                        {{$product->description}}</div>
                    <div class="container text-center bg-success">
                        <div class="row-cols-auto  justify-content-center">
                            <div class="g-col-6 g-col-md-4 m-3 ">
                                <a href="{{route('product.index')}}" class="btn btn-dark">Back</a>
                            </div>
                            <div class="g-col-6 g-col-md-4  m-3">
                                <a href="{{route('product.edit', $product->id)}}" class="btn btn-warning">Edit</a>
                            </div>
                            <div class="g-col-6 g-col-md-4 m-3">
                                <form action="{{route('product.destroy', $product->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

@endsection

