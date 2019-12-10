@extends('backend.master')

@section('title')
{!! trans('system.action.list') !!} {!! trans('steps.label') !!}
@stop

@section('head')
<!-- daterange picker -->
<link rel="stylesheet" type="text/css" href="{!! asset('assets/backend/plugins/daterangepicker/daterangepicker-bs3.css') !!}" />
@stop

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {!! trans('steps.label') !!}
        <small>{!! trans('system.action.list') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{!! route('admin.home') !!}">{!! trans('system.home') !!}</a></li>
        <li><a href="{!! route('admin.steps.index') !!}">{!! trans('steps.label') !!}</a></li>
    </ol>
</section>
<!-- Main content -->
<section class="content overlay">
    <div class="row">
        <div class="col-md-2" style='float: left;'>
            <a href="{!! route('admin.steps.create') !!}" class='btn btn-primary btn-flat'>
                <span class="glyphicon glyphicon-plus"></span>&nbsp;{!! trans('system.action.create') !!}
            </a>
        </div>
        <div class="col-md-10">
            <span  style='float: right;'>
                {!! $steps->appends( Request::except('page') )->render() !!}
            </span>
        </div>
    </div>
    @if (count($steps) > 0)
        <div class="well">
            <form class="form-inline">
                <div class="form-group">
                    <a class="a_cursor text-success" id="selectAll" title="{{ trans('system.action.select_all') }}"> {{ trans('system.action.select_all') }} </a>|
                    <a class="a_cursor text-success" id="unselectAll" title="{{ trans('system.action.deselect_all') }}"> {{ trans('system.action.deselect_all') }} </a>|
                    <span id="counterSelected" class="badge">0</span>
                    {{ trans('system.itemSelected') }}
                </div>
                <div class="pull-right form-group">
                    <select class="form-control" id="action">
                        <option value="noaction"> -- {{ trans('system.action.label') }} -- </option>
                        <option value="active"> {{ trans('system.status.active') }} </option>
                        <option value="deactive"> {{ trans('system.status.deactive') }} </option>
                        <option value="delete"> {{ trans('system.action.delete_all') }} </option>
                    </select>
                    {{-- {!! Form::select('category', $categories, old('category'), ["class" => "form-control"]) !!}
 --}}                    <button type="button" class="btn btn-info" onclick="return save()">
                        <span class="glyphicon glyphicon-floppy-disk"></span>&nbsp; {{ trans('system.action.save') }}
                    </button>
                </div>
            </form>
        </div>
        <div class="box">
            <?php $i = (($steps->currentPage() - 1) * $steps->perPage()) + 1; ?>
            <div class="box-body no-padding">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align: center; vertical-align: middle;"></th>
                            <th style="text-align: center; vertical-align: middle;">#</th>
                            <th style="text-align: center; vertical-align: middle;"> {!! trans('steps.title') !!} </th>
                            <th style="text-align: center; vertical-align: middle;"> {!! trans('steps.image') !!} </th>
                            <th style="text-align: center; vertical-align: middle;"> {!! trans('steps.position') !!} </th>
                            <th style="text-align: center; vertical-align: middle;"> {!! trans('system.status.label') !!} </th>
                            <th style="text-align: center; vertical-align: middle;"> {!! trans('system.updated_at') !!} </th>
                            <th style="text-align: center; vertical-align: middle;"> {!! trans('system.action.label') !!} </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $labels = ['success', 'info', 'danger', 'warning', 'default']; ?>
                        @foreach ($steps as $item)
                        <tr>
                            <td style="text-align: center; width: 3%; vertical-align: middle;">
                                {!! Form::checkbox('newsId', $item->id, null, array('class' => 'newsId')) !!}
                            </td>
                            <td style="text-align: center; vertical-align: middle;">{!! $i++ !!}</td>
                            <td style="text-align: justify; vertical-align: middle;">
                                {!! \App\Helper\HString::modSubstr($item->title, 30) !!}
                            </td>
                           <td style="text-align: center; vertical-align: middle;">
                                @if($item->image)
                                <img src="{!! asset($item->image) !!}" height="50px" style="max-width: 80px;">
                                @endif
                            </td>
                            
                            <td style="text-align: center; vertical-align: middle;">
                                @if($steps->count() > 1)
                                    @if($item->position == 1)
                                        <a href="{{ route('admin.steps.update-position', [$item->id, 1]) }}" title="{{ trans('system.down') }}">
                                            <i class="glyphicon glyphicon-circle-arrow-down"></i>
                                        </a>
                                    @elseif( $item->position == $steps->count() )
                                        <a href="{{ route('admin.steps.update-position', [$item->id, -1]) }}" title="{{ trans('system.up') }}">
                                            <i class="glyphicon glyphicon-circle-arrow-up"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('admin.steps.update-position', [$item->id, -1]) }}" title="{{ trans('system.up') }}">
                                            <i class="glyphicon glyphicon-circle-arrow-up"></i>
                                        </a>&nbsp;|&nbsp;
                                        <a href="{{ route('admin.steps.update-position', [$item->id, 1]) }}" title="{{ trans('system.down') }}">
                                            <i class="glyphicon glyphicon-circle-arrow-down"></i>
                                        </a>
                                    @endif
                                @endif
                            </td>

                            <td style="text-align: center; vertical-align: middle;">
                                @if($item->status == 0)
                                <span class="label label-danger"><span class='glyphicon glyphicon-remove'></span></span>
                                @elseif($item->status == 1)
                                <span class="label label-success"><span class='glyphicon glyphicon-ok'></span></span>
                                @endif
                            </td>
                            <td style="text-align: center; vertical-align: middle;">{!! date("d/m/Y", strtotime($item->updated_at)) !!}</td>
                            
                            <td style="text-align: center; vertical-align: middle;">
                                <a href="{!! route('admin.steps.edit', $item->id) !!}" class="text-warning"><i class="glyphicon glyphicon-edit"></i> Sửa </a>
                                &nbsp;
                                <a href="{!! route('admin.steps.delete', $item->id) !!}" class="btn-confirm text-danger"><i class="glyphicon glyphicon-remove"></i> Xóa </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
    <div class="alert alert-success" style="margin-top: 20px;"> {!! trans('system.no_record_found') !!}</div>
    @endif
