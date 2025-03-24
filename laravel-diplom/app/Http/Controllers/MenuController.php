<?php

namespace App\Http\Controllers;

use App\Models\MainMenuItems;
use App\Models\SubMenuItems;
use Illuminate\Http\Request;

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

        MainMenuItems::create([
            'title' => $request->title,
        ]);

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

    public function deleteCategory($id)
    {
        $category = MainMenuItems::findOrFail($id);
        $category->delete();

        return redirect()->route('menu.add.category')->with('success', 'Категория успешно удалена.');
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
        $subItem->delete();

        return redirect()->route('menu.add.sub-item')->with('success', 'Подпункт успешно удален.');
    }
    public function listCategories()
    {
        $categories = MainMenuItems::all();
        return view('admin.list-categories', compact('categories'));
    }

    public function listSubItems()
    {
        $subItems = SubMenuItems::with('mainMenuItem')->get();
        return view('admin.list-sub-items', compact('subItems'));
    }
}