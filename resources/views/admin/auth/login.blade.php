@extends('admin.layouts.auth')





@section('auth-content')



<div class="auth-form__inner">


      
    
    @if (isset($blocking))

        <div class="alert alert-error">

            {{ $blocking }}

        </div>

    @else
                                          
         
        <h3 class="auth-form__title"> {{ __('admin.form.login-to-admin') }} </h3> 

           

        <div class="auth-form-body">

            <x-admin.errors />

            <x-admin.form action="{{ route('authenticate') }}" method="POST" class="auth-form">

                          
                <x-admin.form-item >

                    <x-admin.label required> {{__('admin.form.login')}} </x-admin.label>

                    <x-admin.input name="name" />                                        

                </x-admin.form-item>

           

                <x-admin.form-item >

                    <x-admin.label required> {{__('admin.form.password')}} </x-admin.label>

                    <x-admin.input type="password" name="password" />

                </x-admin.form-item>            
           

                <x-admin.button type="submit" class="auth-form__btn">

                    {{__('admin.form.login-btn')}}

                </x-admin.button>

            </x-admin.form>

        </div>                          

   

    @endif

       
</div>

@endsection

