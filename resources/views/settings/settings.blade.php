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
            <div class="flex justify-start pt-14 lg:flex-row md:flex-row sm:flex-col lt:flex-col border-b-2">
                <div class="tab-wrapper" x-data="{ activeTab:  0 }">
                    <div class="flex">
                        <label
                            @click="activeTab = 0"
                            class="tab-control p-3 pl-0"
                            :class="{ 'active': activeTab === 0 }"
                        >Settings</label>
                        <label
                            @click="activeTab = 1"
                            class="tab-control p-3 pl-0"
                            :class="{ 'active': activeTab === 1 }"
                        >Users</label>
                        <label
                            @click="activeTab = 2"
                            class="tab-control p-3 pl-0"
                            :class="{ 'active': activeTab === 2 }"
                        >Messages</label>
                    </div>

                    <div class="tab-panel" :class="{ 'active': activeTab === 0 }" x-show.transition.in.opacity.duration.600="activeTab === 0">
                        <form method="POST" action="{{ route('settingsupdate') }}">
                            @csrf

                              <div class="mt-4">
                                <x-input-label for="admin_email" :value="__('Admin Email')" />
                                <x-text-input id="admin_email" class="block mt-1 w-full" type="text" name="admin_email" :value="$settings->admin_email"/>
                                <x-input-error :messages="$errors->get('admin_email')" class="mt-2" />
                            </div>


                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button class="ml-4">
                                    {{ __('Save') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-panel" :class="{ 'active': activeTab === 1 }" x-show.transition.in.opacity.duration.600="activeTab === 1">
                        @if($users->count() > 0)
                            @foreach($users as $user)
                                <div class="flex flex-row p-2 ">
                                    <table cellspacing="0" cellpadding="4">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <x-link-modal x-data="" x-on:click="$dispatch('open-modal', 'confirm-user-edit')">
                                                    {{ $user->name }}
                                                </x-link-modal>
                                                <x-post-modal name="confirm-user-edit">
                                                    <form method="POST" action="{{ route('userupdate', ['id' => $user->id]) }}" class="p-2" >
                                                        @csrf


                                                        <div class="mt-6 flex justify-end">
                                                            <x-secondary-button x-on:click.prevent="$dispatch('close', 'confirm-user-edit')">
                                                                {{ __('Cancel') }}
                                                            </x-secondary-button>

                                                            <x-danger-button class="ml-3" >
                                                                {{ __('Update') }}
                                                            </x-danger-button>
                                                        </div>
                                                    </form>
                                                </x-post-modal>
                                            </td>
                                            <td>
                                                <x-link-modal x-data="" x-on:click="$dispatch('open-modal', 'confirm-user-deletion')">
                                                    delete
                                                </x-link-modal>
                                                <x-post-modal name="confirm-user-deletion">
                                                    <form method="POST" action="{{ route('userdelete', ['id' => $user->id]) }}" class="p-2" >
                                                        @csrf
                                                        <h2 class="text-lg font-medium text-gray-900">
                                                            {{ __('Are you sure you want to delete this user?') }}
                                                        </h2>

                                                        <div class="mt-6 flex justify-end">
                                                            <x-secondary-button x-on:click.prevent="$dispatch('close', 'confirm-user-deletion')">
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

                                        </tbody>
                                    </table>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="tab-panel" :class="{ 'active': activeTab === 2 }" x-show.transition.in.opacity.duration.600="activeTab === 2">
                        <p>Messages</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
