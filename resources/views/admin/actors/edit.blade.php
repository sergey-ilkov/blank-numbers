@extends('admin.layouts.base')




@section('content')

<div class="content">

    <x-admin.content-header :title="__('admin.title.actors')" />



    <div class="content-box">

        <div class="content-box-top">



            <x-admin.link href="{{ route('actors.index') }}" class="admin-link">

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

                    {{__('admin.title.actors-edit')}}

                </h3>

                <div class="card-body">



                    <x-admin.errors />

                    <x-admin.form action="{{ route('actors.update', $actor['id']) }}" enctype="multipart/form-data" method="PATCH"
                        class="card-form">




                        @foreach ($languages as $language)

                        <div class="card-body__group">
                            <h5 class="card-body__title title-h5 color-second">
                                {{ $language->title }}
                            </h5>

                            <x-admin.form-item>

                                <x-admin.label> {{__('Name')}} </x-admin.label>

                                <x-admin.input name="name_{{ $language->code }}" value="{{ $actor['name_'. $language->code ] }}"
                                    style="max-width: 300px" />

                            </x-admin.form-item>

                            <x-admin.form-item>

                                <x-admin.label> {{__('Surname')}} </x-admin.label>

                                <x-admin.input name="surname_{{ $language->code }}" value="{{ $actor['surname_'. $language->code ] }}"
                                    style="max-width: 300px" />

                            </x-admin.form-item>
                        </div>

                        @endforeach






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