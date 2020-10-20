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
                    {{ $stock->update_at }}
                    </form>

                    <form action="{{ route('admin.adminedit', ['id' => $stock->id]) }}" method="GET">
                    @csrf
                        <input class="btn btn-info" type="submit" value="変更する">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection