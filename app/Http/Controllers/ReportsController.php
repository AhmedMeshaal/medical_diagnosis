<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReportCollection;
use App\Http\Resources\ReportResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use App\Models\Report;
use Inertia\Inertia;
use Inertia\Response;

class ReportsController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Reports/Index', [
            'filters' => Request::all('search', 'trashed'),
            'reports' => new ReportCollection(
                Auth::user()->account->reports()
                ->with('organization')
                ->orderByName()
                ->filter(Request::only('search', 'trashed'))
                ->paginate()
                ->appends(Request::all())
                ),
        ]);
    }
}
