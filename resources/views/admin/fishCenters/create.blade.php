@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.fishCenter.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.fish-centers.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('island') ? 'has-error' : '' }}">
                            <label for="island">{{ trans('cruds.fishCenter.fields.island') }}</label>
                            <input class="form-control" type="text" name="island" id="island" value="{{ old('island', '') }}">
                            @if($errors->has('island'))
                                <span class="help-block" role="alert">{{ $errors->first('island') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.fishCenter.fields.island_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('operated_by') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.fishCenter.fields.operated_by') }}</label>
                            <select class="form-control" name="operated_by" id="operated_by">
                                <option value disabled {{ old('operated_by', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\FishCenter::OPERATED_BY_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('operated_by', 'Operated') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('operated_by'))
                                <span class="help-block" role="alert">{{ $errors->first('operated_by') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.fishCenter.fields.operated_by_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('date_of_recieval') ? 'has-error' : '' }}">
                            <label for="date_of_recieval">{{ trans('cruds.fishCenter.fields.date_of_recieval') }}</label>
                            <input class="form-control date" type="text" name="date_of_recieval" id="date_of_recieval" value="{{ old('date_of_recieval') }}">
                            @if($errors->has('date_of_recieval'))
                                <span class="help-block" role="alert">{{ $errors->first('date_of_recieval') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.fishCenter.fields.date_of_recieval_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('item') ? 'has-error' : '' }}">
                            <label for="item">{{ trans('cruds.fishCenter.fields.item') }}</label>
                            <input class="form-control" type="text" name="item" id="item" value="{{ old('item', '') }}">
                            @if($errors->has('item'))
                                <span class="help-block" role="alert">{{ $errors->first('item') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.fishCenter.fields.item_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                            <label for="quantity">{{ trans('cruds.fishCenter.fields.quantity') }}</label>
                            <input class="form-control" type="text" name="quantity" id="quantity" value="{{ old('quantity', '') }}">
                            @if($errors->has('quantity'))
                                <span class="help-block" role="alert">{{ $errors->first('quantity') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.fishCenter.fields.quantity_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.fishCenter.fields.status') }}</label>
                            <select class="form-control" name="status" id="status">
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\FishCenter::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', 'Status') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.fishCenter.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('date_of_monitoring') ? 'has-error' : '' }}">
                            <label for="date_of_monitoring">{{ trans('cruds.fishCenter.fields.date_of_monitoring') }}</label>
                            <input class="form-control date" type="text" name="date_of_monitoring" id="date_of_monitoring" value="{{ old('date_of_monitoring') }}">
                            @if($errors->has('date_of_monitoring'))
                                <span class="help-block" role="alert">{{ $errors->first('date_of_monitoring') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.fishCenter.fields.date_of_monitoring_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('remarks') ? 'has-error' : '' }}">
                            <label for="remarks">{{ trans('cruds.fishCenter.fields.remarks') }}</label>
                            <input class="form-control" type="text" name="remarks" id="remarks" value="{{ old('remarks', '') }}">
                            @if($errors->has('remarks'))
                                <span class="help-block" role="alert">{{ $errors->first('remarks') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.fishCenter.fields.remarks_helper') }}</span>
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