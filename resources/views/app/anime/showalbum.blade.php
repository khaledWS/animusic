@extends('layout.index')
@section('title')
{{$album->title}}
@endsection
@section('css')
<style>
    @media only screen and (max-width: 500px) {
        #title-card {
            background: linear-gradient(90deg, rgba(15, 49, 75, 1) 0%, rgba(45, 51, 103, 1) 100%);
            background-image: none;
        }
    }
</style>
@endsection
@section('content')
<div class="content flex-row-fluid" id="kt_content">
    <div class="d-flex flex-column">
        <!--begin::Row-->
        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
            <!--begin::Col-->
            <div class="col-xl-12">
                <!--begin::Engage widget 6-->
                <div id="title-card" class="card flex-grow-1 bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100"
                    style="background-color:#020202;background-image:url('{{$album->getImage()}}'),linear-gradient(90deg, rgba(15,49,75,1) 0%, rgba(45,51,103,1) 100%);">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-between flex-column ps-xl-18">
                        <!--begin::Heading-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-11 pt-xl-13">
                                    <!--begin::Title-->
                                    <h3 class="fw-bolder text-white fs-4x mb-7  ms-n1" value="">{{$album->title}}</h3>
                                    {{-- <h6 class="fw-bolder text-white fs-2x mb-7 ms-n1">Season 1</h6> --}}
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <span class="fw-bolder text-white  mb-8 d-block lh-0"></span>
                                    <!--end::Description-->
                                    <!--begin::Items-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center me-6">
                                            <!--begin::Icon-->
                                            <a href="#" class="me-2">
                                                <i class="fas fa-play-circle text-primary fs-3"></i>
                                                {{-- <i class="fonticon-play text-primary fs-3"></i> --}}
                                            </a>
                                            <!--end::Icon-->
                                            <!--begin::Info-->
                                            <span class="fw-bold text-white fs-6">{{$album->number_of_tracks}}
                                                Tracks</span>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Icon-->
                                            <a href="#" class="me-2">
                                                <i class="fas fa-headphones-alt text-primary fs-3"></i>
                                                {{-- <i class="fonticon-headset text-primary fs-3"></i> --}}
                                            </a>
                                            <!--end::Icon-->
                                            <!--begin::Info-->
                                            <span class="sec fw-bold text-white fs-6">{{$album->displayFormat()}}
                                            </span>
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
            <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
                <div class="card mb-5 mb-xl-8">
                    <div class="card-body">
                        <div class="pb-5 fs-6">
                            <!--begin::Details item-->
                            <div class="fw-bolder mt-5">Composer</div>
                            @foreach ($album->getComposerIdName() as $key => $comp)
                            <div class="text-gray-600">
                                <a href="">{{$comp}}</a>
                            </div>
                            @endforeach
                            <!--end::Details item-->
                            <!--begin::Details item-->
                            <div class="fw-bolder mt-5">Release date</div>
                            <div class="text-gray-600">{{$album->date_released}}</div>
                            <!--end::Details item-->
                            {{--
                            <!--begin::Details item-->
                            <div class="fw-bolder mt-5 ">Label</div>
                            <div class="text-gray-600">
                                Pony Canyon</div>
                            <!--end::Details item-->

                            <div class="separator"></div>
                            <div class="fw-bolder mt-5 fs-3 text-primary">Musicians</div>

                            <!--begin::Details item-->
                            <div class="fw-bolder mt-5">Drums</div>
                            <div class="text-gray-600">Yu "masshoi" Yamauchi</div>
                            <!--end::Details item--> --}}
                        </div>
                    </div>
                </div>

            </div>
            <div class="flex-lg-row-fluid ms-lg-15">
                <div class="card card-flush h-xl-100">
                    <div class="card-header">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder text-gray-800">Tracks</span>
                        </h3>
                        <!--end::Title-->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped  gy-7 gs-7">
                                <thead>
                                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                        <th class="w-md-10px">#</th>
                                        <th class="w-md-600px">title</th>
                                        <th class="w-md-100px">length</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($album->tracks)
                                    <tr>
                                        <td colspan="3"
                                            style="background-color:#151521; --bs-table-accent-bg:none; color:#c29b69"
                                            class="text-center">DISK 1</td>
                                    </tr>
                                    <?php $x = 0 ?>
                                    @foreach ($album->tracks as $track)
                                    @if ($track->disk == 2 && $x == 0)
                                    <tr>
                                        <td colspan="3"
                                            style="background-color:#151521; --bs-table-accent-bg:none; color:#c29b69"
                                            class="text-center">DISK 2</td>
                                    </tr>
                                    <?php $x = 1 ?>
                                    @endif
                                    <tr>
                                        <td>{{$track->order}}</td>
                                        <td> <a href="/track/{{$track->id}}">{{$track->title}}</a></td>
                                        <td>{{$track->displayFormat()}}</td>
                                    </tr>
                                    @endforeach
                                    @endisset
                                </tbody>
                            </table>
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
    new Date(4641 * 1000).toISOString().substr(11, 8);
</script>
@endsection
