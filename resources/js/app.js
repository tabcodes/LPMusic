require('./bootstrap');

$(function () {

    var tableOptions = {
        "responsive": true
    };

    /**
     * Custom table sorting by band name
     */
    $("table.dataTable").each(function () {
        if ($(this).attr('data-filter-by')) {
            var table = $(this);
            var filter_header = table.attr('data-filter-by');

            tableOptions.initComplete = function () {
                this.api().columns().every(function (index) {
                    var table_id = table.attr('id');
                    var column = this;
                    var column_title = $(column.header()).text();
                    var found_column = false;
                    if (filter_header == column_title.toLowerCase()) {
                        found_column = true;
                    }

                    if (found_column == true) {
                        var select = $('<select class="form-control"><option value=""> Filter By ' + column_title + '</option></select>')
                            .appendTo($("#" + table_id + "_filter"))
                            .on('change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });
                        column.data().unique().sort().each(function (d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>')
                        });
                    }
                });
            }
        }
    });

    // apply table options
    $("table.dataTable").dataTable(tableOptions);

})
