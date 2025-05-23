<?php

namespace App\Http\Controllers\Celebrity;


use App\Models\Language;
use App\Mail\OrderCelebrity;


use App\Models\Admin\Square;
use Illuminate\Http\Request;
use App\Models\Admin\Celebrity;
use function PHPSTORM_META\map;
use App\Models\Admin\Occupation;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Filters\CelebrityFilter;
use App\Http\Resources\CelebrityResource;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Database\Eloquent\Builder;

class CelebrityController extends Controller
{

    public function index()
    {

        $page = 'celebrities';

        return view('celebrities.index', compact('page'));
    }

    public function getFilters(Request $request)
    {
        if (!isset($request->language)) {
            return response()->json(['message' => 'Error get filter data']);
        }

        if (!isset($request->getfilters)) {

            return response()->json(['message' => 'Error get filter data']);
        }

        $arrayResponse = [];

        $title = 'title_' . $request->language;


        $occupations = Occupation::select('id', $title)->orderBy($title, 'asc')->get();
        $occupations = $occupations->map(function ($item) use ($title) {
            return ['id' => $item->id, 'title' => $item->$title];
        });


        $arrayResponse['occupations'] = $occupations;

        $squares = Square::all();

        $extra_number_one = $squares->pluck('extra_number_one')->unique()->sort(SORT_STRING)->values();
        $arrayResponse['squares']['extra_number_one'] = $extra_number_one;
        $extra_number_two = $squares->pluck('extra_number_two')->unique()->sort(SORT_STRING)->values();
        $arrayResponse['squares']['extra_number_two'] = $extra_number_two;
        $extra_number_three = $squares->pluck('extra_number_three')->unique()->sort(SORT_STRING)->values();
        $arrayResponse['squares']['extra_number_three'] = $extra_number_three;
        $extra_number_four = $squares->pluck('extra_number_four')->unique()->sort(SORT_STRING)->values();
        $arrayResponse['squares']['extra_number_four'] = $extra_number_four;

        $number_one = $squares->pluck('number_one')->unique()->sort(SORT_STRING)->values();
        $arrayResponse['squares']['number_one'] = $number_one;
        $number_two = $squares->pluck('number_two')->unique()->sort(SORT_STRING)->values();
        $arrayResponse['squares']['number_two'] = $number_two;
        $number_three = $squares->pluck('number_three')->unique()->sort(SORT_STRING)->values();
        $arrayResponse['squares']['number_three'] = $number_three;
        $number_four = $squares->pluck('number_four')->unique()->sort(SORT_STRING)->values();
        $arrayResponse['squares']['number_four'] = $number_four;
        $number_five = $squares->pluck('number_five')->unique()->sort(SORT_STRING)->values();
        $arrayResponse['squares']['number_five'] = $number_five;
        $number_six = $squares->pluck('number_six')->unique()->sort(SORT_STRING)->values();
        $arrayResponse['squares']['number_six'] = $number_six;
        $number_seven = $squares->pluck('number_seven')->unique()->sort(SORT_STRING)->values();
        $arrayResponse['squares']['number_seven'] = $number_seven;
        $number_eight = $squares->pluck('number_eight')->unique()->sort(SORT_STRING)->values();
        $arrayResponse['squares']['number_eight'] = $number_eight;
        $number_nine = $squares->pluck('number_nine')->unique()->sort(SORT_STRING)->values();
        $arrayResponse['squares']['number_nine'] = $number_nine;

        $goal = $squares->pluck('goal')->unique()->sort(SORT_STRING)->values();
        $arrayResponse['squares']['goal'] = $goal;
        $family = $squares->pluck('family')->unique()->sort(SORT_STRING)->values();
        $arrayResponse['squares']['family'] = $family;
        $habits = $squares->pluck('habits')->unique()->sort(SORT_STRING)->values();
        $arrayResponse['squares']['habits'] = $habits;
        $self_esteem = $squares->pluck('self_esteem')->unique()->sort(SORT_STRING)->values();
        $arrayResponse['squares']['self_esteem'] = $self_esteem;
        $everyday_life = $squares->pluck('everyday_life')->unique()->sort(SORT_STRING)->values();
        $arrayResponse['squares']['everyday_life'] = $everyday_life;
        $talents = $squares->pluck('talents')->unique()->sort()->values(SORT_STRING);
        $arrayResponse['squares']['talents'] = $talents;
        $spirituality = $squares->pluck('spirituality')->unique()->sort(SORT_STRING)->values();
        $arrayResponse['squares']['spirituality'] = $spirituality;
        $temperametnt = $squares->pluck('temperament')->unique()->sort(SORT_STRING)->values();
        $arrayResponse['squares']['temperament'] = $temperametnt;


        return response()->json($arrayResponse);
    }


