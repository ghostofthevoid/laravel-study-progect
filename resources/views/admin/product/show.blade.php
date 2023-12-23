@extends('layouts.admin')

@section('content')
    <div class="content-wrapper my-3 ">
{{--main section--}}
        <div class="content-wrapper ml-3 shadow" style="min-height: 1604.44px;">
            <section class="content ">
                <!-- Default box -->
                <div class="card card-solid">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <h3 class="d-inline-block d-sm-none">{{$product->name}}</h3>
                                <div class="col-12">
                                    <img src="{{url('storage/' . $product->image)}}" class="product-image" alt="Product Image" style="height: 550px; width: 500px;">
                                </div>
                                <div class="col-12 product-image-thumbs">
                                    <div class="product-image-thumb active"><img src="{{url('storage/' . $product->image)}}" alt="Product Image"></div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <h3 class="my-3">{{$product->name}}</h3>
                                <p>{{$product->description}}</p>

                                <hr>
                                <h4>Available Colors</h4>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    @foreach($product->colors as $colorId)
                                    <label class="btn btn-default text-center active">
                                        <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked="">
                                    {{$colors[$colorId->id]->title}}
                                        <br>
                                        <i class="fas fa-circle fa-2x " style="color:{{lcfirst($colors[$colorId->id]->title)}};"></i>
                                    </label>
                                    @endforeach
                                </div>
                                <div class="bg-gray py-2 px-3 mt-4 w-25">
                                    <h2 class="mb-0">
                                        ${{$product->price}}
                                    </h2>
                                </div>
                                <div class="bg-transparent mt-3 d-flex w-50 ">

                                    <a href="{{route('admin.product.edit', $product->id)}}" class="btn btn-app ml-0">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{route('admin.product.delete',  $product->id)}}" method="POST" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-app">
                                            <i class="fas fa-solid fa-trash text-danger"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>
            <!-- /.content -->
        </div>

@endsection
