@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">登録商品一覧</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('admin.admincreate') }}" method="GET">
                    <button type="submit" class="btn btn-primary">
                      新規投稿
                    </button>
                    </form>


                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">img</th>
                          <th scope="col">id</th>
                          <th scope="col">商品名</th>
                          <th scope="col">詳細</th>
                          <th scope="col">販売価格</th>
                          <th scope="col">作成日時</th>
                        </tr>
                      </thead>

                      <tbody>
                      @foreach($stocks as $stock)
                          <tr>
                            <th><img src="/storage/Stock_images/{{ $stock->imgpath }}" alt="" style="width: 100px;"/> </th>
                            <th>{{ $stock->id }}</th>
                            <th>{{ $stock->name }}</th>
                            <th>{{ $stock->detail }}</th>
                            <th>{{ $stock->fee }}</th>
                            <th>{{ $stock->created_at }}</th>
                            <td><a href="{{ route('admin.adminshow', ['id' => $stock->id ]) }}">詳細を見る</a></td>
                          </tr>
                      @endforeach
                      </tbody>
                    </table>
                    {{ $stocks->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection