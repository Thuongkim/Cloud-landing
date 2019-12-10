@extends('backend.master')

@section('title')
    {!! trans('system.action.edit') !!} - {!! trans('services.label') !!}
@stop

@section('head')
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/backend/plugins/iCheck/all.css') !!}" />
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/backend/plugins/dropzone/css/dropzone.min.css') !!}" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
@stop

@section('content')
    <section class="content-header">
        <h1>
            {!! trans('services.label') !!}
            <small>{!! trans('system.action.edit') !!}</small>
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
    {!! Form::open(array('url' => route('admin.services.update', $services->id), 'method' => 'PUT', 'role' => 'form', 'files' => true )) !!}

        <table class='table borderless'>
            <tr>
                <th class="text-right" style="width: 20%;">
                    {!! trans('services.title') !!}
                </th>
                <td>
                    {!! Form::text('title', old('title', $services->title), array('class' => 'form-control', 'required', 'maxlength' => 100)) !!}
                </td>
            </tr>
            <tr>
                <th class="text-right">
                    {!! trans('services.content') !!}
                </th>
                <td>
                    {!! Form::textarea('content', old('content', $services->content), array('class' => 'form-control', 'rows' => 3, 'required',  'maxlength' => 255)) !!}
                </td>
            </tr>
            <tr>
                <th class="text-right">{!! trans("services.image") !!}</th>
                <td>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-preview thumbnail" style="min-height: 200px; max-height: auto; max-width: 200px;">
                            @if($services->image)
                            <img src="{!! asset($services->image) !!}">
                            @endif
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
                            (Kích thước 200x200)
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="text-center" colspan="4">
                    {!! trans('system.status.active') !!}
                    {!! Form::checkbox('status', 1, old('status', $services->status), [ 'class' => 'minimal-red' ]) !!}
                </td>
            </tr>
            <tr>
                <td colspan="4" class="text-center">
                    {!! HTML::link(route( 'admin.services.index' ), trans('system.action.cancel'), array('class' => 'btn btn-danger btn-flat'))!!}
                    {!! Form::submit(trans('system.action.save'), array('class' => 'btn btn-primary btn-flat')) !!}
                </td>
            </tr>
        </table>
    {!! Form::close() !!}
@stop

@section('footer')
<script src="{!! asset('assets/backend/plugins/jasny/js/bootstrap-fileupload.js') !!}"></script>
<script src="{!! asset('assets/backend/plugins/dropzone/js/dropzone.min.js') !!}"></script>
<script src="{!! asset('assets/backend/plugins/iCheck/icheck.min.js') !!}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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