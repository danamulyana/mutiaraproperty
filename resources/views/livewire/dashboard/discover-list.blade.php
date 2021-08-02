<div>
    <h2 class="intro-y text-lg font-medium mt-10">
        Data List Discover List
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('discoverlist.add') }}" class="btn btn-primary shadow-md mr-2">Add New Discover</a>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">ID</th>
                        <th class="text-center whitespace-nowrap">IMAGE</th>
                        <th class="text-center whitespace-nowrap">NAME</th>
                        <th class="text-center whitespace-nowrap">DISCOVER ID</th>
                        <th class="text-center whitespace-nowrap">CREATED</th>
                        <th class="text-center whitespace-nowrap">UPDATED</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lists as $list)
                    <tr class="intro-x" wire:key="{{ $list->id }}">
                        <td class="px-2 py-4 whitespace-nowrap">
                            {{ $list->id }}
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap text-center">
                            <div class="flex">
                                <img alt="{{ $list->image }}" class="tooltip rounded" src="{{ asset('images/discover/'.$list->image) }}" title="{{ $list->name }}">
                            </div>
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap text-center">
                            {{ $list->name }}
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap text-center">
                            {{ $list->discover_id }}
                        </td> 
                        <td class="px-2 py-4 whitespace-nowrap text-center">
                            {{ $list->created_at->format('m/d/Y') }}
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap text-center">
                            {{ $list->updated_at->format('m/d/Y') }}
                        </td>
                        <td class="table-report__action w-40">
                            <div class="flex justify-center items-center" >
                                <a class="flex items-center mr-3" href="{{ route('discoverlist.edit',['discoverList_id'=>$list->id]) }}"> 
                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit 
                                </a>
                                <a class="flex items-center text-theme-6 cursor-pointer" wire:click="$emit('deleteTriger',{{$list->id}})" id_discover="{{$list->id}}" > 
                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete 
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        {{-- {{$discovers->links('pagination-links-dashboard')}} --}}
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
                        @this.call('deleteDiscover',id);
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