<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use App\Models\Admin\Actor;
use App\Models\Admin\Movie;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    //
    public function index()
    {

        // $movies = Movie::all();
        $movies = Movie::paginate(50);
        // dd($movies[0]->actors[0]->surname_uk);

        return view('admin.movies.index', compact('movies'));
    }
    public function filter()
    {

        // $movies = Movie::orderBy('title_uk', 'asc')->get();
        $movies = Movie::orderBy('title_uk', 'asc')->paginate(50);

        return view('admin.movies.index', compact('movies'));
    }

    public function search(Request $request)
    {


        if ($request->table === 'actors') {
            $search = $request->search . '%';
            $actors = Actor::select('id', 'surname_uk', 'name_uk')->where('surname_uk', 'like', $search)->get();

            return response()->json($actors);
        }


        return response()->json(['status' => 'error']);
    }

    public function create()
    {
        $languages = Language::all();

        // $actors = Actor::orderBy('surname_uk', 'asc')->get();
        // $actors = Actor::select(['id', 'name_uk', 'surname_uk'])->orderBy('surname_uk', 'asc')->get();



        return view('admin.movies.create', compact('languages'));
    }


    public function store(Request $request)
    {

        // dd($request->all());
        // dd($request->actors);

        $title_uk = $request->title_uk;
        $year = $request->year;

        $request->validate([

            'title_uk' => [
                'required',
                Rule::unique('movies')->where(function ($query) use ($title_uk, $year) {
                    return $query->where('title_uk', $title_uk)
                        ->where('year', $year);
                }),
            ],
            'title_ru' => ['required', 'string'],
            'year' => ['required', 'integer'],
            'poster' => ['required', 'image', 'max:512'],
            'trailer' => ['required', 'string'],
            'actors' => ['required', 'array'],



        ]);


        $path = $request->file('poster')->store('images/posters', 'public');
        // dd($path);


        DB::beginTransaction();

        $movie = Movie::create([
            'title_uk' => $request->title_uk,
            'title_ru' => $request->title_ru,
            'year' => $request->year,
            'poster' => $path,
            'trailer' => $request->trailer,
        ]);

        // ? many to many
        $actors = $request->actors;
        $movie->actors()->attach($actors);

        DB::commit();

        if ($movie) {
            alert(__('У БД створено новий запис!'));
        } else {
            alert(__('Помилка. щось пішло не так!'));
        }



        return redirect()->route('movies.create');
    }



    public function edit($id)
    {

        $movie = Movie::where('id', $id)->first();
        $languages = Language::all();

        // $actors = Actor::orderBy('surname_uk', 'asc')->get();

        // dd($movie->actors);

        return view('admin.movies.edit', compact('languages', 'movie'));
        // return view('admin.movies.edit', compact('languages', 'movie', 'actors'));
    }


    public function update(Request $request, $id)
    {


        // dd($request->all());


        $validation = $request->validate([

            'title_uk' => ['required', 'string'],
            'title_ru' => ['required', 'string'],
            'year' => ['required', 'integer'],

            'trailer' => ['required', 'string'],

        ]);

        $actors = $request->validate([
            'actors' => ['required', 'array'],
        ]);


        // dd($actors);

        $movie = Movie::where('id', $id)->first();

        if ($request->poster) {
            $request->validate([
                'poster' => ['required', 'image', 'max:512']
            ]);

            // dd($movie->poster);
            Storage::disk('public')->delete($movie->poster);

            $path = $request->file('poster')->store('images/posters', 'public');
            // dd($path);

            $validation['poster'] = $path;

            // $validation['poster'] = $request->file('poster')->store('images/posters', 'public');
        }



        DB::beginTransaction();

        $resSave = $movie->update($validation);

        $movie->actors()->sync($actors['actors']);

        DB::commit();

        if ($resSave) {
            alert(__('Дані оновлені!'));
        } else {
            alert(__('Помилка. щось пішло не так!'), 'danger');
        }


        return redirect()->route('movies.edit', $id);
    }



    public function destroy($id)
    {

        $model = Movie::where('id', $id)->first();


        $res = $model->destroy($id);
        // $res = Movie::destroy($id);


        if ($res) {

            Storage::disk('public')->delete($model->poster);

            alert(__('Дані успішно видалені!'));
        } else {
            alert(__('Помилка. Щось пішло не так!'), 'danger');
        }

        return redirect()->route('movies.index');
    }
}