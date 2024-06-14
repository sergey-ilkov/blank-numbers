<ul id="languages-menu" class="languages-menu">

    @foreach (config('app.available_locales') as $locale )

        <li class="languages-menu__item">    

            @if(app()->currentLocale() == $locale)

                <span class="languages-menu__link active">{{$locale}}</span>

            @else
            
                {{-- ? helpers function getUrlLanguage --}}
                <a href="{{ getUrlLanguage( $locale )  }}" class="languages-menu__link">{{$locale}}</a>

            @endif           


        </li>
   
    @endforeach

    
</ul>




