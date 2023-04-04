<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyListOfMinistryProjectRequest;
use App\Http\Requests\StoreListOfMinistryProjectRequest;
use App\Http\Requests\UpdateListOfMinistryProjectRequest;
use App\Models\ListOfMinistryProject;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ListOfMinistryProjectsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('list_of_ministry_project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listOfMinistryProjects = ListOfMinistryProject::all();

        return view('admin.listOfMinistryProjects.index', compact('listOfMinistryProjects'));
    }

    public function create()
    {
        abort_if(Gate::denies('list_of_ministry_project_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.listOfMinistryProjects.create');
    }

    public function store(StoreListOfMinistryProjectRequest $request)
    {
        $listOfMinistryProject = ListOfMinistryProject::create($request->all());

        return redirect()->route('admin.list-of-ministry-projects.index');
    }

    public function edit(ListOfMinistryProject $listOfMinistryProject)
    {
        abort_if(Gate::denies('list_of_ministry_project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.listOfMinistryProjects.edit', compact('listOfMinistryProject'));
    }

    public function update(UpdateListOfMinistryProjectRequest $request, ListOfMinistryProject $listOfMinistryProject)
    {
        $listOfMinistryProject->update($request->all());

        return redirect()->route('admin.list-of-ministry-projects.index');
    }

    public function show(ListOfMinistryProject $listOfMinistryProject)
    {
        abort_if(Gate::denies('list_of_ministry_project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.listOfMinistryProjects.show', compact('listOfMinistryProject'));
    }

    public function destroy(ListOfMinistryProject $listOfMinistryProject)
    {
        abort_if(Gate::denies('list_of_ministry_project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listOfMinistryProject->delete();

        return back();
    }

    public function massDestroy(MassDestroyListOfMinistryProjectRequest $request)
    {
        $listOfMinistryProjects = ListOfMinistryProject::find(request('ids'));

        foreach ($listOfMinistryProjects as $listOfMinistryProject) {
            $listOfMinistryProject->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
