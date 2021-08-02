<div>
    <h2 class="intro-y text-lg font-medium mt-10">
        Data Formulir pengunjung
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
                        <th class="text-center whitespace-nowrap">Nama</th>
                        <th class="text-center whitespace-nowrap">No Handphone</th>
                        <th class="text-center whitespace-nowrap">Alamat</th>
                        <th class="text-center whitespace-nowrap">Tujuan</th>
                        {{-- <th class="text-center whitespace-nowrap">ACTIONS</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengunjungs as $p)
                    <tr class="intro-x" wire:key="{{ $p->id }}">
                        <td class="px-2 py-4 whitespace-nowrap">
                            {{ $p->id }}
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap text-center">
                            {{ $p->nama }}
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap text-center">
                           {{ $p->nohp }}
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap text-center">
                            {{ Str::limit($p->alamat , 20, '...') }}
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap text-center">
                            {{ $p->tujuan }}
                        </td>
                        {{-- <td class="table-report__action w-40">
                            <div class="flex justify-center items-center" >
                                <a class="flex items-center mr-3" href=""> 
                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> View Detail 
                                </a>
                            </div>
                        </td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        {{$pengunjungs->links('pagination-links-dashboard')}}
        <!-- END: Pagination -->
    </div>
</div>