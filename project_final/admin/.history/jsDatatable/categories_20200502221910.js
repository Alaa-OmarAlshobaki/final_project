var editor; // use a global for the submit and return data rendering in the examples

$(document).ready(function () {
    editor = new $.fn.dataTable.Editor({
        ajax: "dataCategories.php",
        table: "#example",
        fields: [{
            label: "Category Name",
            name: "category_name"
        }, {
            label: "Category Image",
            name: "category_img",
            type: "upload",
            display: function (file_id) {
                return '<img src="' + editor.file('files', file_id).web_path + '"/>';
            },
            clearText: "Clear",
            noImageText: 'No image'
        }
        ]
    });

    $('#example').DataTable({
        dom: 'Bfrtip',
        ajax: "dataCategories.php",
        columns: [

            { data: "category_name" },
            {
                data: "category_img",
                render: function (file_id) {
                    return file_id ?
                        '<img src="' + editor.file('files', file_id).web_path + '"/>' :
                        null;
                },
                defaultContent: "No image",
                title: "Image"
            }
        ],
        select: true,
        colReorder: true,
        buttons: [
            { extend: 'create', editor: editor },
            { extend: 'edit', editor: editor },
            { extend: 'remove', editor: editor },
            {
                extend: 'collection',
                text: 'Export',
                buttons: [
                    'copy',
                    'excel',
                    'csv',
                    'pdf',
                    'print'
                ]
            }
        ]
    });
});