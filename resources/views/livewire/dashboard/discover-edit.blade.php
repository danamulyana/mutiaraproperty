@push('style')
    <style>
        .w_auto{
            width: auto !important;
        }
    </style>
@endpush

<div>
    <form wire:submit.prevent="update" method="post" enctype="multipart/form-data">
        @csrf
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Update Discover
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0" wire:ignore>
                <button class="btn btn-primary shadow-md flex items-center" aria-expanded="false" type="submit"> Update <i class="w-4 h-4 ml-2" data-feather="save"></i> </button>
            </div>
        </div>
        <div class="intro-y grid grid-cols-12 gap-5 mt-5">
            <!-- BEGIN: Post Content -->
            <div class="intro-y col-span-12 lg:col-span-8">
                <div class=" intro-y overflow-hidden box ">
                    <div class="post__content tab-content">
                        <div class=" w_auto p-5 active">
                            <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5">
                                <div class="font-medium flex items-center border-b border-gray-200 dark:border-dark-5 pb-5"> 
                                    Discovers
                                </div>
                                <div class="mt-3"> 
                                    <label for="discover" class="form-label">title Discover</label> 
                                    <input id="discover" type="text" class="form-control" placeholder="discover" wire:model="discover"> 
                                    <div class="form-help">Maximum 200 characters</div>
                                    <x-jet-input-error for="discover" class="mt-2" />
                                </div>
                                <div class="mt-3"> 
                                    <label for="title" class="form-label">title</label> 
                                    <input id="title" type="text" class="form-control" placeholder="title" wire:model="title"> 
                                    <div class="form-help">Maximum 200 characters</div>
                                    <x-jet-input-error for="title" class="mt-2" />
                                </div>
                                <div class="mt-3"> 
                                    <label for="subtitle" class="form-label">subtitle</label> 
                                    <input id="subtitle" type="text" class="form-control" placeholder="subtitle" wire:model="subtitle"> 
                                    <div class="form-help">Maximum 200 characters</div>
                                    <x-jet-input-error for="subtitle" class="mt-2" />
                                </div>
                                <div class="mt-3"> 
                                    <label for="title_list" class="form-label">title list</label> 
                                    <input id="title_list" type="text" class="form-control" placeholder="title list" wire:model="title_list"> 
                                    <div class="form-help">Maximum 200 characters</div>
                                    <x-jet-input-error for="title_list" class="mt-2" />
                                </div>
                                <div class="mt-3"> 
                                    <label for="subtitle_list" class="form-label">subtitle list</label> 
                                    <input id="subtitle_list" type="text" class="form-control" placeholder="subtitle list" wire:model="subtitle_list"> 
                                    <div class="form-help">Maximum 200 characters</div>
                                    <x-jet-input-error for="subtitle_list" class="mt-2" />
                                </div>
                                <div class="mt-5">
                                    <div class="w-full flex justify-center border-t border-gray-200 dark:border-dark-5 mt-2"> 
                                        <div class="bg-white dark:bg-dark-3 px-5 -mt-3 text-gray-600"> Video or link youtube </div> 
                                    </div> 
                                </div>
                                <div class="mt-3">
                                    <label class="form-label">Cover video</label>
                                    @if ($video)
                                    <div class="border-2 border-dashed shadow-sm border-gray-200 dark:border-dark-5 rounded-md p-5">
                                        <div class="relative image-fit cursor-pointer">
                                            <video class="rounded" controls>
                                                <source src="{{ asset('videos/'.$video) }}" type="video/mp4">
                                            </video>
                                        </div>
                                        <div class="mx-auto cursor-pointer relative mt-5">
                                            <button type="button" class="btn btn-primary w-full" wire:click="deleteimage('video')"> Delete Cover & Change Cover</button>
                                        </div>
                                    </div>
                                    @else
                                    <x-input.filepond wire:model="new_video" />
                                    @endif
                                    <div class="form-help">video Size 50Mb </div>
                                    <x-jet-input-error for="video" class="mt-2" />
                                </div>
                                <div class="mt-3"> 
                                    <label for="video_link" class="form-label">video link</label> 
                                    <input id="video_link" type="text" class="form-control" placeholder="video_link" wire:model="video_link"> 
                                    <div class="form-help">NOTE : jika anda mengupload video maka tidak usah mengisi video link dan sebaliknya</div>
                                    <x-jet-input-error for="video_link" class="mt-2" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Post Content -->
            <!-- BEGIN: Post Info -->
            <div class="col-span-12 lg:col-span-4">
                <div class="intro-y box p-5">
                    <div>
                        <label class="form-label">diubah oleh</label>
                        <div class="btn w-full btn-outline-secondary dark:bg-dark-2 dark:border-dark-2 flex items-center justify-start" role="button" aria-expanded="false">
                            <div class="w-6 h-6 image-fit mr-3">
                                <img class="rounded" alt="" src="/dist/images/profile-11.jpg">
                            </div>
                            <div class="truncate">{{ Auth::user()->name . ' ' .Auth::user()->tag }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Post Info -->
        </div>
    </form>
</div>