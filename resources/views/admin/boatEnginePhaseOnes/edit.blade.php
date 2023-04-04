@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.boatEnginePhaseOne.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.boat-engine-phase-ones.update", [$boatEnginePhaseOne->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('date_of_receival') ? 'has-error' : '' }}">
                            <label for="date_of_receival">{{ trans('cruds.boatEnginePhaseOne.fields.date_of_receival') }}</label>
                            <input class="form-control date" type="text" name="date_of_receival" id="date_of_receival" value="{{ old('date_of_receival', $boatEnginePhaseOne->date_of_receival) }}">
                            @if($errors->has('date_of_receival'))
                                <span class="help-block" role="alert">{{ $errors->first('date_of_receival') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.boatEnginePhaseOne.fields.date_of_receival_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('island') ? 'has-error' : '' }}">
                            <label for="island">{{ trans('cruds.boatEnginePhaseOne.fields.island') }}</label>
                            <input class="form-control" type="text" name="island" id="island" value="{{ old('island', $boatEnginePhaseOne->island) }}">
                            @if($errors->has('island'))
                                <span class="help-block" role="alert">{{ $errors->first('island') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.boatEnginePhaseOne.fields.island_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('no_of_share') ? 'has-error' : '' }}">
                            <label for="no_of_share">{{ trans('cruds.boatEnginePhaseOne.fields.no_of_share') }}</label>
                            <input class="form-control" type="text" name="no_of_share" id="no_of_share" value="{{ old('no_of_share', $boatEnginePhaseOne->no_of_share) }}">
                            @if($errors->has('no_of_share'))
                                <span class="help-block" role="alert">{{ $errors->first('no_of_share') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.boatEnginePhaseOne.fields.no_of_share_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ward') ? 'has-error' : '' }}">
                            <label for="ward">{{ trans('cruds.boatEnginePhaseOne.fields.ward') }}</label>
                            <input class="form-control" type="text" name="ward" id="ward" value="{{ old('ward', $boatEnginePhaseOne->ward) }}">
                            @if($errors->has('ward'))
                                <span class="help-block" role="alert">{{ $errors->first('ward') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.boatEnginePhaseOne.fields.ward_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('recipients') ? 'has-error' : '' }}">
                            <label for="recipients">{{ trans('cruds.boatEnginePhaseOne.fields.recipients') }}</label>
                            <input class="form-control" type="text" name="recipients" id="recipients" value="{{ old('recipients', $boatEnginePhaseOne->recipients) }}">
                            @if($errors->has('recipients'))
                                <span class="help-block" role="alert">{{ $errors->first('recipients') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.boatEnginePhaseOne.fields.recipients_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('boat_status') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.boatEnginePhaseOne.fields.boat_status') }}</label>
                            <select class="form-control" name="boat_status" id="boat_status">
                                <option value disabled {{ old('boat_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\BoatEnginePhaseOne::BOAT_STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('boat_status', $boatEnginePhaseOne->boat_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('boat_status'))
                                <span class="help-block" role="alert">{{ $errors->first('boat_status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.boatEnginePhaseOne.fields.boat_status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('engine_status') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.boatEnginePhaseOne.fields.engine_status') }}</label>
                            <select class="form-control" name="engine_status" id="engine_status">
                                <option value disabled {{ old('engine_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\BoatEnginePhaseOne::ENGINE_STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('engine_status', $boatEnginePhaseOne->engine_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('engine_status'))
                                <span class="help-block" role="alert">{{ $errors->first('engine_status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.boatEnginePhaseOne.fields.engine_status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('date_of_monitoring') ? 'has-error' : '' }}">
                            <label for="date_of_monitoring">{{ trans('cruds.boatEnginePhaseOne.fields.date_of_monitoring') }}</label>
                            <input class="form-control date" type="text" name="date_of_monitoring" id="date_of_monitoring" value="{{ old('date_of_monitoring', $boatEnginePhaseOne->date_of_monitoring) }}">
                            @if($errors->has('date_of_monitoring'))
                                <span class="help-block" role="alert">{{ $errors->first('date_of_monitoring') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.boatEnginePhaseOne.fields.date_of_monitoring_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('remarks') ? 'has-error' : '' }}">
                            <label for="remarks">{{ trans('cruds.boatEnginePhaseOne.fields.remarks') }}</label>
                            <input class="form-control" type="text" name="remarks" id="remarks" value="{{ old('remarks', $boatEnginePhaseOne->remarks) }}">
                            @if($errors->has('remarks'))
                                <span class="help-block" role="alert">{{ $errors->first('remarks') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.boatEnginePhaseOne.fields.remarks_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection