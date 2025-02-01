@extends('layouts.base')


@section('content')



<x-breadcrumb>
    {{ __('menu.celebrities') }}
</x-breadcrumb>




<section id="celebrities" class="celebrities">
    <div class="container">
        <h2 class="celebrities__title title-h2">{{ __('translations.celebrities.title') }}</h2>


        @foreach (__('translations.celebrities.text') as $text )
        <p class="celebrities__text text">
            {{ $text }}
        </p>
        @endforeach


        <div class="celebrities__items">

            <div id="preloader-filters" class="preloader-filters">
                <div class="preloader-body">
                    <p class="preloader-body-text">
                        {{ __('translations.celebrities.preloader-filters') }}
                    </p>
                    <div class="preloader-square"></div>
                </div>
            </div>

            <div class="celebrities__item celebrities__item-filter">

                <div class="celebrities-box">

                    <span class="celebrities-box__title">{{ __('translations.celebrities.titleBox.search') }}</span>
                    <div class="celebrities-search">

                        <input id="input-search" class="celebrities-search-input" type="text"
                            placeholder="{{ __('translations.celebrities.filter.search-placeholder') }}" autocomplete="off" name="surname">
                        <button id="btn-search" class="btn btn-4 btn-search">{{ __('translations.celebrities.buttons.search') }}</button>
                    </div>
                </div>


                <div class="celebrities-box">
                    <span class="celebrities-box__title">{{ __('translations.celebrities.titleBox.filter') }}</span>

                    <div id="celebrities-filters" class="celebrities-filters">
                        <div class="filter-row">
                            <div class="filter-col filter gender">
                                <button class="filter__btn">
                                    <span class="filter__btn-text">
                                        {{ __('translations.celebrities.filter.gender') }}
                                    </span>

                                    <div class="filter-text"></div>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>

                                </button>
                                <ul class="filter-select">
                                    @foreach (__('translations.celebrities.filter.genderArray') as $gender)

                                    <li class="filter-select__item">

                                        <label class="filter-label">
                                            <input type="checkbox" class="filter-checkbox" name="gender_{{app()->currentLocale()}}"
                                                value="{{ $gender }}">
                                            <span>{{ $gender }}</span>
                                        </label>

                                    </li>
                                    @endforeach
                                </ul>
                            </div>



                            <div class="filter-col filter occupations">
                                <button class="filter__btn">
                                    <span class="filter__btn-text">
                                        {{ __('translations.celebrities.filter.occupation') }}
                                    </span>

                                    <div class="filter-text"></div>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>

                                </button>

                                <ul class="filter-select">

                                </ul>

                            </div>



                        </div>

                        <div class="filter-row">
                            <span class="filter-row__title">{{ __('translations.celebrities.filter.birthday') }}</span>

                            <div class="filter-col filter day">
                                <button class="filter__btn">
                                    <span class="filter__btn-text">
                                        {{ __('translations.celebrities.filter.day') }}
                                    </span>

                                    <div class="filter-text"></div>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>

                                </button>

                                <ul id="filter-select-day" class="filter-select">

                                </ul>
                            </div>
                            <div class="filter-col filter month">
                                <button class="filter__btn">
                                    <span class="filter__btn-text">
                                        {{ __('translations.celebrities.filter.month') }}
                                    </span>

                                    <div class="filter-text"></div>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>

                                </button>

                                <ul id="filter-select-month" class="filter-select">

                                </ul>
                            </div>
                            <div class="filter-col filter year">
                                <button class="filter__btn">
                                    <span class="filter__btn-text">
                                        {{ __('translations.celebrities.filter.year') }}
                                    </span>

                                    <div class="filter-text"></div>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>

                                </button>

                                <ul id="filter-select-year" class="filter-select">

                                </ul>
                            </div>

                        </div>


                        {{-- ? filters squares --}}

                        <div class="filter-row">

                            <div class="filter-col filter extra_number_one">
                                <button class="filter__btn">
                                    <span class="filter__btn-text">
                                        {{ __('ДЧ 1') }}
                                    </span>

                                    <div class="filter-text"></div>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>

                                </button>
                                <ul class="filter-select">

                                </ul>
                            </div>
                            <div class="filter-col filter extra_number_two">
                                <button class="filter__btn">
                                    <span class="filter__btn-text">
                                        {{ __('ЧЖШ') }}
                                    </span>

                                    <div class="filter-text"></div>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>

                                </button>
                                <ul class="filter-select">

                                </ul>
                            </div>
                            <div class="filter-col filter extra_number_three">
                                <button class="filter__btn">
                                    <span class="filter__btn-text">
                                        {{ __('ДЧ 3') }}
                                    </span>

                                    <div class="filter-text"></div>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>

                                </button>
                                <ul class="filter-select">

                                </ul>
                            </div>
                            <div class="filter-col filter extra_number_four">
                                <button class="filter__btn">
                                    <span class="filter__btn-text">
                                        {{ __('ЧВТ') }}
                                    </span>

                                    <div class="filter-text"></div>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>

                                </button>
                                <ul class="filter-select">

                                </ul>
                            </div>

                        </div>


                        <div class="filter-row">
                            <div class="filter-col filter number_one">
                                <button class="filter__btn">
                                    <span class="filter__btn-text">
                                        {{ __('1') }}
                                    </span>

                                    <div class="filter-text"></div>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>

                                </button>
                                <ul class="filter-select">

                                </ul>
                            </div>
                            <div class="filter-col filter number_four">
                                <button class="filter__btn">
                                    <span class="filter__btn-text">
                                        {{ __('4') }}
                                    </span>

                                    <div class="filter-text"></div>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>

                                </button>
                                <ul class="filter-select">

                                </ul>
                            </div>
                            <div class="filter-col filter number_seven">
                                <button class="filter__btn">
                                    <span class="filter__btn-text">
                                        {{ __('7') }}
                                    </span>

                                    <div class="filter-text"></div>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>

                                </button>
                                <ul class="filter-select">

                                </ul>
                            </div>
                            <div class="filter-col filter goal">
                                <button class="filter__btn">
                                    <span class="filter__btn-text">
                                        {{ __('translations.celebrities.filter.goal') }}
                                    </span>

                                    <div class="filter-text"></div>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>

                                </button>
                                <ul class="filter-select">

                                </ul>
                            </div>

                        </div>



                        <div class="filter-row">
                            <div class="filter-col filter number_two">
                                <button class="filter__btn">
                                    <span class="filter__btn-text">
                                        {{ __('2') }}
                                    </span>

                                    <div class="filter-text"></div>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>

                                </button>
                                <ul class="filter-select">

                                </ul>
                            </div>
                            <div class="filter-col filter number_five">
                                <button class="filter__btn">
                                    <span class="filter__btn-text">
                                        {{ __('5') }}
                                    </span>

                                    <div class="filter-text"></div>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>

                                </button>
                                <ul class="filter-select">

                                </ul>
                            </div>
                            <div class="filter-col filter number_eight">
                                <button class="filter__btn">
                                    <span class="filter__btn-text">
                                        {{ __('8') }}
                                    </span>

                                    <div class="filter-text"></div>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>

                                </button>
                                <ul class="filter-select">

                                </ul>
                            </div>
                            <div class="filter-col filter family">
                                <button class="filter__btn">
                                    <span class="filter__btn-text">
                                        {{ __('translations.celebrities.filter.family') }}
                                    </span>

                                    <div class="filter-text"></div>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>

                                </button>
                                <ul class="filter-select">

                                </ul>
                            </div>

                        </div>

                        <div class="filter-row">
                            <div class="filter-col filter number_three">
                                <button class="filter__btn">
                                    <span class="filter__btn-text">
                                        {{ __('3') }}
                                    </span>

                                    <div class="filter-text"></div>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>

                                </button>
                                <ul class="filter-select">

                                </ul>
                            </div>
                            <div class="filter-col filter number_six">
                                <button class="filter__btn">
                                    <span class="filter__btn-text">
                                        {{ __('6') }}
                                    </span>

                                    <div class="filter-text"></div>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>

                                </button>
                                <ul class="filter-select">

                                </ul>
                            </div>
                            <div class="filter-col filter number_nine">
                                <button class="filter__btn">
                                    <span class="filter__btn-text">
                                        {{ __('9') }}
                                    </span>

                                    <div class="filter-text"></div>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>

                                </button>
                                <ul class="filter-select">

                                </ul>
                            </div>

                            <div class="filter-col filter habits">
                                <button class="filter__btn">
                                    <span class="filter__btn-text">
                                        {{ __('translations.celebrities.filter.habits') }}
                                    </span>

                                    <div class="filter-text"></div>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>

                                </button>
                                <ul class="filter-select">

                                </ul>
                            </div>
                        </div>

                        <div class="filter-row filter-row-start">
                            <div class="filter-col filter self_esteem">
                                <button class="filter__btn">
                                    <span class="filter__btn-text">
                                        {{ __('translations.celebrities.filter.self_esteem') }}
                                    </span>

                                    <div class="filter-text"></div>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>

                                </button>
                                <ul class="filter-select">

                                </ul>
                            </div>
                            <div class="filter-col filter everyday_life">
                                <button class="filter__btn">
                                    <span class="filter__btn-text">
                                        {{ __('translations.celebrities.filter.everyday_life') }}
                                    </span>

                                    <div class="filter-text"></div>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>

                                </button>
                                <ul class="filter-select">

                                </ul>
                            </div>
                            <div class="filter-col filter talents">
                                <button class="filter__btn">
                                    <span class="filter__btn-text">
                                        {{ __('translations.celebrities.filter.talents') }}
                                    </span>

                                    <div class="filter-text"></div>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>

                                </button>
                                <ul class="filter-select">

                                </ul>
                            </div>

                        </div>

                        <div class="filter-row filter-row-start">
                            <div class="filter-col filter-col-w190 filter spirituality">
                                <button class="filter__btn">
                                    <span class="filter__btn-text">
                                        {{ __('translations.celebrities.filter.spirituality') }}
                                    </span>

                                    <div class="filter-text"></div>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>

                                </button>
                                <ul class="filter-select">

                                </ul>
                            </div>
                            <div class="filter-col filter-col-w190 filter temperament">
                                <button class="filter__btn">
                                    <span class="filter__btn-text">
                                        {{ __('translations.celebrities.filter.temperament') }}
                                    </span>

                                    <div class="filter-text"></div>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>

                                </button>
                                <ul class="filter-select">

                                </ul>
                            </div>

                        </div>

                    </div>




                </div>




                {{-- ? buttons --}}
                <div class="celebrities-box">
                    <div class="celebrities-buttons">

                        <button id="filter-btn-cancel" class="filter-btn-cancel btn">
                            {{ __('translations.celebrities.buttons.filterCancel')}}
                        </button>

                        <button id="filter-btn-send" class="filter-btn-send btn">
                            {{ __('translations.celebrities.buttons.filter') }}
                        </button>

                    </div>
                </div>


                <div class="celebrities-box">

                    <div class="celebrities-request">
                        <p class="celebrities-request__text">
                            {{ __('translations.celebrities.textRequest') }}
                        </p>

                        <div class="celebrities-request-group">
                            <input id="input-request" class="celebrities-request-input" type="text"
                                placeholder="{{ __('translations.celebrities.request-input') }}" autocomplete="off" name="celebrity">
                            <button id="btn-request-send" class="btn-request-send">
                                {{ __('translations.celebrities.buttons.send')}}
                            </button>
                        </div>
                    </div>

                </div>






            </div>

            <div class="celebrities__item celebrities__item-result">
                <div class="celebrities-alphabet">
                    @foreach (__('translations.celebrities.alphabet') as $letter )

                    <span class="celebrities-alphabet__letter search-letter" data-search="{{ $letter }}">{{ $letter }}</span>

                    @endforeach
                </div>


                <div id="celebrities-result" class="celebrities-result">
                    <div id="preloader-result" class="preloader-result">
                        <div class="preloader-body">
                            <p class="preloader-body-text">
                                {{ __('translations.celebrities.filter.search') }}
                            </p>
                            <div class="preloader-square"></div>
                        </div>
                    </div>
                    <p class="celebrities-result-error">
                        {!! __('translations.celebrities.result.error') !!}
                    </p>
                    <p class="celebrities-result-empty">
                        {!! __('translations.celebrities.result.empty') !!}
                    </p>


                    <div id="celebrities-result-show" class="celebrities-result-show">

                        <p class="celebrities-result-show-count">
                            <span>{{ __('translations.celebrities.result.count') }}</span>
                            <span id="result-count__number" class="celebrities-result-count__number"></span>
                        </p>

                        <ul id="celebrities-result__list" class="celebrities-result__list">

                        </ul>



                        <div id="result-buttons" class="result-buttons">
                            <button id="btn-result-prev" class="btn-result-prev">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                                </svg>


                            </button>
                            <button id="btn-result-next" class="btn-result-next">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                </svg>

                            </button>
                        </div>

                    </div>



                </div>

                <div id="celebrities-image" class="celebrities-image">

                    <img src="{{ asset('images/celebrities.png') }}" alt="">

                </div>


            </div>
        </div>

    </div>
