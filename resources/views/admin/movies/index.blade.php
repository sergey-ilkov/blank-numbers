@extends('admin.layouts.base')





@section('content')

<div class="content">


    <x-admin.content-header :title="__('admin.title.movies')" />
    {{--
    <x-admin.content-header :title="__('admin.title.languages')" :btnName="__('admin.title.add-lang')"
        href="{{ route('languages.create') }}" /> --}}








    <div class="content-box">





        <div class="content-table content-table-movies">
            <div class="content-table-header">

                <h3 class="content-table__title title-h3">

                    {{ __('admin.title.movies')}}

                </h3>


                <x-admin.link-btn href="{{ route('movies.create') }}" class="btn btn-create">

                    {{__('admin.button.add')}}

                </x-admin.link-btn>

            </div>

            <div class="filter-group">
                <x-admin.link-btn href="{{ route('movies.index') }}" class="btn btn-filter">

                    {{__('admin.button.data')}}

                </x-admin.link-btn>

                <x-admin.link-btn href="{{ route('movies.filter') }}" class="btn btn-filter">

                    {{__('admin.button.alphabet')}}

                </x-admin.link-btn>

            </div>


            <div class="table-body">
                <div class="table-body__row-head">
                    {{-- <div class="table-body__col">id</div> --}}
                    <div class="table-body__col">id</div>
                    <div class="table-body__col">title_uk</div>
                    <div class="table-body__col">title_ru</div>
                    <div class="table-body__col">year</div>
                    <div class="table-body__col col-poster">poster</div>
                    <div class="table-body__col">trailer</div>
                    <div class="table-body__col actors-width">actors</div>
                    <div class="table-body__col  col-btns-200">actions</div>
                </div>



                @foreach ($movies as $movie)

                <div class="table-body__row">

                    {{-- <div class="table-body__col">{{ $loop->iteration }}</div> --}}
                    <div class="table-body__col">{{ $movie->id }}</div>
                    <div class="table-body__col">{{ $movie->title_uk }}</div>
                    <div class="table-body__col">{{ $movie->title_ru }}</div>
                    <div class="table-body__col">{{ $movie->year }}</div>

                    <div class="table-body__col col-poster">

                        <img class="img-poster" src="{{ asset('storage/' . $movie->poster ) }}" alt="">

                    </div>
                    {{-- {{ asset('storage/' . $project->image ) }} --}}


                    <div class="table-body__col">

                        <a class="col-link" href="{{ $movie->trailer }}" target="_blank" rel="noopener">{{ __('Посилання') }}</a>

                    </div>

                    <div class="table-body__col actors-list">

                        {{-- ? actors many to many --}}
                        @foreach ($movie->actors as $actor )

                        <span> {{ $actor->name_uk . ' ' . $actor->surname_uk }} </span>

                        @endforeach

                    </div>

                    <div class="table-body__col  col-btns-200">

                        <div class="table-body-buttons">

                            <x-admin.link-btn href="{{ route('movies.edit', $movie->id) }}" class="btn btn-edit">

                                {{__('Edit')}}

                            </x-admin.link-btn>


                            @canany(['superadmin'], auth()->user())

                            <x-admin.button class="btn btn-delete btn-modal-delete" data-action="{{ route('movies.destroy', $movie->id) }}"
                                data-name="{{ $movie->title_uk . ' ' . $movie->year}}">

                                {{__('Delete')}}

                            </x-admin.button>
                            @endcanany



                        </div>

                    </div>
                </div>


                @endforeach



            </div>

            <div class="pagination-box">
                {{ $movies->links() }}
            </div>


        </div>

    </div>




    {{-- ? modal delete --}}
    <div id="model-delete" class="modal">
        <div class="modal-body">
            <x-admin.form id="form-delete" action="" method="DELETE" class="card-form">
                <x-admin.form-item>
                    <h3 class="modal__title title-h3">

                        {{__('admin.form.del')}}

                    </h3>
                </x-admin.form-item>
                <div class="modal__buttons">
                    <x-admin.button type="sumbit" class="card-form__btn btn-delete">

                        {{__('Delete')}}

                    </x-admin.button>
                    <x-admin.button class="card-form__btn btn-cancel btn-modal-close">

                        {{__('Cancel')}}

                    </x-admin.button>
                </div>
            </x-admin.form>
        </div>
    </div>
</div>

@endsection