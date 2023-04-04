@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.developmentProject.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.development-projects.update", [$developmentProject->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('remarks') ? 'has-error' : '' }}">
                            <label for="remarks">{{ trans('cruds.developmentProject.fields.remarks') }}</label>
                            <input class="form-control" type="text" name="remarks" id="remarks" value="{{ old('remarks', $developmentProject->remarks) }}">
                            @if($errors->has('remarks'))
                                <span class="help-block" role="alert">{{ $errors->first('remarks') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.developmentProject.fields.remarks_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('name_of_the_project') ? 'has-error' : '' }}">
                            <label for="name_of_the_project">{{ trans('cruds.developmentProject.fields.name_of_the_project') }}</label>
                            <input class="form-control" type="text" name="name_of_the_project" id="name_of_the_project" value="{{ old('name_of_the_project', $developmentProject->name_of_the_project) }}">
                            @if($errors->has('name_of_the_project'))
                                <span class="help-block" role="alert">{{ $errors->first('name_of_the_project') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.developmentProject.fields.name_of_the_project_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('starting_date') ? 'has-error' : '' }}">
                            <label for="starting_date">{{ trans('cruds.developmentProject.fields.starting_date') }}</label>
                            <input class="form-control date" type="text" name="starting_date" id="starting_date" value="{{ old('starting_date', $developmentProject->starting_date) }}">
                            @if($errors->has('starting_date'))
                                <span class="help-block" role="alert">{{ $errors->first('starting_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.developmentProject.fields.starting_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.developmentProject.fields.status') }}</label>
                            <select class="form-control" name="status" id="status">
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\DevelopmentProject::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', $developmentProject->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.developmentProject.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('prodoc') ? 'has-error' : '' }}">
                            <label for="prodoc">{{ trans('cruds.developmentProject.fields.prodoc') }}</label>
                            <div class="needsclick dropzone" id="prodoc-dropzone">
                            </div>
                            @if($errors->has('prodoc'))
                                <span class="help-block" role="alert">{{ $errors->first('prodoc') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.developmentProject.fields.prodoc_helper') }}</span>
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

@section('scripts')
<script>
    var uploadedProdocMap = {}
Dropzone.options.prodocDropzone = {
    url: '{{ route('admin.development-projects.storeMedia') }}',
    maxFilesize: 20, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="prodoc[]" value="' + response.name + '">')
      uploadedProdocMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedProdocMap[file.name]
      }
      $('form').find('input[name="prodoc[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($developmentProject) && $developmentProject->prodoc)
          var files =
            {!! json_encode($developmentProject->prodoc) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="prodoc[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection