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
                Edit Home Menu
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
                        <div id="hero" class=" w_auto p-5 active">
                            <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5">
                                <div class="font-medium flex items-center border-b border-gray-200 dark:border-dark-5 pb-5"> 
                                    Home Edit 
                                </div>
                                <div class="mt-3"> 
                                    <label for="main-title" class="form-label">Title</label> 
                                    <input id="main-title" type="text" class="form-control" placeholder="Title" wire:model="main_title"> 
                                    <x-jet-input-error for="main_title" class="mt-2" />
                                </div>
                                <div class="mt-3"> 
                                    <label for="main-subtitle" class="form-label">Subtitle</label> 
                                    <input id="main-subtitle" type="text" class="form-control" placeholder="Subtitle" wire:model="main_subtitle">
                                    <div class="form-help">subtitle opsional sesuai kebutuhan tidak di wajibkan</div>
                                    <x-jet-input-error for="main_subtitle" class="mt-2" />
                                </div>
                                <div class="mt-4">
                                    <div class="w-full flex justify-center border-t border-gray-200 dark:border-dark-5 mt-2"> 
                                        <div class="bg-white dark:bg-dark-3 px-5 -mt-3 text-gray-600"> Video Hero </div> 
                                    </div> 
                                    <div class="mt-3"> 
                                        <label>Link Youtube or Upload Video</label>
                                        <div class="mt-2">
                                            <div class="form-check"> 
                                                <input id="ytorvideo" class="form-check-switch" type="checkbox" > 
                                                <label class="form-check-label" for="ytorvideo">Youtube link or video uploded</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 hidden" id="video-form-section"> 
                                        <label for="link-video" class="form-label">Youtube Link</label> 
                                        <input id="link-video" type="text" class="form-control" placeholder="Youtube Link" wire:model="main_video_link">
                                        <x-jet-input-error for="main_video_link" class="mt-2" />
                                        <div class="form-help">Contoh youtube link yang benar : https://www.youtube.com/embed/y9j-BL5ocW8 </div>
                                    </div>
                                    <div class="mt-3 block" id="link-video-section">

                                        @if ($main_video)
                                        <div class="mx-auto cursor-pointer relative mt-5">
                                            <button type="button" class="btn btn-danger w-full" wire:click="deletevideo('main_video')">Delete Video</button>
                                        </div>
                                        @else 
                                        <x-input.filepond wire:model="new_main_video" />
                                        <x-jet-input-error for="new_main_video" class="mt-2" />
                                        @endif
                                        
                                        <div class="form-help">
                                            Jika anda mengupload video maka tidak usah mengupload link youtube
                                            dan sebaliknya.
                                        </div>
                                    </div>
                                </div>

                                <div class="w-full flex justify-center border-t border-gray-200 dark:border-dark-5 mt-10"> 
                                    <h4 class="bg-white dark:bg-dark-3 px-5 -mt-3 text-gray-600"> Section 1 Content </h4> 
                                </div>
                                <div class="mt-3"> 
                                    <label for="section-1-title" class="form-label">title</label> 
                                    <input id="section-1-title" type="text" class="form-control" placeholder="Title" wire:model="section1_title">
                                    <x-jet-input-error for="section1_title" class="mt-2" />
                                </div>
                                <div class="mt-3"> 
                                    <label for="section-1-subtitle" class="form-label">Subtitle</label> 
                                    <input id="section-1-subtitle" type="text" class="form-control" placeholder="Subtitle" wire:model="section1_subtitle">
                                    <x-jet-input-error for="section1_subtitle" class="mt-2" />
                                    <div class="form-help">subtitle opsional sesuai kebutuhan tidak di wajibkan</div>
                                </div>
                                <div class="mt-4">
                                    <div class="w-full flex justify-center border-t border-gray-200 dark:border-dark-5 mt-2"> 
                                        <div class="bg-white dark:bg-dark-3 px-5 -mt-3 text-gray-600"> Video section 1 </div> 
                                    </div> 
                                    <div class="mt-3"> 
                                        <label>Link Youtube or Upload Video</label>
                                        <div class="mt-2">
                                            <div class="form-check"> 
                                                <input id="section-1-toggle" class="form-check-switch" type="checkbox"> 
                                                <label class="form-check-label" for="section-1-toggle">Youtube link or video uploded</label> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 hidden" id="section-1-video-form-section"> 
                                        <label for="section-1-videoLink" class="form-label">Youtube Link</label> 
                                        <input id="section-1-videoLink" type="text" class="form-control" placeholder="Youtube Link" wire:model="section1_video_link">
                                        <x-jet-input-error for="section1_video_link" class="mt-2" />
                                        <div class="form-help">Contoh youtube link yang benar : https://www.youtube.com/embed/y9j-BL5ocW8</div>
                                    </div>
                                    <div class="mt-3 block" id="section-1-link-video-section">
                                        <div class="border-2 border-dashed shadow-sm border-gray-200 dark:border-dark-5 rounded-md p-5 mt-3">
                                            <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                                @if ($new_section1_video)
                                                <video class="rounded-md">
                                                    <source src="{{ $new_section1_video->temporaryUrl() }}" type="video/mp4">
                                                </video>
                                                @else
                                                <video class="rounded-md">
                                                    <source src="{{ asset('homes/'.$section1_video) }}" type="video/mp4">
                                                </video>
                                                @endif
                                            </div>
                                            <div class="mx-auto cursor-pointer relative mt-5">
                                                <button type="button" class="btn btn-primary w-full">Change Video</button>
                                                <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0" wire:model="new_section1_video">
                                            </div>
                                        </div>
                                        <x-jet-input-error for="new_section1_video" class="mt-2" />

                                        <div class="form-help">
                                            Jika anda mengupload video maka tidak usah mengupload link youtube
                                            dan sebaliknya.
                                        </div>
                                    </div>
                                </div>

                                <div class="w-full flex justify-center border-t border-gray-200 dark:border-dark-5 mt-10"> 
                                    <h4 class="bg-white dark:bg-dark-3 px-5 -mt-3 text-gray-600"> Slider Content </h4> 
                                </div>

                                <div class="mt-3"> 
                                    <label for="slider-1-title" class="form-label">title</label> 
                                    <input id="slider-1-title" type="text" class="form-control" placeholder="Title" wire:model="slider1_title"> 
                                </div>
                                <div class="mt-3"> 
                                    <label for="slider-1-subtitle" class="form-label">Subtitle</label> 
                                    <input id="slider-1-subtitle" type="text" class="form-control" placeholder="Subtitle" wire:model="slider1_subtitle">
                                    <div class="form-help">subtitle opsional sesuai kebutuhan tidak di wajibkan</div>
                                </div>
                                <div class="w-full flex justify-center border-t border-gray-200 dark:border-dark-5 mt-10"> 
                                    <h4 class="bg-white dark:bg-dark-3 px-5 -mt-3 text-gray-600"> Slider Content 2 (product slider)</h4> 
                                </div>
                                <div class="mt-3"> 
                                    <label for="slider-2-title" class="form-label">title</label> 
                                    <input id="slider-2-title" type="text" class="form-control" placeholder="Title" wire:model="slider2_title"> 
                                </div>
                                <div class="mt-3"> 
                                    <label for="slider-2-subtitle" class="form-label">Subtitle</label> 
                                    <input id="slider-2-subtitle" type="text" class="form-control" placeholder="Subtitle" wire:model="slider2_subtitle">
                                    <div class="form-help">subtitle opsional sesuai kebutuhan tidak di wajibkan</div>
                                </div>

                                <div class="w-full flex justify-center border-t border-gray-200 dark:border-dark-5 mt-10"> 
                                    <h4 class="bg-white dark:bg-dark-3 px-5 -mt-3 text-gray-600"> Section 2 Content (optional)</h4> 
                                </div>

                                <div class="mt-3"> 
                                    <label for="section-2-title" class="form-label">title</label> 
                                    <input id="section-2-title" type="text" class="form-control" placeholder="Title" wire:model="section2_title"> 
                                </div>
                                <div class="mt-3"> 
                                    <label for="section-2-subtitle" class="form-label">Subtitle</label> 
                                    <input id="section-2-subtitle" type="text" class="form-control" placeholder="Subtitle" wire:model="section2_subtitle">
                                    <div class="form-help">subtitle opsional sesuai kebutuhan tidak di wajibkan</div>
                                </div>
                                <div class="mt-4">
                                    <div class="w-full flex justify-center border-t border-gray-200 dark:border-dark-5 mt-2"> 
                                        <div class="bg-white dark:bg-dark-3 px-5 -mt-3 text-gray-600"> Video section 2 </div> 
                                    </div> 
                                    <div class="mt-3"> <label>Link Youtube or Upload Video</label>
                                        <div class="mt-2">
                                            <div class="form-check"> 
                                                <input id="section-2-toggle" class="form-check-switch" type="checkbox"> 
                                                <label class="form-check-label" for="section-2-toggle">Youtube link or video uploded</label> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 hidden" id="section-2-video-form-section"> 
                                        <label for="section-2-videoLink" class="form-label">Youtube Link</label> 
                                        <input id="section-2-videoLink" type="text" class="form-control" placeholder="Youtube Link" wire:model="section2_video_link">
                                        <div class="form-help">Contoh youtube link yang benar : https://www.youtube.com/embed/y9j-BL5ocW8</div>
                                    </div>
                                    <div class="mt-3 block" id="section-2-link-video-section">
                                        <div class="border-2 border-dashed shadow-sm border-gray-200 dark:border-dark-5 rounded-md p-5 mt-3">
                                            <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                                @if ($new_section2_video)
                                                <video class="rounded-md">
                                                    <source src="{{ $new_section2_video->temporaryUrl() }}" type="video/mp4">
                                                </video>
                                                @else
                                                <video class="rounded-md">
                                                    <source src="{{ asset('homes/'.$section2_video) }}" type="video/mp4">
                                                </video>
                                                @endif
                                            </div>
                                            <div class="mx-auto cursor-pointer relative mt-5">
                                                <button type="button" class="btn btn-primary w-full">Change Video</button>
                                                <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0" wire:model="new_section2_video">
                                            </div>
                                        </div>
 
                                        <div class="form-help">
                                            Jika anda mengupload video maka tidak usah mengupload link youtube
                                            dan sebaliknya.
                                        </div>
                                    </div>
                                </div>

                                <div class="w-full flex justify-center border-t border-gray-200 dark:border-dark-5 mt-10"> 
                                    <h4 class="bg-white dark:bg-dark-3 px-5 -mt-3 text-gray-600"> Newslatter Content </h4> 
                                </div>

                                <div class="mt-3"> 
                                    <label for="newslater-title" class="form-label">title</label> 
                                    <input id="newslater-title" type="text" class="form-control" placeholder="Title" wire:model="news_title"> 
                                </div>
                                <div class="mt-3"> 
                                    <label for="newslater-subtitle" class="form-label">Subtitle</label> 
                                    <input id="newslater-subtitle" type="text" class="form-control" placeholder="Subtitle" wire:model="news_subtitle">
                                    <div class="form-help">subtitle opsional sesuai kebutuhan tidak di wajibkan</div>
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
                        <label class="form-label">diupdate oleh</label>
                        <div class="btn w-full btn-outline-secondary dark:bg-dark-2 dark:border-dark-2 flex items-center justify-start" role="button" aria-expanded="false">
                            <div class="w-6 h-6 image-fit mr-3">
                                <img class="rounded" alt="" src="/dist/images/profile-11.jpg">
                            </div>
                            <div class="truncate">{{ Auth::user()->name . ' ' . Auth::user()->tag}}</div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="post-date" class="form-label">Terakhir di update oleh</label>
                        <div class="btn w-full btn-outline-secondary dark:bg-dark-2 dark:border-dark-2 flex items-center justify-start" role="button" aria-expanded="false">
                            <div class="truncate">{{ $updateBy }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Post Info -->
        </div>
    </form>
</div>

@push('scripts')
    <script>
        const videoToggle = document.getElementById('ytorvideo'),
              videosection = document.getElementById('video-form-section'),
              linksection = document.getElementById('link-video-section'),
              section1_videoToggle = document.getElementById('section-1-toggle'),
              section1_videosection = document.getElementById('section-1-video-form-section'),
              section1_linksection = document.getElementById('section-1-link-video-section'),
              section2_videoToggle = document.getElementById('section-2-toggle'),
              section2_videosection = document.getElementById('section-2-video-form-section'),
              section2_linksection = document.getElementById('section-2-link-video-section')

        videoToggle.addEventListener('click', (e) => {
            videosection.classList.toggle('block')
            videosection.classList.toggle('hidden')
            linksection.classList.toggle('block')
            linksection.classList.toggle('hidden')
        })
        section1_videoToggle.addEventListener('click', (e) => {
            section1_videosection.classList.toggle('block')
            section1_videosection.classList.toggle('hidden')
            section1_linksection.classList.toggle('block')
            section1_linksection.classList.toggle('hidden')
        })
        section2_videoToggle.addEventListener('click', (e) => {
            section2_videosection.classList.toggle('block')
            section2_videosection.classList.toggle('hidden')
            section2_linksection.classList.toggle('block')
            section2_linksection.classList.toggle('hidden')
        })
        
    </script>
@endpush