@extends('adminlte::page')

@section('title', '一覧')

@section('content_header')
<h1>一覧</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card" style="padding: 10px">
            <div class="card-header">
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <div class="input-group-append">
                            <a href="{{ url('items/add') }}" class="btn btn-default">登録</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>車名</th>
                            <th>タイプ</th>
                            <th>在庫</th>
                            <th>登録日時</th>
                            <th>更新日時</th>
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
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td><a class="btn btn-secondary btn-sm" href="items/detail/{{ $item->id }}">詳細</a></td>
                            <td><a class="btn btn-warning btn-sm" href="items/edit/{{ $item->id }}">編集</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {!! $items->links() !!}
            @if (count($items) >0)
            <p>全{{ $items->total() }}件中
                {{ ($items->currentPage() -1) * $items->perPage() + 1}} -
                {{ (($items->currentPage() -1) * $items->perPage() + 1) + (count($items) -1)  }}件表示
            </p>
            @else
            <p>データがありません。</p>
            @endif
        </div>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop