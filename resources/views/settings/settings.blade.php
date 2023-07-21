<x-app-layout>
    <div class="lg:py-8 md:py-8 sm:py-5 lt:py-5 lg:mt-16 xl:mt-16 md:mt-8 sm:mt-0 lt:mt-0 p-2">
        <div class="max-w-7xl mx-auto xl:mb-40 lg:mb-40 md:mb-8 sm:mb-3 lt:mb-3">
            <div class="w-4/5 text-white">
                <h2 class="uppercase xl:text-6xl lg:text-6xl md:text-4xl sm:text-2xl lt:text-2xl">
                    {{ __('Settings') }}
                </h2>
            </div>
        </div>
        <div class="max-w-7xl mx-auto pt-2 xl:mb-10 lg:mb-10 md:mb-8 sm:mb-3 lt:mb-3">
            <div class="justify-start pt-14 lg:flex-row md:flex-row sm:flex-col lt:flex-col border-b-2">
                <div class="tab-wrapper pb-10" x-data="{ activeTab:  0 }">
                    <div class="flex">
                        <label
                            @click="activeTab = 0"
                            class="tab-control p-3 pl-0 pr-5 cursor-pointer"
                            :class="{ 'active': activeTab === 0 }"
                        >Settings</label>
                        <label
                            @click="activeTab = 1"
                            class="tab-control p-3 pl-0 pr-5 cursor-pointer"
                            :class="{ 'active': activeTab === 1 }"
                        >Users</label>
                        <label
                            @click="activeTab = 2"
                            class="tab-control p-3 pl-0 cursor-pointer"
                            :class="{ 'active': activeTab === 2 }"
                        >Messages</label>
                        <label
                            @click="activeTab = 3"
                            class="tab-control p-3 pl-0 cursor-pointer"
                            :class="{ 'active': activeTab === 3 }"
                        >Social</label>
                    </div>

                    <div class="tab-panel mt-10" :class="{ 'active': activeTab === 0 }" x-show.transition.in.opacity.duration.600="activeTab === 0">

                        <div class="w-full">
                            <form method="POST" action="{{ route('settingsupdate') }}">
                                @csrf

                                <div class="mt-4">
                                    <x-input-label for="admin_email" :value="__('Admin Email')" />
                                    <x-text-area id="admin_email" class="mt-1 w-full" type="text" name="admin_email" required>{{ $settings->admin_email }}</x-text-area>
                                    <x-input-error :messages="$errors->get('admin_email')" class="mt-2" />
                                </div>

                                <div class="flex items-center justify-start mt-4">
                                    <x-primary-button class="">
                                        {{ __('Save') }}
                                    </x-primary-button>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="tab-panel  mt-10" :class="{ 'active': activeTab === 1 }" x-show.transition.in.opacity.duration.600="activeTab === 1">

                        <div class="p-2 border border-t-red-100 rounded inline-block hover:bg-gray-100 mb-8">
                            <a href="{{ route('usercreate') }}" class="inline-block">Add User</a>
                        </div>
                        <div class="flex flex-row p-2">
                        @if($users->count() > 0)
                            @php($counter = 1)
                                <table cellspacing="0" cellpadding="4">
                                    <tbody>
                                    @foreach($users as $user)
                                    @php($counter++)
                                            <tr>
                                                <td >
                                                    {{ $user->name }}<br>
                                                    {{ $user->email }}
                                                </td>
                                                <td class="pl-5">
                                                    <a href="{{ route('useredit', ['id' => $user->id]) }}">
                                                        <svg version="1.1" id="Capa" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                             width="20px" height="20px" viewBox="0 0 386.375 386.375" style="enable-background:new 0 0 386.375 386.375;"
                                                             xml:space="preserve" class="fill-cyan-600">
                                                        <g>
                                                            <path d="M21.05,286.875l76.5,76.5l-1.9,3.8l-95.6,19.2l19.1-95.6L21.05,286.875z M34.65,272.775l77.1,77.1l216.4-216.399
                                                                l-77.101-77.1L34.65,272.775z M374.85,34.375l-23-22.9c-15.3-15.3-38.199-15.3-53.5,0l-32.5,32.5l76.5,76.5l32.5-32.5
                                                                C390.15,72.675,390.15,47.775,374.85,34.375z"/>
                                                        </g>
                                                        </svg>
                                                    </a>
                                                </td>
                                                <td class="pl-5">
                                                    <x-link-modal x-data="" x-on:click="$dispatch('open-modal', 'confirm-user-deletion-{{$counter}}')">
                                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                             width="20px" height="20px" viewBox="0 0 612.043 612.043" style="enable-background:new 0 0 612.043 612.043;"
                                                             xml:space="preserve" class="fill-red-400 mt-2">
                                                        <g>
                                                            <g id="cross">
                                                                <g>
                                                                    <path d="M397.503,306.011l195.577-195.577c25.27-25.269,25.27-66.213,0-91.482c-25.269-25.269-66.213-25.269-91.481,0
                                                                        L306.022,214.551L110.445,18.974c-25.269-25.269-66.213-25.269-91.482,0s-25.269,66.213,0,91.482L214.54,306.033L18.963,501.61
                                                                        c-25.269,25.269-25.269,66.213,0,91.481c25.269,25.27,66.213,25.27,91.482,0l195.577-195.576l195.577,195.576
                                                                        c25.269,25.27,66.213,25.27,91.481,0c25.27-25.269,25.27-66.213,0-91.481L397.503,306.011z"/>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        </svg>
                                                    </x-link-modal>
                                                    <x-post-modal name="confirm-user-deletion-{{$counter}}">
                                                        <form method="POST" action="{{ route('userdelete', ['id' => $user->id]) }}" class="p-2" >
                                                            @csrf
                                                            <h2 class="text-lg font-medium text-gray-900">
                                                                {{ __('Are you sure you want to delete user ').$user->name.'?' }}
                                                            </h2>

                                                            <div class="mt-6 flex justify-end">
                                                                <x-secondary-button x-on:click.prevent="$dispatch('close', 'confirm-user-deletion-{{$counter}}')">
                                                                    {{ __('Cancel') }}
                                                                </x-secondary-button>

                                                                <x-danger-button class="ml-3" >
                                                                    {{ __('Delete') }}
                                                                </x-danger-button>
                                                            </div>
                                                        </form>
                                                    </x-post-modal>
                                                </td>
                                            </tr>
                                @endforeach
                                    </tbody>
                                </table>
                        @endif
                        </div>
                    </div>
                    <div class="tab-panel  mt-10" :class="{ 'active': activeTab === 2 }" x-show.transition.in.opacity.duration.600="activeTab === 2">
                        @if($emails->count() > 0)
                            @php($messageCounter = 1)


                                    @foreach($emails as $email)
                                        @php($messageCounter++)

                            <div class="flex flex-row">
                                <div class="flex flex-col w-4/5 ">
                                    <div class="block p-2">{{$email->name}}</div>
                                    <div class="block p-2">{{$email->email}}</div>
                                    <div class="block p-2">{{$email->message}}</div>
                                </div>
                                <div class="p-2 w-1/5">
                                    <x-link-modal x-data="" x-on:click="$dispatch('open-modal', 'confirm-message-deletion-{{$messageCounter}}')">
                                        <svg version="1.1" id="kapa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                             width="20px" height="20px" viewBox="0 0 612.043 612.043" style="enable-background:new 0 0 612.043 612.043;"
                                             xml:space="preserve" class="fill-red-400 mt-2">
                                                        <g>
                                                            <g id="cross">
                                                                <g>
                                                                    <path d="M397.503,306.011l195.577-195.577c25.27-25.269,25.27-66.213,0-91.482c-25.269-25.269-66.213-25.269-91.481,0
                                                                        L306.022,214.551L110.445,18.974c-25.269-25.269-66.213-25.269-91.482,0s-25.269,66.213,0,91.482L214.54,306.033L18.963,501.61
                                                                        c-25.269,25.269-25.269,66.213,0,91.481c25.269,25.27,66.213,25.27,91.482,0l195.577-195.576l195.577,195.576
                                                                        c25.269,25.27,66.213,25.27,91.481,0c25.27-25.269,25.27-66.213,0-91.481L397.503,306.011z"/>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        </svg>
                                    </x-link-modal>
                                    <x-post-modal name="confirm-message-deletion-{{$messageCounter}}">
                                        <form method="POST" action="{{ route('contactdelete', ['id' => $email->id]) }}" class="p-2" >
                                            @csrf
                                            <h2 class="text-lg font-medium text-gray-900">
                                                {{ __('Are you sure you want to delete message ').$email->id }}
                                            </h2>

                                            <div class="mt-6 flex justify-end">
                                                <x-secondary-button x-on:click.prevent="$dispatch('close', 'confirm-message-deletion-{{$messageCounter}}')">
                                                    {{ __('Cancel') }}
                                                </x-secondary-button>

                                                <x-danger-button class="ml-3" >
                                                    {{ __('Delete') }}
                                                </x-danger-button>
                                            </div>
                                        </form>
                                    </x-post-modal>
                                </div>
                            </div>


                                    @endforeach
                        @endif
                    </div>
                    <div class="tab-panel  mt-10" :class="{ 'active': activeTab === 3 }" x-show.transition.in.opacity.duration.600="activeTab === 3">
                        <p>Social</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
