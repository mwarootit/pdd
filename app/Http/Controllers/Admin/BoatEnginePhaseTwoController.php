<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBoatEnginePhaseTwoRequest;
use App\Http\Requests\StoreBoatEnginePhaseTwoRequest;
use App\Http\Requests\UpdateBoatEnginePhaseTwoRequest;
use App\Models\BoatEnginePhaseTwo;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BoatEnginePhaseTwoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('boat_engine_phase_two_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $boatEnginePhaseTwos = BoatEnginePhaseTwo::all();

        return view('admin.boatEnginePhaseTwos.index', compact('boatEnginePhaseTwos'));
    }

    public function create()
    {
        abort_if(Gate::denies('boat_engine_phase_two_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.boatEnginePhaseTwos.create');
    }

    public function store(StoreBoatEnginePhaseTwoRequest $request)
    {
        $boatEnginePhaseTwo = BoatEnginePhaseTwo::create($request->all());

        return redirect()->route('admin.boat-engine-phase-twos.index');
    }

    public function edit(BoatEnginePhaseTwo $boatEnginePhaseTwo)
    {
        abort_if(Gate::denies('boat_engine_phase_two_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.boatEnginePhaseTwos.edit', compact('boatEnginePhaseTwo'));
    }

    public function update(UpdateBoatEnginePhaseTwoRequest $request, BoatEnginePhaseTwo $boatEnginePhaseTwo)
    {
        $boatEnginePhaseTwo->update($request->all());

        return redirect()->route('admin.boat-engine-phase-twos.index');
    }

    public function show(BoatEnginePhaseTwo $boatEnginePhaseTwo)
    {
        abort_if(Gate::denies('boat_engine_phase_two_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.boatEnginePhaseTwos.show', compact('boatEnginePhaseTwo'));
    }

    public function destroy(BoatEnginePhaseTwo $boatEnginePhaseTwo)
    {
        abort_if(Gate::denies('boat_engine_phase_two_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $boatEnginePhaseTwo->delete();

        return back();
    }

    public function massDestroy(MassDestroyBoatEnginePhaseTwoRequest $request)
    {
        $boatEnginePhaseTwos = BoatEnginePhaseTwo::find(request('ids'));

        foreach ($boatEnginePhaseTwos as $boatEnginePhaseTwo) {
            $boatEnginePhaseTwo->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
