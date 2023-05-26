<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @if(Session::has('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 mb-3 rounded relative" id="success"
        role="success">
        <span class="block sm:inline"> {{ Session::get('success') }}</span>
    </div>
    @endif
    <div id="success-message"
        class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative hidden mb-3">
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table id="volunteersTable" class="table-auto w-full overflow-x-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">#</th>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">City</th>
                                <th class="px-4 py-2">Position</th>
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
        $('#volunteersTable').DataTable({
            ajax: '/volunteerTable',
            columns: [{
                    data: null,
                    render: function(data, type, full, meta) {
                        var rowNumber = meta.row + 1;
                        return `<span>${rowNumber}</span>`;
                    }
                },
                {
                    data: 'name',
                    name: 'name',
                    className: 'text-center'
                },
                {
                    data: 'city',
                    name: 'city',
                    className: 'text-center'
                },
                
                {
                    data: 'volunteer_position.name',
                    name: 'volunteer_position.name',
                    className: 'text-center'
                    
                },
                {
                    data: 'id',
                    name: 'id',
                    className: 'text-center',
                    render: function(data, type, full, meta) {
                        let archiveText = full.archive == 1 ? 'Archived' : 'Archive';
                        return `
                        <a href="/volunteers/${data}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">View</a> `;
                    }
                }
            ]
        });
        });

      
     
    </script>
    @endsection
</x-app-layout>