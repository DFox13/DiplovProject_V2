<?php
namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class StockController extends Controller
{
    

    // Форма добавления акции
    public function create()
    {
        return view('admin.stock-create');
    }

    // Сохранение акции
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $stock = new Stock();
        $stock->title = $validated['title'];
        $stock->description = $validated['description'];

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $stock->image = $path;
        }

        $stock->save();

        return redirect()->route('menu.list-stock')->with('success', 'Акция добавлена!');
    }

    // Список акций (если нужно)
    public function index()
    {
        $stocks = Stock::all();
        return view('stock', compact('stocks'));
    }

    public function adminlist()
    {
        if (!Auth::user()->canManageRoles()) {
            abort(403, 'У вас нет прав для выполнения этого действия.');
        }
        $stocks = Stock::all();
        return view('admin.stock-all', compact('stocks'));
    }

    // Удаление акции (опционально)
    public function destroy(Stock $stock)
    {
        if ($stock->image) {
            Storage::delete($stock->image);
        }
        $stock->delete();
        return redirect()->back()->with('success', 'Акция удалена!');
    }
}