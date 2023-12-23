@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Adding Product</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="h-custom py-3">
            <div class="row  align-items-start justify-content-start ">
                <div class="col-10 mx-5 rounded-10">
                    <form action="{{route('admin.product.store')}}" method="POST" class="shadow bg-white" novalidate
                          enctype="multipart/form-data">
                        @csrf
                        <div class="card-body ">
                            <div class="form-group w-50">
                                <label for="name">Name</label>
                                <input type="text" class="form-control fw-bolder" name="name" id="exampleInputEmail1"
                                       value="{{ old('name') }}">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group w-25">
                                <label for="exampleInputEmail1">Price</label>
                                <input type="text" class="form-control fw-bolder" name="price" id="exampleInputEmail1"
                                       value="{{ old('price') }}">
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50" data-select2-id="95">
                                <label for="Category" class="form-label">Category</label>
                                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                        aria-hidden="true" name="category_id">
                                    <option selected value="{{null}}">Not selected</option>
                                    @foreach($categories as $category)
                                        <option
                                            {{old('category_id') == $category->id ? 'selected': ''}}
                                            value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group w-50">
                                <label>Colors</label>
                                <select class="select2" name="color_ids[]" multiple="multiple"
                                        data-placeholder="select colors" style="width: 100%;">
                                    @foreach($colors as $color)
                                        <option
                                            {{is_array(old('color_ids')) && in_array($color->id, old('color_ids')) ? 'selected' : ''}} value="{{$color->id}}">
                                            {{$color->title}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea id="summernote" name="description"></textarea>
                            </div>
                            <div class="form-group w-50">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
@endsection
