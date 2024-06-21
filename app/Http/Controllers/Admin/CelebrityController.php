<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Models\Admin\Celebrity;
use App\Http\Controllers\Controller;
use App\Models\Admin\Movie;
use App\Models\Admin\Occupation;
use Illuminate\Support\Facades\DB;

class CelebrityController extends Controller
{

    public function index()
    {

        $celebrities = Celebrity::paginate(50);


        return view('admin.celebrities.index', compact('celebrities'));
    }

    public function filter()
    {
        $celebrities = Celebrity::orderBy('surname_uk', 'asc')->paginate(50);

        return view('admin.celebrities.index', compact('celebrities'));
    }

    public function search(Request $request)
    {
        if ($request->table === 'occupations') {
            $search = $request->search . '%';
            $occupations = Occupation::select('id', 'title_uk')->where('title_uk', 'like', $search)->get();

            return response()->json($occupations);
        }
        if ($request->table === 'movies') {

            $search = $request->search . '%';
            $movies = Movie::select('id', 'title_uk', 'year')->where('title_uk', 'like', $search)->get();

            return response()->json($movies);
        }
        if ($request->table === 'connections') {
            $search = $request->search . '%';

            $celebrities = Celebrity::select('id', 'surname_uk', 'name_uk', 'year')->where('surname_uk', 'like', $search)->get();
            return response()->json($celebrities);
        }

        return response()->json(['status' => 'error']);
    }

    public function create()
    {
        $languages = Language::all();

        return view('admin.celebrities.create', compact('languages'));
    }

    public function store(Request $request)
    {



        $validationCelebrity = request()->validate([
            'name_uk' => 'required|string',
            'surname_uk' => 'required|string',
            'gender_uk' => 'required|string',
            'description_uk' => 'required|string',
            'name_ru' => 'required|string',
            'surname_ru' => 'required|string',
            'gender_ru' => 'required|string',
            'description_ru' => 'required|string',

            'day' => 'required|integer|between:1,31',
            'month' => 'required|integer|between:1,12',
            'year' => 'required|integer|min:1',
            'occupations' => 'required',
        ]);

        if ($request->has('published')) {
            $validationCelebrity['published'] = true;
        } else {
            $validationCelebrity['published'] = false;
        }



        // ? add square

        $validationSquare = request()->validate([
            'extra_number_one' => 'required|integer',
            'extra_number_two' => 'required|integer',
            'extra_number_three' => 'required|integer',
            'extra_number_four' => 'required|integer',

            'number_one' => 'required|integer',
            'number_four' => 'required|integer',
            'number_seven' => 'required|integer',
            'number_two' => 'required|integer',
            'number_five' => 'required|integer',
            'number_eight' => 'required|integer',
            'number_three' => 'required|integer',
            'number_six' => 'required|integer',
            'number_nine' => 'required|integer',

            'goal' => 'required|integer',
            'family' => 'required|integer',
            'habits' => 'required|integer',
            'self_esteem' => 'required|integer',
            'everyday_life' => 'required|integer',
            'talents' => 'required|integer',
            'spirituality' => 'required|integer',
            'temperament' => 'required|integer',
        ]);

        $validationOccupation = request()->validate([
            'occupations' => 'required|array',

        ]);
        $validationMovies = request()->validate([
            'movies' => 'array',

        ]);
        $validationConnections = request()->validate([
            'connections' => 'array',

        ]);




        DB::beginTransaction();
        $celebrity = Celebrity::create($validationCelebrity);
        // ? one to one
        $celebrity->square()->create($validationSquare);

        // ? many to many
        $occupations = $request->occupations;
        $celebrity->occupations()->attach($occupations);
        // dd($occupations);

        // ? many to many
        $movies = $request->movies;
        $celebrity->movies()->attach($movies);

        // ? many to many
        $connections = $request->connections;
        $celebrity->connections()->attach($connections);

        DB::commit();

        if ($celebrity) {
            alert(__('У БД створено новий запис!'));
        } else {
            alert(__('Помилка. Щось пішло не так!'));
        }

        return redirect()->route('celebrities.create');
    }

    public function edit($id)
    {

        $celebrity = Celebrity::where('id', $id)->first();
        $languages = Language::all();

        // ? square
        $square = $celebrity->square;

        return view('admin.celebrities.edit', compact('languages', 'celebrity', 'square'));
    }

    public function update(Request $request, $id)
    {




        $validationCelebrity = request()->validate([
            'name_uk' => 'required|string',
            'surname_uk' => 'required|string',
            'gender_uk' => 'required|string',
            'description_uk' => 'required|string',
            'name_ru' => 'required|string',
            'surname_ru' => 'required|string',
            'gender_ru' => 'required|string',
            'description_ru' => 'required|string',

            'day' => 'required|integer|between:1,31',
            'month' => 'required|integer|between:1,12',
            'year' => 'required|integer|min:1',
        ]);

        // ? add square

        $validationSquare = request()->validate([


            'extra_number_one' => 'required|integer',
            'extra_number_two' => 'required|integer',
            'extra_number_three' => 'required|integer',
            'extra_number_four' => 'required|integer',

            'number_one' => 'required|integer',
            'number_four' => 'required|integer',
            'number_seven' => 'required|integer',
            'number_two' => 'required|integer',
            'number_five' => 'required|integer',
            'number_eight' => 'required|integer',
            'number_three' => 'required|integer',
            'number_six' => 'required|integer',
            'number_nine' => 'required|integer',

            'goal' => 'required|integer',
            'family' => 'required|integer',
            'habits' => 'required|integer',
            'self_esteem' => 'required|integer',
            'everyday_life' => 'required|integer',
            'talents' => 'required|integer',
            'spirituality' => 'required|integer',
            'temperament' => 'required|integer',
        ]);

        $validationOccupation = request()->validate([
            'occupations' => 'required|array',

        ]);

        $validationMovies = request()->validate([
            'movies' => 'array',
        ]);

        $validationConnections = request()->validate([
            'connections' => 'array',

        ]);

        if ($request->has('published')) {
            $validationCelebrity['published'] = true;
        } else {
            $validationCelebrity['published'] = false;
        }

        $celebrity = Celebrity::where('id', $id)->first();

        DB::beginTransaction();

        $resSave = $celebrity->update($validationCelebrity);

        $celebrity->square()->update($validationSquare);

        // ? sync many to many      
        $celebrity->occupations()->sync($validationOccupation['occupations']);

        // ? sync many to many
        $movies = $request->movies;
        if ($movies) {
            $celebrity->movies()->sync($validationMovies['movies']);
        } else {
            $celebrity->movies()->detach();
        }
        // ? sync many to many
        $connections = $request->connections;
        if ($connections) {
            $celebrity->connections()->sync($validationConnections['connections']);
        } else {
            $celebrity->connections()->detach();
        }

        DB::commit();

        if ($resSave) {
            alert(__('Дані оновлені!'));
        } else {
            alert(__('Помилка. щось пішло не так!'), 'danger');
        }


        return redirect()->route('celebrities.edit', $id);
    }

    public function destroy($id)
    {
        $celebrity = Celebrity::where('id', $id)->first();


        $res = $celebrity->destroy($id);


        if ($res) {


            alert(__('Дані успішно видалені!'));
        } else {
            alert(__('Помилка. Щось пішло не так!'), 'danger');
        }

        return redirect()->route('celebrities.index');
    }
}