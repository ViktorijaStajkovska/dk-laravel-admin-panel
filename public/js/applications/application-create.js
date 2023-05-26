$(document).ready(function() {

    var form = '#application-form';

    $(form).on('submit', function(event) {
        event.preventDefault();

        var url = $(this).attr('action');

        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            headers: {
                'Authorization': 'Bearer 1|FRZVcfXaAnfrGfhdyyG2LITEJQGst5o7XGVVGmZF'
            },
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    $(form).trigger("reset");
                    $('#success-message').text(response.success);
                    $('#success-message').removeClass('hidden');
                    setTimeout(function() {
                        $('#success-message').fadeOut('slow');
                    }, 5000);
                } else if (response.error) {
                    var errors = response.error;

                    for (var key in errors) {
                        if (errors.hasOwnProperty(key)) {
                            var errorMessage = errors[key][0];
                            console.log(errorMessage);
                            $('#error-message-' + key).html(errorMessage);

                        }
                    }
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });

});

//select2
$('.multiple-select').select2({
    placeholder: "Display in table",
    allowClear: true
});
$('.multiple-select').change(function() {
    table = $("#analysisTable").DataTable();
});

$('.multiple-select').on('select2:select', function(e) {
    var selected_value = Number(e.params.data.id);
    table.column(selected_value).visible(true);
});

$('.multiple-select').on("select2:unselect", function(e) {
    var unselected_value = Number(e.params.data.id);
    table.column(unselected_value).visible(false);
});


$(document).ready(function() {
    // Hide both contents initially
    $('#content1').hide();
    $('#content2').hide();

    $('#application_type_id').change(function() {
        if ($(this).val() == 1) {
            $('#content1').show();
            $('#content2').hide();
        } else if ($(this).val() == 2) {
            $('#content1').hide();
            $('#content2').show();
        } else {
            // Hide both contents if a value other than 1 or 2 is selected
            $('#content1').hide();
            $('#content2').hide();
        }
    });
});