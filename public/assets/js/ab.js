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
                url: episode_tracks_url+"/"+title+"/" ,
                dataSrc:''
            },
            orderCellsTop: true,
            columns: [
                {
                data: 'id',
                title: "#",
                width: "15%",
                textAlign: "center"
            }, {
                data: "episode_track_title",
                title: "name",
                width: "500px",
                render: function (data, type, row) {
                    color = '';
                    if(row.track == null){
                        if(row.type == 0){
                            color = 'color: gray';
                        }
                        else{
                            color = 'color: yellow';
                        }
                        return '<a style="'+color+'">'+data+'</a>';
                    }
                    if(!row.type == 0){
                        color = 'color: yellow';
                    }
                    return '<a style="'+color+'" href="/track/'+row.track.id+'">'+data+'</a>';
                }
            }, {
                data: "start",
                title: "starts",
                width: 150,
                render: function (data){
                    return new Date(data * 1000).toISOString().substr(14, 5);
                }
            },
            {
                data: "end",
                title: "ends",
                width: 250,
                render: function (data){
                    return new Date(data * 1000).toISOString().substr(14, 5);
                }
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
            var searchFor = this.getAttribute('targ');
            // var searchFor = 7;
            t.column(5).search('\\b' + searchFor + '\\b',true).draw();
            $('#episode-title').html(titles[this.getAttribute('ep')-1]);
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
