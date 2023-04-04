@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.fishCenter.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.fish-centers.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.fishCenter.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $fishCenter->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.fishCenter.fields.island') }}
                                    </th>
                                    <td>
                                        {{ $fishCenter->island }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.fishCenter.fields.operated_by') }}
                                    </th>
                                    <td>
                                        {{ App\Models\FishCenter::OPERATED_BY_SELECT[$fishCenter->operated_by] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.fishCenter.fields.date_of_recieval') }}
                                    </th>
                                    <td>
                                        {{ $fishCenter->date_of_recieval }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.fishCenter.fields.item') }}
                                    </th>
                                    <td>
                                        {{ $fishCenter->item }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.fishCenter.fields.quantity') }}
                                    </th>
                                    <td>
                                        {{ $fishCenter->quantity }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.fishCenter.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\FishCenter::STATUS_SELECT[$fishCenter->status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.fishCenter.fields.date_of_monitoring') }}
                                    </th>
                                    <td>
                                        {{ $fishCenter->date_of_monitoring }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.fishCenter.fields.remarks') }}
                                    </th>
                                    <td>
                                        {{ $fishCenter->remarks }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.fish-centers.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection