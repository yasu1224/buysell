@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    商品名:
                    {{ $stock->name }}
                    <br>
                    <img src="/storage/Stock_images/{{ $stock->imgpath }}" alt="" style="width: 300px;"/>
                    <br>
                    商品詳細:
                    {{ $stock->detail }}
                    <br>
                    販売価格:
                    {{ $stock->fee }}
                    <br>
                    投稿日時:
                    {{ $stock->created_at }}
                    <br>
                    更新日時:
                    {{ $stock->updated_at }}
                    </form>

                    <form action="{{ route('admin.adminedit', ['id' => $stock->id]) }}" method="GET">
                    @csrf
                        <input class="btn btn-info" type="submit" value="変更する">
                    </form>

                    <form action="{{ route('admin.admindestroy', ['id' => $stock->id]) }}" id="delete_{{ $stock->id }}" method="POST">
                      @csrf
                    <a href="#" class="btn btn-danger" data-id="{{ $stock->id }}" onclick="deletePost(this);">削除する</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
// *******************
// 削除ボタンを押してすぐにレコードが削除されるのも問題なので、
// 一旦JavaScriptで確認メッセージを流す。
// *******************

function deletePost(e){
    'use strict';
    if(confirm('本当に削除していいですか？')){
        document.getElementById('delete_' + e.dataset.id).submit();
    }
}
</script>
@endsection