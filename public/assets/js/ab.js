var DatatableRemoteAjaxDemo = {
    init: function () {
        var t;
        t = $("#kt_datatable_example_3").DataTable({
            "scrollY": "500px",
            "paging": 0,
             "info": 0,
             'ordering': 0,
             "responsive": 1,
            ajax: {
                url: "/test2",
            },
            columns: [
                {
                data: null,
                title: "#",
                width: "50px",
                textAlign: "center",
                render: function (data,type,full,meta) {
                    return meta.row+1;
                }
            }, {
                data: "track_name",
                title: "name",
                width: "500px",
                render: function (data) {
                    return '<a href="#">'+data+'</a>';
                }
            }, {
                data: "start_time",
                title: "starts",
                width: 150,
            },
            {
                data: "end_time",
                title: "ends",
                width: 250,
            }, {
                data: "notes",
                title: "notes",
                width: 150,
                className: "none"
            },{
                data: "episode",
                title: "episode",
                width: 150,
                className: "none",
                "visible": 0,
                "searchable": 1
            }]
        })

        // $("#m_form_status").on("change", function() {
        //     t.search($(this).val(), "STATUS")
        // }),
        $(".nav-tabs li a").click(function(){
            t.column(5).search(this.getAttribute('targ')).draw();
        });
        t.column(5).search(1).draw();
    }
};

// responsive: true,


//
// "dom": "<'table-responsive'tr>",

jQuery(document).ready(function () {
    DatatableRemoteAjaxDemo.init();
});
