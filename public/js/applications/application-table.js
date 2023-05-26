$(document).ready(function() {
    var dataTable = $('#applicationsTable').DataTable({
        ajax: '/applicationTable',responsive: true,
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
                data: 'computer_equipments',
                name: 'computer_equipments',
                className: 'text-center',
                render: function(data, type, full, meta) {
                    var equipmentNames = data.map(function(equipment) {
                        return equipment.name;
                    }).join(', ');
            
                    var words = equipmentNames.split(' ');
                    var truncatedText = words.slice(0, 3).join(' ');
                    var remainingText = words.slice(3).join(' ');
            
                    if (type === 'display' && words.length > 3) {
                        var html = '<span class="truncated">' + truncatedText + '...</span>' +
                            '<span class="full" style="display:none">' + remainingText + '</span>' +
                            '<a href="#" class="read-more text-red-600">Read more</a>';
                        return html;
                    } else {
                        return equipmentNames;
                    }
                }
            },
            {
                data: 'application_type.name',
                name: 'application_type.name',
                className: 'text-center'
            },
            {
                data: 'application_status.name',
                name: 'application_status.name',
                className: 'text-center',
                render: function(data, type, full, meta) {
                    return data ? data : "N/A";
                }
            },
            {
                data: 'archive',
                name: 'archive',
                className: 'text-center hidden',
                render: function(data, type, full, meta) {
                    let archiveText = data == 1 ? 'Archived' : 'Not Archive';
                    return archiveText;
                    console.log(archiveText)

                }
            },
            {
                data: 'id',
                name: 'id',
                className: 'text-center flex',
                render: function(data, type, full, meta) {
                    let archiveText = full.archive == 1 ? 'Archived' : 'Archive';
                    console.log(archiveText)
                    return `
                    <button data-id="${data}" class="btn inline-block bg-red-500 hover:bg-red-700 text-white font-bold  px-1 rounded ml-2 archive-btn">${archiveText}</button>
                    <a href="/applications/${data}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold px-1 rounded ml-2">View</a> `;
                }
            }
        ]
    });
   $(document).on('click', '.read-more', function() {
    var $truncatedText = $(this).siblings('.truncated');
    var $fullText = $(this).siblings('.full');
    var fullTextContent = $fullText.text();
    var truncatedTextContent = $truncatedText.text();
    $truncatedText.text(truncatedTextContent + ' ' + fullTextContent);
    $fullText.hide();
    $(this).hide();
});

    
    
    
    


    $(document).on('click', '.archive-btn', function() {
        let applicationId = $(this).data('id');
        $.ajax({
            url: '/api/applications/archive/' + applicationId,
            type: 'PUT',
            dataType: 'json',
            headers: {
                'Authorization': 'Bearer 1|FRZVcfXaAnfrGfhdyyG2LITEJQGst5o7XGVVGmZF'
            },
            success: function(response) {
                $('#success-message').text(response.success);
                $('#success-message').removeClass('hidden');
                setTimeout(function() {
                    $('#success-message').fadeOut('slow');
                }, 5000);
                $('#applicationsTable').DataTable().ajax.reload();

            }
        });
    });
    $('.status-checkbox').on('change', function() {
        var selectedStatuses = $('.status-checkbox:checked').map(function() {
            return this.value;
        }).get().join('|');
        dataTable.columns(5).search(selectedStatuses, true, false).draw();
    });
    $('.archive-checkbox').on('change', function() {
        var selectedStatuses = $('.archive-checkbox:checked').map(function() {
            return this.value;
        }).get().join('|');
        dataTable.columns(6).search(selectedStatuses, true, false).draw();
        // console.log(selectedStatuses);
    });
});