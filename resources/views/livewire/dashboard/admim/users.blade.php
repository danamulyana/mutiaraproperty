<div>
    <h2 class="intro-y text-lg font-medium mt-10">
        Data List Users
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('admin.user.add') }}" class="btn btn-primary shadow-md mr-2">Add New User</a>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">ID</th>
                        <th class="text-center whitespace-nowrap">NAME</th>
                        <th class="text-center whitespace-nowrap">TAG</th>
                        <th class="text-center whitespace-nowrap">ROLE</th>
                        <th class="text-center whitespace-nowrap">EMAIL</th>
                        <th class="text-center whitespace-nowrap">PROFILE PICTURE</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="intro-x" wire:key="{{ $user->id }}">
                        <td class="px-2 py-4 whitespace-nowrap">
                            {{ $user->id }}
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap text-center">
                            {{ Str::limit($user->name , 20, '...')}}
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap text-center">
                            {{ $user->tag }}
                        </td>
                        
                        <td class="px-2 py-4 whitespace-nowrap text-center">
                            {{ $user->role_id }}
                            
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap text-center">
                            {{ $user->email }}
                            
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap text-center">
                            <div class="w-20">
                                <img src="{{ asset('profile/'.$user->profile_photo_path) }}" alt="">
                            </div>
                        </td>
                        <td class="table-report__action w-40">
                            <div class="flex justify-center items-center" >
                                @if (Auth::user()->id === $user->id)
                                <p>Your Accont</p>
                                @else 
                                <a class="flex items-center mr-3" href="{{ route('admin.user.edit',['user_id'=>$user->id]) }}"> 
                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit 
                                </a>
                                <a class="flex items-center text-theme-6 cursor-pointer" wire:click="$emit('deleteTriger',{{$user->id}})" id_user="{{$user->id}}" > 
                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete 
                                </a>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        {{$users->links('pagination-links-dashboard')}}
        <!-- END: Pagination -->
    </div>
</div>
@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function(){
            @this.on('deleteTriger', id => {
                Swal.fire({
                    title: 'Apa Kamu Yakin?',
                    text: "Jika kamu hapus maka tidak bisa dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        @this.call('deleteUser',id);
                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                    }
                });
            });
        })
    </script>
@endpush