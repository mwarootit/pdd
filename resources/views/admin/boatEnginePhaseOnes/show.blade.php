@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.boatEnginePhaseOne.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.boat-engine-phase-ones.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.boatEnginePhaseOne.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $boatEnginePhaseOne->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.boatEnginePhaseOne.fields.date_of_receival') }}
                                    </th>
                                    <td>
                                        {{ $boatEnginePhaseOne->date_of_receival }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.boatEnginePhaseOne.fields.island') }}
                                    </th>
                                    <td>
                                        {{ $boatEnginePhaseOne->island }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.boatEnginePhaseOne.fields.no_of_share') }}
                                    </th>
                                    <td>
                                        {{ $boatEnginePhaseOne->no_of_share }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.boatEnginePhaseOne.fields.ward') }}
                                    </th>
                                    <td>
                                        {{ $boatEnginePhaseOne->ward }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.boatEnginePhaseOne.fields.recipients') }}
                                    </th>
                                    <td>
                                        {{ $boatEnginePhaseOne->recipients }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.boatEnginePhaseOne.fields.boat_status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\BoatEnginePhaseOne::BOAT_STATUS_SELECT[$boatEnginePhaseOne->boat_status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.boatEnginePhaseOne.fields.engine_status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\BoatEnginePhaseOne::ENGINE_STATUS_SELECT[$boatEnginePhaseOne->engine_status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.boatEnginePhaseOne.fields.date_of_monitoring') }}
                                    </th>
                                    <td>
                                        {{ $boatEnginePhaseOne->date_of_monitoring }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.boatEnginePhaseOne.fields.remarks') }}
                                    </th>
                                    <td>
                                        {{ $boatEnginePhaseOne->remarks }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.boat-engine-phase-ones.index') }}">
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