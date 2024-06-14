<header class="header">



    <h4 class="header__title">

        <button id="burger-menu" class="burger-menu"><span></span></button>


    </h4>


    <div class="user-box">

        <div class="user">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>

            <h3 class="user-name">{{ auth()->user()->name }}</h3>
        </div>


        <x-admin.form action="{{ route('logout') }}" method="POST">

            <x-admin.form-item>

                <x-admin.button type="submit" class="btn btn-logout">

                    {{ __('admin.button.logout') }}

                </x-admin.button>

            </x-admin.form-item>

        </x-admin.form>

    </div>









</header>