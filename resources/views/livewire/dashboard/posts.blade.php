<div>
    <h2 class="intro-y text-lg font-medium mt-10">
        Data List News
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('post.add') }}" class="btn btn-primary shadow-md mr-2">Add new news</a>
            
            <div class="asc mr-3">
                <select class="form-select " wire:model="orderAsc">
                    <option value="1">ASC</option>
                    <option value="0">DESC</option>
                </select>
            </div>

            <div class="page mr-10">
                <select class="w-20 form-select box mt-3 sm:mt-0" wire:ignore wire:model="perPage">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="35">35</option>
                    <option value="50">50</option>
                </select>
            </div>

            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-gray-700 dark:text-gray-300">
                    <input type="text" class="form-control w-56 box pr-10 placeholder-theme-13" placeholder="Search..." wire:model="search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg> 
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">ID</th>
                        <th class="text-center whitespace-nowrap">TITLE</th>
                        <th class="text-center whitespace-nowrap">CATEGORY</th>
                        <th class="text-center whitespace-nowrap">FEATURED</th>
                        <th class="text-center whitespace-nowrap">CREATED DATE</th>
                        <th class="text-center whitespace-nowrap">UPDATED DATE</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr class="intro-x" wire:key="{{ $post->id }}">
                        <td class="px-2 py-4 whitespace-nowrap">
                            {{ $post->id }}
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap text-center">
                            {{ Str::limit($post->title, 40, '...') }}
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap text-center">
                            {{ $post->category->name }}
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap text-center">
                            FEATURED
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap text-center">
                            {{ $post->created_at->format('m/d/Y') }}
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap text-center">
                            {{ $post->updated_at->format('m/d/Y') }}
                        </td>
                        <td class="table-report__action w-40">
                            <div class="flex justify-center items-center" >
                                <a class="flex items-center mr-3" href="{{ route('post.edit',['post_id'=>$post->id]) }}"> 
                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit 
                                </a>
                                <a class="flex items-center text-theme-6 cursor-pointer" wire:click="$emit('deleteTriger',{{$post->id}})" id_post="{{$post->id}}" > 
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
        {{$posts->links('pagination-links-dashboard')}}
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
                        @this.call('deletePost',id);
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