    public function getCelebrities(Request $request)
    {

        if (!isset($request->language)) {

            // ? info log
            Log::error('ERROR: not language');

            return response()->json(['message' => 'Error get data']);
        }

        if (!in_array($request->language, ['uk', 'ru'])) {

            // ? info log
            Log::error('ERROR: not language array: uk, ru');

            return response()->json(['message' => 'Error get data']);
        }


        if ($request->details) {

            if (is_numeric($request->details['id'])) {
                $id = $request->details['id'];

                // ? info log
                // Log::info('details INPUT: ', ['details' => $request->details['id']]);

                $resData = new CelebrityResource(Celebrity::find($id));

                // ? info log
                // Log::info('details OUTPUT: ', ['result' => $resData]);

                return $resData;
                // return new CelebrityResource(Celebrity::find($id));

            } else {

                // ? info log
                Log::error('ERROR: id no number');

                return response()->json(['message' => 'Error get data']);
            }
        }

        $lang = $request->language;

        $name = 'name_' . $lang;
        $surname = 'surname_' . $lang;


        if ($request->filters) {

            // ? info log
            // Log::info('filters INPUT: ', ['filters' => $request->filters]);

            $filter = app()->make(CelebrityFilter::class, ['queryParams' => array_filter($request->filters)]);

            $celebrities = Celebrity::select('id', "{$surname}", "$name")
                ->where('published', true)
                ->filter($filter)
                ->orderBy("{$surname}", 'asc')
                ->get();

            $resData = CelebrityResource::collection($celebrities);

            // ? info log
            // Log::info('filters OUTPUT: ', ['result' => $resData]);

            return $resData;
            // return CelebrityResource::collection($celebrities);
        }


        if ($request->search) {

            $search = $request->search;

            // ? info log
            // Log::info('search  INPUT: ', ['search' => $search]);

            $celebrities = Celebrity::where('published', true)
                ->where(function (Builder $query) use ($name, $surname, $search) {
                    $query->whereAny([$name, $surname], 'like', "%{$search}%")
                        ->orWhere(DB::raw("concat({$name}, ' ', {$surname})"), 'LIKE', "%{$search}%")
                        ->orWhere(DB::raw("concat({$surname}, ' ', {$name})"), 'LIKE', "%{$search}%");
                })
                ->orderBy("{$surname}", 'asc')
                ->get();


            $resData = CelebrityResource::collection($celebrities);

            // ? info log
            // Log::info('search OUTPUT: ', ['result' => $resData]);

            return $resData;
            // return CelebrityResource::collection($celebrities);
        }

        if ($request->search_letter) {
            $search = $request->search_letter;
            $celebrities = Celebrity::where('published', true)
                ->where($surname, 'like', "{$search}%")
                ->orderBy("{$surname}", 'asc')
                ->get();



            $resData = CelebrityResource::collection($celebrities);

            // ? info log
            // Log::info('search OUTPUT: ', ['result' => $resData]);

            return $resData;
        }


        // ? info log
        Log::error('ERROR: Error get data');


        return response()->json(['message' => 'Error get data']);
    }


    public function send(Request $request)
    {

        $celebrity = clearTags($request->celebrity);

        Mail::to('albinabeshlyaga@gmail.com')->send(new OrderCelebrity($celebrity));

        return response()->json(['status' => 'ok']);
    }
}