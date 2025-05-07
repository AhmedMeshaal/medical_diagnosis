<?php

namespace App\Http\Controllers;

use App\Http\Resources\AreaCollection;
use Illuminate\Support\Facades\Auth;
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

//    public function create(): Response
//    {
//        return Inertia::render('Reports/Create');
////        return Inertia::render('Reports/Create', [
////            'organizations' => new UserOrganizationCollection(
////                Auth::user()->account->organizations()
////                ->orderBy('name')
////                ->get()
////            ),
////        ]);
//    }
//
//    public function store(ReportStoreRequest $request): RedirectResponse
//    {
//        Auth::user()->account->reports()->create(
//            $request->validated()
//        );
//
//        return Redirect::route('reports')->with('success', 'Report created.');
//    }

}
