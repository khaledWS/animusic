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
                url: "/episode/episode-track",
                dataSrc:''
            },
            columns: [
                {
                data: 'id',
                title: "#",
                width: "50px",
                textAlign: "center"
            }, {
                data: "title",
                title: "name",
                width: "500px",
                render: function (data) {
                    return '<a href="#">'+data+'</a>';
                }
            }, {
                data: "start",
                title: "starts",
                width: 150,
            },
            {
                data: "end",
                title: "ends",
                width: 250,
            }, {
                data: "notes",
                title: "notes",
                width: 150,
                className: "none"
            },{
                data: "episode_id",
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
        // t.column(5).search(1).draw();
        t.on( 'order.dt search.dt', function () {
            let i = 1;

            t.cells(null, 0, {search:'applied', order:'applied'}).every( function (cell) {
                this.data(i++);
            } );
        } ).draw();
    }
};

// responsive: true,


//
// "dom": "<'table-responsive'tr>",

jQuery(document).ready(function () {
    DatatableRemoteAjaxDemo.init();
});
