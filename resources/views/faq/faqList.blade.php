<x-app-layout>
    <div class="lg:py-8 md:py-8 sm:py-5 lt:py-5 lg:mt-16 xl:mt-16 md:mt-8 sm:mt-0 lt:mt-0 p-2">
        <div class="max-w-7xl mx-auto xl:mb-40 lg:mb-40 md:mb-8 sm:mb-3 lt:mb-3">
            <div class="w-4/5 text-white">
                <h2 class="uppercase xl:text-6xl lg:text-6xl md:text-4xl sm:text-2xl lt:text-2xl">
                    {{ __(' Frequently Asked Questions') }}
                </h2>
                <div class="p-2 xl:text-white lg:text-white md:text-gray-600 sm:text-gray-600 lt:text-gray-600 lg:my-16 sm:my-2 xl:w-3/4 lg:w-3/4 md:w-full sm:w-full lt:w-full sm:text-xs md:text-2xl">
                    @if(Auth::user())
                    <div x-data="{ expanded: false }">
                        <button @click="expanded = ! expanded">
                            {{ __('Add Question') }}
                        </button>
                        <div x-show="expanded" x-collapse>
                        <form method="POST" action="{{ route('faqsend') }}">
                            @csrf

                            <div class="mt-4">
                                <input type="hidden" name="userId" value="@if(Auth::user()) {{ Auth::user()->id }} @endif" />
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
                        @else
                            <div>Register or login to add your question</div>

                        @endif
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto pt-2 xl:mb-10 lg:mb-10 md:mb-8 sm:mb-3 lt:mb-3 mt-5">

            @if(count($data['data']) > 0 )
                @php($counter = 1)
                @foreach($data['data'] as $faq)
                    @php($counter++)
                    <div class="flex justify-start pt-5 xl:flex-row lg:flex-row md:flex-row ssm:flex-col lt:flex-col mb-3">
                        @if($faq['answered'] && !Auth::user() && $faq['status'])
                            <div x-data="{ expanded: false }" class="xl:w-2/3 lg:w-2/3 md:w-2/3 sm:w-full lt:w-full p-4">
                                <div @click="expanded = ! expanded"  class="text-justify xl:pr-10 lg:pr-10 md:pr-0 sm:pr-0 lt:pr-0">
                                    <p class="p-3">{{ $faq['question'] }}</p>
                                </div>
                                <div x-show="expanded" x-collapse class="text-justify xl:pr-10 lg:pr-10 md:pr-0 sm:pr-0 lt:pr-0 bg-slate-100">
                                    <p class="p-3" >{{ $faq['answer'] }}</p>
                                </div>
                            </div>
                        @elseif(Auth::user() && Auth::user()->hasRole('admin'))
                            <div x-data="{ expanded: false }" class="xl:w-2/3 lg:w-2/3 md:w-2/3 sm:w-full lt:w-full p-4">
                                <div @click="expanded = ! expanded"  class="text-justify xl:pr-10 lg:pr-10 md:pr-0 sm:pr-0 lt:pr-0">
                                    <p class="p-3">{{ $faq['question'] }}</p>
                                </div>
                                <div x-show="expanded" x-collapse class="text-justify xl:pr-10 lg:pr-10 md:pr-0 sm:pr-0 lt:pr-0">
                                    <div x-show="expanded" x-collapse>
                                        <form method="POST" action="{{ route('faqupdate',['id' => $faq['id']]) }}">
                                            @csrf
                                            <div class="mt-4">
                                                <input type="hidden" name="faqId" value="{{ $faq['id'] }}" />
                                            </div>

                                            <div class="mt-4">
                                                <x-input-label for="answer" :value="__('Answer')" />
                                                <x-text-area id="answer" class="block mt-1 w-full" type="text" name="answer" :value="old('answer')" required>{{ $faq['answer']  }}</x-text-area>
                                                <x-input-error :messages="$errors->get('answer')" class="mt-2" />
                                            </div>

                                            <div class="flex items-center justify-between mt-4">
                                                <div class="flex items-center justify-start mt-4 ">
                                                    <label for="status"> {{__('Status')}} </label>
                                                    <input type="checkbox" @if($faq['status'] == 1) checked @endif name="status" class="ml-4" value="1"/>
                                                </div>

                                                <x-primary-button class="ml-4">
                                                    {{ __('Save Answer') }}
                                                </x-primary-button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="xl:w-2/3 lg:w-2/3 md:w-2/3 sm:w-full lt:w-full p-4">
                                <div class="actions flex flex-row ">
                                    <div class="inline-block p-2">
                                        <x-link-modal x-data="" x-on:click="$dispatch('open-modal', 'confirm-faq-deletion-{{$counter}}')">
                                            delete
                                        </x-link-modal>
                                        <x-post-modal name="confirm-faq-deletion-{{$counter}}">
                                            <form method="POST" action="{{ route('faqdelete', ['id' => $faq['id']]) }}" class="p-2" >
                                                @csrf
                                                <h2 class="text-lg font-medium text-gray-900">
                                                    {{ __('Are you sure you want to delete this question?') }}
                                                </h2>

                                                <div class="mt-6 flex justify-end">
                                                    <x-secondary-button x-on:click.prevent="$dispatch('close', 'confirm-faq-deletion-{{$counter}}')">
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
                        @endif
                    </div>
                @endforeach
            @else
                <div class="flex justify-start pt-5 xl:flex-row lg:flex-row md:flex-row sm:flex-col lt:flex-col border-b-2 border-gray-200">
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
