<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Verification;

class TraineeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $trainees = User::whereRole('trainee')->latest()->paginate(5);
        $breadcrumbs = ['Trainees' => "#"];

        return view('trainees.index', compact('trainees', 'breadcrumbs'));
    }

    /**
     * Show a single resource.
     *
     * @param User $trainee
     * @return Response
     */
    public function show(User $trainee)
    {
        $modules = $trainee->modules()->with(['skills', 'skills.tasks'])->get();
        $verifications = Verification::whereStatus('active')->orderby('id')->get();

        $breadcrumbs = ['Trainees' => route('trainees.index'), Str::title($trainee->name) => '#'];

        return view('trainees.show', compact('trainee', 'breadcrumbs', 'modules', 'verifications'));
    }
}
