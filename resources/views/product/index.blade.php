@extends('layouts.main')
@section('content')

        <section class="p-5">
            <div class="container py-5">
                <div class="row text-center">
                    @foreach($products as $product)
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <div class="card" style="border-radius: 15px;">
                            <div class="bg-image hover-overlay ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                                <img src="{{url('storage/' . $product->image)}}" style="border-top-left-radius: 15px; border-top-right-radius: 15px; height: 300px;" class="img-fluid" alt="{{$product->name}}" />
                                <a href="#!">
                                    <div class="mask"></div>
                                </a>
                            </div>
                            <div class="card-body pb-0">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p>{{$product->name}}</p>
                                    </div>
                                    <div>
                                        <p class="small text-muted">Rated 4.0/5</p>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-0" />
                            <div class="card-body pb-0">
                                <div class="d-flex justify-content-between">
                                    <p>{{$product->price}}$</p>
                                    <p class="text-dark">#### 8787</p>
                                </div>
                                <p class="small text-muted">VISA Platinum</p>
                            </div>
                            <hr class="my-0" />
                            <div class="card-body">
                                <div class="d-flex justify-content-center align-items-center pb-2 mb-1">
                                    <button type="button" class="btn btn-primary btn-lg" data-shit-id="">Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
            <div id="app">
                <post-component>

                </post-component>
            </div>
        </section>

@endsection