</section>



<div id="celebrities-modal-details" class="celebrities-modal-details">




    <div class="modal-details-body">

        <button id="btn-modal-details-close" class="btn-modal-details-close modal-close">
            <span></span>
            <span></span>
        </button>

        <div class="modal-details-preloader">
            <div class="preloader-body">
                <p class="preloader-body-text">
                    {{ __('translations.celebrities.preloader-filters') }}
                </p>
                <div class="preloader-square"></div>
            </div>
        </div>

        <div class="modal-details-error">
            <span>
                {!! __('translations.celebrities.result.error') !!}
            </span>
        </div>

        <div id="details-body" class="details-body__items">
            <div class="details-body__item details-body__item-square">

                <div class="details-square">
                    <div id="square-birthday" class="details-square-birthday"></div>
                    <div class="pythagoras-nums">
                        <div class="pythagoras-nums__item">
                            <span id="pythagoras__num-1" class="pythagoras__num"></span>
                            <span class="pythagoras-nums__item-decor"></span>
                            <span id="pythagoras__num-2" class="pythagoras__num"></span>
                        </div>
                        <div class="pythagoras-nums__item">
                            <span id="pythagoras__num-3" class="pythagoras__num"></span>
                            <span class="pythagoras-nums__item-decor"></span>
                            <span id="pythagoras__num-4" class="pythagoras__num"></span>
                        </div>
                    </div>


                    <div class="pythagoras-matrix">
                        <div class="pythagoras-matrix__row">
                            <span id="pythagoras-matrix__num-1" class="pythagoras-matrix__num" data-num="1"></span>
                            <span id="pythagoras-matrix__num-4" class="pythagoras-matrix__num" data-num="4"></span>
                            <span id="pythagoras-matrix__num-7" class="pythagoras-matrix__num" data-num="7"></span>
                        </div>
                        <div class="pythagoras-matrix__row">
                            <span id="pythagoras-matrix__num-2" class="pythagoras-matrix__num" data-num="2"></span>
                            <span id="pythagoras-matrix__num-5" class="pythagoras-matrix__num" data-num="5"></span>
                            <span id="pythagoras-matrix__num-8" class="pythagoras-matrix__num" data-num="8"></span>
                        </div>
                        <div class="pythagoras-matrix__row">
                            <span id="pythagoras-matrix__num-3" class="pythagoras-matrix__num" data-num="3"></span>
                            <span id="pythagoras-matrix__num-6" class="pythagoras-matrix__num" data-num="6"></span>
                            <span id="pythagoras-matrix__num-9" class="pythagoras-matrix__num" data-num="9"></span>
                        </div>

                        <span id="pythagoras__num-5" class="puthagoras-matrix__additional-num"></span>
                        <span id="pythagoras__num-6" class="puthagoras-matrix__additional-num"></span>
                        <span id="pythagoras__num-7" class="puthagoras-matrix__additional-num"></span>
                        <span id="pythagoras__num-8" class="puthagoras-matrix__additional-num"></span>
                        <span id="pythagoras__num-9" class="puthagoras-matrix__additional-num"></span>
                        <span id="pythagoras__num-10" class="puthagoras-matrix__additional-num"></span>
                        <span id="pythagoras__num-11" class="puthagoras-matrix__additional-num"></span>
                        <span id="pythagoras__num-12" class="puthagoras-matrix__additional-num"></span>



                        <svg class="svg-pythagoras-matrix-top" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.295 8.96244L15.3518 7.96405L15.35 7.96395L15.295 8.96244ZM9.42535 7.66369L9.05913 8.59422L9.05918 8.59424L9.42535 7.66369ZM7.66363 9.42542L8.59434 9.05967L8.59429 9.05954L7.66363 9.42542ZM8.96313 15.2943L7.96469 15.3502L7.96471 15.3506L8.96313 15.2943ZM18.2282 7.72392C18.2437 7.70844 18.2035 7.7531 18.0284 7.81048C17.8632 7.8646 17.6367 7.91101 17.3494 7.94335C16.7745 8.00806 16.0672 8.00475 15.3518 7.96405L15.2382 9.96082C16.0025 10.0043 16.837 10.0137 17.5731 9.9308C17.9414 9.88935 18.3127 9.82192 18.6511 9.71106C18.9795 9.60345 19.3486 9.43198 19.6424 9.13813L18.2282 7.72392ZM15.35 7.96395C13.5508 7.8648 11.6689 7.47188 9.79152 6.73314L9.05918 8.59424C11.1356 9.41133 13.2277 9.85003 15.24 9.96092L15.35 7.96395ZM9.79158 6.73316C8.32348 6.15537 6.80999 5.39584 5.95928 4.54512L4.54506 5.95934C5.70935 7.12363 7.56276 8.00529 9.05913 8.59422L9.79158 6.73316ZM4.54506 5.95934C5.39582 6.8101 6.15643 8.32481 6.73296 9.79129L8.59429 9.05954C8.00621 7.56367 7.12352 5.70937 5.95928 4.54512L4.54506 5.95934ZM6.73291 9.79116C7.47107 11.6696 7.86409 13.5519 7.96469 15.3502L9.96157 15.2385C9.84911 13.2282 9.41051 11.1366 8.59434 9.05967L6.73291 9.79116ZM7.96471 15.3506C8.00504 16.0662 8.00785 16.7742 7.94286 17.3496C7.91038 17.6371 7.86389 17.8639 7.80975 18.0292C7.75229 18.2046 7.70775 18.2444 7.72385 18.2283L9.13807 19.6425C9.43179 19.3487 9.60301 18.9796 9.71042 18.6516C9.82115 18.3135 9.88863 17.9423 9.93023 17.574C10.0134 16.8379 10.0046 16.003 9.96154 15.238L7.96471 15.3506ZM4.54506 5.95934L30.0407 31.455L31.4549 30.0408L5.95928 4.54512L4.54506 5.95934Z"
                                fill="#77917F" />
                        </svg>


                        <svg class="svg-pythagoras-matrix-bottom" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.96268 20.705L7.96429 20.6482L7.9642 20.65L8.96268 20.705ZM7.66393 26.5746L8.59446 26.9409L8.59448 26.9408L7.66393 26.5746ZM9.42566 28.3364L9.05992 27.4057L9.05978 27.4057L9.42566 28.3364ZM15.2945 27.0369L15.3504 28.0353L15.3508 28.0353L15.2945 27.0369ZM7.72416 17.7718C7.70868 17.7563 7.75334 17.7965 7.81072 17.9716C7.86484 18.1368 7.91126 18.3633 7.94359 18.6506C8.00831 19.2255 8.005 19.9328 7.9643 20.6482L9.96107 20.7618C10.0046 19.9975 10.0139 19.163 9.93104 18.4269C9.88959 18.0586 9.82217 17.6873 9.7113 17.3489C9.60369 17.0205 9.43222 16.6514 9.13838 16.3576L7.72416 17.7718ZM7.9642 20.65C7.86504 22.4492 7.47212 24.3311 6.73339 26.2085L8.59448 26.9408C9.41157 24.8644 9.85027 22.7723 9.96117 20.76L7.9642 20.65ZM6.73341 26.2084C6.15561 27.6765 5.39608 29.19 4.54537 30.0407L5.95958 31.4549C7.12387 30.2906 8.00554 28.4372 8.59446 26.9409L6.73341 26.2084ZM5.95958 31.4549C6.81034 30.6042 8.32505 29.8436 9.79154 29.267L9.05978 27.4057C7.56391 27.9938 5.70961 28.8765 4.54537 30.0407L5.95958 31.4549ZM9.7914 29.2671C11.6698 28.5289 13.5521 28.1359 15.3504 28.0353L15.2387 26.0384C13.2284 26.1509 11.1368 26.5895 9.05992 27.4057L9.7914 29.2671ZM15.3508 28.0353C16.0664 27.995 16.7744 27.9922 17.3498 28.0571C17.6374 28.0896 17.8641 28.1361 18.0294 28.1903C18.2049 28.2477 18.2446 28.2923 18.2285 28.2761L19.6427 26.8619C19.349 26.5682 18.9798 26.397 18.6519 26.2896C18.3138 26.1789 17.9425 26.1114 17.5743 26.0698C16.8381 25.9866 16.0032 25.9954 15.2383 26.0385L15.3508 28.0353ZM5.95958 31.4549L31.4552 5.95927L30.041 4.54506L4.54537 30.0407L5.95958 31.4549Z"
                                fill="#77917F" />
                        </svg>


                    </div>

                </div>

            </div>
            <div class="details-body__item details-body__item-content">
                <div class="details-content">

                    <div id="details-celebrity" class="details-celebrity">

                        <h4 class="details-content__title title-h4"></h4>
                        <div class="details-content-text">

                        </div>
                    </div>


                    <div id="details-movies" class="details-movies">



                    </div>

                    <div id="details-connections" class="details-connections">
                        <span class="details-connections__title">{{ __('translations.celebrities.connections-title') }}</span>
                        <ul id="connections__list" class="connections__list">

                        </ul>
                    </div>


                </div>
            </div>
        </div>

    </div>

