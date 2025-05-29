<?php

namespace App\Http\Controllers;

use App\Http\Requests\LesionUpdateRequest;
use App\Http\Resources\ContactTypeCollection;
use App\Http\Resources\ContactTypeResource;
use App\Http\Resources\IllnessCollection;
use App\Http\Resources\IllnessResource;
use App\Http\Resources\LesionCollection;
use App\Http\Resources\LesionResource;
use App\Http\Resources\UserAreaCollection;
use App\Models\ContactType;
use App\Models\Illness;
use App\Models\Lesion;
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
            'illness' => IllnessResource::collection(Illness::all()),
            'contact_types' => ContactTypeResource::collection(ContactType::all()),
            'areaID' => $areaID
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
