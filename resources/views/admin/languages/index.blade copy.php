@extends('admin.layouts.base')





@section('content')

<div class="content">


    <x-admin.content-header :title="__('admin.page.languages')" />
    {{--
    <x-admin.content-header :title="__('admin.page.languages')" :btnName="__('admin.page.add-lang')"
        href="{{ route('languages.create') }}" /> --}}








    <div class="content-box">





        <div class="content-table">
            <div class="content-table-header">

                <h3 class="content-table__title title-h3">

                    {{ __('admin.page.languages')}}

                </h3>


                <x-admin.link-btn href="{{ route('languages.create') }}" class="btn btn-create">

                    {{__('admin.button.add')}}

                </x-admin.link-btn>

            </div>


            <div class="table-body">
                <div class="table-body__row table-body__row-head">
                    <div class="table-body__col">id</div>
                    <div class="table-body__col">name</div>
                    <div class="table-body__col">code</div>
                    <div class="table-body__col  col-btns-300">actions</div>
                </div>



                @foreach ($languages as $language)

                <div class="table-body__row">
                    <div class="table-body__col">{{ $language->id }}</div>
                    <div class="table-body__col">{{ $language->name }}</div>
                    <div class="table-body__col">{{ $language->code }}</div>
                    <div class="table-body__col  col-btns-300">

                        <div class="table-body-buttons">
                            <x-admin.link-btn href="{{ route('languages.edit', $language->id) }}" class="btn btn-view">

                                {{__('View')}}


                            </x-admin.link-btn>

                            <x-admin.link-btn href="{{ route('languages.edit', $language->id) }}" class="btn btn-edit">

                                {{__('Edit')}}


                            </x-admin.link-btn>

                            <x-admin.button class="btn btn-delete btn-modal-delete"
                                data-action="{{ route('languages.destroy', $language->id) }}" data-name="{{ $language->name }}">

                                {{__('Delete')}}

                            </x-admin.button>
                        </div>

                    </div>
                </div>


                @endforeach



            </div>
        </div>

    </div>




    {{-- ? modal delete --}}
    <div id="model-delete" class="modal">
        <div class="modal-body">
            <x-admin.form id="form-delete" action="" method="DELETE" class="card-form">
                <x-admin.form-item>
                    <h2 class="modal__title title-h2">

                        {{__('Delete language?')}}

                    </h2>
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