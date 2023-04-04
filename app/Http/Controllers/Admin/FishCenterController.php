<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFishCenterRequest;
use App\Http\Requests\StoreFishCenterRequest;
use App\Http\Requests\UpdateFishCenterRequest;
use App\Models\FishCenter;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FishCenterController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('fish_center_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fishCenters = FishCenter::all();

        return view('admin.fishCenters.index', compact('fishCenters'));
    }

    public function create()
    {
        abort_if(Gate::denies('fish_center_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fishCenters.create');
    }

    public function store(StoreFishCenterRequest $request)
    {
        $fishCenter = FishCenter::create($request->all());

        return redirect()->route('admin.fish-centers.index');
    }

    public function edit(FishCenter $fishCenter)
    {
        abort_if(Gate::denies('fish_center_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fishCenters.edit', compact('fishCenter'));
    }

    public function update(UpdateFishCenterRequest $request, FishCenter $fishCenter)
    {
        $fishCenter->update($request->all());

        return redirect()->route('admin.fish-centers.index');
    }

    public function show(FishCenter $fishCenter)
    {
        abort_if(Gate::denies('fish_center_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fishCenters.show', compact('fishCenter'));
    }

    public function destroy(FishCenter $fishCenter)
    {
        abort_if(Gate::denies('fish_center_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fishCenter->delete();

        return back();
    }

    public function massDestroy(MassDestroyFishCenterRequest $request)
    {
        $fishCenters = FishCenter::find(request('ids'));

        foreach ($fishCenters as $fishCenter) {
            $fishCenter->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
