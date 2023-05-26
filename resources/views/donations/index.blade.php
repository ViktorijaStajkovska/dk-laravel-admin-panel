<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if(Session::has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 mb-3 rounded relative" id="success"
            role="success">
            <span class="block sm:inline"> {{ Session::get('success') }}</span>
        </div>
        @endif
        <div id="success-message"
            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative hidden mb-3">
        </div>
        <button
            class="block text-white  bg-red-600 hover:bg-red-700 mt-10 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg  px-3 py-2 text-center "
            type="button"><a href="{{route('donations.create')}}">Add new Donation</a>
        </button>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="p-6 bg-white border-b border-gray-200 overflow-x-auto overflow-y-auto">

                    <table id="donationsTable" class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">#</th>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Surname</th>
                                <th class="px-4 py-2">Donation</th>
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
    $(document).ready(function() {
        var dataTable = $('#donationsTable').DataTable({
            ajax: '/donationTable',
            columns: [{
                    data: null,
                    render: function(data, type, full, meta) {
                        var rowNumber = meta.row + 1;
                        return `<span>${rowNumber}</span>`;
                    }
                },
                {
                    data: 'application.name',
                    name: 'application.name',
                    className: 'text-center'
                },
                {
                    data: 'application.surname',
                    name: 'application.surname',
                    className: 'text-center'
                },
                {
                    data: 'donation_name',
                    name: 'donation_name',
                    className: 'text-center'
                },


                {
                    data: 'id',
                    name: 'id',
                    className: 'text-center flex',
                    render: function(data, type, full, meta) {
                        return `
                       <a href="/donations/${data}/edit" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded ml-2">Edit</a> `;
                    }
                }
            ]
        });
    });
    </script>
    @endsection
</x-app-layout>