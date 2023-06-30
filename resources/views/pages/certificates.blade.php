<x-app-layout>
    <div class="lg:py-8 md:py-8 sm:py-5 lt:py-5 lg:mt-16 xl:mt-16 md:mt-8 sm:mt-0 lt:mt-0 p-2">
        <div class="max-w-7xl mx-auto xl:mb-44 lg:mb-44 md:mb-8 sm:mb-3 lt:mb-3">
            <div class="w-4/5 text-white">
                <h2 class="uppercase xl:text-6xl lg:text-6xl md:text-6xl sm:text-2xl lt:text-2xl">{{ __('Certificates') }}</h2>
{{--                <div class="text-gray-600 xl:text-white lg:text-white lg:my-16 sm:my-2 xl:w-3/4 lg:w-3/4 md:w-full sm:w-full lt:w-full sm:text-xs md:text-2xl">--}}
{{--                    QA Associates oversee every aspect of the manufacturing process, from receipt of raw materials--}}
{{--                    through delivery of finished products to ensure that established in-process specifications are met.--}}
{{--                </div>--}}
            </div>
        </div>
        <div class="max-w-7xl mx-auto pt-14 mx-auto xl:mb-44 lg:mb-44 md:mb-8 sm:mb-3 lt:mb-3">
            <div class="pt-14 flex justify-center xl:flex-row lg:flex-row md:flex-col sm:flex-col lt:flex-col">
                <div class="xl:w-2/4 lg:w-2/4 md:w-full sm:w-full lt:w-full sm:pb-10 lt:pb-10">
                    <img src="{{ asset('img/NSF-GMP for Sport Certificate.jpg') }}" alt="NSF-GMP for Sport Certificate">
                </div>
                <div class="xl:w-2/4 lg:w-2/4 md:w-full sm:w-full lt:w-full sm:pb-10 lt:pb-10">
                    <img src="{{ asset('img/NSF certificate for Good Manufacturing Practices for Dietary Supplements.jpg') }}" alt="NSF certificate for Good Manufacturing Practices for Dietary Supplements">
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
