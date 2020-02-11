@extends('layout')

@section('content')
    <h1>項目一覧</h1>


    <?php $total = 0 ?>
    <table class='table table-striped table-hover'>
        <tr>
            <th>項目名</th><th>タイプ</th>
        </tr>
        @foreach ($categories as $category)
            <tr>
                <td>
                    <a href={{ route('category.detail', ['id' =>  $category->id]) }}>
                        {{ $category->name }}
                    </a>
                </td>
                <td>{{ $types[$category->type] }}</td>
            </tr>
        @endforeach
    </table>

    @auth
        <div>
            <a href={{ route('category.new') }} class='btn btn-outline-primary'>新規登録</a>
        </div>
    @endauth
    <div>
        <a href={{ route('expense.list') }}>経費一覧に戻る</a>
    </div>
@endsection
