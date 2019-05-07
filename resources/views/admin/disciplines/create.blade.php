@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.disciplines.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.disciplines.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', trans('quickadmin.disciplines.fields.title').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('image', trans('quickadmin.disciplines.fields.image').'', ['class' => 'control-label']) !!}
                    {!! Form::file('image', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('image_max_size', 2) !!}
                    {!! Form::hidden('image_max_width', 4096) !!}
                    {!! Form::hidden('image_max_height', 4096) !!}
                    <p class="help-block"></p>
                    @if($errors->has('image'))
                        <p class="help-block">
                            {{ $errors->first('image') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('active', trans('quickadmin.disciplines.fields.active').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('active', 0) !!}
                    {!! Form::checkbox('active', 1, old('active', true), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('active'))
                        <p class="help-block">
                            {{ $errors->first('active') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

