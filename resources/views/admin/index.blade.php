@extends('layouts.admin')
@section('content')
    <div class="content-wrapper mt-3">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Main page</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        {{-- content--}}
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$data['userCount']}}</h3>

                        <p>Users</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-solid fa-users"></i>
                    </div>
                    <a href="{{route('admin.user.index')}}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$data['productCount']}}</h3>

                        <p>Products</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-regular fa-store"></i>
                    </div>
                    <a href="{{route('admin.product.index')}}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$data['categoryCount']}}</h3>

                        <p>Categories</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-solid fa-list-ol"></i>
                    </div>
                    <a href="{{route('admin.category.index')}}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$data['colorCount']}}</h3>

                        <p>Colors</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-solid fa-palette"></i>
                    </div>
                    <a href="{{route('admin.color.index')}}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </div>
@endsection
