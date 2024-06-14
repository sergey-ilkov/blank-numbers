<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Occupation;

class OccupationController extends Controller
{
    //
    public function index()
    {

        // $occupations = Occupation::all();
        $occupations = Occupation::paginate(50);;

        return view('admin.occupations.index', compact('occupations'));
    }
    public function filter()
    {

        // $occupations = Occupation::orderBy('title_uk', 'asc')->get();
        $occupations = Occupation::orderBy('title_uk', 'asc')->paginate(50);

        return view('admin.occupations.index', compact('occupations'));
    }

    public function create()
    {

        $languages = Language::all();

        return view('admin.occupations.create', compact('languages'));
    }


    public function store(Request $request)
    {


        $validation = $request->validate([
            'title_ru' => 'required|unique:occupations',
            'title_uk' => 'required|unique:occupations',
        ]);


        Occupation::create($validation);

        alert(__('У БД створено новий запис!'));

        return redirect()->route('occupations.create');
    }


    public function edit($id)
    {
        $occupation = Occupation::where('id', $id)->first();

        $languages = Language::all();

        return view('admin.occupations.edit', compact('languages', 'occupation'));
    }


    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'title_ru' => 'required',
            'title_uk' => 'required',
        ]);

        $res = Occupation::query()
            ->where('id', $id)
            ->update($validation);

        if ($res) {
            alert(__('Дані оновлені!'));
        } else {
            alert(__('Помилка. Щось пішло не так!'), 'danger');
        }

        return redirect()->route('occupations.edit', $id);
    }


    public function destroy($id)
    {
        $res = Occupation::destroy($id);


        if ($res) {
            alert(__('Дані успішно видалені!'));
        } else {
            alert(__('Помилка. Щось пішло не так!'), 'danger');
        }

        return redirect()->route('occupations.index');
    }
}
