@extends('layouts.main')
@section('content')
    <section class="h-50  h-custom py-5 justify-content-center" id="main-sectin">
        <div class="container h-100 py-5 ">
            <div class="table-responsive-sm mx-5">
                <div class="container-sm">
                    <form action="{{route('product.update', $product->id)}}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="Name"
                                   value="{{$product->name}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Price</label>
                            <input type="text" class="form-control" name="price" id="price" aria-describedby="Price"
                                   value="{{$product->price}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                                      rows="3">{{$product->description}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="Category" class="form-label">Categories</label>
                            <select class="form-select" aria-label="Category" name="category_id">

                                @foreach($categories as $category)
                                    <option
                                        {{$category->id === $product->category->id ? 'Not selected' : ''}} value="{{$category->id}}">
                                        {{$category->title}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @foreach($colors as $color)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{$color->id}}" id="colors"
                                       name="colors[]"
                                    @foreach($product->colors as $prodColor)
                                    {{$color->id === $prodColor->id ? 'checked' : ''}}
                                    @endforeach>
                                <label class="form-check-label" for="colors">
                                    {{$color->title}}
                                </label>
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
