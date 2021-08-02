<div>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Settings Website
        </h2>
    </div>

    <div class="grid grid-cols-12 gap-6">
        
        <div class="col-span-12 lg:col-span-8 xxl:col-span-9">
            <form wire:submit.prevent="update" method="post" enctype="multipart/form-data">
                @csrf
                <!-- BEGIN: Display Information -->
                <div class="intro-y box lg:mt-5">
                    <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                            Display Information
                        </h2>
                    </div>
                    <div class="p-5">
                        <div class="flex flex-col-reverse xl:flex-row flex-col">
                            <div class="flex-1 mt-6 xl:mt-0">
                                <div class="grid grid-cols-12 gap-x-5">
                                    <div class="col-span-12 xxl:col-span-6 mt-3">
                                        <div>
                                            <label for="siteName" class="form-label">Site Name</label>
                                            <input id="siteName" type="text" class="form-control" placeholder="Site Name" wire:model="siteName">
                                            <x-jet-input-error for="siteName" class="mt-2" />
                                        </div>
                                        <div class="mt-3">
                                            <label for="site-logo" class="form-label">Logo</label>
                                            <div class="border-2 border-dashed shadow-sm border-gray-200 dark:border-dark-5 rounded-md p-5 mt-3">
                                                <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                                    @if ($new_logo)
                                                    <img class="rounded-md" alt="" src="{{ $new_logo->temporaryUrl() }}">
                                                    @else
                                                    <img class="rounded-md" alt="" src="{{ asset('utils/'. $logo) }}">
                                                    @endif
                                                </div>
                                                <div class="mx-auto cursor-pointer relative mt-5">
                                                    <button type="button" class="btn btn-primary w-full">Change Photo</button>
                                                    <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0" wire:model="new_logo">
                                                </div>
                                                <x-jet-input-error for="new_logo" class="mt-2" />
                                            </div>
                                        </div>
                                        {{-- <div class="mt-3">
                                            <label for="site-icon" class="form-label">Icon</label>
                                            <div class="border-2 border-dashed shadow-sm border-gray-200 dark:border-dark-5 rounded-md p-5 mt-3">
                                                <div class="h-40 relative cursor-pointer mx-auto">
                                                    @if ($new_icon)
                                                    <img class="rounded-md" alt="" src="{{ $new_icon->temporaryUrl() }}">
                                                    @else
                                                    <img class="rounded-md" alt="" src="{{ asset('utils/'. $icon) }}">
                                                    @endif
                                                </div>
                                                <div class="mx-auto cursor-pointer relative mt-5">
                                                    <button type="button" class="btn btn-primary w-full">Change Photo</button>
                                                    <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0" wire:model="new_icon">
                                                </div>
                                                <x-jet-input-error for="new_icon" class="mt-2" />
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="col-span-12 xxl:col-span-6 mt-3">
                                        <div class="mt-3">
                                            <label for="phone-number" class="form-label">Phone Number</label>
                                            <input id="phone-number" type="text" class="form-control" placeholder="Phone Number" wire:model="phone_number">
                                            <x-jet-input-error for="phone_number" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-span-12 mt-3">
                                        <div class="mt-3">
                                            <label for="Address" class="form-label">Address</label>
                                            <textarea id="Address" class="form-control" placeholder="Adress" wire:model="address"></textarea>
                                            <x-jet-input-error for="address" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-span-12 mt-3">
                                        <div class="mt-3">
                                            <label for="Email" class="form-label">Email</label>
                                            <input id="Email" class="form-control" placeholder="Email" type="email" wire:model="email">
                                            <x-jet-input-error for="email" class="mt-2" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="w-52 mx-auto xl:mr-0 xl:ml-6">
                                <div class="border-2 border-dashed shadow-sm border-gray-200 dark:border-dark-5 rounded-md p-5">
                                    <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                        <img class="rounded-md" alt="Rubick Tailwind HTML Admin Template" src="dist/images/profile-10.jpg">
                                        <div title="Remove this profile photo?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-theme-6 right-0 top-0 -mr-2 -mt-2"> <i data-feather="x" class="w-4 h-4"></i> </div>
                                    </div>
                                    <div class="mx-auto cursor-pointer relative mt-5">
                                        <button type="button" class="btn btn-primary w-full">Change Photo</button>
                                        <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0">
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <!-- END: Display Information -->
                <div class="intro-y box lg:mt-5">
                    <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                            Whatsapp Information
                        </h2>
                    </div>
                    <div class="p-5">
                        <div class="flex flex-col-reverse xl:flex-row flex-col">
                            <div class="flex-1 mt-6 xl:mt-0">
                                <div class="grid grid-cols-12 gap-x-5">
                                    <div class="col-span-12 xxl:col-span-6 mt-3">
                                        <div class="mt-3">
                                            <label for="whatsaap_phone" class="form-label">Whatsapp Number Phone</label>
                                            <input id="whatsaap_phone" type="text" class="form-control" placeholder="Whatsaap Number Phone" wire:model="whatsaap_phone">
                                            <div class="form-help">Note : masukan dengan kode negara contoh +628123.. bukan 08123..</div>
                                            <x-jet-input-error for="whatsaap_phone" class="mt-2" />
                                        </div>
                                        <div class="mt-3">
                                            <label for="whatsaap_message" class="form-label">Whatsapp Message</label>
                                            <input id="whatsaap_message" type="text" class="form-control" placeholder="Whatsapp Message" wire:model="whatsaap_message">
                                            <x-jet-input-error for="whatsaap_message" class="mt-2" />
                                        </div>
                                        <div class="mt-3">
                                            <label for="whatsaap_position" class="form-label">Whatsapp Icon Position</label>
                                            <div class="form-check">
                                                <label class="form-check-label mr-5" for="whatsaap_position">Left Icon</label>
                                                <input id="whatsaap_position" class=" mr-5 form-check-switch" type="checkbox" wire:model="whatsaap_position">
                                                <label class="form-check-label" for="whatsaap_position">Reight Icon</label>
                                            </div>
                                            <x-jet-input-error for="whatsaap_position" class="mt-2" />
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Display Information -->
                <!-- END: Display Information -->
                <div class="intro-y box lg:mt-5">
                    <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                            Social Account Information
                        </h2>
                    </div>
                    <div class="p-5">
                        <div class="flex flex-col-reverse xl:flex-row flex-col">
                            <div class="flex-1 mt-6 xl:mt-0">
                                <div class="grid grid-cols-12 gap-x-5">
                                    <div class="col-span-12 xxl:col-span-6 mt-3">
                                        <div class="mt-3">
                                            <label for="facebook-link" class="form-label">Facebook</label>
                                            <input id="facebook-link" type="text" class="form-control" placeholder="Facebook" wire:model="facebook_link">
                                            <x-jet-input-error for="facebook_link" class="mt-2" />
                                        </div>
                                        <div class="mt-3">
                                            <label for="instagram-link" class="form-label">Instagram</label>
                                            <input id="instagram-link" type="text" class="form-control" placeholder="Instagram" wire:model="instagram_link">
                                            <x-jet-input-error for="instagram_link" class="mt-2" />
                                        </div>
                                        <div class="mt-3">
                                            <label for="twitter-link" class="form-label">Twitter</label>
                                            <input id="twitter-link" type="text" class="form-control" placeholder="Twitter" wire:model="twitter_link">
                                            <x-jet-input-error for="twitter_link" class="mt-2" />
                                        </div>
                                        <div class="mt-3">
                                            <label for="Youtube-link" class="form-label">Youtube</label>
                                            <input id="Youtube-link" type="text" class="form-control" placeholder="Youtube" wire:model="Youtube_link">
                                            <x-jet-input-error for="Youtube_link" class="mt-2" />
                                        </div>
                                        <div class="mt-3">
                                            <label for="linked-link" class="form-label">Linked</label>
                                            <input id="linked-link" type="text" class="form-control" placeholder="Linked" wire:model="linked_link">
                                            <x-jet-input-error for="linked_link" class="mt-2" />
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <button type="submit" class="btn btn-primary w-20 mt-3">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Display Information -->
            </form>
        </div>
    </div>
</div>