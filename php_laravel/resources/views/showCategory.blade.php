@extends('layout')

@section('content')
    <h1>項目編集</h1>
    <div>
        <p>項目名 ： {{ $category->name }}</p>
        <p>タイプ ： {{ $type }}</p>
    </div>

    <div>
        <a href={{ route('category.list' ) }}>一覧に戻る</a>
        @auth
            <a href={{ route('category.edit', ['id' =>  $category->id]) }}>編集</a>
            <p></p>
            {{ Form::open(['method' => 'delete', 'route' => ['category.destoroy', $category->id]]) }}
                {{ Form::submit('削除', ['class' => 'btn btn-outline-danger']) }}
            {{ Form::close() }}
        @endauth
    </div>
@endsection
