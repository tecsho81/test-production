@extends('adminlte::page')

@section('title')
{{ $item->name }}編集
@stop

@section('content_header')
<h1>編集</h1>
@stop

@section('content')

@section('content')
<div class="row">
    <div class="col-md-10">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="card card-primary">
            <form method="POST">
                @csrf
                <div class="card-body">
                    <!-- 戻るボタン -->
                    <div>
                        <button type="button" class="btn btn-secondary" onclick="location.href='/items'">戻る</button>
                    </div>

                    <!-- 編集フォーム -->
                    <p>
                    <form action="{{ url('item/'.$item->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <p style="margin-bottom: 0">車名</p>
                        <p><input type="text" class="form-control" name="name" value="{{ old(('name'), $item->name) }}"></p>

                        <P style="margin-bottom: 0">タイプ</P>
                        <p>
                            <select class="form-control" name="type" value="{{ $item->type }}">
                                @foreach($type as $key => $value)
                                <option value="{{ $key }}" {{old('type',$item->type)==$key ? "selected" : ""}}>{{ $value }}</option>
                                @endforeach
                            </select>
                        </P>

                        <p style="margin-bottom: 0">詳細</p>
                        <p><textarea type="text" class="form-control" name="detail" value="{{ $item->detail }}">{{ old(('detail'), $item->detail) }}</textarea></p>

                        <P style="margin-bottom: 0">在庫</P>
                        <p>
                            <select class="form-control" style="padding-left: 10px; margin: 0 0 20px 0;" name="status" value="{{ $item->status }}">
                                <option value="active" @if($item->status)selected @endif>在庫あり</option>
                                <option value="" @if(!$item->status)selected @endif>SOLD OUT</option>
                            </select>
                        </P>
                </div>

                <div class="card-footer">
                    <!-- 更新ボタン -->
                    <button type="submit" id="update-item-{{ $item->id }}" class="btn btn-primary">更新</button>
            </form>
            </p>
            <!-- 削除ボタン -->
            <div>
                <form action="{{ route('items.destroy', $item) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">削除</button>
                </form>
            </div>
        </div>
    </div>
</div>

@stop

@section('css')
@stop

@section('js')
@stop