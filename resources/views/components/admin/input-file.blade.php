@error($attributes->get('name'))

<div class='file-input input-error'>
    <input {{$attributes->class([

    'input-file',

    ])->merge([

    'type' => 'file',

    ]) }}>

    <span class='file-input__btn'>Вибрати</span>
    <span class='file-input__label' data-js-label>файл не вибран</span>

</div>

@else

<div class='file-input'>
    <input {{$attributes->class([

    'input-file',

    ])->merge([

    'type' => 'file',

    ]) }}>

    <span class='file-input__btn'>Вибрати</span>
    <span class='file-input__label' data-js-label>файл не вибран</span>

</div>

@enderror