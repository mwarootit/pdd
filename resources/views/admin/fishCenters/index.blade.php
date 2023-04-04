@extends('layouts.admin')
@section('content')
<div class="content">
    @can('fish_center_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.fish-centers.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.fishCenter.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.fishCenter.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-FishCenter">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.fishCenter.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.fishCenter.fields.island') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.fishCenter.fields.operated_by') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.fishCenter.fields.date_of_recieval') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.fishCenter.fields.item') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.fishCenter.fields.quantity') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.fishCenter.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.fishCenter.fields.date_of_monitoring') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.fishCenter.fields.remarks') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($fishCenters as $key => $fishCenter)
                                    <tr data-entry-id="{{ $fishCenter->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $fishCenter->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $fishCenter->island ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\FishCenter::OPERATED_BY_SELECT[$fishCenter->operated_by] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $fishCenter->date_of_recieval ?? '' }}
                                        </td>
                                        <td>
                                            {{ $fishCenter->item ?? '' }}
                                        </td>
                                        <td>
                                            {{ $fishCenter->quantity ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\FishCenter::STATUS_SELECT[$fishCenter->status] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $fishCenter->date_of_monitoring ?? '' }}
                                        </td>
                                        <td>
                                            {{ $fishCenter->remarks ?? '' }}
                                        </td>
                                        <td>
                                            @can('fish_center_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.fish-centers.show', $fishCenter->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('fish_center_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.fish-centers.edit', $fishCenter->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('fish_center_delete')
                                                <form action="{{ route('admin.fish-centers.destroy', $fishCenter->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('fish_center_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.fish-centers.massDestroy') }}",
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
  let table = $('.datatable-FishCenter:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection