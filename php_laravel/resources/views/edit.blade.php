@extends('layout')

@section('content')
    <h1>{{ $expense->category->name }}を編集する</h1>
    {{ Form::model($expense, ['route' => ['expense.update', $expense->id]]) }}
        <table>
            <tr class="form-group">
                <td>{{ Form::label('category_id', '種別') }}</td>
                <td>{{ Form::select('category_id', $categories) }}</td>
            </tr>
            <tr class="form-group">
                <td>{{ Form::label('from', '出発') }}</td>
                <td>{{ Form::text('from', $from) }}</td>
            </tr>
            <tr class="form-group">
                <td>{{ Form::label('to', '到着') }}</td>
                <td>{{ Form::text('to', $to) }}</td>
            </tr>
            <tr class="form-group">
                <td>{{ Form::label('way', '片/往') }}</td>
                <td>{{ Form::select('way', $way) }}</td>
            </tr>
            <tr class='form-group'>
                <td>{{ Form::label('bill_to', '請求先') }}</td>
                <td>{{ Form::select('bill_to', $bill_to) }}</td>
            </tr>
            <tr class='form-group'>
                <td>{{ Form::label('purpose', '目的') }}</td>
                <td>{{ Form::text('purpose', null) }}</td>
            </tr>
            <tr class='form-group'>
                <td>{{ Form::label('sub_total', '金額') }}</td>
                <td>{{ Form::text('sub_total', null) }}</td>
            </tr>
            <tr class="form-group">
                <td>{{ Form::submit('更新する', ['class' => 'btn btn-outline-primary']) }}</td>
            </tr>
        </table>
    {{ Form::close() }}

    <div>
        <a href={{ route('expense.list') }}>一覧に戻る</a>
    </div>

@endsection
