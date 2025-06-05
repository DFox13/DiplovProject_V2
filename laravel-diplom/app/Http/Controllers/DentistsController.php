<?php
namespace App\Http\Controllers;

use App\Models\Dentists;
use Illuminate\Http\Request;
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
        $staff = Dentists::all();

        return view('dentists', compact('staff'));
    }
    public function create(): View
    {
        return view('admin.dentist-add');
    }

    /**
     * Сохраняет нового врача.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    /**
     * Отображает список врачей для администратора.
     *
     * @return View
     */
    public function adminIndex(): View
    {
        $staff = Dentists::all();

        return view('admin.dentist-list', compact('staff'));
    }
    public function edit(int $id): View
    {
        $dentist = Dentists::findOrFail($id);

        return view('admin.dentist-edit', compact('dentist'));
    }

    /**
     * Обновляет данные карточки врача.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */


    /**
     * Удаляет карточку врача.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id)
    {
        $dentist = Dentists::findOrFail($id);

        if ($dentist->image_path) {
            unlink(public_path('images/' . $dentist->image_path));
        }

        $dentist->delete();

        return redirect()->route('admin.dentists')->with('success', 'Карточка врача успешно удалена.');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'dolznost' => 'required|string|max:255',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:врач,ассистент,администратор',
        ]);

        if ($request->hasFile('image_path')) {
            $imageName = time().'.'.$request->image_path->extension();
            $request->image_path->move(public_path('images'), $imageName);
            $validatedData['image_path'] = $imageName;
        }

        Dentists::create($validatedData);

        return redirect()->route('admin.dentists')->with('success', 'Врач успешно добавлен.');
    }

    /**
     * Обновляет данные карточки врача.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'dolznost' => 'required|string|max:255',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:врач,ассистент,администратор',
        ]);

        $dentist = Dentists::findOrFail($id);

        if ($request->hasFile('image_path')) {
            if ($dentist->image_path) {
                unlink(public_path('images/' . $dentist->image_path));
            }
            $imageName = time().'.'.$request->image_path->extension();
            $request->image_path->move(public_path('images'), $imageName);
            $validatedData['image_path'] = $imageName;
        }

        $dentist->update($validatedData);

        return redirect()->route('admin.dentists')->with('success', 'Данные врача успешно обновлены.');
    }
}