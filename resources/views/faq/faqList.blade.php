<x-app-layout>

    <div class="lg:py-8 md:py-8 sm:py-5 lt:py-5 lg:mt-16 xl:mt-16 md:mt-8 sm:mt-0 lt:mt-0 p-2">
        <div class="max-w-7xl mx-auto xl:mb-40 lg:mb-40 md:mb-8 sm:mb-3 lt:mb-3">
            <div class="w-4/5 text-white">
                <h2 class="uppercase xl:text-6xl lg:text-6xl md:text-4xl sm:text-2xl lt:text-2xl">
                    {{ __(' Frequently Asked Questions') }}
                </h2>
                <div class="p-2 xl:text-white lg:text-white md:text-gray-600 sm:text-gray-600 lt:text-gray-600 lg:my-16 sm:my-2 xl:w-3/4 lg:w-3/4 md:w-full sm:w-full lt:w-full sm:text-xs md:text-2xl">
                    {{--    @if(Auth::user())--}}
                    <div x-data="{ expanded: false }">
                        <button @click="expanded = ! expanded">
                            {{ __('Add Question') }}
                        </button>
                        <div x-show="expanded" x-collapse>
                        <form method="POST" action="{{ route('faqsend') }}">
                            @csrf

                            <div class="mt-4">
{{--                                <input type="hidden" name="userId" value="{{ Auth::user()->id }}" />--}}
                            </div>

                            <div class="mt-4">
                                <x-input-label for="question" :value="__('Question')" />
                                <x-text-area id="question" class="block mt-1 w-full text-cyan-800" type="text" name="question" :value="old('question')" required></x-text-area>
                                <x-input-error :messages="$errors->get('question')" class="mt-2" />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button class="ml-4">
                                    {{ __('Save question') }}
                                </x-primary-button>
                            </div>
                        </form>
                        </p>
                    </div>

                    {{--    @endif--}}
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto pt-2 xl:mb-10 lg:mb-10 md:mb-8 sm:mb-3 lt:mb-3">

            @if(count($data['data']) > 0 )
                @foreach($data['data'] as $faq)
                    <div class="flex justify-start pt-14 xl:flex-row lg:flex-row md:flex-row sm:flex-col lt:flex-col border-b-2 border-gray-200">
                        <div x-data="{ expanded: false }" class="xl:w-2/3 lg:w-2/3 md:w-2/3 sm:w-full lt:w-full p-4">
                            <div  class="mb-3 text-justify xl:pr-10 lg:pr-10 md:pr-0 sm:pr-0 lt:pr-0">
                                <p>{{ $faq['faq']['question'] }}</p><br>
                            </div>
                            @if($faq['faq']['answered'])
                            <div x-show="expanded" x-collapse class="mb-3 text-justify xl:pr-10 lg:pr-10 md:pr-0 sm:pr-0 lt:pr-0">
                                <p>{{ $faq['faq']['answer'] }}</p><br>
                            </div>
                            @else
                                <div x-show="expanded" x-collapse>
                                    <form method="POST" action="{{ route('faqupdate') }}">
                                        @csrf

                                        <div class="mt-4">
                                            <input type="hidden" name="faqId" value="{{ $faq['faq']['id'] }}" />
                                        </div>

                                        <div class="mt-4">
                                            <x-input-label for="answer" :value="__('Answer')" />
                                            <x-text-area id="answer" class="block mt-1 w-full" type="text" name="answer" :value="old('answer')" required></x-text-area>
                                            <x-input-error :messages="$errors->get('answer')" class="mt-2" />
                                        </div>

                                        <div class="flex items-center justify-end mt-4">
                                            <x-primary-button class="ml-4">
                                                {{ __('Save Answer') }}
                                            </x-primary-button>
                                        </div>
                                    </form>
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach

            @else
                <div class="flex justify-start pt-14 xl:flex-row lg:flex-row md:flex-row sm:flex-col lt:flex-col border-b-2 border-gray-200">
                    <div class="xl:w-2/3 lg:w-2/3 md:w-2/3 sm:w-full lt:w-full p-4">
                        <h3 class="uppercase xl:text-4xl lg:text-4xl md:text-2xl sm:text-2xl lt:text-2xl font-medium mb-8 xl:text-left lg:text-left md:text-center sm:text-center lt:text-center text-cyan-800">
                            {{ __('No information for display!') }}
                        </h3>
                    </div>
                </div>
            @endif

        </div>

        </div>
    </div>
</x-app-layout>
