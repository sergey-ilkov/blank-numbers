@extends('admin.layouts.base')




@section('content')

<div class="content">

    <x-admin.content-header :title="__('admin.title.movies')" />



    <div class="content-box">

        <div class="content-box-top">



            <x-admin.link href="{{ route('movies.index') }}" class="admin-link">

                <svg class="admin-link-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
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

                    {{__('admin.title.movies-add')}}

                </h3>

                <div class="card-body">





                    <x-admin.errors />

                    <x-admin.form action="{{ route('movies.store') }}" enctype="multipart/form-data" method="POST" class="card-form">

                        <input id="url-search" type="hidden" value="{{ route('movies.search') }}">

                        @foreach ($languages as $language)

                        <div class="card-body__group">
                            <h5 class="card-body__title title-h5 color-second">
                                {{ $language->title }}
                            </h5>

                            <x-admin.form-item>

                                <x-admin.label> {{__('Title')}} </x-admin.label>

                                <x-admin.input name="title_{{ $language->code }}" style="max-width: 500px" />

                            </x-admin.form-item>

                        </div>

                        @endforeach

                        <div class="card-body__group">

                            <x-admin.form-item>

                                <x-admin.label> {{__('Year')}} </x-admin.label>

                                <x-admin.input name="year" type="number" style="max-width: 100px" />

                            </x-admin.form-item>

                        </div>

                        <div class="card-body__group">
                            <div class="image-add-group">

                                <x-admin.form-item>

                                    <x-admin.label> {{__('Poster (бажаний розмір 200х300 до 0,5 Мб)')}} </x-admin.label>



                                    <x-admin.image class="picture-block hidden">

                                    </x-admin.image>


                                    <x-admin.input-file name="poster" type="file" id="input-file" accept="image/png, image/jpeg" />


                                </x-admin.form-item>

                            </div>

                        </div>
                        <div class="card-body__group">

                            <x-admin.form-item>

                                <x-admin.label> {{__('Trailer (посилання на трейлер: https://www.youtube.com/)')}} </x-admin.label>

                                <x-admin.input name="trailer" />

                            </x-admin.form-item>

                        </div>

                        <div class="card-body__group">

                            <x-admin.form-item>


                                <div class="select-checkbox-groups">
                                    <div class="select-groups__item">
                                        <x-admin.label> {{__('Actors (список обраних акторів)')}} </x-admin.label>

                                        <div class="select-show @error('actors') error @enderror">
                                            <ul class="select-show__list">



                                            </ul>
                                        </div>




                                    </div>

                                    <div class="select-groups__item">

                                        <x-admin.label> {{__('Пошук акторів (за прізвищем)')}} </x-admin.label>


                                        <div class="select-checkbox">
                                            <div class="select-checkbox__control">

                                                <input class="input-search" type="text" placeholder="{{ __('пошук...') }}">

                                                <button class="search-btn" type="button" data-table="actors">
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




                        <div class="buttons-box">

                            <x-admin.button type="submit" class="btn-add">

                                {{__('admin.button.add')}}

                            </x-admin.button>

                        </div>



                    </x-admin.form>


                </div>

            </div>

        </div>

    </div>
</div>







@endsection