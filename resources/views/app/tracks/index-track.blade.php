@extends('layout.index')
@section('title')
tracks
@endsection
@section('css')
<link href="{{asset('assets/plugins/custom/datatables/datatables.dark.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="content flex-row-fluid" id="kt_content">
    <!--begin::Contacts-->
    <div class="card mt-19 card-flush h-lg-100" id="kt_contacts_main">
        <!--begin::Card header-->
        <div class="card-header pt-7" id="kt_chat_contacts_header">
            <!--begin::Card title-->
            <div class="card-title">
                <h2>tracks</h2>
            </div>
            <div class="card-toolbar">
                <a href="{{route('track.new')}}"><button  data-kt-contacts-type="new" class="btn btn-light me-3 btn-active-primary">new</button></a>
            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-5">
            <table id="kt_datatable_example_3" class="table responsive  table-striped border rounded gy-5 gs-7">
            </table>
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Contacts-->
</div>
@endsection
@section('js')
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script>
t = $("#kt_datatable_example_3").DataTable({
            "paging": 1,
             "info": 0,
             'ordering': 0,
             "responsive": 0,
            ajax: {
                url: "/track/getrecords",
                dataSrc:''
            },
            orderCellsTop: true,
            columns: [
                {
                data: 'id',
                title: "id",
                width: "5%",
                textAlign: "center"
            }, {
                data: "title",
                title: "title",
                width: "30%",
                render: function (data, type,row) {
                    return '<a href="/track/view/'+row.id+'">'+data+'</a>';
                }
            },
            {
                data: "album",
                title: "album",
                width: "30%",
                render: function (data, type,row) {
                    if(data == null){
                        return '<a></a>';
                    }
                    else{
                        return '<a href="/album/view/'+data.id+'">'+data.title+'</a>';
                    }
                }
            },{
                data: "composer",
                title: "composer",
                width: "30%",
                render: function (data, type,row) {
                    if(data == null){
                        return '<a></a>';
                    }
                    else{
                        return '<a>'+data.en_name+'</a>';
                    }
                }
            },
            {
                data: "disk",
                title: "disk",
                width: "5%",
            },
             {
                data: "order",
                title: "order in disk",
                width: "5%",
            },
            {
                data: "active",
                title: "active",
                width: "5%",
                render: function (data, type,row) {
                    if(data == 1){
                        return '<span class="badge badge-success">yes</span>'
                    }
                    else
                    return '<span class="badge badge-danger">no</span>'
                }
            }
        ]});

</script>
@endsection
