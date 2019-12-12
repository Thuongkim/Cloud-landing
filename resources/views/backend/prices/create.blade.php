@extends('backend.master')

@section('title')
    {!! trans('system.action.create') !!} - {!! trans('prices.label') !!}
@stop

@section('head')
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/backend/plugins/iCheck/all.css') !!}" />
@stop

@section('content')
    <section class="content-header">
        <h1>
            {!! trans('prices.label') !!}
            <small>{!! trans('system.action.create') !!}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! route('admin.home') !!}">{!! trans('system.home') !!}</a></li>
            <li><a href="{!! route('admin.prices.index') !!}">{!! trans('prices.label') !!}</a></li>
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
    {!! Form::open(array('url' => route('admin.prices.store'), 'role' => 'form', 'files' => true )) !!}

        <table class='table borderless' style="width: 80%;">
            <tr>
                <th class="text-right">
                    {!! trans('prices.price') !!}
                </th>
                <td>
                    {!! Form::text('price', old('price'), array('class' => 'form-control', 'required', 'maxlength' => 50)) !!}
                </td>
                <th class="text-right">
                    {!! trans('prices.type') !!}
                </th>
                <td>
                    {!! Form::text('type', old('type'), array('class' => 'form-control', 'maxlength' => 50)) !!}
                </td>
            </tr>
            <tr>
                <th class="text-right">
                    {!! trans('prices.cpu') !!}
                </th>
                <td>
                    {!! Form::text('cpu', old('cpu'), array('class' => 'form-control', 'maxlength' => 50)) !!}
                </td>
                <th class="text-right">
                    {!! trans('prices.ram') !!}
                </th>
                <td>
                    {!! Form::text('ram', old('ram'), array('class' => 'form-control', 'maxlength' => 50)) !!}
                </td>
            </tr>
            <tr>
                <th class="text-right">
                    {!! trans('prices.ssd') !!}
                </th>
                <td>
                    {!! Form::text('ssd', old('ssd'), array('class' => 'form-control', 'maxlength' => 50)) !!}
                </td>
                <th class="text-right">
                    {!! trans('prices.ip') !!}
                </th>
                <td>
                    {!! Form::text('ip', old('ip'), array('class' => 'form-control', 'maxlength' => 100)) !!}
                </td>
            </tr>
            <tr>
                <td colspan="4" class="text-center">
                    {!! trans('system.status.active') !!}
                    {!! Form::checkbox('status', 1, old('status', 1), [ 'class' => 'minimal-red' ]) !!}
                </td>
            </tr>
            <tr>
                <td colspan="4" class="text-center">
                    {!! HTML::link(route( 'admin.prices.index' ), trans('system.action.cancel'), array('class' => 'btn btn-danger btn-flat'))!!}
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
@stop