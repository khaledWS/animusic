@extends('layout.index')
@section('title')
{{$title->title}}
@endsection
@section('css')
<link href="{{asset('assets/plugins/custom/datatables/datatables.dark.bundle.css')}}" rel="stylesheet" type="text/css" />
<style>
@media only screen and (max-width: 500px) {
  #title-card{
      background: linear-gradient(90deg, rgba(15,49,75,1) 0%, rgba(45,51,103,1) 100%);
      background-image:  none;
  }
}
</style>
@endsection
@section('content')
<div class="content flex-row-fluid" id="kt_content">
    <input type="text" hidden name="title_id" value="{{$title->id}}" id="">
    <div class="d-flex flex-column">
        <!--begin::Row-->
        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
            <!--begin::Col-->
            <div class="col-xl-12">
                <!--begin::Engage widget 6-->
                <div id="title-card" class="card flex-grow-1 bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100"
                    style="background-color:#020202;background-image:url('{{$title->getImage()}}'),linear-gradient(90deg, rgba(15,49,75,1) 0%, rgba(45,51,103,1) 100%);">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-between flex-column ps-xl-18">
                        <!--begin::Heading-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-11 pt-xl-13">
                                    <!--begin::Title-->
                                    <h3 class="fw-bolder text-white fs-4x mb-5 ms-n1">{{$title->title}}</h3>
                                    {{-- <h6 class="fw-bolder text-white fs-2x mb-7 ms-n1">Season 1</h6> --}}
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    {{-- <span class="fw-bolder text-white  mb-8 d-block lh-0">進撃の巨人
                                        / Shingeki no Kyojin</span> --}}
                                    <!--end::Description-->
                                    <!--begin::Items-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center me-6">
                                            <!--begin::Icon-->
                                            <a href="#" class="me-2">
                                                {{-- <i class="fonticon-play text-primary fs-3"></i> --}}
                                            </a>
                                            <!--end::Icon-->
                                            <!--begin::Info-->
                                            <span class="fw-bold text-white fs-6">{{$title->number_of_episodes}}
                                                Episodes</span>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Icon-->
                                            <a href="#" class="me-2">
                                                {{-- <i class="fonticon-headset text-primary fs-3"></i> --}}
                                            </a>
                                            <!--end::Icon-->
                                            <!--begin::Info-->
                                            {{-- <span class="fw-bold text-white fs-6">xx Hours</span> --}}
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Items-->
                                </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                        <!--end::Heading-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Engage widget 6-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->

        <!--begin::Row-->
        <div class="d-flex flex-column flex-xl-row g-5 g-xl-10 mb-5 mb-xl-10">
            <div class="flex-column flex-lg-row-auto  mb-10">
                {{-- w-100 w-xl-350px --}}
                <div class="card mb-5 mb-xl-8">
                    <div class="card-body">
                        <div class="pb-5 fs-6">
                            <!--begin::Details item-->
                            <div class="fw-bolder mt-5 mb-1">Albums Released for this Season</div>
                            @isset($title->album)
                            @foreach ($title->album as $album)
                            <a href="{{route('album.show',$album->id)}}">
                                <div class="text-gray-600  text-hover-primary">{{$album->title}}</div>
                            </a>
                            @endforeach
                            @endisset
                            <!--end::Details item-->
                        </div>
                    </div>
                </div>

            </div>
            <div class="flex-lg-row-fluid ms-lg-15">
                <div class="card card-flush h-xl-100">
                    <div class="card-body">
                        <div class="">
                            <div class="d-flex flex-column flex-md-row rounded">
                                <ul
                                    class="nav nav-tabs nav-pills border-0 flex-row flex-md-column me-5 mb-3 mb-md-0 fs-6">
                                    @foreach ($title->episodes as $episode)
                                    <li class="nav-item w-100px me-0">
                                        <a class="nav-link btn btn-sm btn-active-light-primary"
                                            targ="{{$episode->id}}" ep= "{{$episode->season_number}}" data-bs-toggle="tab"
                                            href="#kt_vtab_pane_3">Episode
                                            {{$episode->season_number}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                                <div class="tab-content overflow-auto w-100" id="myTabContent">
                                    <h3 class="mb-5 mt-3 text-center title" id="episode-title"></h3>
                                    <div class="tab-pane fade show " id="kt_vtab_pane_3"
                                        role="tabpanel">
                                        <table id="kt_datatable_example_3"
                                            class="table responsive  table-striped border rounded gy-5 gs-7">
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--end::Row-->
    </div>
</div>
@endsection
@section('js')
<script>
    let titles = [];
    @foreach ($episodeTitles as $title)
    titles.push('{{$title}}');
    @endforeach
    console.log(titles);
</script>
<script src="{{asset('assets/js/ab.js')}}"></script>
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
@endsection

