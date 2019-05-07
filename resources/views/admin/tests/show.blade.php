@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.tests.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.tests.fields.title')</th>
                            <td field-key='title'>{{ $test->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tests.fields.description')</th>
                            <td field-key='description'>{!! $test->description !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tests.fields.test-image')</th>
                            <td field-key='test_image'>@if($test->test_image)<a href="{{ asset(env('UPLOAD_PATH').'/' . $test->test_image) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $test->test_image) }}"/></a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tests.fields.category')</th>
                            <td field-key='category'>{{ $test->category->title or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tests.fields.question')</th>
                            <td field-key='question'>
                                @foreach ($test->question as $singleQuestion)
                                    <span class="label label-info label-many">{{ $singleQuestion->question }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tests.fields.active')</th>
                            <td field-key='active'>{{ Form::checkbox("active", 1, $test->active == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.tests.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
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
