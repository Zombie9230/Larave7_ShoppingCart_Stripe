@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">聯絡我們</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('contactus.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">您的姓名</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">您的信箱</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">您的電話</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">您購買的商品</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="product">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">該如何幫助您</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="question">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    確定送出                                
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
