@extends('layouts.admin')
@section('content')
<div class="content">
    @can('boat_engine_phase_two_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.boat-engine-phase-twos.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.boatEnginePhaseTwo.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.boatEnginePhaseTwo.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-BoatEnginePhaseTwo">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.boatEnginePhaseTwo.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.boatEnginePhaseTwo.fields.date_of_receival') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.boatEnginePhaseTwo.fields.island') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.boatEnginePhaseTwo.fields.no_of_share') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.boatEnginePhaseTwo.fields.ward') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.boatEnginePhaseTwo.fields.recipients') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.boatEnginePhaseTwo.fields.boat_status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.boatEnginePhaseTwo.fields.engine_status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.boatEnginePhaseTwo.fields.date_of_monitoring') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.boatEnginePhaseTwo.fields.remarks') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($boatEnginePhaseTwos as $key => $boatEnginePhaseTwo)
                                    <tr data-entry-id="{{ $boatEnginePhaseTwo->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $boatEnginePhaseTwo->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $boatEnginePhaseTwo->date_of_receival ?? '' }}
                                        </td>
                                        <td>
                                            {{ $boatEnginePhaseTwo->island ?? '' }}
                                        </td>
                                        <td>
                                            {{ $boatEnginePhaseTwo->no_of_share ?? '' }}
                                        </td>
                                        <td>
                                            {{ $boatEnginePhaseTwo->ward ?? '' }}
                                        </td>
                                        <td>
                                            {{ $boatEnginePhaseTwo->recipients ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\BoatEnginePhaseTwo::BOAT_STATUS_SELECT[$boatEnginePhaseTwo->boat_status] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\BoatEnginePhaseTwo::ENGINE_STATUS_SELECT[$boatEnginePhaseTwo->engine_status] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $boatEnginePhaseTwo->date_of_monitoring ?? '' }}
                                        </td>
                                        <td>
                                            {{ $boatEnginePhaseTwo->remarks ?? '' }}
                                        </td>
                                        <td>
                                            @can('boat_engine_phase_two_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.boat-engine-phase-twos.show', $boatEnginePhaseTwo->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('boat_engine_phase_two_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.boat-engine-phase-twos.edit', $boatEnginePhaseTwo->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('boat_engine_phase_two_delete')
                                                <form action="{{ route('admin.boat-engine-phase-twos.destroy', $boatEnginePhaseTwo->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('boat_engine_phase_two_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.boat-engine-phase-twos.massDestroy') }}",
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
  let table = $('.datatable-BoatEnginePhaseTwo:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection