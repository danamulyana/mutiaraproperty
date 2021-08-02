<div>
    <h2 class="intro-y text-lg font-medium mt-10">
        Data List Discover
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('discover.add') }}" class="btn btn-primary shadow-md mr-2">Add New Discover</a>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">ID</th>
                        <th class="text-center whitespace-nowrap">TITLE</th>
                        <th class="text-center whitespace-nowrap">SUBTITLE</th>
                        <th class="text-center whitespace-nowrap">VIDEO</th>
                        <th class="text-center whitespace-nowrap">TITLE LIST</th>
                        <th class="text-center whitespace-nowrap">SUBTITLE LIST</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($discovers as $discover)
                    <tr class="intro-x" wire:key="{{ $discover->id }}">
                        <td class="px-2 py-4 whitespace-nowrap">
                            {{ $discover->id }}
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap text-center">
                            {{ Str::limit($discover->title , 20, '...')}}
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap text-center">
                            {{ Str::limit($discover->subtitle , 20, '...')}}
                        </td>
                        <td class="w-20">
                            <div class="flex">
                                @if ($discover->video)
                                <video class="rounded">
                                    <source src="{{ asset('videos/'.$discover->video) }}" type="video/mp4">
                                </video>
                                @else        
                                {{ Str::limit($discover->video_link  , 20, '...')}}
                                @endif
                            </div>
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap text-center">
                            {{ Str::limit($discover->title_list  , 20, '...')}}
                            
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap text-center">
                            {{ Str::limit($discover->subtitle_list  , 20, '...')}}
                        </td>
                        <td class="table-report__action w-40">
                            <div class="flex justify-center items-center" >
                                <a class="flex items-center mr-3" href="{{ route('discover.edit',['discover_id'=>$discover->id]) }}"> 
                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit 
                                </a>
                                <a class="flex items-center text-theme-6 cursor-pointer" wire:click="$emit('deleteTriger',{{$discover->id}})" id_discover="{{$discover->id}}" > 
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
        {{$discovers->links('pagination-links-dashboard')}}
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