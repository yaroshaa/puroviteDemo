<x-app-layout>
    <div class="lg:py-8 md:py-8 sm:py-5 lt:py-5 lg:mt-16 xl:mt-16 md:mt-8 sm:mt-0 lt:mt-0 p-2">
        <div class="max-w-7xl mx-auto xl:mb-44 lg:mb-44 md:mb-8 sm:mb-3 lt:mb-3">
            <div class="w-4/5 text-white">
                <h2 class="uppercase xl:text-6xl lg:text-6xl md:text-6xl sm:text-2xl lt:text-2xl">{{ __('Quality Control & Quality Assurance') }}</h2>
                <div class="text-gray-600 xl:text-white lg:text-white lg:my-16 sm:my-2 xl:w-3/4 lg:w-3/4 md:w-full sm:w-full lt:w-full sm:text-xs md:text-2xl">
                    QA Associates oversee every aspect of the manufacturing process, from receipt of raw materials
                    through delivery of finished products to ensure that established in-process specifications are met.
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto pt-14 mx-auto xl:mb-44 lg:mb-44 md:mb-8 sm:mb-3 lt:mb-3">
            <div class="pt-14 flex justify-center xl:flex-row lg:flex-row md:flex-col sm:flex-col lt:flex-col">
                <div class="xl:w-2/4 lg:w-2/4 md:w-full sm:w-full lt:w-full sm:pb-10 lt:pb-10">
                    <h2 class="uppercase xl:text-6xl lg:text-6xl md:text-6xl sm:text-4xl lt:text-4xl font-medium text-cyan-800 mb-5"> {{ __('Laboratory') }} </h2>
                    <div class="mb-10 text-justify xl:pr-10 lg:pr-10">
                        <p>Our laboratory team consists of experienced scientists, chemists, biologists,
                            microbiologists, and laboratory technicians. We pride ourselves on having a state-of-the-art
                            5,000-square-foot laboratory that is equipped with the latest technology and tools. This
                            allows us to provide our clients with accurate and reliable results. </p>
                    </div>
                </div>
                <div class="xl:w-2/4 lg:w-2/4 md:w-full sm:w-full lt:w-full sm:pb-10 lt:pb-10">
                    <img src="{{ asset('img/quality_control_10.png') }}" alt="quality_control_10">
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto xl:mt-20 lg:mt-20 md:mt-20 sm:mt-3 lt:mt-3">
            <h2 class="uppercase text-4xl font-medium my-8 text-left text-cyan-800">
                {{ __('Equipment and testing technologies available for use includes: ') }}
            </h2>
            <div class=" flex justify-around mt-20">
                <div class="w-2/4 p-2">
                    <ul>
                        <x-arrow-list-text>HPLC (High Performance Liquid Chromatography)</x-arrow-list-text>
                        <x-arrow-list-text>HPTLC (High Performance Thin Layer Chromatography)</x-arrow-list-text>
                        <x-arrow-list-text>UPLC (Ultra Performance Liquid Chromatography)</x-arrow-list-text>
                        <x-arrow-list-text>FT-IR Spectrometry</x-arrow-list-text>
                        <x-arrow-list-text>Gas Chromatography</x-arrow-list-text>
                    </ul>

                </div>
                <div class="w-2/4 p-2">
                    <ul>
                        <x-arrow-list-text>ICP-MS</x-arrow-list-text>
                        <x-arrow-list-text>ICP-OES</x-arrow-list-text>
                        <x-arrow-list-text>Dissolution Apparatus</x-arrow-list-text>
                        <x-arrow-list-text>Stability Chambers</x-arrow-list-text>
                        <x-arrow-list-text>Microbiology Laboratory</x-arrow-list-text>
                    </ul>
                </div>

            </div>
        </div>
        <div class="max-w-7xl mx-auto xl:mt-20 lg:mt-20 md:mt-20 sm:mt-3 lt:mt-3">
            <div class="xl:w-3/4 lg:w-3/4 md:w-3/4 sm:w-full lt:w-full">
                <h2 class="uppercase xl:text-6xl lg:text-6xl md:text-6xl sm:text-4xl lt:text-4xl font-medium text-cyan-800 mb-5">
                    Quality Assurance
                </h2>
                <div class="mb-10 xl:px-8 lg:px-8 md:px-4 sm:px-0 lt:px-0">
                    <p>The Quality Assurance Department at PuroVite is responsible for ensuring compliance with
                        regulatory, corporate, and client requirements. QA Associates oversee every aspect of the
                        manufacturing process, from receipt of raw materials to delivery of finished products, to ensure
                        that established in-process specifications are met. This ensures that our products meet the
                        highest standards of quality and safety.</p><br>
                    <p>The QA Department is responsible for managing a comprehensive training program for all employees
                        of the company. This includes orientation and refresher training on job-specific duties, as well
                        as Good Manufacturing Practices. By ensuring that all employees are properly trained, the QA
                        Department helps to maintain a high level of quality control throughout the company.</p>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto xl:mt-20 lg:mt-20 md:mt-20 sm:mt-3 lt:mt-3">
            <div class="flex justify-items-stretch">
                <div class="w-1/4 p-2"><img src="{{ asset('img/quality_control_2.png') }}" alt="quality_control_2">
                </div>
                <div class="w-1/4 p-2"><img src="{{ asset('img/quality_control_7.png') }}" alt="quality_control_7">
                </div>
                <div class="w-1/4 p-2"><img src="{{ asset('img/quality_control_5.png') }}" alt="quality_control_5">
                </div>
                <div class="w-1/4 p-2"><img src="{{ asset('img/quality_control_9.png') }}" alt="quality_control_9">
                </div>
            </div>
            <div class="flex justify-items-stretch">
                <div class="w-1/4 p-2"><img src="{{ asset('img/quality_control_4.png') }}" alt="quality_control_4">
                </div>
                <div class="w-1/4 p-2"><img src="{{ asset('img/quality_control_8.png') }}" alt="quality_control_8">
                </div>
                <div class="w-1/4 p-2"><img src="{{ asset('img/quality_control_1.png') }}" alt="quality_control_1">
                </div>
                <div class="w-1/4 p-2"><img src="{{ asset('img/quality_control_6.png') }}" alt="quality_control_6">
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto xl:mt-20 lg:mt-20 md:mt-20 sm:mt-3 lt:mt-3">
            <div class="xl:w-3/4 lg:w-3/4 md:w-3/4 sm:w-full lt:w-full">
                <h2 class="uppercase xl:text-6xl lg:text-6xl md:text-6xl sm:text-4xl lt:text-4xl font-medium text-cyan-800 mb-5">
                    Product Development
                </h2>
                <div class="mb-10 xl:px-8 lg:px-8 md:px-4 sm:px-0 lt:px-0">
                    <p>Our team of experts has extensive experience in developing various dosage forms including
                        tablets, capsules, powders, and liquid capsules. We can help you create products with the
                        perfect ingredients and dosages, while also verifying label claims and ensuring allergen
                        control. Plus, our formulations are shelf-stable, so you can be confident your product will stay
                        fresh and effective for longer. .</p><br>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto xl:mt-20 lg:mt-20 md:mt-20 sm:mt-3 lt:mt-3">
            <h2 class="uppercase xl:text-6xl lg:text-6xl md:text-6xl sm:text-4xl lt:text-4xl font-medium text-cyan-800 mb-5">
                Regulatory Compliance
            </h2>
            <div class="flex justify-start xl:flex-row lg:flex-row md:flex-col sm:flex-col lt:flex-col pt-10">
                <div class="xl:w-2/4 lg:w-2/4 md:w-full sm:w-full lt:w-full sm:pb-10 lt:pb-10 xl:p-4 lg:p-4 md:p-4 sm:p-0 lt:p-0">
                    <img src="{{ asset('img/quality_control_3.png') }}" alt="quality_control_3">
                </div>
                <div class="xl:w-2/4 lg:w-2/4 md:w-full sm:w-full lt:w-full p-2 xl:pt-16 lg:pt-16 xl:pl-10 lg:pl-10">
                    <ul>
                        <x-arrow-list-text>FDA inspected</x-arrow-list-text>
                        <x-arrow-list-text>NSF GMP program registered</x-arrow-list-text>
                        <x-arrow-list-text>Kosher Certified</x-arrow-list-text>
                        <x-arrow-list-text>Halal Certified</x-arrow-list-text>
                        <x-arrow-list-text>OSHA Inspected</x-arrow-list-text>
                        <x-arrow-list-text>Meets Health Canada Standards</x-arrow-list-text>
                        <x-arrow-list-text>Various customer audits</x-arrow-list-text>
                        <x-arrow-list-text>Conducts vendor qualifications</x-arrow-list-text>
                    </ul>
                </div>

            </div>
        </div>
        <div class="max-w-7xl mx-auto xl:mt-20 lg:mt-20 md:mt-20 sm:mt-3 lt:mt-3 my-10">
            <div class="flex justify-start xl:flex-row lg:flex-row md:flex-col sm:flex-col lt:flex-col">
                <div class="xl:w-2/4 lg:w-2/4 md:w-full sm:w-full lt:w-full p-4 ">
                    <p>The Quality Assurance Department at PuroVite is committed to ensuring compliance with all
                    regulatory, corporate, and client requirements. QA Associates oversee every aspect of the
                    manufacturing process, from receipt of raw materials through delivery of finished products to ensure
                    that established in-process specifications are met.</p>
                </div>
                <div class="xl:w-2/4 lg:w-2/4 md:w-full sm:w-full lt:w-full p-4 ">
                    <p>The department also manages a comprehensive training program for all company employees that includes
                    orientation and refresher training on job-specific duties and Good Manufacturing Practices. With its
                    expertise in various dosage forms, ingredient uses, label claims verification, and allergen control
                    programs, PuroVite is a reliable partner for all your shelf-stable formulation needs.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
