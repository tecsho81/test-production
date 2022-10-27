@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
<h1>商品一覧</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card" style="padding: 10px">
            <div class="card-header">
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <div class="input-group-append">
                            <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>名前</th>
                            <th>種別</th>
                            <th>在庫</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $type[$item->type] }}</td>
                            <td>@if($item->status)在庫あり @else SOLD OUT @endif</td>
                            <td><a class="btn btn-secondary btn-sm" href="items/detail/{{ $item->id }}">詳細</a></td>
                            <td><a class="btn btn-warning btn-sm" href="items/edit/{{ $item->id }}">編集</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {!! $items->links() !!}
        </div>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop