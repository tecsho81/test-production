@extends('adminlte::page')

@section('title', 'ホーム')

@section('content_header')
<h1>車両管理</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card" style="padding: 10px">
            <div class="card-header">
                新着物件
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-default text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>車名</th>
                            <th>タイプ</th>
                            <th>在庫</th>
                            <th>登録日時</th>
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
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop