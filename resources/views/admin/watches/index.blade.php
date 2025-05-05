@extends('layouts.admin')
@section('content')
@can('watch_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.watches.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.watch.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.watch.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Watch">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.watch.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.watch.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.watch.fields.sku_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.watch.fields.size') }}
                        </th>
                        <th>
                            {{ trans('cruds.watch.fields.details') }}
                        </th>
                        <th>
                            {{ trans('cruds.watch.fields.color') }}
                        </th>
                        <th>
                            {{ trans('cruds.watch.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.watch.fields.category') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($watches as $key => $watch)
                        <tr data-entry-id="{{ $watch->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $watch->id ?? '' }}
                            </td>
                            <td>
                                {{ $watch->title ?? '' }}
                            </td>
                            <td>
                                {{ $watch->sku_code ?? '' }}
                            </td>
                            <td>
                                {{ $watch->size ?? '' }}
                            </td>
                            <td>
                                {{ $watch->details ?? '' }}
                            </td>
                            <td>
                                {{ $watch->color ?? '' }}
                            </td>
                            <td>
                                {{ $watch->price ?? '' }}
                            </td>
                            <td>
                                {{ $watch->category->category_name ?? '' }}
                            </td>
                            <td>
                                @can('watch_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.watches.show', $watch->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('watch_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.watches.edit', $watch->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('watch_delete')
                                    <form action="{{ route('admin.watches.destroy', $watch->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('watch_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.watches.massDestroy') }}",
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
    pageLength: 100,
  });
  let table = $('.datatable-Watch:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection