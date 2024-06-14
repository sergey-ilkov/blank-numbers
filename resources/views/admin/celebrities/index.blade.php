@extends('admin.layouts.base')





@section('content')

<div class="content">


    <x-admin.content-header :title="__('admin.title.celebrities')" />


    <div class="content-box">



        <div class="content-table content-table-celebrities">
            <div class="content-table-header">

                <h3 class="content-table__title title-h3">

                    {{ __('admin.title.celebrities')}}

                </h3>


                <x-admin.link-btn href="{{ route('celebrities.create') }}" class="btn btn-create">

                    {{__('admin.button.add')}}

                </x-admin.link-btn>

            </div>

            <div class="filter-group">
                <x-admin.link-btn href="{{ route('celebrities.index') }}" class="btn btn-filter">

                    {{__('admin.button.data')}}

                </x-admin.link-btn>

                <x-admin.link-btn href="{{ route('celebrities.filter') }}" class="btn btn-filter">

                    {{__('admin.button.alphabet')}}

                </x-admin.link-btn>

            </div>


            <div class="table-body">
                <div class="table-body__row-head">
                    {{-- <div class="table-body__col">№</div> --}}
                    <div class="table-body__col">id</div>
                    <div class="table-body__col">name_uk</div>
                    <div class="table-body__col">surname_uk</div>
                    <div class="table-body__col">day</div>
                    <div class="table-body__col">month</div>
                    <div class="table-body__col">year</div>
                    <div class="table-body__col">published</div>
                    <div class="table-body__col table-body__col-actions">actions</div>
                </div>



                @foreach ($celebrities as $celebrity)

                <div class="table-body__row @if(!$celebrity->published){{ __('no-published') }}@endif">

                    {{-- <div class="table-body__col">{{ $loop->iteration }}</div> --}}
                    <div class="table-body__col">{{ $celebrity->id }}</div>
                    <div class="table-body__col">{{ $celebrity->name_uk }}</div>
                    <div class="table-body__col">{{ $celebrity->surname_uk }}</div>
                    <div class="table-body__col">{{ $celebrity->day }}</div>
                    <div class="table-body__col">{{ $celebrity->month }}</div>
                    <div class="table-body__col">{{ $celebrity->year }}</div>
                    <div class="table-body__col">

                        @if ($celebrity->published)

                        {{ __('true') }}
                        @else
                        {{ __('false') }}
                        @endif

                    </div>




                    <div class="table-body__col table-body__col-actions">

                        <div class="table-body-buttons">

                            {{-- <x-admin.link-btn href="{{ route('celebrities.show', $celebrity->id) }}" class="btn btn-view">

                                {{__('View')}}

                            </x-admin.link-btn> --}}


                            <x-admin.link-btn href="{{ route('celebrities.edit', $celebrity->id) }}" class="btn btn-edit">

                                {{__('Edit')}}

                            </x-admin.link-btn>


                            @canany(['superadmin'], auth()->user())

                            <x-admin.button class="btn btn-delete btn-modal-delete"
                                data-action="{{ route('celebrities.destroy', $celebrity->id) }}"
                                data-name="{{ $celebrity->name_uk . ' ' .  $celebrity->surname_uk}}">

                                {{__('Delete')}}

                            </x-admin.button>
                            @endcanany



                        </div>

                    </div>
                </div>


                @endforeach



            </div>

            <div class="pagination-box">
                {{ $celebrities->links() }}
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