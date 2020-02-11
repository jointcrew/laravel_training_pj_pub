@extends('layout')

@section('content')
    <h1>{{ $expense->category->name }}を編集する</h1>
    {{ Form::model($expense, ['route' => ['expense.update', $expense->id]]) }}
        <div class="form-group">
            {{ Form::label('category_id', '目的 :') }}
            {{ Form::select('category_id', $categories) }}
        </div>
        <div class='form-group'>
            {{ Form::label('bill_to', '請求先:') }}
            {{ Form::text('bill_to', null) }}
        </div>
        <div class='form-group'>
            {{ Form::label('purpose', '目的 :') }}
            {{ Form::text('purpose', null) }}
        </div>
        <div class='form-group'>
            {{ Form::label('sub_total', '金額 :') }}
            {{ Form::text('sub_total', null) }}
        </div>
        <div class="form-group">
            {{ Form::submit('更新する', ['class' => 'btn btn-outline-primary']) }}
        </div>
    {{ Form::close() }}

    <div>
        <a href={{ route('expense.list') }}>一覧に戻る</a>
    </div>

@endsection
