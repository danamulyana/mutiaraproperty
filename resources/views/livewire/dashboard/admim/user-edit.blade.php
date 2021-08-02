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
                Add User
            </h2>
        </div>
        <div class="intro-y grid grid-cols-12 gap-5 mt-5">
            <!-- BEGIN: Post Content -->
            <div class="intro-y col-span-12 lg:col-span-8">
                <div class=" intro-y overflow-hidden box ">
                    <div class="post__content tab-content">
                        <div class=" w_auto p-5 active">
                            <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5">
                                <div class="font-medium flex items-center border-b border-gray-200 dark:border-dark-5 pb-5"> 
                                    user data
                                </div>
                                
                                <div class="mt-3"> 
                                    <label for="name" class="form-label">Name</label> 
                                    <input id="name" type="text" class="form-control" placeholder="Name" wire:model="name" disabled> 
                                    <div class="form-help">Maximum 200 characters</div>
                                    <x-jet-input-error for="name" class="mt-2" />
                                </div>
                                <div class="mt-3"> 
                                    <label for="email" class="form-label">Email</label> 
                                    <input id="email" type="text" class="form-control" placeholder="Email" wire:model="email" disabled> 
                                    <x-jet-input-error for="email" class="mt-2" />
                                </div>

                                <div class="mt-3">
                                    <label class="form-label">Role</label> 
                                    <select class="form-select w-full rounded mt-2 sm:mr-2" aria-label="role" wire:model="role">
                                        <option value="">Please select a Role for user</option>
                                        @foreach ($roles as $r)
                                        <option value="{{ $r->id }}">{{ $r->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-jet-input-error for="role" class="mt-2" />
                                </div>
                                
                                <div class="mt-5" wire:ignore>
                                    <button class="btn btn-primary shadow-md flex items-center" aria-expanded="false" type="submit"> Simpan <i class="w-4 h-4 ml-2" data-feather="save"></i> </button>
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