@extends('layout')

@section('content')
    <h1>経費一覧</h1>


    <?php $total = 0 ?>
    <table class='table table-striped table-hover'>
        <tr>
            <th>請求先</th><th>目的</th><th>小計</th><th>合計</th>
        </tr>
        @foreach ($expense as $exp)
            <tr>
                <td>{{ $exp->bill_to }}</td>
                <td>
                    <a href={{ route('expense.detail', ['id' =>  $exp->id]) }}>
                        {{ $exp->purpose }}
                    </a>
                </td>
                <td>{{ $exp->sub_total }}</td>
                <td>{{ $total+=$exp->sub_total }}</td>
            </tr>
        @endforeach
    </table>

    @auth
        <div>
            <a href={{ route('expense.new') }} class='btn btn-outline-primary'>新規登録</a>
        </div>
        <div>
            <a href={{ route('category.list') }} class='btn btn-outline-primary'>項目一覧</a>
        </div>
    @endauth
@endsection