</div>



<div id="celebrities-modal-email" class="celebrities-modal-email">

    <div class="modal-email-body">

        <button id="btn-modal-email-close" class="btn-modal-email-close modal-close">
            <span></span>
            <span></span>
        </button>

        <div class="modal-email-body-preloader">
            <svg class="svg-email" viewBox="0 0 150 150" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M136.045 118.149H44.8314C37.684 118.149 31.8687 112.334 31.8687 105.187V88.4583C31.8687 87.095 32.9734 85.9886 34.3384 85.9886C35.7033 85.9886 36.8081 87.095 36.8081 88.4583V105.187C36.8081 109.611 40.4073 113.21 44.8314 113.21H136.045C140.469 113.21 144.068 109.609 144.068 105.187V44.6454C144.068 40.2213 140.467 36.622 136.045 36.622H44.8314C40.4073 36.622 36.8081 40.2213 36.8081 44.6454V61.1728C36.8081 62.5377 35.7033 63.6425 34.3384 63.6425C32.9734 63.6425 31.8687 62.5377 31.8687 61.1728V44.6454C31.8687 37.498 37.684 31.6826 44.8314 31.6826H136.045C143.192 31.6826 149.008 37.498 149.008 44.6454V105.187C149.008 112.334 143.192 118.149 136.045 118.149Z"
                    fill="#77917F" />
                <path
                    d="M105.758 74.916L133.297 49.6523C134.301 48.7303 134.369 47.1678 133.449 46.1618C132.527 45.1574 130.966 45.0916 129.96 46.0119L90.4374 82.2692L50.9185 46.0119C49.9125 45.0916 48.3517 45.1574 47.428 46.1618C46.5059 47.1661 46.5735 48.7303 47.5778 49.6523L75.1169 74.916L47.5778 100.181C46.5735 101.105 46.5059 102.666 47.428 103.67C47.9153 104.202 48.5805 104.47 49.249 104.47C49.845 104.47 50.4443 104.255 50.9185 103.82L78.7705 78.2666L88.7679 87.4391C89.2388 87.8722 89.8381 88.0895 90.4374 88.0895C91.0368 88.0895 91.6361 87.8722 92.107 87.4391L102.106 78.2666L129.96 103.82C130.434 104.255 131.032 104.47 131.629 104.47C132.296 104.47 132.963 104.202 133.449 103.67C134.371 102.666 134.303 101.103 133.297 100.181L105.758 74.916Z"
                    fill="#77917F" />
                <path
                    d="M42.6828 77.3857H13.2371C11.8721 77.3857 10.7673 76.2809 10.7673 74.916C10.7673 73.551 11.8721 72.4462 13.2371 72.4462H42.6844C44.0494 72.4462 45.1542 73.551 45.1542 74.916C45.1542 76.2809 44.0477 77.3857 42.6828 77.3857Z"
                    fill="#77917F" />
                <path
                    d="M21.4003 60.124H3.29395C1.92901 60.124 0.824219 59.0192 0.824219 57.6542C0.824219 56.2893 1.92901 55.1845 3.29395 55.1845H21.4003C22.7653 55.1845 23.8701 56.2893 23.8701 57.6542C23.8701 59.0192 22.7653 60.124 21.4003 60.124Z"
                    fill="#77917F" />
                <path
                    d="M21.4003 94.6474H8.05884C6.6939 94.6474 5.58911 93.541 5.58911 92.1777C5.58911 90.8144 6.6939 89.708 8.05884 89.708H21.4019C22.7669 89.708 23.8717 90.8144 23.8717 92.1777C23.8717 93.541 22.7652 94.6474 21.4003 94.6474Z"
                    fill="#77917F" />
            </svg>

        </div>

        <div class="modal-email-body__success">
            <span class="modal-email-body__title">{{ __('translations.celebrities.email.title') }}</span>
            <span class="modal-email-body__text">{{ __('translations.celebrities.email.text') }}</span>
        </div>

        <div class="modal-email-body__error">
            <span class="modal-email-body__text-error">{{ __('translations.celebrities.email.text-error') }}</span>
        </div>

    </div>

</div>







@endsection