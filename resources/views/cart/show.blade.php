@extends('layouts.app')


@section('content')
<div class="container">
    @if( session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif
    <div class="row">
        @if($cart)
        <div class="col-md-8">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif


            @foreach( $cart->items as $product)
            <div class="card mb-2">
                <div class="card-body">
                    <h5 class="card-title">
                        商品名稱：{{ $product['title'] }}
                    </h5>
                        <div style="width:60%">
                            <img src="{{ $product['image'] }}" class="w-25" alt="...">
                        </div>

                    <div class="card-text">
                        價格 ${{ $product['price'] }} 元


                        <form action="{{ route('product.update',$product['id'])}}" method="post">
                            @csrf
                            @method('put')
                            <input type="text" name="qty" id="qty" value={{ $product['qty']}}>
                            <button type="submit" class="btn btn-secondary btn-sm" nclick="return confirm('確定要修改此商品數量？');">確定更改</button>

                        </form>

                        <form action="{{ route('product.remove', $product['id'] )}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm ml-4 float-right" style="margin-top: -30px;" onclick="return confirm('確定要刪除此商品？');">確定刪除</button>


                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            <p><strong>總共 : ${{$cart->totalPrice}} 元</strong></p>

        </div>

        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h3 class="card-titel">
                        您的購物車內容
                        <hr>
                    </h3>
                    <div class="card-text">
                        <p>
                            價格共 ${{$cart->totalPrice}}元
                        </p>
                        <p>
                            總數量為:{{$cart->totalQty}}個
                        </p>
                        <a href="{{ route('cart.checkout', $cart->totalPrice)}}" class="btn btn-info" onclick="return confirm('確定要付款此訂單？');">確定付款</a>
                    </div>
                </div>
            </div>
        </div>
        @else
        <p>此購物車沒有任何商品</p>
        @endif
    </div>
</div>

@endsection