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
    {!! Form::open(array('url' => route('admin.sliders.update', $slider->id), 'method' => 'PUT', 'role' => 'form')) !!}

        <table class='table borderless' style="width: 80%;">
            <tr>
                <th class="text-right">
                    {!! trans('sliders.name') !!}
                </th>
                <td>
                    {!! Form::text('name', old('name', $slider->name), array('class' => 'form-control', 'required', 'maxlength' => 50)) !!}
                </td>
            </tr>
            @if(isset($fields['name']))
                @foreach($languages as $language => $value)
                    <tr>
                        <th class="text-right">
                            {!! trans('sliders.name') !!} ({!! trans('system.' . $language) !!})
                        </th>
                        <td>
                            <?php $content = $slider->translation('name', $language)->first(); ?>
                            {!! Form::text("name_{$language}", old("name_{$language}", is_null($content) ? '' : $content->content), array('class' => 'form-control', 'maxlength' => 255)) !!}
                        </td>
                    </tr>
                @endforeach
            @endif
            <tr>
                <th class="text-right">
                    {!! trans('sliders.summary') !!}
                </th>
                <td>
                    {!! Form::text('summary', old('summary', $slider->summary), array('class' => 'form-control', 'required',  'maxlength' => 255)) !!}
                </td>
            </tr>
            @if(isset($fields['summary']))
                @foreach($languages as $language => $value)
                    <tr>
                        <th class="text-right">
                            {!! trans('sliders.summary') !!} ({!! trans('system.' . $language) !!})
                        </th>
                        <td>
                            <?php $content = $slider->translation('summary', $language)->first(); ?>
                            {!! Form::text("summary_{$language}", old("summary_{$language}", is_null($content) ? '' : $content->content), array('class' => 'form-control', 'maxlength' => 255)) !!}
                        </td>
                    </tr>
                @endforeach
            @endif
            <tr>
                <td colspan="2" class="text-center">
                    {!! trans('system.status.active') !!}
                    {!! Form::checkbox('status', 1, old('status', $slider->status), [ 'class' => 'minimal-red' ]) !!}
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    {!! HTML::link(route( 'admin.sliders.index' ), trans('system.action.cancel'), array('class' => 'btn btn-danger btn-flat')) !!}
                    &nbsp;
                    {!! Form::submit(trans('system.action.save'), array('class' => 'btn btn-primary btn-flat')) !!}
                </td>
            </tr>
        </table>

    {!! Form::close() !!}
@stop

@section('footer')
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