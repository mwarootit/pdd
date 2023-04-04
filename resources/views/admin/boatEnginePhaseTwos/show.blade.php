@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.boatEnginePhaseTwo.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.boat-engine-phase-twos.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.boatEnginePhaseTwo.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $boatEnginePhaseTwo->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.boatEnginePhaseTwo.fields.date_of_receival') }}
                                    </th>
                                    <td>
                                        {{ $boatEnginePhaseTwo->date_of_receival }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.boatEnginePhaseTwo.fields.island') }}
                                    </th>
                                    <td>
                                        {{ $boatEnginePhaseTwo->island }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.boatEnginePhaseTwo.fields.no_of_share') }}
                                    </th>
                                    <td>
                                        {{ $boatEnginePhaseTwo->no_of_share }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.boatEnginePhaseTwo.fields.ward') }}
                                    </th>
                                    <td>
                                        {{ $boatEnginePhaseTwo->ward }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.boatEnginePhaseTwo.fields.recipients') }}
                                    </th>
                                    <td>
                                        {{ $boatEnginePhaseTwo->recipients }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.boatEnginePhaseTwo.fields.boat_status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\BoatEnginePhaseTwo::BOAT_STATUS_SELECT[$boatEnginePhaseTwo->boat_status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.boatEnginePhaseTwo.fields.engine_status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\BoatEnginePhaseTwo::ENGINE_STATUS_SELECT[$boatEnginePhaseTwo->engine_status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.boatEnginePhaseTwo.fields.date_of_monitoring') }}
                                    </th>
                                    <td>
                                        {{ $boatEnginePhaseTwo->date_of_monitoring }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.boatEnginePhaseTwo.fields.remarks') }}
                                    </th>
                                    <td>
                                        {{ $boatEnginePhaseTwo->remarks }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.boat-engine-phase-twos.index') }}">
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