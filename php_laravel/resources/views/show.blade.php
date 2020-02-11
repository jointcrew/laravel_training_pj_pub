@extends('layout')

@section('content')
    <h1>経費詳細</h1>
    <div>
        <p>種別 ： {{ $expense->category->name }}</p>
        <p>出発 ： {{ $expense->train->from }}</p>
        <p>到着 ： {{ $expense->train->to }}</p>
        <p>請求先 ： {{ $expense->bill_to }}</p>
        <p>目的 ： {{ $expense->purpose }}</p>
        <p>金額 ： {{ $expense->sub_total }}</p>
    </div>

    <div>
        <a href={{ route('expense.list' ) }}>一覧に戻る</a>
        @auth
            @if ($expense->user_id === $login_user_id)
                 | <a href={{ route('expense.edit', ['id' =>  $expense->id]) }}>編集</a>
                <p></p>
                {{ Form::open(['method' => 'delete', 'route' => ['expense.destroy', $expense->id]]) }}
                    {{ Form::submit('削除', ['class' => 'btn btn-outline-danger']) }}
                {{ Form::close() }}
            @endif
        @endauth
    </div>
@endsection
