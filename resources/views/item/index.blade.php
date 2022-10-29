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
                <form action="{{ route('items.search') }}" class="form-inline" style="margin-bottom: 25px;">
                    @csrf
                    <input class="form-control mr-sm-1" type="text" name="nameword" placeholder="車名を入力" value="@if (isset($nameword)) {{ $nameword }} @endif" style="width: 20%; margin-right: 10%;">
                    <select class="form-control" name="typeword" value="@if (isset($typeword)) {{ $typeword }} @endif" style="width: 20%; margin: 0 2% 0 2%;">
                        <option value="" style="display: none;">タイプを選択</option>
                        @foreach($type as $key => $value)
                        <option value="{{$key}}" {{old('type')==$key ? "selected" : ""}}>{{ $value }}</option>
                        @endforeach
                    </select>
                    <input class="form-control mr-sm-1" type="checkbox" id="checkbox1" name="statusword" value="active @if (isset($statusword)) {{ $statusword }} @endif">
                    <label for="checkbox1" style="margin-right: 2%;">在庫あり</label>
                    <button class="btn btn-secondary btn-sm" type="submit">検索</button>
                </form>
                <div class="card-tools">
                    <div class="input-group">
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive p-0">

                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>@sortablelink('id', 'ID')</th>
                            <th>@sortablelink('name', '車名')</th>
                            <th>@sortablelink('type', 'タイプ')</th>
                            <th>@sortablelink('status', '在庫')</th>
                            <th>@sortablelink('created_at', '登録日時')</th>
                            <th>@sortablelink('updated_at', '更新日時')</th>
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
                            <td>@if($item->status)在庫あり @else <p class="text-danger">SOLD OUT</p> @endif</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td><a class="btn btn-secondary btn-sm" href="detail/{{ $item->id }}">詳細</a></td>
                            <td><a class="btn btn-warning btn-sm" href="edit/{{ $item->id }}">編集</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{$items->appends(request()->query())->links()}}
            @if (count($items) >0)
            <p>全{{ $items->total() }}件中
                {{ ($items->currentPage() -1) * $items->perPage() + 1}} -
                {{ (($items->currentPage() -1) * $items->perPage() + 1) + (count($items) -1)  }}件表示
            </p>
            @else
            <p>選択した条件に当てはまる車両はありません</p>
            @endif
        </div>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop