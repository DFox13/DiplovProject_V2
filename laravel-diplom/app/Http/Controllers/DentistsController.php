<?php
namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\View\View;

class DentistsController extends Controller
{
    /**
     * Отображает список ресурсов.
     *
     * @return View
     */
    public function index(): View
    {
        $staff = Staff::all();

        return view('dentists', compact('staff'));
    }
}