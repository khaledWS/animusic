@extends('layout.index')
@section('title')
    Episodes tracks
@endsection
@section('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.dark.bundle.css') }}" rel="stylesheet"
        type="text/css" />
@endsection
@section('content')
    <div class="content flex-row-fluid" id="kt_content">
        <!--begin::Contacts-->
        <div class="card mt-19 card-flush h-lg-100" id="kt_contacts_main">
            <!--begin::Card header-->
            <div class="card-header pt-7" id="kt_chat_contacts_header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2>Episodes tracks</h2>
                </div>
                <div class="card-toolbar">
                    <a href="{{ route('episode.add-track') }}"><button data-kt-contacts-type="new"
                            class="btn btn-light me-3 btn-active-primary">new</button></a>
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
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script>
        let get_records_url = "{{route('episodeTrack.getrecords')}}";
        let view_record_url = "{{url('/episodetrack/view/')}}";
        t = $("#kt_datatable_example_3").DataTable({
            "paging": 1,
            "info": 0,
            'ordering': 0,
            "responsive": 0,
            ajax: {
                url: get_records_url,
                dataSrc: ''
            },
            orderCellsTop: true,
            columns: [{
                    data: 'id',
                    title: "id",
                    width: "5%",
                    textAlign: "center",
                    render: function(data, type, row) {
                        return '<a href=" '+view_record_url+'/' + data + '">' + data + '</a>';
                    }
                }, {
                    data: "episode",
                    title: "episode",
                    width: "5%",
                    render: function(data, type, row) {
                        if (data == null) {
                            return '';
                        }
                        return '<a href="/episode/view/' + data.id + '">' + data.series_number + '</a>';
                    }
                },
                {
                    data: "track",
                    title: "track",
                    width: "15%",
                    render: function(data, type, row) {
                        if (data == null) {
                            return '';
                        }
                        return '<a href="/track/view/' + data.id + '">' + data.title + '</a>';
                    }
                },
                {
                    data: "start",
                    title: "start",
                    width: "5%",
                    render: function(data, type, row) {
                        if (data == null) {
                            return '';
                        }
                        var date = new Date(null);
                        date.setSeconds(data); // specify value for SECONDS here
                        var result = date.toISOString().substr(14, 5);
                        return result;
                    }
                },
                {
                    data: "end",
                    title: "end",
                    width: "5%",
                    render: function(data, type, row) {
                        if (data == null) {
                            return '';
                        }
                        var date = new Date(null);
                        date.setSeconds(data); // specify value for SECONDS here
                        var result = date.toISOString().substr(14, 5);
                        return result;
                    }
                },
                {
                    data: "active",
                    title: "active",
                    width: "5%",
                    render: function(data, type, row) {
                        if (data == 1) {
                            return '<span class="badge badge-success">yes</span>'
                        } else
                            return '<span class="badge badge-danger">no</span>'
                    }
                }
            ]
        });
    </script>
@endsection
