<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDevelopmentProjectRequest;
use App\Http\Requests\StoreDevelopmentProjectRequest;
use App\Http\Requests\UpdateDevelopmentProjectRequest;
use App\Models\DevelopmentProject;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DevelopmentProjectController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('development_project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $developmentProjects = DevelopmentProject::with(['media'])->get();

        return view('admin.developmentProjects.index', compact('developmentProjects'));
    }

    public function create()
    {
        abort_if(Gate::denies('development_project_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.developmentProjects.create');
    }

    public function store(StoreDevelopmentProjectRequest $request)
    {
        $developmentProject = DevelopmentProject::create($request->all());

        foreach ($request->input('prodoc', []) as $file) {
            $developmentProject->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('prodoc');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $developmentProject->id]);
        }

        return redirect()->route('admin.development-projects.index');
    }

    public function edit(DevelopmentProject $developmentProject)
    {
        abort_if(Gate::denies('development_project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.developmentProjects.edit', compact('developmentProject'));
    }

    public function update(UpdateDevelopmentProjectRequest $request, DevelopmentProject $developmentProject)
    {
        $developmentProject->update($request->all());

        if (count($developmentProject->prodoc) > 0) {
            foreach ($developmentProject->prodoc as $media) {
                if (! in_array($media->file_name, $request->input('prodoc', []))) {
                    $media->delete();
                }
            }
        }
        $media = $developmentProject->prodoc->pluck('file_name')->toArray();
        foreach ($request->input('prodoc', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $developmentProject->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('prodoc');
            }
        }

        return redirect()->route('admin.development-projects.index');
    }

    public function show(DevelopmentProject $developmentProject)
    {
        abort_if(Gate::denies('development_project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.developmentProjects.show', compact('developmentProject'));
    }

    public function destroy(DevelopmentProject $developmentProject)
    {
        abort_if(Gate::denies('development_project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $developmentProject->delete();

        return back();
    }

    public function massDestroy(MassDestroyDevelopmentProjectRequest $request)
    {
        $developmentProjects = DevelopmentProject::find(request('ids'));

        foreach ($developmentProjects as $developmentProject) {
            $developmentProject->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('development_project_create') && Gate::denies('development_project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new DevelopmentProject();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
