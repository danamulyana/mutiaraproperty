@push('style')
    <style>
        .w_auto{
            width: auto !important;
        }
    </style>
@endpush

<div>
    <form wire:submit.prevent="update" method="post" enctype="multipart/form-data">
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Update profile
            </h2>
        </div>
        <div class="intro-y grid grid-cols-12 gap-5 mt-5">    
            <!-- BEGIN: Post Info -->
            <div class="col-span-12 lg:col-span-4">
                <div class="intro-y box p-5">
                    <div class="relative flex items-center p-5">
                        <div class="w-12 h-12 image-fit">
                            <img alt="{{ Auth::user()->profile_photo_path }}" class="rounded-full" src="{{ asset('profile/'.Auth::user()->profile_photo_path) }}">
                        </div>
                        <div class="ml-4 mr-auto">
                            <div class="font-medium text-base">{{ Auth::user()->name }}</div>
                            <div class="text-gray-600">{{ $role }}</div>
                        </div>
                    </div>
                    <div class="p-5 border-t border-gray-200 dark:border-dark-5">
                        <a class="flex items-center text-theme-1 dark:text-theme-10 font-medium" href="{{ route('user.setting') }}"> <i data-feather="activity" class="w-4 h-4 mr-2"></i> Personal Information </a>
                        <a class="flex items-center mt-5" href="{{ route('user.updatepassword') }}"> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Change Password </a>
                    </div>
                </div>
            </div>
            <!-- END: Post Info -->
            <!-- BEGIN: Post Content -->
            <div class="intro-y col-span-12 lg:col-span-8">
                <div class=" intro-y overflow-hidden box ">
                    <div class="post__content tab-content">
                        <div id="hero" class=" w_auto p-5 active">
                            <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5">
                                <div class="font-medium flex items-center border-b border-gray-200 dark:border-dark-5 pb-5"> 
                                    Display Information
                                </div>
                                <div class=" pt-5 w-52 mx-auto xl:mr-0 xl:ml-6">
                                    <div class="border-2 border-dashed shadow-sm border-gray-200 dark:border-dark-5 rounded-md p-5">
                                        <div class="h-40 relative image-fit cursor-pointer">
                                            @if ($new_photo)
                                            <img class="rounded-md" alt="{{ Auth::user()->name }}" src="{{ $new_photo->temporaryUrl() }}">
                                            @else
                                            <img class="rounded-md" alt="{{ Auth::user()->name }}" src="{{ asset('profile/'.$photo) }}">
                                            @endif
                                        </div>
                                        <div class="mx-auto cursor-pointer relative mt-5">
                                            <button type="button" class="btn btn-primary w-full">Change Photo</button>
                                            <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0" wire:model="new_photo">
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <label for="name" class="form-label">Your Name</label>
                                    <input id="name" type="text" class="form-control" placeholder="Your Name" wire:model="name">
                                    <x-jet-input-error for="name" class="mt-2" />
                                </div>
                                <div class="mt-5">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" type="email" class="form-control" placeholder="Email" wire:model="email">
                                    <x-jet-input-error for="email" class="mt-2" />
                                </div>
                                <div class="mt-5">
                                    <label for="tag" class="form-label">tag</label>
                                    <input id="tag" type="text" class="form-control" placeholder="tag" wire:model="tag" disabled>
                                    <x-jet-input-error for="tag" class="mt-2" />
                                </div>
                                <div class="mt-5">
                                    <label for="role" class="form-label">Role</label>
                                    <input id="role" type="role" class="form-control" placeholder="Role" wire:model="role" disabled>
                                    <x-jet-input-error for="role" class="mt-2" />
                                </div>

                                <div class="mt-5">
                                    <button type="submit" class="btn btn-primary w-20 mt-3">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Post Content -->
        </div>
    </form>
</div>