@extends('layout')

@section('content')
    <h1>経費詳細</h1>
    <h4>
        <div>
            <table>
                <tr>
                    <td>種別</td><td>：</td><td>{{ $expense->category->name }}</td>
                </tr>
                <tr>
                    <td>出発</td><td>：</td><td>{{ $expense->train->from }}</td>
                </tr>
                <tr>
                    <td>到着</td><td>：</td><td>{{ $expense->train->to }}</td>
                </tr>
                <tr>
                    <td>請求先</td><td>：</td><td>{{ $bill_to }}</td>
                </tr>
                <tr>
                    <td>目的</td><td>：</td><td>{{ $expense->purpose }}</td>
                </tr>
                <tr>
                    <td>金額</td><td>：</td><td>{{ $expense->sub_total }}</td>
                </tr>
            </table>
        </div>
    </h4>
    </br>
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
