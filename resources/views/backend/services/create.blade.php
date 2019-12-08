@extends('backend.master')
@section('title'){!! trans('system.action.create') !!} - {!! trans('services.label') !!}
@stop
@section('head')
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/backend/plugins/iCheck/all.css') !!}" />
@stop

@section('content')
    <section class="content-header">
        <h1>
            {!! trans('services.label') !!}
            <small>{!! trans('system.action.create') !!}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! route('admin.home') !!}">{!! trans('system.home') !!}</a></li>
            <li><a href="{!! route('admin.services.index') !!}">{!! trans('services.label') !!}</a></li>
        </ol>
    </section>
    @if($errors->count())
        <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning"></i> {!! trans('messages.error') !!}</h4>
            <ul>
                @foreach($errors->all() as $message)
                <li>{!! $message !!}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(array('url' => route('admin.services.store'), 'role' => 'form', 'files' => true )) !!}

        <table class='table borderless'>
            <tr>
                <th class="text-right" style="width: 20%;">
                    {!! trans('services.title') !!}
                </th>
                <td>
                    {!! Form::text('title', old('title'), array('class' => 'form-control', 'required', 'maxlength' => 100)) !!}
                </td>
            </tr>
            <tr>
                <th class="text-right">
                    {!! trans('services.content') !!}
                </th>
                <td>
                    {!! Form::textarea('content', old('content'), array('class' => 'form-control', 'rows' => 3, 'required', 'maxlength' => 255)) !!}
                </td>
            </tr>
            <tr>
                <th class="text-right">
                    {!! trans('services.icon') !!}
                </th>
                <td>
                    {!! Form::text('icon', old('icon'), array('class' => 'form-control', 'required', 'maxlength' => 50)) !!}
                </td>
            </tr>
            <tr>
                <td class="text-center" colspan="4">
                    {!! trans('system.status.active') !!}
                    {!! Form::checkbox('status', 1, old('status', 1), [ 'class' => 'minimal-red' ]) !!}
                </td>
            </tr>
            <tr>
                <td colspan="4" class="text-center">
                    {!! HTML::link(route( 'admin.services.index' ), trans('system.action.cancel'), array('class' => 'btn btn-danger btn-flat'))!!}
                    &nbsp;
                    {!! Form::submit("Gửi bài", array('class' => 'btn btn-primary btn-flat')) !!}
                </td>
            </tr>
        </table>

    {!! Form::close() !!}
@stop

@section('footer')
<script src="{!! asset('assets/backend/plugins/jasny/js/bootstrap-fileupload.js') !!}"></script>
<script src="{!! asset('assets/backend/plugins/iCheck/icheck.min.js') !!}"></script>
<script>
    !function ($) {
        $(function() {
            $('input[type="checkbox"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue'
            });

            $('input[type="checkbox"].minimal-red').iCheck({
                checkboxClass: 'icheckbox_minimal-red'
            });
        });
    }(window.jQuery);
</script>
@include('backend.plugins.ckeditor')
@stop