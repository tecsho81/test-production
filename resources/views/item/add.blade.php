@extends('adminlte::page')

@section('title', '登録')

@section('content_header')
<h1>登録</h1>
@stop

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
                    <div class="form-group">
                        <label for="name">車名</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="車名を入力" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label for="type">タイプ</label>
                        <select class="form-control" name="type">
                            <option value="" style="display: none;"></option>
                            @foreach($type as $key => $value)
                            <option value="{{$key}}" {{old('type')==$key ? "selected" : ""}}>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="detail">詳細</label>
                        <textarea type="text" class="form-control" id="detail" name="detail" placeholder="詳細を入力">{{ old('detail') }}</textarea>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">登録</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop