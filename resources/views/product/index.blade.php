@extends('layouts.main')
@section('content')
        <section class="h-50  h-custom py-5 justify-content-center" id="main-sectin" style="background-color: #eee;">
            <div class="container h-100 py-5 ">
                <div class="table-responsive-sm mx-5">
                    <div class="container-sm">
                        <table class="table table-hover align-middle " style="text-align: center;">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                            </tr>
                            </thead>
                            @foreach($products as $product)
                                <tbody>
                                    <tr>
                                        <th scope="row">{{$product->id}}</th>
                                        <td> <a href="{{route('product.show', $product->id)}}">{{$product->name}}</a></td>
                                        <td>{{$product->price}}</td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </section>

@endsection

