<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBoatEnginePhaseOneRequest;
use App\Http\Requests\StoreBoatEnginePhaseOneRequest;
use App\Http\Requests\UpdateBoatEnginePhaseOneRequest;
use App\Models\BoatEnginePhaseOne;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BoatEnginePhaseOneController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('boat_engine_phase_one_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $boatEnginePhaseOnes = BoatEnginePhaseOne::all();

        return view('admin.boatEnginePhaseOnes.index', compact('boatEnginePhaseOnes'));
    }

    public function create()
    {
        abort_if(Gate::denies('boat_engine_phase_one_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.boatEnginePhaseOnes.create');
    }

    public function store(StoreBoatEnginePhaseOneRequest $request)
    {
        $boatEnginePhaseOne = BoatEnginePhaseOne::create($request->all());

        return redirect()->route('admin.boat-engine-phase-ones.index');
    }

    public function edit(BoatEnginePhaseOne $boatEnginePhaseOne)
    {
        abort_if(Gate::denies('boat_engine_phase_one_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.boatEnginePhaseOnes.edit', compact('boatEnginePhaseOne'));
    }

    public function update(UpdateBoatEnginePhaseOneRequest $request, BoatEnginePhaseOne $boatEnginePhaseOne)
    {
        $boatEnginePhaseOne->update($request->all());

        return redirect()->route('admin.boat-engine-phase-ones.index');
    }

    public function show(BoatEnginePhaseOne $boatEnginePhaseOne)
    {
        abort_if(Gate::denies('boat_engine_phase_one_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.boatEnginePhaseOnes.show', compact('boatEnginePhaseOne'));
    }

    public function destroy(BoatEnginePhaseOne $boatEnginePhaseOne)
    {
        abort_if(Gate::denies('boat_engine_phase_one_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $boatEnginePhaseOne->delete();

        return back();
    }

    public function massDestroy(MassDestroyBoatEnginePhaseOneRequest $request)
    {
        $boatEnginePhaseOnes = BoatEnginePhaseOne::find(request('ids'));

        foreach ($boatEnginePhaseOnes as $boatEnginePhaseOne) {
            $boatEnginePhaseOne->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
