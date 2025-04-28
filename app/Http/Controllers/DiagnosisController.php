<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class DiagnosisController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Diagnosis/Index');
    }
}
