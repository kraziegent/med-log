<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Support\Str;

class ModuleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $modules = auth()->user()->modules()->paginate();
        $breadcrumbs = ['Modules' => '#'];

        return view('modules.index', compact('modules', 'breadcrumbs'));
    }

    /**
     * Show a single resource.
     *
     * @param Module $module
     * @return Response
     */
    public function show(Module $module)
    {
        $breadcrumbs = ['Modules' => route('modules.index'), "{$module->name} Skills" => '#'];

        return view('modules.show', compact('module', 'breadcrumbs'));
    }
}
