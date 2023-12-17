@extends('layouts.main')
@section('content')
    <section class="h-50  h-custom py-5 justify-content-center" id="main-sectin">
        <div class="container h-100 py-5 ">
            <div class="table-responsive-sm mx-5">
                <div class="container-sm">
                    <form action="{{route('product.store')}}" method="POST" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="Name"
                                   value="{{ old('name') }}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Price</label>
                            <input type="text" class="form-control" name="price" id="price" aria-describedby="Price"
                                   value="{{ old('price') }}">
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                                      rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="Category" class="form-label">Categories</label>
                            <select class="form-select" aria-label="Category" name="category_id">
                                <option selected value="{{null}}">Not selected</option>
                                @foreach($categories as $category)
                                    <option
                                        {{old('category_id') == $category->id ? 'selected': ''}}
                                        value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            @foreach($colors as $color)
                                <div class="form-check ">
                                    <input class="form-check-input" type="checkbox" value="{{$color->id}}" id="colors"
                                           name="colors[]">
                                    <label class="form-check-label" for="colors">
                                        {{$color->title}}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

