@props(['value' => ''])





@error($attributes->get('name'))

<select multiple {{$attributes->class([

    'input-form', 'input-error' ,

    ])->merge([



    ]) }}>



    {{$slot}}


</select>

@else

<select multiple {{$attributes->class([

    'input-form',

    ])->merge([


    ]) }}>

    {{$slot}}

</select>


@enderror