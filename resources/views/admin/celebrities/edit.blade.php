@extends('admin.layouts.base')




@section('content')

<div class="content">

    <x-admin.content-header :title="__('admin.title.celebrities')" />



    <div class="content-box">

        <div class="content-box-top">



            <x-admin.link href="{{ route('celebrities.index') }}" class="admin-link">

                <svg class="admin-link-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                </svg>


                <span>

                    {{__('admin.button.back')}}

                </span>

            </x-admin.link>

        </div>



        <div class="content__item">
            <div class="card">

                <h3 class="card__title title-h3">

                    {{__('admin.title.celebrities-edit')}}
                    
                    <span class="card-body-info"> <span>*</span>{{ __("admin.card-body-info") }}</span>

                </h3>

                <div class="card-body">



                    <x-admin.errors />

                    <x-admin.form action="{{ route('celebrities.update', $celebrity['id']) }}" enctype="multipart/form-data" method="PATCH" class="card-form">

                        <input id="url-search" type="hidden" value="{{ route('celebrities.search') }}">

                        <div class="card-body-box">
                            <h4 class="card-body-box__title title-h4">{{ __('celebrities') }}</h4>


                            @foreach ($languages as $language)

                            <div class="card-body-language">

                                <h5 class="card-body__title title-h5 color-second">
                                    {{ $language->title }}
                                </h5>

                                <div class="card-body-row">
                                    <div class="card-body__group card-body-col">
                                        <x-admin.form-item>
                                            <x-admin.label> {{__('Name')}} </x-admin.label>
                                            <x-admin.input name="name_{{ $language->code }}" value="{{ $celebrity['name_' . $language->code ] }}" />
                                        </x-admin.form-item>
                                    </div>
                                    <div class="card-body__group card-body-col">
                                        <x-admin.form-item>
                                            <x-admin.label class="optional-fields"> {{__('Surname')}} </x-admin.label>
                                            <x-admin.input name="surname_{{ $language->code }}" value="{{ $celebrity['surname_' . $language->code ] }}" />
                                        </x-admin.form-item>
                                    </div>
                                </div>

                                <div class=" card-body__group">
                                    <x-admin.form-item>
                                        <x-admin.label> {{__('Gender')}} </x-admin.label>

                                        {{--
                                        <x-admin.input name="gender_{{ $language->code }}" value="{{ $celebrity['gender_' . $language->code ] }}" style="max-width: 100px" /> --}}

                                        <x-admin.select-one name="gender_{{ $language->code }}" style="max-width: 200px">
                                            <option value="">-- вибрати стать --</option>

                                            @if (old("gender_$language->code"))

                                            <option value="{{ __('admin.gender.' . $language->code . '.man') }}" {{ (old("gender_$language->code")==__("admin.gender.$language->code.man") ) ?'selected': '' }}>

                                                {{ __("admin.gender.$language->code.man") }}

                                            </option>

                                            <option value="{{ __('admin.gender.' . $language->code . '.woman' ) }}" {{ (old("gender_$language->code")==__("admin.gender.$language->code.woman") ) ?'selected': '' }}>

                                                {{ __("admin.gender.$language->code.woman") }}

                                            </option>

                                            @else



                                            <option value="{{ __('admin.gender.' . $language->code . '.man') }}" {{ ( $celebrity['gender_' . $language->code ]==__("admin.gender.$language->code.man") ) ?'selected': '' }}>

                                                {{ __("admin.gender.$language->code.man") }}

                                            </option>

                                            <option value="{{ __('admin.gender.' . $language->code . '.woman' ) }}" {{ ($celebrity['gender_' . $language->code ]==__("admin.gender.$language->code.woman") ) ?'selected': '' }}>

                                                {{ __("admin.gender.$language->code.woman") }}

                                            </option>




                                            @endif




                                        </x-admin.select-one>


                                    </x-admin.form-item>
                                </div>

                                <div class="card-body__group">
                                    <x-admin.form-item>
                                        <x-admin.label> {{__('Description (якщо потрібний абзац натисніть "Enter" два рази)')}}
                                        </x-admin.label>
                                        <x-admin.trix name="description_{{ $language->code }}" value="{{ $celebrity['description_' . $language->code ] }}">

                                        </x-admin.trix>



                                    </x-admin.form-item>
                                </div>
                            </div>

                            @endforeach

                            <div class="video-links-box">

                                <div class="card-body__group">
                                    <x-admin.form-item>
                                        <x-admin.label class="optional-fields"> {{__('Links (посилання на відео-розбори)')}}
                                        </x-admin.label>


                                        <div class="editor-links">

                                        @if (old('links'))    
                                            <input class="editor-links-input"  value="{{ old('links') }}" name="links" />
                                        @else
    
                                            <input class="editor-links-input"  value="{{ $celebrity['links'] }}" name="links" />
                                        @endif


                                            <div class="editor-links-row">

                                                <button class="editor-links__btn-add" type="button">Додати посилання</button>

                                                <div id="popup-editor-links" class="popup-editor-links">
                                                    <span class="popup-editor-links-text"></span>
                                                    <div class="editor-links-group-buttons">
                                                        <button class="editor-links__btn-edit" type="button">Edit</button>
                                                        <button class="editor-links__btn-del" type="button">Delete</button>
                                                    </div>
                                                </div>
                                            </div>

                                            @if (old('links'))
                                                
                                            <div class="editor-links-out"></div>
                                            @else
                                                
                                            <div class="editor-links-out"></div>
                                            @endif
                
                                        </div>


                                    </x-admin.form-item>
                                </div>

                            </div>


                            <div id="square-inputs" class="card-body-row row-start">
                                <div class="card-body__group card-body-col">
                                    <x-admin.form-item>
                                        <x-admin.label> {{__('Day')}} </x-admin.label>
                                        <x-admin.input id="square-input-day" type="number" name="day" value="{{ $celebrity['day'] }}" style="max-width: 100px" min="1" max="31" />
                                    </x-admin.form-item>
                                </div>
                                <div class="card-body__group card-body-col">
                                    <x-admin.form-item>
                                        <x-admin.label> {{__('Month')}} </x-admin.label>
                                        <x-admin.input id="square-input-month" type="number" name="month" value="{{ $celebrity['month'] }}" style="max-width: 100px" min="1" max="12" />
                                    </x-admin.form-item>
                                </div>
                                <div class="card-body__group card-body-col">
                                    <x-admin.form-item>
                                        <x-admin.label> {{__('Year')}} </x-admin.label>
                                        <x-admin.input id="square-input-year" type="number" name="year" value="{{ $celebrity['year'] }}" style="max-width: 100px" min="1" />
                                    </x-admin.form-item>
                                </div>
                            </div>
                        </div>




                        {{-- ? squares --}}
                        <div id="square-pythagoras" class="card-body-box">
                            <h4 class="card-body-box__title title-h4">{{ __('squares') }}</h4>


                            <p class="card-body-box__desc">{{ __('заповнюється автоматично') }}</p>

                            {{-- ? extra_number --}}
                            <div class="card-body-row row-start gap-20">
                                <div class="card-body__group card-body-col">
                                    <x-admin.form-item>
                                        <x-admin.label> {{__('extra_number_one')}} </x-admin.label>
                                        <x-admin.input id="pythagoras__num-1" type="number" name="extra_number_one" value="{{ $square['extra_number_one'] }}" style="max-width: 100px" />
                                    </x-admin.form-item>
                                </div>
                                <div class="card-body__group card-body-col">
                                    <x-admin.form-item>
                                        <x-admin.label> {{__('extra_number_two')}} </x-admin.label>
                                        <x-admin.input id="pythagoras__num-2" type="number" name="extra_number_two" value="{{ $square['extra_number_two'] }}" style="max-width: 100px" />
                                    </x-admin.form-item>
                                </div>
                                <div class="card-body__group card-body-col">
                                    <x-admin.form-item>
                                        <x-admin.label> {{__('extra_number_three')}} </x-admin.label>
                                        <x-admin.input id="pythagoras__num-3" type="number" name="extra_number_three" value="{{ $square['extra_number_three'] }}" style="max-width: 100px" />
                                    </x-admin.form-item>
                                </div>
                                <div class="card-body__group card-body-col">
                                    <x-admin.form-item>
                                        <x-admin.label> {{__('extra_number_four')}} </x-admin.label>
                                        <x-admin.input id="pythagoras__num-4" type="number" name="extra_number_four" value="{{ $square['extra_number_four'] }}" style="max-width: 100px" />
                                    </x-admin.form-item>
                                </div>
                            </div>

                            {{-- ? number --}}
                            <div class="card-body-row row-start gap-20">
                                <div class="card-body__group card-body-col">
                                    <x-admin.form-item>
                                        <x-admin.label> {{__('number_one')}} </x-admin.label>
                                        <x-admin.input id="pythagoras-matrix__num-1" type="number" name="number_one" value="{{ $square['number_one'] }}" style="max-width: 100px" />
                                    </x-admin.form-item>
                                </div>
                                <div class="card-body__group card-body-col">
                                    <x-admin.form-item>
                                        <x-admin.label> {{__('number_four')}} </x-admin.label>
                                        <x-admin.input id="pythagoras-matrix__num-4" type="number" name="number_four" value="{{ $square['number_four'] }}" style="max-width: 100px" />
                                    </x-admin.form-item>
                                </div>
                                <div class="card-body__group card-body-col">
                                    <x-admin.form-item>
                                        <x-admin.label> {{__('number_seven')}} </x-admin.label>
                                        <x-admin.input id="pythagoras-matrix__num-7" type="number" name="number_seven" value="{{ $square['number_seven'] }}" style="max-width: 100px" />
                                    </x-admin.form-item>
                                </div>

                            </div>
                            {{-- ? number --}}
                            <div class="card-body-row row-start gap-20">
                                <div class="card-body__group card-body-col">
                                    <x-admin.form-item>
                                        <x-admin.label> {{__('number_two')}} </x-admin.label>
                                        <x-admin.input id="pythagoras-matrix__num-2" type="number" name="number_two" value="{{ $square['number_two'] }}" style="max-width: 100px" />
                                    </x-admin.form-item>
                                </div>
                                <div class="card-body__group card-body-col">
                                    <x-admin.form-item>
                                        <x-admin.label> {{__('number_five')}} </x-admin.label>
                                        <x-admin.input id="pythagoras-matrix__num-5" type="number" name="number_five" value="{{ $square['number_five'] }}" style="max-width: 100px" />
                                    </x-admin.form-item>
                                </div>
                                <div class="card-body__group card-body-col">
                                    <x-admin.form-item>
                                        <x-admin.label> {{__('number_eight')}} </x-admin.label>
                                        <x-admin.input id="pythagoras-matrix__num-8" type="number" name="number_eight" value="{{ $square['number_eight'] }}" style="max-width: 100px" />
                                    </x-admin.form-item>
                                </div>

                            </div>
                            {{-- ? number --}}
                            <div class="card-body-row row-start gap-20">
                                <div class="card-body__group card-body-col">
                                    <x-admin.form-item>
                                        <x-admin.label> {{__('number_three')}} </x-admin.label>
                                        <x-admin.input id="pythagoras-matrix__num-3" type="number" name="number_three" value="{{ $square['number_three'] }}" style="max-width: 100px" />
                                    </x-admin.form-item>
                                </div>
                                <div class="card-body__group card-body-col">
                                    <x-admin.form-item>
                                        <x-admin.label> {{__('number_six')}} </x-admin.label>
                                        <x-admin.input id="pythagoras-matrix__num-6" type="number" name="number_six" value="{{ $square['number_six'] }}" style="max-width: 100px" />
                                    </x-admin.form-item>
                                </div>
                                <div class="card-body__group card-body-col">
                                    <x-admin.form-item>
                                        <x-admin.label> {{__('number_nine')}} </x-admin.label>
                                        <x-admin.input id="pythagoras-matrix__num-9" type="number" name="number_nine" value="{{ $square['number_nine'] }}" style="max-width: 100px" />
                                    </x-admin.form-item>
                                </div>

                            </div>

                            {{-- ? numbers absolute --}}
                            <div class="card-body-row row-start gap-20">
                                <div class="card-body__group card-body-col">
                                    <x-admin.form-item>
                                        <x-admin.label> {{__('goal')}} </x-admin.label>
                                        <x-admin.input id="pythagoras__num-5" type="number" name="goal" value="{{ $square['goal'] }}" style="max-width: 100px" />
                                    </x-admin.form-item>
                                </div>
                                <div class="card-body__group card-body-col">
                                    <x-admin.form-item>
                                        <x-admin.label> {{__('family')}} </x-admin.label>
                                        <x-admin.input id="pythagoras__num-6" type="number" name="family" value="{{ $square['family'] }}" style="max-width: 100px" />
                                    </x-admin.form-item>
                                </div>
                                <div class="card-body__group card-body-col">
                                    <x-admin.form-item>
                                        <x-admin.label> {{__('habits')}} </x-admin.label>
                                        <x-admin.input id="pythagoras__num-7" type="number" name="habits" value="{{ $square['habits'] }}" style="max-width: 100px" />
                                    </x-admin.form-item>
                                </div>
                                <div class="card-body__group card-body-col">
                                    <x-admin.form-item>
                                        <x-admin.label> {{__('self_esteem')}} </x-admin.label>
                                        <x-admin.input id="pythagoras__num-8" type="number" name="self_esteem" value="{{ $square['self_esteem'] }}" style="max-width: 100px" />
                                    </x-admin.form-item>
                                </div>
                                <div class="card-body__group card-body-col">
                                    <x-admin.form-item>
                                        <x-admin.label> {{__('everyday_life')}} </x-admin.label>
                                        <x-admin.input id="pythagoras__num-9" type="number" name="everyday_life" value="{{ $square['everyday_life'] }}" style="max-width: 100px" />
                                    </x-admin.form-item>
                                </div>
                                <div class="card-body__group card-body-col">
                                    <x-admin.form-item>
                                        <x-admin.label> {{__('talents')}} </x-admin.label>
                                        <x-admin.input id="pythagoras__num-10" type="number" name="talents" value="{{ $square['talents'] }}" style="max-width: 100px" />
                                    </x-admin.form-item>
                                </div>
                                <div class="card-body__group card-body-col">
                                    <x-admin.form-item>
                                        <x-admin.label> {{__('spirituality')}} </x-admin.label>
                                        <x-admin.input id="pythagoras__num-11" type="number" name="spirituality" value="{{ $square['spirituality'] }}" style="max-width: 100px" />
                                    </x-admin.form-item>
                                </div>
                                <div class="card-body__group card-body-col">
                                    <x-admin.form-item>
                                        <x-admin.label> {{__('temperament')}} </x-admin.label>
                                        <x-admin.input id="pythagoras__num-12" type="number" name="temperament" value="{{ $square['temperament'] }}" style="max-width: 100px" />
                                    </x-admin.form-item>
                                </div>

                            </div>

                        </div>


                        {{-- ? occupations--}}
                        <div class="card-body-box">
                            <h4 class="card-body-box__title title-h4">{{ __('occupations') }}</h4>
                            <x-admin.form-item>


                                <div class="select-checkbox-groups">
                                    <div class="select-groups__item">
                                        <x-admin.label> {{__('Діяльність (список обраних видів діяльності)')}} </x-admin.label>

                                        <div class="select-show @error('occupations') error @enderror">
                                            <ul class="select-show__list">

                                                @foreach ($celebrity->occupations as $occupation)
                                                <li class="select-show__item" data-id="{{ $occupation->id }}" data-name="{{ $occupation->title_uk}}">
                                                    <input type="hidden" name="occupations[]" value="{{ $occupation->id }}" />
                                                    <span>{{ $occupation->title_uk}}</span>
                                                    <button class="btn-remove-input" type="button">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                                        </svg>
                                                    </button>
                                                </li>
                                                @endforeach


                                            </ul>
                                        </div>




                                    </div>

                                    <div class="select-groups__item">

                                        <x-admin.label> {{__('Пошук видів діяльності (по назві)')}} </x-admin.label>


                                        <div class="select-checkbox">
                                            <div class="select-checkbox__control">

                                                <input class="input-search" type="text" placeholder="{{ __('пошук...') }}">

                                                <button class="search-btn" type="button" data-table="occupations">
                                                    {{ _('Пошук') }}
                                                </button>
                                            </div>
                                            <ul class="select-checkbox__list">

                                            </ul>


                                        </div>

                                    </div>

                                </div>





                            </x-admin.form-item>

                        </div>

                        {{-- ? movies--}}
                        <div class="card-body-box">
                            <h4 class="card-body-box__title title-h4">{{ __('movies') }}</h4>
                            <x-admin.form-item>


                                <div class="select-checkbox-groups">
                                    <div class="select-groups__item">
                                        <x-admin.label class="optional-fields"> {{__('Фільми (список обраних фільмів)')}} </x-admin.label>

                                        <div class="select-show @error('movies') error @enderror">
                                            <ul class="select-show__list">
                                                @foreach ($celebrity->movies as $movie)
                                                <li class="select-show__item" data-id="{{ $movie->id }}" data-name="{{ $movie->title_uk . ' '. $movie->year}}">
                                                    <input type="hidden" name="movies[]" value="{{ $movie->id }}" />
                                                    <span>{{ $movie->title_uk . ' '. $movie->year}}</span>
                                                    <button class="btn-remove-input" type="button">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                                        </svg>
                                                    </button>
                                                </li>
                                                @endforeach

                                            </ul>
                                        </div>




                                    </div>

                                    <div class="select-groups__item">

                                        <x-admin.label> {{__('Пошук фільмів (по назві)')}} </x-admin.label>


                                        <div class="select-checkbox">
                                            <div class="select-checkbox__control">

                                                <input class="input-search" type="text" placeholder="{{ __('пошук...') }}">

                                                <button class="search-btn" type="button" data-table="movies">
                                                    {{ _('Пошук') }}
                                                </button>
                                            </div>
                                            <ul class="select-checkbox__list">

                                            </ul>


                                        </div>

                                    </div>

                                </div>





                            </x-admin.form-item>

                        </div>

                        {{-- ? connections--}}
                        <div class="card-body-box">
                            <h4 class="card-body-box__title title-h4">{{ __('connections') }}</h4>
                            <x-admin.form-item>


                                <div class="select-checkbox-groups">
                                    <div class="select-groups__item">
                                        <x-admin.label class="optional-fields"> {{__("Пов'язані особи (список обраних осіб)")}} </x-admin.label>

                                        <div class="select-show @error('celebrities') error @enderror">
                                            <ul class="select-show__list">
                                                @foreach ($celebrity->connections as $connection)
                                                <li class="select-show__item" data-id="{{ $connection->id }}" data-name="{{ $connection->surname_uk . ' ' . $connection->name_uk  . ' '. $connection->year }}">
                                                    <input type="hidden" name="connections[]" value="{{ $connection->id }}" />
                                                    <span>
                                                        {{ $connection->surname_uk . ' ' . $connection->name_uk . ' '. $connection->year }}
                                                    </span>
                                                    <button class="btn-remove-input" type="button">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                                        </svg>
                                                    </button>
                                                </li>
                                                @endforeach

                                            </ul>
                                        </div>




                                    </div>

                                    <div class="select-groups__item">

                                        <x-admin.label> {{__("Пошук осіб (ім'я, прізвище, псевдонім)")}} </x-admin.label>


                                        <div class="select-checkbox">
                                            <div class="select-checkbox__control">

                                                <input class="input-search" type="text" placeholder="{{ __('пошук...') }}">

                                                <button class="search-btn" type="button" data-table="connections">
                                                    {{ _('Пошук') }}
                                                </button>
                                            </div>
                                            <ul class="select-checkbox__list">

                                            </ul>


                                        </div>

                                    </div>

                                </div>





                            </x-admin.form-item>

                        </div>




                        {{-- ? published --}}
                        <div class="card-body-box">
                            <h4 class="card-body-box__title title-h4">{{ __('published') }}</h4>

                            <div class="card-body__group card-body__group-checkbox">
                                <x-admin.form-item>
                                    @if ($celebrity['published'])
                                    <x-admin.checkbox name="published" id="published" checked />
                                    @else
                                    <x-admin.checkbox name="published" id="published" />
                                    @endif

                                    <x-admin.label for="published"> {{__('admin.form.published')}} </x-admin.label>
                                </x-admin.form-item>
                            </div>
                        </div>















                        <div class="buttons-box">

                            <x-admin.button type="submit" class="btn-save">

                                {{__('admin.button.save')}}

                            </x-admin.button>

                        </div>



                    </x-admin.form>


                </div>

            </div>

        </div>

    </div>
</div>







@endsection