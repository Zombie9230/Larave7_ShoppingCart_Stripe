@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-9">
            @foreach($carts as $cart)
            <div class="card mb-3">
                <div class="card-body">
                   
                    <table class="table table-striped mt-2 mb-2">
                        <thead>
                            <tr>
                                
                                <th scope="col">購買商品名稱</th>
                                <th scope="col">購買商品價格</th>
                                <th scope="col">購買商品數量</th>
                                <th scope="col">此筆交易狀態</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($cart->items as $item)
                            <tr>
                                
                                <td>{{$item['title'] }}</td>
                                <td>${{$item['price'] }}</td>
                                <td>{{$item['qty'] }}</td>
                                <td>已付款</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                  
                </div>
            </div>
            <p class="badge badge-pill badge-info mb-3 p-3 text-white">總價格為 : ${{$cart->totalPrice}} 元</p>
            @endforeach
        </div>
    </div>
</div>

@endsection