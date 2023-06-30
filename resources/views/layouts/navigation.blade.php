<nav x-data="{ open: false }" class="bg-transparent">
    <div class="mx-auto py-4">
        <div class="flex justify-between h-10">
            <div class="flex">
                <div class="flex-shrink-0 flex items-center p-1 pr-5">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-16 w-auto fill-current text-gray-600"/>
                    </a>
                </div>
                <div class="sm:hidden md:hidden lt:hidden lg:inline-flex xl:inline-flex space-x-8 sm:-my-px sm:ml-5">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link :href="route('about_us')" :active="request()->routeIs('about_us')">
                        {{ __('About Us') }}
                    </x-nav-link>
                    <x-nav-link :href="route('manufacturing')" :active="request()->routeIs('manufacturing')">
                        {{ __('Manufacturing') }}
                    </x-nav-link>
                    <x-nav-link :href="route('facility')" :active="request()->routeIs('facility')">
                        {{ __('Facility') }}
                    </x-nav-link>
                    <x-nav-link :href="route('quality')" :active="request()->routeIs('quality')">
                        {{ __('Quality') }}
                    </x-nav-link>
                    <x-nav-link :href="route('certificates')" :active="request()->routeIs('certificates')">
                        {{ __('Сertificates') }}
                    </x-nav-link>
                    <x-nav-link :href="route('services')" :active="request()->routeIs('services')">
                        {{ __('Services') }}
                    </x-nav-link>
                    <x-nav-link :href="route('blog')" :active="request()->routeIs('blog')">
                        {{ __('Blog') }}
                    </x-nav-link>
                    <x-nav-link :href="route('contacts')" :active="request()->routeIs('contacts')">
                        {{ __('Contacts') }}
                    </x-nav-link>
                    <x-nav-link :href="route('faq')" :active="request()->routeIs('faq')">
                        {{ __('FAQ') }}
                    </x-nav-link>
                </div>
            </div>
            @if (Auth::user())
                <!-- Settings Dropdown -->
                <div class="lg:inline-flex xl:inline-flex md:hidden sm:hidden lt:hidden space-x-8 sm:-my-px sm:ml-10 sm:flex xl:pt-1 lg:pt-1 ">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                {{--                            <div>{{ Auth::user()->name }}</div>--}}
                                <div class="text-white">{{ Auth::user()->name }}</div>
                                <div class="ml-1">
                                    <svg class="h-10 w-10" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_367_381)">
                                            <path d="M22.5 28.125C28.7132 28.125 33.75 23.0882 33.75 16.875C33.75 10.6618 28.7132 5.625 22.5 5.625C16.2868 5.625 11.25 10.6618 11.25 16.875C11.25 23.0882 16.2868 28.125 22.5 28.125Z" stroke="white" stroke-width="4" stroke-miterlimit="10"/>
                                            <path d="M5.44727 37.9671C7.17618 34.9745 9.66217 32.4896 12.6555 30.762C15.6488 29.0344 19.0441 28.125 22.5002 28.125C25.9563 28.125 29.3515 29.0346 32.3448 30.7622C35.3381 32.4899 37.824 34.9749 39.5529 37.9675" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_367_381">
                                                <rect width="45" height="45" fill="white"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div class="ml-1">
                                    <svg class="h-10 w-10" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20.3906 35.1562C28.5455 35.1562 35.1562 28.5455 35.1562 20.3906C35.1562 12.2358 28.5455 5.625 20.3906 5.625C12.2358 5.625 5.625 12.2358 5.625 20.3906C5.625 28.5455 12.2358 35.1562 20.3906 35.1562Z" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M30.8308 30.832L39.3739 39.3751" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <form method="POST" action="{{ route('search') }}">
                                @csrf
                                <div class="flex flex-row bg-white p-0 m-0">
                                    <x-text-input id="search" class="ml-1  w-4/5" type="text" name="search" :value="old('search')"  />
                                    {{--                                    required autofocus autocomplete="search"--}}
                                    <x-input-error :messages="$errors->get('search')" class="mt-2 w-1/5" />
                                    <x-search-button class="ml-3">
                                        {{ __('Go!') }}
                                    </x-search-button>
                                </div>

                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            @else
                <div class="lg:inline-flex xl:inline-flex md:hidden sm:hidden lt:hidden space-x-8 sm:-my-px sm:ml-10 sm:flex xl:pt-1 lg:pt-1">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div class="ml-1">
                                    <svg class="h-10 w-10" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_367_381)">
                                            <path d="M22.5 28.125C28.7132 28.125 33.75 23.0882 33.75 16.875C33.75 10.6618 28.7132 5.625 22.5 5.625C16.2868 5.625 11.25 10.6618 11.25 16.875C11.25 23.0882 16.2868 28.125 22.5 28.125Z" stroke="white" stroke-width="4" stroke-miterlimit="10"/>
                                            <path d="M5.44727 37.9671C7.17618 34.9745 9.66217 32.4896 12.6555 30.762C15.6488 29.0344 19.0441 28.125 22.5002 28.125C25.9563 28.125 29.3515 29.0346 32.3448 30.7622C35.3381 32.4899 37.824 34.9749 39.5529 37.9675" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_367_381">
                                                <rect width="45" height="45" fill="white"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('register')" :active="request()->routeIs('register')">
                                {{ __('Register') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('login')" :active="request()->routeIs('login')">
                                {{ __('Login') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div class="ml-1">
                                    <svg class="h-10 w-10" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20.3906 35.1562C28.5455 35.1562 35.1562 28.5455 35.1562 20.3906C35.1562 12.2358 28.5455 5.625 20.3906 5.625C12.2358 5.625 5.625 12.2358 5.625 20.3906C5.625 28.5455 12.2358 35.1562 20.3906 35.1562Z" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M30.8308 30.832L39.3739 39.3751" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <form method="POST" action="{{ route('search') }}">
                                @csrf
                                <div class="flex flex-row bg-white p-0 m-0">
                                    <x-text-input id="search" class="ml-1  w-4/5" type="text" name="search" :value="old('search')"  />
{{--                                    required autofocus autocomplete="search"--}}
                                    <x-input-error :messages="$errors->get('search')" class="mt-2 w-1/5" />
                                    <x-search-button class="ml-3">
                                        {{ __('Go!') }}
                                    </x-search-button>
                                </div>

                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            @endif
            <!-- Hamburger -->
            <div class="flex items-center lg:hidden xl:hidden 2xl:hidden mr-2">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 bg-white hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden ">
        <div class="pt-2 pb-3 space-y-1 bg-white">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('about_us')" :active="request()->routeIs('about_us')">
                {{ __('About Us') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('manufacturing')" :active="request()->routeIs('manufacturing')">
                {{ __('Manufacturing') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('facility')" :active="request()->routeIs('facility')">
                {{ __('Facility') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('quality')" :active="request()->routeIs('quality')">
                {{ __('Quality') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('certificates')" :active="request()->routeIs('certificates')">
                {{ __('Сertificates') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('services')" :active="request()->routeIs('services')">
                {{ __('Services') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('blog')" :active="request()->routeIs('blog')">
                {{ __('Blog') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('contacts')" :active="request()->routeIs('contacts')">
                {{ __('Contacts') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('faq')" :active="request()->routeIs('faq')">
                {{ __('FAQ') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                                           onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
