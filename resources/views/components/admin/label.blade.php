@props( ['required' => false] )

<label {{$attributes->class([

    'card__item-title', ($required ? 'required' : ''),    

])}}>
    
    {{$slot}}

</label>
