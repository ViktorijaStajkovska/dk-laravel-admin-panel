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
                    <table id="contactsTable" class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">#</th>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Surname</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Phone</th>
                                <th class="px-4 py-2">Description</th>
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
        $('#contactsTable').DataTable({
            ajax: '/contactTable',
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
                    data: 'surname',
                    name: 'surname',
                    className: 'text-center'
                },
                {
                    data: 'email',
                    name: 'email',
                    className: 'text-center'
                },
                {
                    data: 'phone',
                    name: 'phone',
                    className: 'text-center'
                },
                {
                    data: 'description',
                    name: 'description',
                    className: 'text-center',
                    render: function(data, type, row, meta) {
                        var words = data.split(' ');
                        var truncatedText = words.slice(0, 3).join(' ');
                        var remainingText = words.slice(3).join(' ');

                        if (type === 'display' && words.length > 3) {
                            var html = '<span class="truncated">' + truncatedText + '</span>' +
                                '<span class="full" style="display:none">' + remainingText +
                                '</span>' +
                                '<a href="#" class="read-more text-red-600">Read more</a>';
                            return html;
                        } else {
                            return data;
                        }
                    }
                },
                {
                    data: 'id',
                    name: 'id',
                    className: 'text-center',
                    render: function(data, type, full, meta) {
                        return ` 
                        <form action="/contacts/${data}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-1 rounded ml-2">Delete</button>
            </form>`;
                    }
                }
            ]
        });
    });
    $(document).on('click', '.read-more', function() {
        var $truncatedText = $(this).siblings('.truncated');
        var $fullText = $(this).siblings('.full');
        var truncatedTextContent = $truncatedText.text();
        var fullTextContent = $fullText.text();
        $truncatedText.html(truncatedTextContent + ' ' + fullTextContent);
        $fullText.remove();
        $(this).remove();
    });
    </script>
    @endsection
</x-app-layout>