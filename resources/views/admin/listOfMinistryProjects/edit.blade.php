@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.listOfMinistryProject.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.list-of-ministry-projects.update", [$listOfMinistryProject->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('name_of_the_project') ? 'has-error' : '' }}">
                            <label for="name_of_the_project">{{ trans('cruds.listOfMinistryProject.fields.name_of_the_project') }}</label>
                            <input class="form-control" type="text" name="name_of_the_project" id="name_of_the_project" value="{{ old('name_of_the_project', $listOfMinistryProject->name_of_the_project) }}">
                            @if($errors->has('name_of_the_project'))
                                <span class="help-block" role="alert">{{ $errors->first('name_of_the_project') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.listOfMinistryProject.fields.name_of_the_project_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('island') ? 'has-error' : '' }}">
                            <label for="island">{{ trans('cruds.listOfMinistryProject.fields.island') }}</label>
                            <input class="form-control" type="text" name="island" id="island" value="{{ old('island', $listOfMinistryProject->island) }}">
                            @if($errors->has('island'))
                                <span class="help-block" role="alert">{{ $errors->first('island') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.listOfMinistryProject.fields.island_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('date_of_implementation') ? 'has-error' : '' }}">
                            <label for="date_of_implementation">{{ trans('cruds.listOfMinistryProject.fields.date_of_implementation') }}</label>
                            <input class="form-control date" type="text" name="date_of_implementation" id="date_of_implementation" value="{{ old('date_of_implementation', $listOfMinistryProject->date_of_implementation) }}">
                            @if($errors->has('date_of_implementation'))
                                <span class="help-block" role="alert">{{ $errors->first('date_of_implementation') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.listOfMinistryProject.fields.date_of_implementation_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('budget') ? 'has-error' : '' }}">
                            <label for="budget">{{ trans('cruds.listOfMinistryProject.fields.budget') }}</label>
                            <input class="form-control" type="text" name="budget" id="budget" value="{{ old('budget', $listOfMinistryProject->budget) }}">
                            @if($errors->has('budget'))
                                <span class="help-block" role="alert">{{ $errors->first('budget') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.listOfMinistryProject.fields.budget_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('location_village') ? 'has-error' : '' }}">
                            <label for="location_village">{{ trans('cruds.listOfMinistryProject.fields.location_village') }}</label>
                            <input class="form-control" type="text" name="location_village" id="location_village" value="{{ old('location_village', $listOfMinistryProject->location_village) }}">
                            @if($errors->has('location_village'))
                                <span class="help-block" role="alert">{{ $errors->first('location_village') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.listOfMinistryProject.fields.location_village_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('recipients') ? 'has-error' : '' }}">
                            <label for="recipients">{{ trans('cruds.listOfMinistryProject.fields.recipients') }}</label>
                            <input class="form-control" type="text" name="recipients" id="recipients" value="{{ old('recipients', $listOfMinistryProject->recipients) }}">
                            @if($errors->has('recipients'))
                                <span class="help-block" role="alert">{{ $errors->first('recipients') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.listOfMinistryProject.fields.recipients_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label for="status">{{ trans('cruds.listOfMinistryProject.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', $listOfMinistryProject->status) }}">
                            @if($errors->has('status'))
                                <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.listOfMinistryProject.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('date_of_monitoring') ? 'has-error' : '' }}">
                            <label for="date_of_monitoring">{{ trans('cruds.listOfMinistryProject.fields.date_of_monitoring') }}</label>
                            <input class="form-control date" type="text" name="date_of_monitoring" id="date_of_monitoring" value="{{ old('date_of_monitoring', $listOfMinistryProject->date_of_monitoring) }}">
                            @if($errors->has('date_of_monitoring'))
                                <span class="help-block" role="alert">{{ $errors->first('date_of_monitoring') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.listOfMinistryProject.fields.date_of_monitoring_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('remarks') ? 'has-error' : '' }}">
                            <label for="remarks">{{ trans('cruds.listOfMinistryProject.fields.remarks') }}</label>
                            <input class="form-control" type="text" name="remarks" id="remarks" value="{{ old('remarks', $listOfMinistryProject->remarks) }}">
                            @if($errors->has('remarks'))
                                <span class="help-block" role="alert">{{ $errors->first('remarks') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.listOfMinistryProject.fields.remarks_helper') }}</span>
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