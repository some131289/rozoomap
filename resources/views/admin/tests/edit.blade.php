@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.tests.title')</h3>
    
    {!! Form::model($test, ['method' => 'PUT', 'route' => ['admin.tests.update', $test->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', trans('quickadmin.tests.fields.title').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('description', trans('quickadmin.tests.fields.description').'', ['class' => 'control-label']) !!}
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
                    @if ($test->test_image)
                        <a href="{{ asset(env('UPLOAD_PATH').'/'.$test->test_image) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/'.$test->test_image) }}"></a>
                    @endif
                    {!! Form::label('test_image', trans('quickadmin.tests.fields.test-image').'', ['class' => 'control-label']) !!}
                    {!! Form::file('test_image', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('test_image_max_size', 2) !!}
                    {!! Form::hidden('test_image_max_width', 4096) !!}
                    {!! Form::hidden('test_image_max_height', 4096) !!}
                    <p class="help-block"></p>
                    @if($errors->has('test_image'))
                        <p class="help-block">
                            {{ $errors->first('test_image') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('category_id', trans('quickadmin.tests.fields.category').'', ['class' => 'control-label']) !!}
                    {!! Form::select('category_id', $categories, old('category_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('category_id'))
                        <p class="help-block">
                            {{ $errors->first('category_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('question', trans('quickadmin.tests.fields.question').'', ['class' => 'control-label']) !!}
                    <button type="button" class="btn btn-primary btn-xs" id="selectbtn-question">
                        {{ trans('quickadmin.qa_select_all') }}
                    </button>
                    <button type="button" class="btn btn-primary btn-xs" id="deselectbtn-question">
                        {{ trans('quickadmin.qa_deselect_all') }}
                    </button>
                    {!! Form::select('question[]', $questions, old('question') ? old('question') : $test->question->pluck('id')->toArray(), ['class' => 'form-control select2', 'multiple' => 'multiple', 'id' => 'selectall-question' ]) !!}
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
                    {!! Form::label('active', trans('quickadmin.tests.fields.active').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('active', 0) !!}
                    {!! Form::checkbox('active', 1, old('active', old('active')), []) !!}
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

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
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

    <script>
        $("#selectbtn-question").click(function(){
            $("#selectall-question > option").prop("selected","selected");
            $("#selectall-question").trigger("change");
        });
        $("#deselectbtn-question").click(function(){
            $("#selectall-question > option").prop("selected","");
            $("#selectall-question").trigger("change");
        });
    </script>
@stop