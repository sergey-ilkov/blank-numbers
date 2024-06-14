@extends('admin.layouts.base')





@section('content')

<div class="content">





    <x-admin.content-header :title="__('admin.form.title-registration')" />




    <div class="auth-form__inner">

        <h3 class="auth-form__title"> {{ __('admin.form.registration') }} </h3>




        <div class="auth-form-body">

            <x-admin.errors />

            <x-admin.form action="{{ route('register.store') }}" method="POST" class="auth-form">


                <x-admin.form-item>

                    <x-admin.label required> {{__('admin.form.login')}} </x-admin.label>

                    <x-admin.input name="name" />

                </x-admin.form-item>
                <x-admin.form-item>

                    <x-admin.label required> {{__('admin.form.email')}} </x-admin.label>

                    <x-admin.input name="email" />

                </x-admin.form-item>



                <x-admin.form-item>

                    <x-admin.label required> {{__('admin.form.password')}} </x-admin.label>

                    <x-admin.input type="password" name="password" />

                </x-admin.form-item>
                <x-admin.form-item>

                    <x-admin.label required> {{__('admin.form.password-confirm')}} </x-admin.label>

                    <x-admin.input type="password" name="password_confirmation" />

                </x-admin.form-item>



                <x-admin.button type="submit" class="auth-form__btn">

                    {{__('admin.form.register')}}

                </x-admin.button>
            </x-admin.form>

        </div>

    </div>

</div>

@endsection