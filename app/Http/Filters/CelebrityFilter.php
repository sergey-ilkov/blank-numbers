<?php


namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class CelebrityFilter extends AbstractFilter
{
    public const GENDER_UK = 'gender_uk';
    public const GENDER_RU = 'gender_ru';
    public const DAY = 'day';
    public const MONTH = 'month';
    public const YEAR = 'year';

    public const OCCUPATION_ID = 'occupations';



    public const EXTRA_NUMBER_ONE = 'extra_number_one';
    public const EXTRA_NUMBER_TWO = 'extra_number_two';
    public const EXTRA_NUMBER_THREE = 'extra_number_three';
    public const EXTRA_NUMBER_FOUR = 'extra_number_four';


    public const NUMBER_ONE = 'number_one';
    public const NUMBER_TWO = 'number_two';
    public const NUMBER_THREE = 'number_three';
    public const NUMBER_FOUR = 'number_four';
    public const NUMBER_FIVE = 'number_five';
    public const NUMBER_SIX = 'number_six';
    public const NUMBER_SEVEN = 'number_seven';
    public const NUMBER_EIGHT = 'number_eight';
    public const NUMBER_NINE = 'number_nine';

    public const GOAL = 'goal';
    public const FAMILY = 'family';
    public const HABITS = 'habits';
    public const SELF_ESTEEM = 'self_esteem';
    public const EVERYDAY_LIFE = 'everyday_life';
    public const TALENTS = 'talents';
    public const SPIRITUALITY = 'spirituality';
    public const TEMPERAMENT = 'temperament';




    protected function getCallbacks(): array
    {
        return [
            self::GENDER_UK => [$this, 'genderUk'],
            self::GENDER_RU => [$this, 'genderRu'],
            self::DAY => [$this, 'day'],
            self::MONTH => [$this, 'month'],
            self::YEAR => [$this, 'year'],

            self::OCCUPATION_ID => [$this, 'occupationId'],


            self::EXTRA_NUMBER_ONE => [$this, 'extraNumberOne'],
            self::EXTRA_NUMBER_TWO => [$this, 'extraNumberTwo'],
            self::EXTRA_NUMBER_THREE => [$this, 'extraNumberThree'],
            self::EXTRA_NUMBER_FOUR => [$this, 'extraNumberFour'],

            self::NUMBER_ONE => [$this, 'numberOne'],
            self::NUMBER_TWO => [$this, 'numberTwo'],
            self::NUMBER_THREE => [$this, 'numberThree'],
            self::NUMBER_FOUR => [$this, 'numberFour'],
            self::NUMBER_FIVE => [$this, 'numberFive'],
            self::NUMBER_SIX => [$this, 'numberSix'],
            self::NUMBER_SEVEN => [$this, 'numberSeven'],
            self::NUMBER_EIGHT => [$this, 'numberEight'],
            self::NUMBER_NINE => [$this, 'numberNine'],

            self::GOAL => [$this, 'goal'],
            self::FAMILY => [$this, 'family'],
            self::HABITS => [$this, 'habits'],
            self::SELF_ESTEEM => [$this, 'selfEsteem'],
            self::EVERYDAY_LIFE => [$this, 'everydayLife'],
            self::TALENTS => [$this, 'talents'],
            self::SPIRITUALITY => [$this, 'spirituality'],
            self::TEMPERAMENT => [$this, 'temperament'],




        ];
    }


    public function genderUk(Builder $builder, $values)
    {
        $builder->whereIn('gender_uk', $values);
    }

    public function genderRu(Builder $builder, $values)
    {
        $builder->whereIn('gender_ru', $values);
    }

    public function day(Builder $builder, $values)
    {
        $builder->whereIn('day', $values);
    }

    public function month(Builder $builder, $values)
    {
        $builder->whereIn('month', $values);
    }

    public function year(Builder $builder, $values)
    {
        $builder->whereIn('year', $values);
    }



    public function occupationId(Builder $builder, $values)
    {
        $builder->whereHas('occupations', function ($query) use ($values) {
            $query->whereIn('occupation_id', $values);
        });
    }


    public function extraNumberOne(Builder $builder, $values)
    {
        $builder->whereHas('square', function ($query) use ($values) {
            $query->whereIn('extra_number_one', $values);
        });
    }
    public function extraNumberTwo(Builder $builder, $values)
    {

        $builder->whereHas('square', function ($query) use ($values) {
            $query->whereIn('extra_number_two', $values);
        });
    }
    public function extraNumberThree(Builder $builder, $values)
    {
        $builder->whereHas('square', function ($query) use ($values) {
            $query->whereIn('extra_number_three', $values);
        });
    }
    public function extraNumberFour(Builder $builder, $values)
    {
        $builder->whereHas('square', function ($query) use ($values) {
            $query->whereIn('extra_number_four', $values);
        });
    }


    public function numberOne(Builder $builder, $values)
    {
        $builder->whereHas('square', function ($query) use ($values) {
            $query->whereIn('number_one', $values);
        });
    }
    public function numberTwo(Builder $builder, $values)
    {
        $builder->whereHas('square', function ($query) use ($values) {
            $query->whereIn('number_two', $values);
        });
    }
    public function numberThree(Builder $builder, $values)
    {
        $builder->whereHas('square', function ($query) use ($values) {
            $query->whereIn('number_three', $values);
        });
    }
    public function numberFour(Builder $builder, $values)
    {
        $builder->whereHas('square', function ($query) use ($values) {
            $query->whereIn('number_four', $values);
        });
    }
    public function numberFive(Builder $builder, $values)
    {
        $builder->whereHas('square', function ($query) use ($values) {
            $query->whereIn('number_five', $values);
        });
    }
    public function numberSix(Builder $builder, $values)
    {
        $builder->whereHas('square', function ($query) use ($values) {
            $query->whereIn('number_six', $values);
        });
    }
    public function numberSeven(Builder $builder, $values)
    {
        $builder->whereHas('square', function ($query) use ($values) {
            $query->whereIn('number_seven', $values);
        });
    }
    public function numberEight(Builder $builder, $values)
    {
        $builder->whereHas('square', function ($query) use ($values) {
            $query->whereIn('number_eight', $values);
        });
    }
    public function numberNine(Builder $builder, $values)
    {
        $builder->whereHas('square', function ($query) use ($values) {
            $query->whereIn('number_nine', $values);
        });
    }




    public function goal(Builder $builder, $values)
    {
        $builder->whereHas('square', function ($query) use ($values) {
            $query->whereIn('goal', $values);
        });
    }
    public function family(Builder $builder, $values)
    {
        $builder->whereHas('square', function ($query) use ($values) {
            $query->whereIn('family', $values);
        });
    }
    public function habits(Builder $builder, $values)
    {
        $builder->whereHas('square', function ($query) use ($values) {
            $query->whereIn('habits', $values);
        });
    }
    public function selfEsteem(Builder $builder, $values)
    {
        $builder->whereHas('square', function ($query) use ($values) {
            $query->whereIn('self_esteem', $values);
        });
    }
    public function everydayLife(Builder $builder, $values)
    {
        $builder->whereHas('square', function ($query) use ($values) {
            $query->whereIn('everyday_life', $values);
        });
    }
    public function talents(Builder $builder, $values)
    {
        $builder->whereHas('square', function ($query) use ($values) {
            $query->whereIn('talents', $values);
        });
    }
    public function spirituality(Builder $builder, $values)
    {
        $builder->whereHas('square', function ($query) use ($values) {
            $query->whereIn('spirituality', $values);
        });
    }
    public function temperament(Builder $builder, $values)
    {
        $builder->whereHas('square', function ($query) use ($values) {
            $query->whereIn('temperament', $values);
        });
    }
}
