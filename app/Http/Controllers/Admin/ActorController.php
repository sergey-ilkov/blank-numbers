<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use App\Models\Admin\Actor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ActorController extends Controller
{
    //
    public function index()
    {

        // $actors = Actor::all();
        $actors = Actor::paginate(50);

        return view('admin.actors.index', compact('actors'));
    }
    public function filter()
    {

        // $actors = Actor::orderBy('surname_uk', 'asc')->get();
        $actors = Actor::orderBy('surname_uk', 'asc')->paginate(50);

        return view('admin.actors.index', compact('actors'));
    }


    public function create()
    {
        $languages = Language::all();

        return view('admin.actors.create', compact('languages'));
    }


    public function store(Request $request)
    {

        $name_uk = $request->name_uk;
        $surname_uk = $request->surname_uk;
        $name_ru = $request->name_ru;
        $surname_ru = $request->surname_ru;

        $validator = Validator::make($request->all(), [
            'name_uk' => ['required'],
            'surname_uk' => [
                'required',
                Rule::unique('actors')->where(function ($query) use ($name_uk, $surname_uk) {
                    return $query->where('name_uk', $name_uk)
                        ->where('surname_uk', $surname_uk);
                }),
            ],
            'name_ru' => ['required'],
            'surname_ru' => [
                'required',
                Rule::unique('actors')->where(function ($query) use ($name_ru, $surname_ru) {
                    return $query->where('name_ru', $name_ru)
                        ->where('surname_ru', $surname_ru);
                }),
            ],
        ])->validate();


        Actor::create($validator);

        alert(__('У БД створено новий запис!'));

        return redirect()->route('actors.create');
    }


    public function edit($id)
    {
        $actor = Actor::where('id', $id)->first();

        $languages = Language::all();

        return view('admin.actors.edit', compact('languages', 'actor'));
    }


    public function update(Request $request, $id)
    {


        $validation = $request->validate([
            'name_uk' => 'required',
            'surname_uk' => 'required',
            'name_ru' => 'required',
            'surname_ru' => 'required',
        ]);

        $res = Actor::query()
            ->where('id', $id)
            ->update($validation);

        if ($res) {
            alert(__('Дані оновлені!'));
        } else {
            alert(__('Помилка. Щось пішло не так!'), 'danger');
        }
        return redirect()->route('actors.edit', $id);
    }


    public function destroy($id)
    {
        $res = Actor::destroy($id);


        if ($res) {
            alert(__('Дані успішно видалені!'));
        } else {
            alert(__('Помилка. Щось пішло не так!'), 'danger');
        }

        return redirect()->route('actors.index');
    }
}
