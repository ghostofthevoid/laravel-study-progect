@extends('layouts.main')
@section('content')
    <section class="h-50  h-custom py-5 justify-content-center" id="main-sectin">
        <div class="container h-100 py-5 ">
            <div class="table-responsive-sm mx-5">
                <div class="container-sm">
                    <form action="{{route('product.store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="Name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Price</label>
                            <input type="text" class="form-control" name="price" id="price" aria-describedby="Price">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                                      rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="Category" class="form-label">Categories</label>
                            <select class="form-select" aria-label="Category" name="category_id">
                                <option selected>Not selected</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

