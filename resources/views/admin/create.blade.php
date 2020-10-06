@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">商品登録フォーム</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.adminstore') }}" method="POST" enctype='multipart/form-data'>
                    @csrf
                        商品名
                        <input type="text" name="name">
                        <br>
                        販売価格
                        <input type="text" name="fee">
                        <br>
                        商品詳細
                        <textarea name="detail"></textarea>
                        <br>
                        画像アップロード
                        <input type="file" name="imgpath">
                        <br>

                        <input class="btn btn-info" type="submit" value="登録する">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection