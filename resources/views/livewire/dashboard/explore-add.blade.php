@push('style')
    <style>
        .w_auto{
            width: auto !important;
        }
    </style>
@endpush

<div>
    <form wire:submit.prevent="add" method="post" enctype="multipart/form-data">
        @csrf
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Add Explore
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0" wire:ignore>
                <button class="btn btn-primary shadow-md flex items-center" aria-expanded="false" type="submit"> Simpan <i class="w-4 h-4 ml-2" data-feather="save"></i> </button>
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
                                    Explores
                                </div>
                                <div class="mt-3"> 
                                    <label for="explore_title" class="form-label">title explore</label> 
                                    <input id="explore_title" type="text" class="form-control" placeholder="explore" wire:model="explore_title"> 
                                    <div class="form-help">Maximum 200 characters</div>
                                    <x-jet-input-error for="explore_title" class="mt-2" />
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
                                
                                <div class="mt-5">
                                    <div class="w-full flex justify-center border-t border-gray-200 dark:border-dark-5 mt-2"> 
                                        <div class="bg-white dark:bg-dark-3 px-5 -mt-3 text-gray-600"> Video or link youtube </div> 
                                    </div> 
                                </div>
                                <div class="mt-3">
                                    <label class="form-label">Cover video</label> 
                                    <x-input.filepond wire:model="video" />
                                    <div class="form-help">video Size 50Mb </div>
                                    <x-jet-input-error for="video" class="mt-2" />
                                </div>
                                <div class="mt-3"> 
                                    <label for="video_link" class="form-label">video link</label> 
                                    <input id="video_link" type="text" class="form-control" placeholder="video_link" wire:model="video_link"> 
                                    <div class="form-help">NOTE : jika anda mengupload video maka tidak usah mengisi video link dan sebaliknya</div>
                                    <x-jet-input-error for="video_link" class="mt-2" />
                                </div>

                                <div class="mt-8">
                                    <div class="w-full flex justify-center border-t border-gray-200 dark:border-dark-5 mt-2"> 
                                        <div class="bg-white dark:bg-dark-3 px-5 -mt-3 text-gray-600"> Banner </div> 
                                    </div> 
                                </div>
                                <div class="mt-3">
                                    <label for="banner_left" class="form-label">Banner Left</label>
                                    <div class="border-2 border-dashed shadow-sm border-gray-200 dark:border-dark-5 rounded-md p-5 mt-3">
                                        <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                            @if ($banner_left)
                                            <img class="rounded-md" alt="" src="{{ $banner_left->temporaryUrl() }}">
                                            @endif
                                        </div>
                                        <div class="mx-auto cursor-pointer relative mt-5">
                                            <button type="button" class="btn btn-primary w-full">Add Banner Left</button>
                                            <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0" wire:model="banner_left">
                                        </div>
                                        <div class="form-help">banner Left Size 1000px X 400px</div>
                                        <x-jet-input-error for="banner_left" class="mt-2" />
                                    </div>
                                </div>
                                <div class="mt-3"> 
                                    <label for="banner_left_link" class="form-label">Banner Left Link</label> 
                                    <input id="banner_left_link" type="text" class="form-control" placeholder="Banner Left Link" wire:model="banner_left_link"> 
                                    <div class="form-help">Maximum 200 characters</div>
                                    <x-jet-input-error for="banner_left_link" class="mt-2" />
                                </div>
                                <div class="mt-3">
                                    <label for="site-logo" class="form-label">Banner Right</label>
                                    <div class="border-2 border-dashed shadow-sm border-gray-200 dark:border-dark-5 rounded-md p-5 mt-3">
                                        <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                            @if ($banner_right)
                                            <img class="rounded-md" alt="" src="{{ $banner_right->temporaryUrl() }}">
                                            @endif
                                        </div>
                                        <div class="mx-auto cursor-pointer relative mt-5">
                                            <button type="button" class="btn btn-primary w-full">Add Banner Right</button>
                                            <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0" wire:model="banner_right">
                                        </div>
                                        <div class="form-help">banner Right Size 1000px X 400px</div>
                                        <x-jet-input-error for="banner_right" class="mt-2" />
                                    </div>
                                </div>
                                <div class="mt-3"> 
                                    <label for="banner_right_link" class="form-label">Banner right Link</label> 
                                    <input id="banner_right_link" type="text" class="form-control" placeholder="Banner right Link" wire:model="banner_right_link"> 
                                    <div class="form-help">Maximum 200 characters</div>
                                    <x-jet-input-error for="banner_right_link" class="mt-2" />
                                </div>

                                <div class="mt-8"> 
                                    <label for="accord_title" class="form-label">Accordion Title</label> 
                                    <input id="accord_title" type="text" class="form-control" placeholder="Accordion Title" wire:model="accord_title"> 
                                    <div class="form-help">Maximum 200 characters</div>
                                    <x-jet-input-error for="accord_title" class="mt-2" />
                                </div>
                                <div class="mt-3"> 
                                    <label for="accord_subtitle" class="form-label">Accordion Subitle</label> 
                                    <input id="accord_subtitle" type="text" class="form-control" placeholder="Accordion Subitle" wire:model="accord_subtitle"> 
                                    <div class="form-help">NOTE : Optional</div>
                                    <x-jet-input-error for="accord_subtitle" class="mt-2" />
                                </div>

                                <div class="mt-8">
                                    <div class="w-full flex justify-center border-t border-gray-200 dark:border-dark-5 mt-2"> 
                                        <div class="bg-white dark:bg-dark-3 px-5 -mt-3 text-gray-600"> OPTIONALS </div> 
                                    </div> 
                                </div>

                                <div class="mt-8"> 
                                    <label for="denah_title" class="form-label">Denah Title</label> 
                                    <input id="denah_title" type="text" class="form-control" placeholder="Denah Title" wire:model="denah_title"> 
                                    <div class="form-help">Maximum 200 characters</div>
                                    <x-jet-input-error for="denah_title" class="mt-2" />
                                </div>
                                <div class="mt-3"> 
                                    <label for="denah_subtitle" class="form-label">Denah Subitle</label> 
                                    <input id="denah_subtitle" type="text" class="form-control" placeholder="Denah Subitle" wire:model="denah_subtitle"> 
                                    <div class="form-help">NOTE : Optional</div>
                                    <x-jet-input-error for="denah_subtitle" class="mt-2" />
                                </div>

                                <div class="mt-8">
                                    <div class="w-full flex justify-center border-t border-gray-200 dark:border-dark-5 mt-2"> 
                                        <div class="bg-white dark:bg-dark-3 px-5 -mt-3 text-gray-600"> OPTIONAL IMAGE OR MAPS </div> 
                                    </div> 
                                </div>

                                <div class="mt-3">
                                    <label for="denah_image" class="form-label">Denah Image</label>
                                    <div class="border-2 border-dashed shadow-sm border-gray-200 dark:border-dark-5 rounded-md p-5 mt-3">
                                        <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                            @if ($denah_image)
                                            <img class="rounded-md" alt="" src="{{ $denah_image->temporaryUrl() }}">
                                            @endif
                                        </div>
                                        <div class="mx-auto cursor-pointer relative mt-5">
                                            <button type="button" class="btn btn-primary w-full">Add Denah Image</button>
                                            <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0" wire:model="denah_image">
                                        </div>
                                        <x-jet-input-error for="denah_image" class="mt-2" />
                                    </div>
                                </div>

                                <div class="mt-3"> 
                                    <label for="long" class="form-label">Longtitude</label> 
                                    <input id="long" type="text" class="form-control" placeholder="Longtitude" wire:model="long"> 
                                    <x-jet-input-error for="long" class="mt-2" />
                                </div>
                                <div class="mt-3"> 
                                    <label for="lat" class="form-label">Latitude</label> 
                                    <input id="lat" type="text" class="form-control" placeholder="Latitude" wire:model="lat"> 
                                    <x-jet-input-error for="lat" class="mt-2" />
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
                        <label class="form-label">dibuat oleh</label>
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