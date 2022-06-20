var DatatableRemoteAjaxDemo = {
    init: function () {
        var title = $("input[name=title_id]").val();
        console.log()
        var t;
        t = $("#kt_datatable_example_3").DataTable({
            "scrollY": "550px",
            "paging": 0,
             "info": 0,
             'ordering': 0,
             "responsive": 1,
            ajax: {
                url: track_usage+"/"+track+"/" ,
                dataSrc:''
            },
            // orderCellsTop: true,
            columns: [
            //     {
            //     data: 'series_number',
            //     title: "#",
            //     width: "15%",
            //     textAlign: "center"
            // },
             {
                data: "series_number",
                title: "episode",
                width: "50px"
            }, {
                data: "title",
                title: "episode title",
                width: "600px"
            },

             {
                data: "start",
                title: "starts",
                width: 190,
                render: function (data){
                    return new Date(data * 1000).toISOString().substr(14, 5);
                }
            },
            {
                data: "end",
                title: "ends",
                width: 160,
                render: function (data){
                    return new Date(data * 1000).toISOString().substr(14, 5);
                }
            }]
        })

        // $("#m_form_status").on("change", function() {
        //     t.search($(this).val(), "STATUS")
        // }),
        //  $(".nav-tabs li a").click(function(){
        //     t.column(5).search(this.getAttribute('targ')).draw();
        //     $('#episode-title').html(titles[this.getAttribute('ep')-1]);
        //  });
        // // t.column(5).search(1).draw();
        // t.on( 'order.dt search.dt', function () {
        //     let i = 1;

        //     t.cells(null, 0, {search:'applied', order:'applied'}).every( function (cell) {
        //         this.data(i++);
        //     } );
        // } ).draw();
    }
};

// responsive: true,


//
// "dom": "<'table-responsive'tr>",

jQuery(document).ready(function () {
    DatatableRemoteAjaxDemo.init();
});
