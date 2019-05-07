@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.questions.title')</h3>
    @can('question_create')
    <p>
        <a href="{{ route('admin.questions.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('question_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.questions.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.questions.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($questions) > 0 ? 'datatable' : '' }} @can('question_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('question_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.questions.fields.question')</th>
                        <th>@lang('quickadmin.questions.fields.question-image')</th>
                        <th>@lang('quickadmin.questions.fields.score')</th>
                        <th>@lang('quickadmin.questions.fields.answer1')</th>
                        <th>@lang('quickadmin.questions.fields.correct1')</th>
                        <th>@lang('quickadmin.questions.fields.answer2')</th>
                        <th>@lang('quickadmin.questions.fields.correct2')</th>
                        <th>@lang('quickadmin.questions.fields.answer3')</th>
                        <th>@lang('quickadmin.questions.fields.correct3')</th>
                        <th>@lang('quickadmin.questions.fields.answer4')</th>
                        <th>@lang('quickadmin.questions.fields.correct4')</th>
                        <th>@lang('quickadmin.questions.fields.answer5')</th>
                        <th>@lang('quickadmin.questions.fields.correct5')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($questions) > 0)
                        @foreach ($questions as $question)
                            <tr data-entry-id="{{ $question->id }}">
                                @can('question_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

                                <td field-key='question'>{!! $question->question !!}</td>
                                <td field-key='question_image'>@if($question->question_image)<a href="{{ asset(env('UPLOAD_PATH').'/' . $question->question_image) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $question->question_image) }}"/></a>@endif</td>
                                <td field-key='score'>{{ $question->score }}</td>
                                <td field-key='answer1'>{!! $question->answer1 !!}</td>
                                <td field-key='correct1'>{{ Form::checkbox("correct1", 1, $question->correct1 == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='answer2'>{!! $question->answer2 !!}</td>
                                <td field-key='correct2'>{{ Form::checkbox("correct2", 1, $question->correct2 == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='answer3'>{!! $question->answer3 !!}</td>
                                <td field-key='correct3'>{{ Form::checkbox("correct3", 1, $question->correct3 == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='answer4'>{!! $question->answer4 !!}</td>
                                <td field-key='correct4'>{{ Form::checkbox("correct4", 1, $question->correct4 == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='answer5'>{!! $question->answer5 !!}</td>
                                <td field-key='correct5'>{{ Form::checkbox("correct5", 1, $question->correct5 == 1 ? true : false, ["disabled"]) }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('question_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.questions.restore', $question->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('question_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.questions.perma_del', $question->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('question_view')
                                    <a href="{{ route('admin.questions.show',[$question->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('question_edit')
                                    <a href="{{ route('admin.questions.edit',[$question->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('question_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.questions.destroy', $question->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="18">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('question_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.questions.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection