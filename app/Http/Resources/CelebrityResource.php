<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CelebrityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $lang = $request->language;

        $name = 'name_' . $lang;
        $surname = 'surname_' . $lang;
        $description = 'description_' . $lang;
        $gender = 'gender_' . $lang;


        $details = $request->details;

        if ($details) {
            return [
                // 'id' => $this->id,

                'name' => $this->$name,
                'surname' => $this->$surname,
                'description' => $this->$description,

                // 'gender' => $this->$gender,

                'day' => $this->day,
                'month' => $this->month,
                'year' => $this->year,

                // 'published' => $this->published,


                'square' => [
                    'extra_number_one' => $this->square->extra_number_one,
                    'extra_number_two' => $this->square->extra_number_two,
                    'extra_number_three' => $this->square->extra_number_three,
                    'extra_number_four' => $this->square->extra_number_four,

                    'number_one' => $this->square->number_one,
                    'number_two' => $this->square->number_two,
                    'number_three' => $this->square->number_three,
                    'number_four' => $this->square->number_four,
                    'number_five' => $this->square->number_five,
                    'number_six' => $this->square->number_six,
                    'number_seven' => $this->square->number_seven,
                    'number_eight' => $this->square->number_eight,
                    'number_nine' => $this->square->number_nine,


                    'goal' => $this->square->goal,
                    'family' => $this->square->family,
                    'habits' => $this->square->habits,
                    'self_esteem' => $this->square->self_esteem,
                    'everyday_life' => $this->square->everyday_life,
                    'talents' => $this->square->talents,
                    'spirituality' => $this->square->spirituality,
                    'temperament' => $this->square->temperament,

                ],

                // 'occupations' => $lang == 'uk' ?
                //     collect($this->occupations)->map(function ($item) {
                //         return $item->title_uk;
                //     }) : collect($this->occupations)->map(function ($item) {
                //         return $item->title_ru;
                //     }),



                'movies' => $lang == 'uk' ?
                    collect($this->movies)->map(function ($item) {
                        return [
                            'title' => $item->title_uk, 'year' => $item->year, 'poster' => $item->poster, 'trailer' => $item->trailer,

                            'actors' => collect($item->actors)->map(function ($actor) {
                                return ['name' => $actor->name_uk, 'surname' => $actor->surname_uk];
                            })
                        ];
                    }) : collect($this->movies)->map(function ($item) {
                        return [
                            'title' => $item->title_ru, 'year' => $item->year, 'poster' => $item->poster, 'trailer' => $item->trailer,
                            'actors' => collect($item->actors)->map(function ($actor) {
                                return ['name' => $actor->name_ru, 'surname' => $actor->surname_ru];
                            })
                        ];
                    }),



                'connections' => $lang == 'uk' ?
                    collect($this->connections)->map(function ($item) {
                        return ['id' => $item->id, 'name' => $item->name_uk, 'surname' => $item->surname_uk];
                    }) : collect($this->connections)->map(function ($item) {
                        return ['id' => $item->id, 'name' => $item->name_ru, 'surname' => $item->surname_ru];
                    }),

            ];
        } else {
            return [
                'id' => $this->id,
                'name' => $this->$name,
                'surname' => $this->$surname,

            ];
        }
    }
}