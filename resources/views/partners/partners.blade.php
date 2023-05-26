<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if(Session::has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 mb-3 rounded relative" role="success">
            <span class="block sm:inline"> {{ Session::get('success') }}</span>
        </div>
        @endif
        <button
            class="block text-white  bg-red-600 hover:bg-red-700  mt-10 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-3 py-2 text-center"
            type="button"><a href="{{route('partners.create')}}">Add new Partner</a>

        </button>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 overflow-x-auto">
                    <table id="partnerTable" class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">#</th>
                                <th class="px-4 py-2">Image</th>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Web page link</th>
                                <th class="px-4 py-2">Partner Type</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>


    @section('scripts')
    <script>
    $('#partnerTable').DataTable({
        ajax: '/table',
        columns: [{
                data: null,
                render: function(data, type, full, meta) {
                    var rowNumber = meta.row + 1;
                    return `
            <span>${rowNumber}</span>
        `;
                }
            },
            {
                data: 'image',
                name: 'image',

            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'link',
                name: 'link',
                render: function(data, type, full, meta) {
                    return '<a href="' + data +
                        '" target="_blank" class=" hover:text-blue-600"> Partner\'s webpage</a>';
                }
            },
            {
                data: 'type.name',
                name: 'type.name',
            },
            {
                data: 'id',
                name: 'id',
                render: function(data, type, full, meta) {
                    return `
            <a href="/partners/${data}/edit" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold  px-3 py-1 rounded ml-2">
                Edit
            </a>
            <form action="/partners/${data}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-block bg-red-500 hover:bg-red-700 text-white font-bold  px-3 py-1 rounded ml-2">
                    Delete
                </button>
            </form>
        `;
                }
            }
        ]
    });
    </script>
    @endsection
</x-app-layout>