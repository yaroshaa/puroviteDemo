<x-app-layout>
    @if(Auth::user() && Auth::user()->hasRole('admin'))
        <x-white-button href="{{ route('postcreate', ['key' => null]) }}">
            {{ __('Add post') }}
        </x-white-button>
    @endif
    <div class="lg:py-8 md:py-8 sm:py-5 lt:py-5 lg:mt-16 xl:mt-16 md:mt-8 sm:mt-0 lt:mt-0 p-2">
        <div class="max-w-7xl mx-auto xl:mb-40 lg:mb-40 md:mb-8 sm:mb-3 lt:mb-3">
            <div class="w-4/5 text-white">
                <h2 class="uppercase xl:text-6xl lg:text-6xl md:text-4xl sm:text-2xl lt:text-2xl">
                    {{ __('Blog List') }}
                </h2>
                <div class="p-2 xl:text-white lg:text-white md:text-gray-600 sm:text-gray-600 lt:text-gray-600 lg:my-16 sm:my-2 xl:w-3/4 lg:w-3/4 md:w-full sm:w-full lt:w-full sm:text-xs md:text-2xl">
                    Blog, information...
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto pt-2 xl:mb-10 lg:mb-10 md:mb-8 sm:mb-3 lt:mb-3">


            @foreach($data['data'] as $post)
            <div class="flex justify-start pt-14 xl:flex-row lg:flex-row md:flex-row sm:flex-col lt:flex-col border-b-2 border-gray-200">
                <div class="xl:w-1/3 lg:w-1/3 md:w-1/3 sm:w-full lt:w-full p-4">
                    <img src="{{ asset('img/'.$post['content'][0]['image']) }}" alt="">
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
                        @if(Auth::user() && Auth::user()->hasRole('admin'))
                        <div class="actions flex flex-row ">
                            <div class="inline-block p-2">
                                <a href="{{route('postedit', ['id' => $post['id']])}}" class="text-sm">
                                    edit
                                </a>
                            </div>
                            <div class="inline-block p-2">
                                <a href="{{route('postdelete', ['id' => $post['id']])}}" class="text-sm">
                                    delete
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</x-app-layout>
