<?php

namespace App\Http\Controllers;

use App\Http\Requests\AreaStoreRequest;
use App\Http\Resources\AreaCollection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use Inertia\Response;

class AreaController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Area/Index', [
            'filters' => Request::all('search', 'trashed'),
            'areas' => new AreaCollection(
                Auth::user()->account->areas()
                    ->orderByName()
                    ->filter(Request::only('search', 'trashed'))
                    ->paginate()
                    ->appends(Request::all())
            ),
        ]);
    }


    public function create(): Response
    {
        return Inertia::render('Area/Create');
    }

    public function store(AreaStoreRequest $request): RedirectResponse
    {
        $area = Auth::user()->account->areas()->create(
            $request->validated()
        );

        if ($request->hasFile('img')) {
            $area->update([
                'img' => $request->file('img')->store('bodyareas')
            ]);
        }

        return Redirect::route('area')->with('success', 'Area created.');
    }

//    public function store(ReportStoreRequest $request): RedirectResponse
//    {
//        Auth::user()->account->reports()->create(
//            $request->validated()
//        );
//
//        return Redirect::route('reports')->with('success', 'Report created.');
//    }

}
