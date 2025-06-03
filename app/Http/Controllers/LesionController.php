<?php

namespace App\Http\Controllers;

use App\Http\Requests\LesionStoreRequest;
use App\Http\Requests\LesionUpdateRequest;
use App\Http\Resources\ContactTypeResource;
use App\Http\Resources\IllnessResource;
use App\Http\Resources\LesionCollection;
use App\Http\Resources\LesionResource;
use App\Http\Resources\OsiisCodeResource;
use App\Http\Resources\PathologyTypeResource;
use App\Http\Resources\PlayerActionResource;
use App\Http\Resources\UserAreaCollection;
use App\Http\Resources\UserPlayerCollection;
use App\Models\ContactType;
use App\Models\Illness;
use App\Models\Illnesses;
use App\Models\Lesion;
use App\Models\Osiiscode;
use App\Models\PathologyType;
use App\Models\PlayerAction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use Inertia\Response;

class LesionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {

        return Inertia::render('Lesion/Index', [
            'filters' => Request::all('search', 'trashed'),
            'lesions' => new LesionCollection(
                Auth::user()->account->lesions()
                    ->with('area')
                    ->filter(Request::only('search', 'trashed'))
                    ->paginate()
                    ->appends(Request::all())
            ),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Lesion $lesion, $areaID): Response
    {
        return Inertia::render('Lesion/Create', [
            'lesion' => new LesionResource($lesion),
            'areas' => new UserAreaCollection(
                Auth::user()->account->areas()
                ->orderBy('name')
                ->get()
            ),
            'pathology_types' => PathologyTypeResource::collection(PathologyType::all()),
            'illnesses' => IllnessResource::collection(Illness::all()),
            'contact_types' => ContactTypeResource::collection(ContactType::all()),
            'player_actions' => PlayerActionResource::collection(PlayerAction::all()),
            'osiis_codes' => OsiisCodeResource::collection(Osiiscode::all()),
            'players' => new UserPlayerCollection(
                Auth::user()->account->players()
                ->get()
            ),
            'areaID' => $areaID
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LesionStoreRequest $request): RedirectResponse
    {
        Auth::user()->account->lesions()->create(
            $request->validated()
        );

        return Redirect::route('lesion')->with('success', 'Injury created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesion $lesion)
    {
        return Inertia::render('Lesion/Edit', [
            'lesions' => new LesionResource($lesion),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Lesion $lesion, LesionUpdateRequest $request): RedirectResponse
    {
        $lesion->update(
            $request->validated()
        );

        return Redirect::back()->with('success', 'Lesion updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
