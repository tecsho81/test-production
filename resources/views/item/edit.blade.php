@extends('adminlte::page')

@section('title', '商品編集')

@section('content_header')
<h1>商品編集</h1>
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

                <!-- 戻るボタン -->
                <div style="padding-top: 20px">
                    <button type="button" class="btn btn-secondary" onclick="location.href='/items'">戻る</button>
                </div>

                <!-- 編集フォーム -->
                <p>
                <form action="{{ url('item/'.$item->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <p style="margin-bottom: 0">商品名<span style="padding-left: 10px;" class="help-block text-danger">{{$errors->first('name')}}</span></p>
                    <p><input type="text" class="form-control" name="name" value="{{ old(('name'), $item->name) }}"></p>

                    <P style="margin-bottom: 0">種別<span style="padding-left: 10px;" class="help-block text-danger">{{$errors->first('type')}}</span></P>
                    <p>
                        <select class="form-control"  name="type" value="{{ $item->type }}">
                            @foreach($type as $key => $value)
                            <option value="{{ $key }}" {{old('type',$item->type)==$key ? "selected" : ""}}>{{ $value }}</option>
                            @endforeach
                        </select>
                    </P>

                    <p style="margin-bottom: 0">詳細<span style="padding-left: 10px;" class="help-block text-danger">{{$errors->first('detail')}}</span></p>
                    <p><input type="text" class="form-control" name="name" value="{{ old(('detail'), $item->detail) }}"></p>

                    <P style="margin-bottom: 0">ステータス</P>
                    <p>
                        <select class="form-control" style="width: 15%; padding-left: 10px; margin: 0 0 20px 0;" name="status" value="{{ $item->status }}">
                            <option value="active" @if($item->status)selected @endif>公開</option>
                            <option value="" @if(!$item->status)selected @endif>停止</option>
                        </select>
                    </P>

                    <!-- 更新ボタン -->
                    <button type="submit" id="update-item-{{ $item->id }}" class="btn btn-primary" style="margin-top: 30px;">更新</button>
                </form>
                </p>

                <!-- 削除ボタン -->
                <div>
                    <p style="margin-top: 30px;">
                    <form action="{{ url('item/'.$item->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" id="delete-item-{{ $item->id }}" class="btn btn-danger">削除</button>
                    </form>
                    </p>
                </div>
            </form>
        </div>

        @stop

        @section('css')
        @stop

        @section('js')
        @stop