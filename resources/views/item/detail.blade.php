@extends('adminlte::page')

@section('title', '商品詳細')

@section('content_header')
<h1>商品詳細</h1>
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

                    <!-- 詳細フォーム -->
                    <p>
                    <form action="{{ url('item/'.$item->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <p style="margin-bottom: 0">【商品名】
                        <h6 style="padding-left: 20px;">
                            {{ old(('name'), $item->name) }}
                        </h6>
                        </p>

                        <P style="margin-bottom: 0">【種別】
                        <h6 style="padding-left: 20px;">
                            {{ $type[$item->type] }}
                        </h6>
                        </P>

                        <p style="margin-bottom: 0">【詳細】
                        <h6 style="padding-left: 20px;">
                            {{ old(('detail'), $item->detail) }}
                        </h6>
                        </p>

                        <P style="margin-bottom: 0">【在庫】
                        <h6 style="padding-left: 20px;">
                            @if($item->status)在庫あり @else SOLD OUT @endif
                        </h6>
                        </P>

                        <P style="margin-bottom: 0">【登録日時】
                        <h6 style="padding-left: 20px;">
                            {{ $item->created_at }}
                        </h6>
                        </P>

                        <P style="margin-bottom: 0">【更新日時】
                        <h6 style="padding-left: 20px;">
                            {{ $item->updated_at }} 
                        </h6>
                        </P>
                    </form>
                </div>
            </form>
        </div>

        @stop

        @section('css')
        @stop

        @section('js')
        @stop