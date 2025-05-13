<?php

namespace App\Http\Controllers;

use App\Jobs\SendNotificationJob;
use App\Models\MainMenuItems;
use App\Models\SubMenuItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function showAddCategoryForm()
    {
        return view('admin.add-category');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $category = MainMenuItems::create(['title' => $request->title]);

        dispatch(new SendNotificationJob(
            Auth::user(),
            "Категория '{$category->title}' успешно добавлена!"
        ));

        return redirect()->back()->with('success', 'Категория успешно добавлена.');
    }

    public function showAddSubItemForm()
    {
        $categories = MainMenuItems::all();
        return view('admin.add-sub-item', compact('categories'));
    }

    public function storeSubItem(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:main_menu_items,id',
            'title' => 'required|string|max:255',
        ]);

        SubMenuItems::create([
            'main_menu_item_id' => $request->category_id,
            'title' => $request->title,
        ]);

        return redirect()->back()->with('success', 'Подпункт успешно добавлен.');
    }

    public function editCategory($id)
    {
        $category = MainMenuItems::findOrFail($id);
        return view('admin.edit-category', compact('category'));
    }

    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $category = MainMenuItems::findOrFail($id);
        $category->update(['title' => $request->title]);

        return redirect()->route('menu.add.category')->with('success', 'Категория успешно обновлена.');
    }
    public function uploadForm()
    {
        return view('admin.upload_csv');
    }

    public function uploadCSV(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $lines = file($file->getRealPath()); 

            foreach ($lines as $line) {
                $data = str_getcsv($line);
                if (count($data) < 2) continue; 

                $categoryTitle = trim($data[0]);
                $subTitle = trim($data[1]);

                $category = MainMenuItems::firstOrCreate([
                    'title' => $categoryTitle
                ]);

                SubMenuItems::updateOrCreate([
                    'main_menu_item_id' => $category->id,
                    'title' => $subTitle
                ]);
            }

            dispatch(new SendNotificationJob(
                Auth::user(),
                "Категории успешно загружены!"
            ));
    
            return redirect()->route('account');
        }

        return back()->withErrors('Ошибка загрузки файла');
    }

    public function deleteCategory($id)
    {
        $category = MainMenuItems::findOrFail($id);

        dispatch(new SendNotificationJob(
            Auth::user(),
            "Категория '{$category->title}' успешно удалена!"
        ));

        $category->delete();
        return redirect()->route('menu.list.categories')->with('success', 'Категория успешно удалена.');
    }

    public function editSubItem($id)
    {
        $subItem = SubMenuItems::findOrFail($id);
        $categories = MainMenuItems::all();
        return view('admin.edit-sub-item', compact('subItem', 'categories'));
    }

    public function updateSubItem(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|exists:main_menu_items,id',
            'title' => 'required|string|max:255',
        ]);

        $subItem = SubMenuItems::findOrFail($id);
        $subItem->update([
            'main_menu_item_id' => $request->category_id,
            'title' => $request->title,
        ]);

        return redirect()->route('menu.add.sub-item')->with('success', 'Подпункт успешно обновлен.');
    }

    public function deleteSubItem($id)
    {
        $subItem = SubMenuItems::findOrFail($id);

        dispatch(new SendNotificationJob(
            Auth::user(),
            "Подпункт '{$subItem->title}' удален"
        ));

        $subItem->delete();
        return redirect()->route('menu.list.sub-items');
    }

    public function listCategories()
    {
        $categories = MainMenuItems::with('subMenuItems')->get();
        return view('admin.list-categories', compact('categories'));
    }

    public function getCategoryTitles()
    {
        $categories = MainMenuItems::with('subMenuItems')->get();
        return view('service', compact('categories'));
    }

    public function listSubItems()
    {
        $subItems = SubMenuItems::with('mainMenuItem')->get();
        return view('admin.list-sub-items', compact('subItems'));
    }
}