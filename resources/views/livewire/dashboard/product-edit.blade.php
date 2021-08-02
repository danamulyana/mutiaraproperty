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
                Edit Product
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
                                    Products
                                </div>
                                <div class="mt-3">
                                    <label class="form-label">Cover image</label> 
                                    <x-input.filepond wire:model="cover_image" />
                                    <div class="form-help">image Size 50Mb </div>
                                    <x-jet-input-error for="cover_image" class="mt-2" />
                                </div>
                                <div class="mt-3"> 
                                    <label for="name" class="form-label">Name</label> 
                                    <input id="name" type="text" class="form-control" placeholder="Name" wire:model="name"> 
                                    <div class="form-help">Maximum 200 characters</div>
                                    <x-jet-input-error for="name" class="mt-2" />
                                </div>
                                <div class="mt-3"> 
                                    <label for="type" class="form-label">Type</label> 
                                    <input id="type" type="text" class="form-control" placeholder="Type" wire:model="type"> 
                                    <div class="form-help">Maximum 30 characters</div>
                                    <x-jet-input-error for="type" class="mt-2" />
                                </div>
                                <div class="mt-3"> 
                                    <label for="ukuran_propety" class="form-label">Ukuran Propety</label> 
                                    <input id="ukuran_propety" type="text" class="form-control" placeholder="Ukuran Propety" wire:model="ukuran_propety"> 
                                    <div class="form-help">Maximum 30 characters</div>
                                    <x-jet-input-error for="ukuran_propety" class="mt-2" />
                                </div>
                                
                                <div class="mt-3">
                                    <label for="denah" class="form-label">Denah IMAGE</label>
                                    <div class="border-2 border-dashed shadow-sm border-gray-200 dark:border-dark-5 rounded-md p-5 mt-3">
                                        <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                            @if ($new_denah)
                                            <img class="rounded-md" alt="" src="{{ $new_denah->temporaryUrl() }}">
                                            @else 
                                            <img class="rounded-md" alt="" src="{{ asset('images/'.$denah) }}">
                                            @endif
                                        </div>
                                        <div class="mx-auto cursor-pointer relative mt-5">
                                            <button type="button" class="btn btn-primary w-full">Add Denah Image</button>
                                            <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0" wire:model="new_denah">
                                        </div>
                                        {{-- <div class="form-help">new_denah Image Size 1000px X 400px</div> --}}
                                        <x-jet-input-error for="new_denah" class="mt-2" />
                                    </div>
                                </div>

                                <div class="mt-3"> 
                                    <label for="harga" class="form-label">Harga Propety</label> 
                                    <input id="harga" type="text" class="form-control" placeholder="Harga Propety" wire:model="harga"> 
                                    <div class="form-help">NOTE: 12000 Bukan Rp.12.000</div>
                                    <x-jet-input-error for="harga" class="mt-2" />
                                </div>

                                <div class="mt-3">
                                    <label class="form-label">Explore</label> 
                                    <select class="form-select w-full rounded mt-2 sm:mr-2" aria-label="Explore" wire:model="explore_id">
                                        <option value="">Please select a Explore</option>
                                        @foreach ($explores as $explore)
                                        <option value="{{ $explore->id }}">{{ $explore->explore_title }}</option>
                                        @endforeach
                                    </select>
                                    <x-jet-input-error for="explore_id" class="mt-2" />
                                </div>

                                <div class="mt-3"> 
                                    <label for="nowa" class="form-label">No Whatsapp Admin</label> 
                                    <input id="nowa" type="tel" class="form-control" placeholder="No Whatsapp Admin" wire:model="nowa"> 
                                    <div class="form-help">mengunakan +62 contoh : +62853212 Bukan 0853212</div>
                                    <x-jet-input-error for="nowa" class="mt-2" />
                                </div>
                                <div class="mt-3"> 
                                    <label for="pesanwa" class="form-label">No Whatsapp Admin</label> 
                                    <textarea id="pesanwa" type="tel" class="form-control" placeholder="No Whatsapp Admin" wire:model="pesanwa"></textarea>
                                    <div class="form-help">Maxsimal 200 kata</div>
                                    <x-jet-input-error for="pesanwa" class="mt-2" />
                                </div>

                                <div class="mt-8">
                                    <div class="w-full flex justify-center border-t border-gray-200 dark:border-dark-5 mt-2"> 
                                        <div class="bg-white dark:bg-dark-3 px-5 -mt-3 text-gray-600"> OPTIONAL </div> 
                                    </div> 
                                </div>
                                
                                <div class="mt-3">
                                    <label for="denah2" class="form-label">Denah Image 2</label>
                                    <div class="border-2 border-dashed shadow-sm border-gray-200 dark:border-dark-5 rounded-md p-5 mt-3">
                                        <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                            @if ($new_denah2)
                                            <img class="rounded-md" alt="" src="{{ $new_denah2->temporaryUrl() }}">
                                            @else 
                                            <img class="rounded-md" alt="" src="{{ asset('images/'.$denah2) }}">
                                            @endif
                                        </div>
                                        <div class="mx-auto cursor-pointer relative mt-5">
                                            <button type="button" class="btn btn-primary w-full">Add Denah Image 2</button>
                                            <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0" wire:model="new_denah2">
                                        </div>
                                        <div class="form-help">NOTE : Denah Image 2 Optional</div>
                                        <x-jet-input-error for="new_denah2" class="mt-2" />
                                    </div>
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
                            <div class="truncate">{{ Auth::user()->name . ' ' .Auth::user()->tag }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Post Info -->
        </div>
    </form>
</div>