@extends('admin.layouts.base')




@section('content')

<div class="content">

    <x-admin.content-header :title="__('Dashboard')" />



    <div class="content-box">

        <div class="dashboard__items">


            <div class="dashboard__item">
                <h4 class="dashboard__item-title">{{ __('celebrities') }}</h4>

                <div class="dashboard-box">
                    <div class="dashboard-box__item">
                        <span class="dashboard-box__item-text">{{ __('Кількість:') }}</span>
                        <span class="dashboard-box__item-num">{{ $info['celebrities']['all'] }}</span>
                    </div>
                    <div class="dashboard-box__item">
                        <span class="dashboard-box__item-text">{{ __('Кількість опублікованих:') }}</span>
                        <span class="dashboard-box__item-num">{{ $info['celebrities']['published'] }}</span>
                    </div>
                    <div class="dashboard-box__item">
                        <span class="dashboard-box__item-text">{{ __('Кількість не опублікованих:') }}</span>
                        <span class="dashboard-box__item-num">{{ $info['celebrities']['not-published'] }}</span>
                    </div>
                </div>
            </div>


            <div class="dashboard__item">
                <h4 class="dashboard__item-title">{{ __('blocking') }}</h4>
                <div class="dashboard-box">
                    <div class="dashboard-box__item">
                        <span class="dashboard-box__item-text">{{ __('Кількість заблокованих:') }}</span>
                        <span class="dashboard-box__item-num">{{ $info['blockings'] }}</span>
                    </div>
                </div>
            </div>

            <div class="dashboard__item">
                <h4 class="dashboard__item-title">{{ __('occupations') }}</h4>
                <div class="dashboard-box">
                    <div class="dashboard-box__item">
                        <span class="dashboard-box__item-text"> {{ __('Кількість:') }} </span>
                        <span class="dashboard-box__item-num"> {{ $info['occupations'] }} </span>

                        {{-- <span class="dashboard-box__item-num">

                            @if (isset($info['occupations']))

                            @else
                            {{ 0 }}
                            @endif

                        </span> --}}
                    </div>
                </div>
            </div>

            <div class="dashboard__item">
                <h4 class="dashboard__item-title">{{ __('actors') }}</h4>
                <div class="dashboard-box">
                    <div class="dashboard-box__item">
                        <span class="dashboard-box__item-text">{{ __('Кількість:') }}</span>
                        <span class="dashboard-box__item-num">{{ $info['actors'] }}</span>
                    </div>
                </div>
            </div>
            <div class="dashboard__item">
                <h4 class="dashboard__item-title">{{ __('movies') }}</h4>
                <div class="dashboard-box">
                    <div class="dashboard-box__item">
                        <span class="dashboard-box__item-text">{{ __('Кількість:') }}</span>
                        <span class="dashboard-box__item-num">{{ $info['movies'] }}</span>
                    </div>
                </div>
            </div>


        </div>

    </div>


</div>

@endsection