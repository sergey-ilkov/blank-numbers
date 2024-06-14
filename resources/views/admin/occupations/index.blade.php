@extends('admin.layouts.base')





@section('content')

<div class="content">


    <x-admin.content-header :title="__('admin.title.occupations')" />
    {{--
    <x-admin.content-header :title="__('admin.title.languages')" :btnName="__('admin.title.add-lang')"
        href="{{ route('languages.create') }}" /> --}}








    <div class="content-box">





        <div class="content-table">
            <div class="content-table-header">

                <h3 class="content-table__title title-h3">

                    {{ __('admin.title.occupations')}}

                </h3>


                <x-admin.link-btn href="{{ route('occupations.create') }}" class="btn btn-create">

                    {{__('admin.button.add')}}

                </x-admin.link-btn>

            </div>

            <div class="filter-group">
                <x-admin.link-btn href="{{ route('occupations.index') }}" class="btn btn-filter">

                    {{__('admin.button.data')}}

                </x-admin.link-btn>

                <x-admin.link-btn href="{{ route('occupations.filter') }}" class="btn btn-filter">

                    {{__('admin.button.alphabet')}}

                </x-admin.link-btn>

            </div>


            <div class="table-body">
                <div class="table-body__row-head">
                    {{-- <div class="table-body__col">id</div> --}}
                    <div class="table-body__col">id</div>
                    <div class="table-body__col">title_uk</div>
                    <div class="table-body__col">title_ru</div>
                    <div class="table-body__col  col-btns-100">actions</div>
                </div>



                @foreach ($occupations as $occupation)

                <div class="table-body__row">
                    {{-- <div class="table-body__col">{{ $occupation->id }}</div> --}}
                    {{-- <div class="table-body__col">{{ $loop->iteration }}</div> --}}
                    <div class="table-body__col">{{ $occupation->id }}</div>
                    <div class="table-body__col">{{ $occupation->title_uk }}</div>
                    <div class="table-body__col">{{ $occupation->title_ru }}</div>
                    <div class="table-body__col  col-btns-100">

                        <div class="table-body-buttons">

                            <x-admin.link-btn href="{{ route('occupations.edit', $occupation->id) }}" class="btn btn-edit">

                                {{__('Edit')}}


                            </x-admin.link-btn>

                            @canany(['superadmin'], auth()->user())

                            <x-admin.button class="btn btn-delete btn-modal-delete"
                                data-action="{{ route('occupations.destroy', $occupation->id) }}" data-name="{{ $occupation->title_uk }}">

                                {{__('Delete')}}

                            </x-admin.button>
                            @endcanany



                        </div>

                    </div>
                </div>


                @endforeach



            </div>

            <div class="pagination-box">
                {{ $occupations->links() }}
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