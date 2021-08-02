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
                Add News
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
                                    Post
                                </div>

                                <div class="mt-3">
                                    <label class="form-label">Cover Image</label> 
                                    <x-input.filepond wire:model="cover_image" />
                                    <div class="form-help">Image Size 1200 x 630 </div>
                                    <x-jet-input-error for="cover_image" class="mt-2" />
                                </div>

                                <div class="mt-3"> 
                                    <label for="title" class="form-label">Title</label> 
                                    <input id="title" type="text" class="form-control" placeholder="title" wire:model="title"> 
                                    <div class="form-help">Maximum 200 characters</div>
                                    <x-jet-input-error for="title" class="mt-2" />
                                </div>
                               
                                <div class="mt-3">
                                    <label class="form-label">Categories</label> 
                                    <select class="form-select w-full rounded mt-2 sm:mr-2" aria-label="category" wire:model="category_id">
                                        <option value="">Please select a category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-jet-input-error for="category_id" class="mt-2" />
                                </div>

                                <div class="mt-3">
                                    <label class="form-label">Body</label> 
                                    <div class="mt-2" wire:ignore>
                                        <x-trix name="body" wire:model="body"></x-trix>
                                    </div>
                                    <x-jet-input-error for="body" class="mt-2" />
                                </div>

                                <div class="mt-3">
                                    <label class="form-label">Schadule Date</label> 
                                    <div class="relative mx-auto" wire:ignore.self> 
                                        {{-- <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 dark:bg-dark-1 dark:border-dark-4"> 
                                            <i data-feather="calendar" class="w-4 h-4"></i> 
                                        </div>  --}}
                                        <input  type="date" class=" pl-12 form-control" data-single-mode="true" wire:model="published_at">
                                    </div> 
                                    <x-jet-input-error for="published_at" class="mt-2" />
                                </div>

                                <div class="mt-3">
                                    <label class="form-label">meta description</label> 
                                    <div class="mt-2" wire:ignore>
                                        <x-trix name="meta_description" wire:model="meta_description"></x-trix>
                                    </div>
                                    <x-jet-input-error for="meta_description" class="mt-2" />
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