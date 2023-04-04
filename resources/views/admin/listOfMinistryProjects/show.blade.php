@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.listOfMinistryProject.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.list-of-ministry-projects.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listOfMinistryProject.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $listOfMinistryProject->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listOfMinistryProject.fields.name_of_the_project') }}
                                    </th>
                                    <td>
                                        {{ $listOfMinistryProject->name_of_the_project }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listOfMinistryProject.fields.island') }}
                                    </th>
                                    <td>
                                        {{ $listOfMinistryProject->island }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listOfMinistryProject.fields.date_of_implementation') }}
                                    </th>
                                    <td>
                                        {{ $listOfMinistryProject->date_of_implementation }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listOfMinistryProject.fields.budget') }}
                                    </th>
                                    <td>
                                        {{ $listOfMinistryProject->budget }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listOfMinistryProject.fields.location_village') }}
                                    </th>
                                    <td>
                                        {{ $listOfMinistryProject->location_village }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listOfMinistryProject.fields.recipients') }}
                                    </th>
                                    <td>
                                        {{ $listOfMinistryProject->recipients }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listOfMinistryProject.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $listOfMinistryProject->status }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listOfMinistryProject.fields.date_of_monitoring') }}
                                    </th>
                                    <td>
                                        {{ $listOfMinistryProject->date_of_monitoring }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listOfMinistryProject.fields.remarks') }}
                                    </th>
                                    <td>
                                        {{ $listOfMinistryProject->remarks }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.list-of-ministry-projects.index') }}">
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