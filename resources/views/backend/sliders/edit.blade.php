@extends('backend.master')

@section('title')
{!! trans('system.action.edit') !!} - {!! trans('sliders.label') !!}
@stop

@section('head')
<link rel="stylesheet" type="text/css" href="{!! asset('assets/backend/plugins/iCheck/all.css') !!}" />
@stop

@section('content')
<section class="content-header">
    <h1>
        {!! trans('sliders.label') !!}
        <small>{!! trans('system.action.edit') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{!! route('admin.home') !!}">{!! trans('system.home') !!}</a></li>
        <li><a href="{!! route('admin.sliders.index') !!}">{!! trans('sliders.label') !!}</a></li>
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
{!! Form::open(array('url' => route('admin.sliders.update', $slider->id), 'method' => 'PUT', 'role' => 'form', 'files' => true)) !!}

<table class='table borderless' style="width: 80%;">
    <tr>
        <th class="text-right">
            {!! trans('sliders.name') !!}
        </th>
        <td>
            {!! Form::text('name', old('name', $slider->name), array('class' => 'form-control', 'required', 'maxlength' => 50)) !!}
        </td>
    </tr>
    <tr>
        <th class="text-right">
            {!! trans('sliders.summary') !!}
        </th>
        <td>
            {!! Form::textarea('summary', old('summary', $slider->summary), array('class' => 'form-control ckeditor', 'required',  'maxlength' => 500)) !!}
        </td>
    </tr>
    <tr>
        <th class="text-right">
            {!! trans('sliders.content') !!}
        </th>
        <td>
            {!! Form::textarea('content', old('content', $slider->content), array('class' => 'form-control ckeditor', 'required', 'rows' => 10,  'maxlength' => 700)) !!}
        </td>
    </tr>
    <tr>
        <th class="text-right">{!! trans("sliders.sub_image") !!}</th>
        <td>
            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-preview thumbnail" style="min-height: 381px; max-height: 381px; max-width: 460px;padding: 0px;">
                    <img src="{!! asset($slider->sub_image) !!}">
                </div>
                <div>
                    <span class="btn btn-default btn-file">
                        <span class="fileupload-new">
                            {!! trans('system.action.select_image') !!}
                        </span>
                        {!! Form::file('sub_image') !!}
                    </span>
                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">
                        {!! trans('system.action.remove') !!}
                    </a>
                    (Kích thước 460x381)
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <th class="text-right">
            {!! trans("sliders.image") !!}<br/>
            (1399x787)
        </th>
        <td colspan="3">
            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-preview thumbnail" style="width: {!! 1399/1.5 !!}px; min-height: {!! 787/1.5 !!}px; max-height: auto; max-width: 1399px;">
                    <img src="{!! asset($slider->image) !!}">
                </div>
                <div>
                    <span class="btn btn-default btn-file">
                        <span class="fileupload-new">
                            {!! trans('system.action.select_image') !!}
                        </span>
                        {!! Form::file('image') !!}
                    </span>
                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">
                        {!! trans('system.action.remove') !!}
                    </a>
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="4" class="text-center">
            {!! trans('system.status.active') !!}
            {!! Form::checkbox('status', 1, old('status', $slider->status), [ 'class' => 'minimal-red' ]) !!}
        </td>
    </tr>
    <tr>
        <td colspan="4" class="text-center">
            {!! HTML::link(route( 'admin.sliders.index' ), trans('system.action.cancel'), array('class' => 'btn btn-danger btn-flat')) !!}
            &nbsp;
            {!! Form::submit(trans('system.action.save'), array('class' => 'btn btn-primary btn-flat')) !!}
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
            $('input[type="checkbox"].minimal-red').iCheck({
                checkboxClass: 'icheckbox_minimal-red'
            });
        });
    }(window.jQuery);
</script>
@include('backend.plugins.ckeditor')
@stop