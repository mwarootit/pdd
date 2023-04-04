@extends('layouts.admin')
@section('content')
<div class="content">
    @can('list_of_ministry_project_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.list-of-ministry-projects.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.listOfMinistryProject.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.listOfMinistryProject.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-ListOfMinistryProject">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.listOfMinistryProject.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listOfMinistryProject.fields.name_of_the_project') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listOfMinistryProject.fields.island') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listOfMinistryProject.fields.date_of_implementation') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listOfMinistryProject.fields.budget') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listOfMinistryProject.fields.location_village') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listOfMinistryProject.fields.recipients') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listOfMinistryProject.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listOfMinistryProject.fields.date_of_monitoring') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listOfMinistryProject.fields.remarks') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($listOfMinistryProjects as $key => $listOfMinistryProject)
                                    <tr data-entry-id="{{ $listOfMinistryProject->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $listOfMinistryProject->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $listOfMinistryProject->name_of_the_project ?? '' }}
                                        </td>
                                        <td>
                                            {{ $listOfMinistryProject->island ?? '' }}
                                        </td>
                                        <td>
                                            {{ $listOfMinistryProject->date_of_implementation ?? '' }}
                                        </td>
                                        <td>
                                            {{ $listOfMinistryProject->budget ?? '' }}
                                        </td>
                                        <td>
                                            {{ $listOfMinistryProject->location_village ?? '' }}
                                        </td>
                                        <td>
                                            {{ $listOfMinistryProject->recipients ?? '' }}
                                        </td>
                                        <td>
                                            {{ $listOfMinistryProject->status ?? '' }}
                                        </td>
                                        <td>
                                            {{ $listOfMinistryProject->date_of_monitoring ?? '' }}
                                        </td>
                                        <td>
                                            {{ $listOfMinistryProject->remarks ?? '' }}
                                        </td>
                                        <td>
                                            @can('list_of_ministry_project_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.list-of-ministry-projects.show', $listOfMinistryProject->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('list_of_ministry_project_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.list-of-ministry-projects.edit', $listOfMinistryProject->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('list_of_ministry_project_delete')
                                                <form action="{{ route('admin.list-of-ministry-projects.destroy', $listOfMinistryProject->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('list_of_ministry_project_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.list-of-ministry-projects.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-ListOfMinistryProject:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection