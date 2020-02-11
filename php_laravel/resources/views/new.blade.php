@extends('layout')

@section('content')
    <h1>新規登録</h1>
    {{ Form::open(['route' => 'expense.store']) }}
        <div class="form-group">
            {{ Form::label('category_id', '種別 :') }}
            {{ Form::select('category_id', $categories) }}
        </div>

        <div class="form-group">
            {{ Form::label('from', '出発 :') }}
            {{ Form::text('from', null) }}
        </div>
        <div class="form-group">
            {{ Form::label('to', '到着 :') }}
            {{ Form::text('to', null) }}
        </div>
        <div class="form-group">
            {{ Form::label('way', '片/往 :') }}
            {{ Form::select('way', $way) }}
        </div>
        <div class='form-group'>
            {{ Form::label('bill_to', '請求先 :') }}
            {{ Form::select('bill_to', $bill_to) }}
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
            {{ Form::submit('作成する', ['class' => 'btn btn-outline-primary']) }}
        </div>
    {{ Form::close() }}

    <div>
        <a href={{ route('expense.list') }}>一覧に戻る</a>
    </div>

@endsection
