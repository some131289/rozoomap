@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.questions.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.questions.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('question', trans('quickadmin.questions.fields.question').'*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('question', old('question'), ['class' => 'form-control ', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('question'))
                        <p class="help-block">
                            {{ $errors->first('question') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('question_image', trans('quickadmin.questions.fields.question-image').'', ['class' => 'control-label']) !!}
                    {!! Form::file('question_image', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('question_image_max_size', 2) !!}
                    {!! Form::hidden('question_image_max_width', 4096) !!}
                    {!! Form::hidden('question_image_max_height', 4096) !!}
                    <p class="help-block"></p>
                    @if($errors->has('question_image'))
                        <p class="help-block">
                            {{ $errors->first('question_image') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('score', trans('quickadmin.questions.fields.score').'*', ['class' => 'control-label']) !!}
                    {!! Form::number('score', old('score'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('score'))
                        <p class="help-block">
                            {{ $errors->first('score') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('answer1', trans('quickadmin.questions.fields.answer1').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('answer1', old('answer1'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('answer1'))
                        <p class="help-block">
                            {{ $errors->first('answer1') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('correct1', trans('quickadmin.questions.fields.correct1').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('correct1', 0) !!}
                    {!! Form::checkbox('correct1', 1, old('correct1', false), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('correct1'))
                        <p class="help-block">
                            {{ $errors->first('correct1') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('answer2', trans('quickadmin.questions.fields.answer2').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('answer2', old('answer2'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('answer2'))
                        <p class="help-block">
                            {{ $errors->first('answer2') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('correct2', trans('quickadmin.questions.fields.correct2').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('correct2', 0) !!}
                    {!! Form::checkbox('correct2', 1, old('correct2', false), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('correct2'))
                        <p class="help-block">
                            {{ $errors->first('correct2') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('answer3', trans('quickadmin.questions.fields.answer3').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('answer3', old('answer3'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('answer3'))
                        <p class="help-block">
                            {{ $errors->first('answer3') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('correct3', trans('quickadmin.questions.fields.correct3').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('correct3', 0) !!}
                    {!! Form::checkbox('correct3', 1, old('correct3', false), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('correct3'))
                        <p class="help-block">
                            {{ $errors->first('correct3') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('answer4', trans('quickadmin.questions.fields.answer4').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('answer4', old('answer4'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('answer4'))
                        <p class="help-block">
                            {{ $errors->first('answer4') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('correct4', trans('quickadmin.questions.fields.correct4').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('correct4', 0) !!}
                    {!! Form::checkbox('correct4', 1, old('correct4', false), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('correct4'))
                        <p class="help-block">
                            {{ $errors->first('correct4') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('answer5', trans('quickadmin.questions.fields.answer5').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('answer5', old('answer5'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('answer5'))
                        <p class="help-block">
                            {{ $errors->first('answer5') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('correct5', trans('quickadmin.questions.fields.correct5').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('correct5', 0) !!}
                    {!! Form::checkbox('correct5', 1, old('correct5', false), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('correct5'))
                        <p class="help-block">
                            {{ $errors->first('correct5') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

