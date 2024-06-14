@extends('layouts.base')


@section('content')



<x-breadcrumb>
    {{ __('menu.pythagoras') }}
</x-breadcrumb>




<section class="pythagoras">
    <div class="container">
        <h2 class="pythagoras__title title-h2">{{ __('translations.pifagor.title') }}</h2>

        <p class="pythagoras__desc text">

            {{ __('translations.pifagor.desc') }}

        </p>

        <div class="pythagoras__items">
            <div class="pythagoras__item">

              

                <div id="square-pythagoras" class="square-pythagoras">

                    <div class="square-pythagoras-data">
                        <div class="square-pythagoras__group">
                            <label class="square-pythagoras__label" for="square-pythagoras-name">{{ __('translations.pifagor.name') }}</label>
                            <input id="square-pythagoras-name" class="square-pythagoras__input" type="text" placeholder="{{ __('translations.pifagor.name') }}"
                                name="name" autocomplete="off">
                        </div>
                        <div class="square-pythagoras__group">
                            <label class="square-pythagoras__label" for="square-pythagoras-date">{{ __('translations.pifagor.birthday') }}</label>
                            <input id="square-pythagoras-date" class="square-pythagoras__input" type="text"
                                placeholder="31.12.2001" name="date" autocomplete="off">
                        </div>
                    </div>


                  
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



                        <svg class="svg-pythagoras-matrix-top" viewBox="0 0 36 36" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.295 8.96244L15.3518 7.96405L15.35 7.96395L15.295 8.96244ZM9.42535 7.66369L9.05913 8.59422L9.05918 8.59424L9.42535 7.66369ZM7.66363 9.42542L8.59434 9.05967L8.59429 9.05954L7.66363 9.42542ZM8.96313 15.2943L7.96469 15.3502L7.96471 15.3506L8.96313 15.2943ZM18.2282 7.72392C18.2437 7.70844 18.2035 7.7531 18.0284 7.81048C17.8632 7.8646 17.6367 7.91101 17.3494 7.94335C16.7745 8.00806 16.0672 8.00475 15.3518 7.96405L15.2382 9.96082C16.0025 10.0043 16.837 10.0137 17.5731 9.9308C17.9414 9.88935 18.3127 9.82192 18.6511 9.71106C18.9795 9.60345 19.3486 9.43198 19.6424 9.13813L18.2282 7.72392ZM15.35 7.96395C13.5508 7.8648 11.6689 7.47188 9.79152 6.73314L9.05918 8.59424C11.1356 9.41133 13.2277 9.85003 15.24 9.96092L15.35 7.96395ZM9.79158 6.73316C8.32348 6.15537 6.80999 5.39584 5.95928 4.54512L4.54506 5.95934C5.70935 7.12363 7.56276 8.00529 9.05913 8.59422L9.79158 6.73316ZM4.54506 5.95934C5.39582 6.8101 6.15643 8.32481 6.73296 9.79129L8.59429 9.05954C8.00621 7.56367 7.12352 5.70937 5.95928 4.54512L4.54506 5.95934ZM6.73291 9.79116C7.47107 11.6696 7.86409 13.5519 7.96469 15.3502L9.96157 15.2385C9.84911 13.2282 9.41051 11.1366 8.59434 9.05967L6.73291 9.79116ZM7.96471 15.3506C8.00504 16.0662 8.00785 16.7742 7.94286 17.3496C7.91038 17.6371 7.86389 17.8639 7.80975 18.0292C7.75229 18.2046 7.70775 18.2444 7.72385 18.2283L9.13807 19.6425C9.43179 19.3487 9.60301 18.9796 9.71042 18.6516C9.82115 18.3135 9.88863 17.9423 9.93023 17.574C10.0134 16.8379 10.0046 16.003 9.96154 15.238L7.96471 15.3506ZM4.54506 5.95934L30.0407 31.455L31.4549 30.0408L5.95928 4.54512L4.54506 5.95934Z"
                                fill="#77917F" />
                        </svg>


                        <svg class="svg-pythagoras-matrix-bottom" viewBox="0 0 36 36" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.96268 20.705L7.96429 20.6482L7.9642 20.65L8.96268 20.705ZM7.66393 26.5746L8.59446 26.9409L8.59448 26.9408L7.66393 26.5746ZM9.42566 28.3364L9.05992 27.4057L9.05978 27.4057L9.42566 28.3364ZM15.2945 27.0369L15.3504 28.0353L15.3508 28.0353L15.2945 27.0369ZM7.72416 17.7718C7.70868 17.7563 7.75334 17.7965 7.81072 17.9716C7.86484 18.1368 7.91126 18.3633 7.94359 18.6506C8.00831 19.2255 8.005 19.9328 7.9643 20.6482L9.96107 20.7618C10.0046 19.9975 10.0139 19.163 9.93104 18.4269C9.88959 18.0586 9.82217 17.6873 9.7113 17.3489C9.60369 17.0205 9.43222 16.6514 9.13838 16.3576L7.72416 17.7718ZM7.9642 20.65C7.86504 22.4492 7.47212 24.3311 6.73339 26.2085L8.59448 26.9408C9.41157 24.8644 9.85027 22.7723 9.96117 20.76L7.9642 20.65ZM6.73341 26.2084C6.15561 27.6765 5.39608 29.19 4.54537 30.0407L5.95958 31.4549C7.12387 30.2906 8.00554 28.4372 8.59446 26.9409L6.73341 26.2084ZM5.95958 31.4549C6.81034 30.6042 8.32505 29.8436 9.79154 29.267L9.05978 27.4057C7.56391 27.9938 5.70961 28.8765 4.54537 30.0407L5.95958 31.4549ZM9.7914 29.2671C11.6698 28.5289 13.5521 28.1359 15.3504 28.0353L15.2387 26.0384C13.2284 26.1509 11.1368 26.5895 9.05992 27.4057L9.7914 29.2671ZM15.3508 28.0353C16.0664 27.995 16.7744 27.9922 17.3498 28.0571C17.6374 28.0896 17.8641 28.1361 18.0294 28.1903C18.2049 28.2477 18.2446 28.2923 18.2285 28.2761L19.6427 26.8619C19.349 26.5682 18.9798 26.397 18.6519 26.2896C18.3138 26.1789 17.9425 26.1114 17.5743 26.0698C16.8381 25.9866 16.0032 25.9954 15.2383 26.0385L15.3508 28.0353ZM5.95958 31.4549L31.4552 5.95927L30.041 4.54506L4.54537 30.0407L5.95958 31.4549Z"
                                fill="#77917F" />
                        </svg>


                    </div>

                </div>


            </div>


            <div class="pythagoras__item">
                <div class="pythagoras-content">

                    @foreach (__('translations.pifagor.text') as $text)

                        <p class="pythagoras__text text">{{ $text }}</p>

                    @endforeach


                    <div class="pythagoras-btn-anim">
                        <a class="pythagoras__link btn btn-2" href="{{ route('home') }}/#consultations">{{ __('base.buttonConsultation') }}</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>









@endsection