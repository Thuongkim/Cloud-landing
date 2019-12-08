@extends('backend.master')

@section('title')
    {!! trans('system.action.create') !!} - {!! trans('teams.label') !!}
@stop

@section('head')
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/backend/plugins/iCheck/all.css') !!}" />
@stop

@section('content')
    <section class="content-header">
        <h1>
            {!! trans('teams.label') !!}
            <small>{!! trans('system.action.create') !!}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! route('admin.home') !!}">{!! trans('system.home') !!}</a></li>
            <li><a href="{!! route('admin.teams.index') !!}">{!! trans('teams.label') !!}</a></li>
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
    {!! Form::open(array('url' => route('admin.teams.store'), 'role' => 'form', 'files' => true )) !!}

        <table class='table borderless' style="width: 80%;">
            <tr>
                <th class="text-right">
                    {!! trans('teams.name') !!}
                </th>
                <td>
                    {!! Form::text('name', old('name'), array('class' => 'form-control', 'required', 'maxlength' => 50)) !!}
                </td>
            </tr>
            <tr>
                <th class="text-right">
                    {!! trans('teams.duty') !!}
                </th>
                <td>
                    {!! Form::text('duty', old('duty'), array('class' => 'form-control', 'maxlength' => 50)) !!}
                </td>
            </tr>
            <tr>
                <th class="text-right">
                    {!! trans('teams.content') !!}
                </th>
                <td>
                    {!! Form::textarea('content', old('content'), array('class' => 'form-control', 'rows' => 5, 'maxlength' => 255)) !!}
                </td>
            </tr>
            <tr>
                <th class="text-right">{!! trans("teams.image") !!}</th>
                <td>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-preview thumbnail" style="min-height: 200px; max-height: auto; max-width: 350px;">
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
                            (Kích thước 350x350)
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    {!! trans('system.status.active') !!}
                    {!! Form::checkbox('status', 1, old('status', 1), [ 'class' => 'minimal-red' ]) !!}
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    {!! HTML::link(route( 'admin.teams.index' ), trans('system.action.cancel'), array('class' => 'btn btn-danger btn-flat'))!!}
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