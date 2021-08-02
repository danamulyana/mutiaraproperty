<h2 class="intro-y text-lg font-medium mt-10">
    Data List Home Sliders
</h2>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <a href="{{ route('home.slider.add') }}" class="btn btn-primary shadow-md mr-2">Add New slider</a>
    </div>
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">IMAGES</th>
                    <th class="text-center whitespace-nowrap">STATUS</th>
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sliders as $slider)
                <tr class="intro-x">
                    <td class="w-40">
                        <div class="flex">
                            <img alt="{{ $slider->image }}" class="tooltip rounded" src="{{ asset('sliders/'.$slider->image) }}" title="{{ $slider->created_at }}">
                        </div>
                    </td>
                    <td class="w-40">
                        <div class="flex items-center justify-center {{ $slider->status === 'Active' ? 'text-theme-9' : 'text-theme-6'}}"> <i data-feather="check-square" class="w-4 h-4 mr-2"></i> {{ $slider->status }} </div>
                    </td>
                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center mr-3" href="{{ route('home.slider.edit',['slider_id'=>$slider->id]) }}"> 
                                <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit 
                            </a>
                            <a class="flex items-center text-theme-6 cursor-pointer" wire:click="$emit('deleteTriger',{{$slider->id}})" id_slider="{{$slider->id}}" > 
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
    
    <!-- END: Pagination -->
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
                        @this.call('deleteTag',id);
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