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
                Edit Promo
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
                                    Promos
                                </div>
                                <div class="mt-3">
                                    <label class="form-label">Baner Image</label> 
                                    <div class="border-2 border-dashed shadow-sm border-gray-200 dark:border-dark-5 rounded-md p-5 mt-3">
                                        <div class="h-40 relative image-fit cursor-pointer mx-auto">
                                            @if ($new_baner)
                                            <img class="rounded-md" alt="" src="{{ $new_baner->temporaryUrl() }}">
                                            @else 
                                            <img class="rounded-md" alt="" src="{{ asset('images/promos/'.$baner) }}">
                                            @endif
                                        </div>
                                        <div class="mx-auto cursor-pointer relative mt-5">
                                            <x-input.filepond wire:model="new_baner" />
                                        </div>
                                        <x-jet-input-error for="new_baner" class="mt-2" />
                                </div>
                                <div class="mt-3"> 
                                    <label for="link" class="form-label">Link Promo</label> 
                                    <input id="link" type="text" class="form-control" placeholder="Link Promo" wire:model="link"> 
                                    <div class="form-help">Maximum 200 characters</div>
                                    <x-jet-input-error for="link" class="mt-2" />
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