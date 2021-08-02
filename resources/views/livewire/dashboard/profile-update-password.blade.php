@push('style')
    <style>
        .w_auto{
            width: auto !important;
        }
    </style>
@endpush

<div>
    <form wire:submit.prevent="updateProfileInformation" method="post" enctype="multipart/form-data">
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
                        <a class="flex items-center " href="{{ route('user.setting') }}"> <i data-feather="activity" class="w-4 h-4 mr-2"></i> Personal Information </a>
                        <a class="flex items-center mt-5 text-theme-1 dark:text-theme-10 font-medium" href="{{ route('user.updatepassword') }}"> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Change Password </a>
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
                                <div class="mt-5">
                                    <label for="current_password" class="form-label">Current Password</label>
                                    <input id="current_password" type="password" class="form-control" placeholder="Current Password" wire:model="current_password">
                                    <x-jet-input-error for="current_password" class="mt-2" />
                                </div>
                                <div class="mt-5">
                                    <label for="password" class="form-label">New Password</label>
                                    <input id="password" type="password" class="form-control" placeholder="New Password" wire:model="password">
                                    <x-jet-input-error for="password" class="mt-2" />
                                </div>
                                <div class="mt-5">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input id="password_confirmation" type="password" class="form-control" placeholder="Confirm Password" wire:model="password_confirmation">
                                    <x-jet-input-error for="password_confirmation" class="mt-2" />
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