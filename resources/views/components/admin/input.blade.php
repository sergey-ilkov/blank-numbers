@props(['value' => ''])





@error($attributes->get('name'))  

<input {{$attributes->class([

    'input-form', 'input-error' ,

    ])->merge([

        'type' => 'text',
        'value' => (old($attributes->get('name')) ? : $value),   
        'autocomplete'=>"off",    

    ]) }}>
                               

@else

<input {{$attributes->class([

    'input-form', 

    ])->merge([

        'type' => 'text',
        'value' => (old($attributes->get('name')) ? : $value),     
        'autocomplete'=>"off",  

    ]) }}>

@enderror
    