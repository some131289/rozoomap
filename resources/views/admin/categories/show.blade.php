@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.categories.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.categories.fields.title')</th>
                            <td field-key='title'>{{ $category->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.categories.fields.discipline')</th>
                            <td field-key='discipline'>{{ $category->discipline->title or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.categories.fields.class')</th>
                            <td field-key='class'>{{ $category->class }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.categories.fields.description')</th>
                            <td field-key='description'>{!! $category->description !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.categories.fields.category-image')</th>
                            <td field-key='category_image'>@if($category->category_image)<a href="{{ asset(env('UPLOAD_PATH').'/' . $category->category_image) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $category->category_image) }}"/></a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.categories.fields.created-by')</th>
                            <td field-key='created_by'>{{ $category->created_by->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.categories.fields.active')</th>
                            <td field-key='active'>{{ Form::checkbox("active", 1, $category->active == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#tests" aria-controls="tests" role="tab" data-toggle="tab">Tests</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="tests">
<table class="table table-bordered table-striped {{ count($tests) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.tests.fields.title')</th>
                        <th>@lang('quickadmin.tests.fields.description')</th>
                        <th>@lang('quickadmin.tests.fields.test-image')</th>
                        <th>@lang('quickadmin.tests.fields.category')</th>
                        <th>@lang('quickadmin.tests.fields.question')</th>
                        <th>@lang('quickadmin.tests.fields.active')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($tests) > 0)
            @foreach ($tests as $test)
                <tr data-entry-id="{{ $test->id }}">
                    <td field-key='title'>{{ $test->title }}</td>
                                <td field-key='description'>{!! $test->description !!}</td>
                                <td field-key='test_image'>@if($test->test_image)<a href="{{ asset(env('UPLOAD_PATH').'/' . $test->test_image) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $test->test_image) }}"/></a>@endif</td>
                                <td field-key='category'>{{ $test->category->title or '' }}</td>
                                <td field-key='question'>
                                    @foreach ($test->question as $singleQuestion)
                                        <span class="label label-info label-many">{{ $singleQuestion->question }}</span>
                                    @endforeach
                                </td>
                                <td field-key='active'>{{ Form::checkbox("active", 1, $test->active == 1 ? true : false, ["disabled"]) }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('test_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.tests.restore', $test->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('test_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.tests.perma_del', $test->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('test_view')
                                    <a href="{{ route('admin.tests.show',[$test->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('test_edit')
                                    <a href="{{ route('admin.tests.edit',[$test->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('test_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.tests.destroy', $test->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="11">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.categories.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
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
