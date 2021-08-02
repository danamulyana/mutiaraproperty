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
                Add Discover List
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
                                    Discover List
                                </div>
                                <div class="mt-3">
                                    {{-- <label for="">Status</label> --}}
                                    <div class="form-help">Note: select your Discover for Discover list</div>
                                    <select class="form-select w-full rounded mt-2 sm:mr-2" aria-label="perent-category" wire:model="discover_id">
                                        <option value="">Select Discover</option>
                                        @foreach ($discovers as $discover)
                                        <option value="{{ $discover->id }}">{{ $discover->slug }}</option>
                                        @endforeach
                                    </select>
                                    <x-jet-input-error for="discover_id" class="mt-2" />
                                </div>
                                <div class="mt-3"> 
                                    <label for="name" class="form-label">name</label> 
                                    <input id="name" type="text" class="form-control" placeholder="name" wire:model="name"> 
                                    <div class="form-help">Maximum 200 characters</div>
                                    <x-jet-input-error for="name" class="mt-2" />
                                </div>
                                <div class="mt-3">
                                    <label class="form-label">Cover Image</label> 
                                    <x-input.filepond wire:model="image" />
                                    {{-- <div class="form-help">Image Size  </div> --}}
                                    <x-jet-input-error for="image" class="mt-2" />
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