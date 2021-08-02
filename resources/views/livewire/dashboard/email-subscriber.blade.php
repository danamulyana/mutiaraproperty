<div>
    <h2 class="intro-y text-lg font-medium mt-10">
        Data Formulir Subsribers
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <button wire:click="exportExcel" class="btn btn-primary shadow-md mr-2">Export to Excel</button>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">ID</th>
                        <th class="text-center whitespace-nowrap">EMAIL</th>
                        {{-- <th class="text-center whitespace-nowrap">ACTIONS</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subscribers as $p)
                    <tr class="intro-x" wire:key="{{ $p->id }}">
                        <td class="px-2 py-4 whitespace-nowrap">
                            {{ $p->id }}
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap text-center">
                            {{ $p->email }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        {{$subscribers->links('pagination-links-dashboard')}}
        <!-- END: Pagination -->
    </div>
</div>