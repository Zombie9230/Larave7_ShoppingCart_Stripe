@extends('layouts.app')


@section('content')
    <div class="container">
        <section>
        <div class="jumbotron">
            <h1 class="display-4">Laravel7_Project</h1>
            <p class="lead">簡單做一個購物網站以及模擬下單</p>
            <hr class="my-4">
            <p>Laravel7_Project</p>
            <a class="btn btn-primary btn-lg" href="{{ route('product.index') }}" role="button">更多商品</a>
            </div>
        </section>

        <section>
            <div class="row">
            @foreach( $latestProducts as $product)
                <div class="col-md-4">
                
                    <div class="card mb-2">
                            <img src="{{ $product->image }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->title }}</h5>
                                <p><strong> $ {{ $product->price }}</strong></p>
                                <p class="card-text">{{ $product->description }}</p>
                                <a href="{{ route('cart.add',$product)}}" class="btn btn-primary">加入購物車</a>                            
                            </div>
                    </div>
                    
                </div>
                @endforeach
            </div>   
        </section>

        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
    </div>
@endsection