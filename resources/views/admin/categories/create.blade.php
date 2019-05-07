@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.categories.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.categories.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', trans('quickadmin.categories.fields.title').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('discipline_id', trans('quickadmin.categories.fields.discipline').'', ['class' => 'control-label']) !!}
                    {!! Form::select('discipline_id', $disciplines, old('discipline_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('discipline_id'))
                        <p class="help-block">
                            {{ $errors->first('discipline_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('class', trans('quickadmin.categories.fields.class').'', ['class' => 'control-label']) !!}
                    {!! Form::number('class', old('class'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('class'))
                        <p class="help-block">
                            {{ $errors->first('class') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description', trans('quickadmin.categories.fields.description').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', old('description'), ['class' => 'form-control editor', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('category_image', trans('quickadmin.categories.fields.category-image').'', ['class' => 'control-label']) !!}
                    {!! Form::file('category_image', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('category_image_max_size', 2) !!}
                    {!! Form::hidden('category_image_max_width', 4096) !!}
                    {!! Form::hidden('category_image_max_height', 4096) !!}
                    <p class="help-block"></p>
                    @if($errors->has('category_image'))
                        <p class="help-block">
                            {{ $errors->first('category_image') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('created_by_id', trans('quickadmin.categories.fields.created-by').'', ['class' => 'control-label']) !!}
                    {!! Form::select('created_by_id', $created_bies, old('created_by_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('created_by_id'))
                        <p class="help-block">
                            {{ $errors->first('created_by_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('active', trans('quickadmin.categories.fields.active').'', ['class' => 'control-label']) !!}
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

@section('javascript')
    @parent
    <script src="//cdn.ckeditor.com/4.5.4/full/ckeditor.js"></script>
    <script>
        $('.editor').each(function () {
                  CKEDITOR.replace($(this).attr('id'),{
                    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
                    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
            });
        });
    </script>

@stop