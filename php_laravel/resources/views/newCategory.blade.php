@extends('layout')

@section('content')
    <h1>新規登録</h1>
    {{ Form::open(['route' => 'category.store']) }}
        <div class="form-group">
            {{ Form::label('name', '項目名 :') }}
            {{ Form::text('name', null) }}
        </div>
        <div class="form-group">
            {{ Form::label('type', 'タイプ :') }}
            {{ Form::select('type', $types) }}
        </div>
        <div class="form-group">
            {{ Form::submit('作成する', ['class' => 'btn btn-outline-primary']) }}
        </div>
    {{ Form::close() }}

    <div>
        <a href={{ route('category.list') }}>一覧に戻る</a>
    </div>

@endsection
