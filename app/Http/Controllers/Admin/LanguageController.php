<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    //
    public function index()
    {
        $languages = Language::all();

        return view('admin.languages.index', compact('languages'));
    }


    public function create()
    {
        return view('admin.languages.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => ['required', 'string', 'unique:languages', 'max:2'],
            'title' => ['required', 'string'],

        ]);

        Language::create($validated);

        alert(__('Додана нова мова!'));

        return redirect()->route('languages.create');
    }


    public function edit($id)
    {
        $language = Language::query()
            ->where('id', '=', $id)
            ->first();

        return view('admin.languages.edit', compact('language'));
    }


    public function update(Request $request, $id)
    {
        // ? Валидация данных
        $validated = $request->validate([

            'code' => ['required', 'string', 'max:2'],
            'title' => ['required', 'string'],

        ]);


        $res = Language::query()
            ->where('id', '=', $id)
            ->update($validated);

        if ($res) {
            alert(__('Зміни збережені!'));
        } else {
            alert(__('Помилка. Щось пішло не так!'), 'danger');
        }

        return redirect()->route('languages.edit', $id);
    }


    public function destroy($id)
    {

        $res = Language::destroy($id);

        if ($res) {
            alert(__('Мова успішно видалена!'));
        } else {
            alert(__('Помилка. Щось пішло не так!'), 'danger');
        }

        return redirect()->route('languages.index');
    }
}
