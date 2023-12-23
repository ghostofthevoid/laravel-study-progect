@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Product</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="row  align-items-start justify-content-start ">
            <div class="col-10  rounded-10">
                <form action="{{route('admin.product.update', $product->id)}}" method="POST" class="shadow bg-white"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body ">
                        <div class="form-group w-50">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control fw-bolder" name="name" id="exampleInputEmail1"
                                   value="{{$product->name}}">
                            @error('name')
                            <div class="alert alert-danger">This field is required.</div>
                            @enderror
                        </div>
                        <div class="form-group w-25">
                            <label for="exampleInputEmail1">Price</label>
                            <input type="text" class="form-control fw-bolder" name="price" id="exampleInputEmail1"
                                   value="{{$product->price}}">
                            @error('price')
                            <div class="alert alert-danger">This field is required.</div>
                            @enderror
                        </div>
                        <div class="form-group w-50" data-select2-id="95">
                            <label for="Category" class="form-label">Category</label>
                            <select class="form-control select2 select2-hidden-accessible w-50" name="category_id">
                                @foreach($categories as $category)
                                    <option
                                        {{$category->id === $product->category->id ? 'Not selected' : ''}} value="{{$category->id}}">
                                        {{$category->title}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group w-50">
                            <label>Colors</label>
                            <select class="select2" name="color_ids[]" multiple="multiple"
                                    data-placeholder="select colors" style="width: 100%;">
                                @foreach($colors as $color)
                                    <option {{is_array($product->colors->pluck('id')->toArray()) &&
                                         in_array($color->id, $product->colors->pluck('id')->toArray()) ?
                                          'selected' : ''}} value="{{$color->id}}">
                                        {{$color->title}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea id="summernote" name="description">{{$product->description}}</textarea>
                        </div>
                        <div class="product-image-thumb">
                            <img src="{{url('storage/' . $product->image)}}" alt="Product image" s>
                        </div>
                        <div class="form-group w-50">
                            <label for="exampleInputFile">Image edit</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image">
                                    <label class="custom-file-label" for="exampleInputFile">Edit file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-warning">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

@endsection
