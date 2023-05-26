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