<x-app-layout>

    <div class="lg:py-8 md:py-8 sm:py-5 lt:py-5 lg:mt-16 xl:mt-16 md:mt-8 sm:mt-0 lt:mt-0 p-2">
        <div class="max-w-7xl mx-auto xl:mb-40 lg:mb-40 md:mb-8 sm:mb-3 lt:mb-3">
            <div class="w-4/5 text-white">
                <h2 class="uppercase xl:text-6xl lg:text-6xl md:text-4xl sm:text-2xl lt:text-2xl">
                    {{ __('Blog List') }}
                </h2>
                <div class="p-2 xl:text-white lg:text-white md:text-gray-600 sm:text-gray-600 lt:text-gray-600 lg:my-16 sm:my-2 xl:w-3/4 lg:w-3/4 md:w-full sm:w-full lt:w-full sm:text-xs md:text-2xl">
                    Blog, information...
                </div>
                @if(Auth::user() && Auth::user()->hasRole('admin') && count($data['data']) > 0)
                    <a class="pl-3 inline-block hover:text-gray-700" href="{{ route('postcreate', ['key' => null]) }}">
                        {{ __('Add post') }}
                    </a>
                @endif
            </div>
        </div>
        <div class="max-w-7xl mx-auto pt-2 xl:mb-10 lg:mb-10 md:mb-8 sm:mb-3 lt:mb-3">
            @if(count($data['data']) > 0 )
                @php($counter = 1)
                @foreach($data['data'] as $post)
                    @php($counter++)
                    @if(Auth::user() && Auth::user()->hasRole('admin'))
                    <div class="flex justify-start pt-14 xl:flex-row lg:flex-row md:flex-row sm:flex-col lt:flex-col border-b-2 border-gray-200">
                        <div class="xl:w-1/3 lg:w-1/3 md:w-1/3 sm:w-full lt:w-full p-4">
                            <img src="{{ asset('img/blog/'.$post['content'][0]['image']) }}" alt="">
                        </div>
                        <div class="xl:w-2/3 lg:w-2/3 md:w-2/3 sm:w-full lt:w-full p-4">
                            <h3 class="uppercase xl:text-4xl lg:text-4xl md:text-2xl sm:text-2xl lt:text-2xl font-medium mb-8 xl:text-left lg:text-left md:text-center sm:text-center lt:text-center text-cyan-800">
                                {{ $post['content'][0]['name'] }}
                            </h3>
                            <div class="mb-3 text-justify xl:pr-10 lg:pr-10 md:pr-0 sm:pr-0 lt:pr-0">
                                <p>{{ $post['content'][0]['content'] }}</p><br>
                            </div>
                            <div class="w-full flex flex-row justify-between xl:pr-10 lg:pr-10 items-center">
                                    <div class="actions flex flex-row ">
                                        <div class="inline-block p-2">
                                            <a href="{{route('postedit', ['id' => $post['id']])}}" class="text-sm">
                                                edit
                                            </a>
                                        </div>
                                        <div class="inline-block p-2">
                                            <x-link-modal x-data="" x-on:click="$dispatch('open-modal', 'confirm-post-deletion-{{$counter}}')">
                                                delete
                                            </x-link-modal>
                                            <x-post-modal name="confirm-post-deletion-{{$counter}}">
                                                <form method="POST" action="{{ route('postdelete', ['id' => $post['id']]) }}" class="p-2" >
                                                    @csrf
                                                    <h2 class="text-lg font-medium text-gray-900">
                                                        {{ __('Are you sure you want to delete this post?') }}
                                                    </h2>

                                                    <div class="mt-6 flex justify-end">
                                                        <x-secondary-button x-on:click.prevent="$dispatch('close', 'confirm-post-deletion-{{$counter}}')">
                                                            {{ __('Cancel') }}
                                                        </x-secondary-button>

                                                        <x-danger-button class="ml-3" x-on:click="">
                                                            {{ __('Delete') }}
                                                        </x-danger-button>
                                                    </div>
                                                </form>
                                            </x-post-modal>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    @elseif($post['status'])
                        <div class="flex justify-start pt-14 xl:flex-row lg:flex-row md:flex-row sm:flex-col lt:flex-col border-b-2 border-gray-200">
                            <div class="xl:w-1/3 lg:w-1/3 md:w-1/3 sm:w-full lt:w-full p-4">
                                <img src="{{ asset('img/blog/'.$post['content'][0]['image']) }}" alt="">
                            </div>
                            <div class="xl:w-2/3 lg:w-2/3 md:w-2/3 sm:w-full lt:w-full p-4">
                                <h3 class="uppercase xl:text-4xl lg:text-4xl md:text-2xl sm:text-2xl lt:text-2xl font-medium mb-8 xl:text-left lg:text-left md:text-center sm:text-center lt:text-center text-cyan-800">
                                    {{ $post['content'][0]['name'] }}
                                </h3>
                                <div class="mb-3 text-justify xl:pr-10 lg:pr-10 md:pr-0 sm:pr-0 lt:pr-0">
                                    <p>{{ $post['content'][0]['content'] }}</p><br>
                                </div>
                                <div class="w-full flex flex-row justify-between xl:pr-10 lg:pr-10 items-center">
                                    <x-blue-button :href="route('postshow', ['id' => $post['id']])">
                                        {{ __('Read more') }}
                                    </x-blue-button>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

            @else
                <div class="flex justify-start pt-14 xl:flex-row lg:flex-row md:flex-row sm:flex-col lt:flex-col border-b-2 border-gray-200">
                    <div class="xl:w-2/3 lg:w-2/3 md:w-2/3 sm:w-full lt:w-full p-4">
                        <h3 class="uppercase xl:text-4xl lg:text-4xl md:text-2xl sm:text-2xl lt:text-2xl font-medium mb-8 xl:text-left lg:text-left md:text-center sm:text-center lt:text-center text-cyan-800">
                            {{ __('No posts for display!') }}
                        </h3>

                        <div class="w-full flex flex-row justify-between xl:pr-10 lg:pr-10 items-center">

                            @if(Auth::user() && Auth::user()->hasRole('admin'))
                                <a href="{{ route('postcreate', ['key' => null]) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    {{ __('Add post') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

        </div>

    </div>
</x-app-layout>