</section><!-- /.content -->
@stop

@section('footer')
<script src="{!! asset('assets/backend/plugins/daterangepicker/moment.min.js') !!}"></script>
<script src="{!! asset('assets/backend/plugins/daterangepicker/daterangepicker.js') !!}"></script>
<script src="{!! asset('assets/backend/plugins/input-mask/jquery.inputmask.js') !!}"></script>
<script src="{!! asset('assets/backend/plugins/input-mask/jquery.inputmask.date.extensions.js') !!}"></script>
<script>
    !function ($) {
        $(function(){

            $("select[name='category']").hide();

            $('.date_range').daterangepicker({
                "format": "DD/MM/YYYY",
                "locale": {
                    "separator": " - ",
                    "applyLabel": "Áp dụng",
                    "cancelLabel": "Huỷ bỏ",
                    "fromLabel": "Từ ngày",
                    "toLabel": "Tới ngày",
                    "customRangeLabel": "Custom",
                    "weekLabel": "W",
                    "daysOfWeek": [
                        "CN",
                        "T2",
                        "T3",
                        "T4",
                        "T5",
                        "T6",
                        "T7"
                    ],
                    "monthNames": [
                        "Thg 1",
                        "Thg 2",
                        "Thg 3",
                        "Thg 4",
                        "Thg 5",
                        "Thg 6",
                        "Thg 7",
                        "Thg 8",
                        "Thg 9",
                        "Thg 10",
                        "Thg 11",
                        "Thg 12"
                    ],
                    "firstDay": 1
                }
            }, function(start, end, label) {
              //console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
            });

            var countChecked = function() {
                $( "#counterSelected" ).text( $( "input[name='newsId']:checked" ).length );
            };

            countChecked();

            $( "input[type=checkbox][name='newsId']" ).on( "click", countChecked );

            $('#selectAll').click(function() {
                $('.newsId').each(function() {
                    this.checked = true;
                });
                countChecked();
            });

            $('#unselectAll').click(function() {
                $('.newsId').each(function() {
                    this.checked = false;
                });
                countChecked();
            });

            $("#action").change(function(event) {
                if($(this).val() == 'category') {
                    $("select[name='category']").show();
                } else {
                    $("select[name='category']").hide();
                }
            });
        });
    }(window.jQuery);
    function save() {
        if($( "input[name='newsId']:checked" ).length == 0) {
            alert("{!! trans('system.no_item_selected') !!}");
            return false;
        }
        if($('#action').val() == 'noaction') {
            alert("{!! trans('system.no_action_selected') !!}");
            return false;
        }

        box1 = new ajaxLoader('body', {classOveride: 'blue-loader', bgColor: '#000', opacity: '0.3'});

        var values = new Array();

        $.each($("input[name='newsId']:checked"),
            function () {
                values.push($(this).val());
            });

        $.ajax({
            url: "{!! URL::route('admin.steps.updateBulk') !!}",
            data: { action: $('#action').val(), ids: JSON.stringify(values), category_id: $("select[name='category']").val() },
            type: 'POST',
            datatype: 'json',
            headers: {'X-CSRF-Token': "{!! csrf_token() !!}"},
            success: function(res) {
                if(res.error)
                    alert(res.message);
                else
                    window.location.reload(true);
            },
            error: function(obj, status, err) {
                alert(err);
            }
        }).always(function() {
            if(box1) box1.remove();
        });
    };

</script>
@stop