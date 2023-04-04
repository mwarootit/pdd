@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.developmentProject.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.development-projects.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.developmentProject.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $developmentProject->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.developmentProject.fields.remarks') }}
                                    </th>
                                    <td>
                                        {{ $developmentProject->remarks }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.developmentProject.fields.name_of_the_project') }}
                                    </th>
                                    <td>
                                        {{ $developmentProject->name_of_the_project }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.developmentProject.fields.starting_date') }}
                                    </th>
                                    <td>
                                        {{ $developmentProject->starting_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.developmentProject.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\DevelopmentProject::STATUS_SELECT[$developmentProject->status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.developmentProject.fields.prodoc') }}
                                    </th>
                                    <td>
                                        @foreach($developmentProject->prodoc as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.development-projects.index') }}">
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