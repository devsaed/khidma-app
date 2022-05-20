



@extends('cms.parent')

@section('page-name','All Service Provider')
@section('main-page','Content Mangement')
@section('sub-page','Service Provider')
@section('page-name-small','All Service Provider')

@section('styles')

@endsection

@section('content')
<div class="row">
    <!--begin::Col-->
    
    @foreach ($serviceProviders as $service_provider)
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <!--begin::Card-->
        <div class="card card-custom gutter-b card-stretch">
            <!--begin::Body-->
            <div class="card-body pt-4">
                <!--begin::User-->
                <div class="d-flex align-items-end mb-7">
                    <!--begin::Pic-->
                    <div class="d-flex align-items-center">
                        <!--begin::Pic-->
                        <div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">
                            <div class="symbol symbol-circle symbol-lg-75">
                                <img src="https://www.lboro.ac.uk/media/wwwlboroacuk/external/content/services/itservices/ittoolkit/72287%20IT%20Services%20Website%20Icons%20AW-2.png" alt="image">
                            </div>
                            <div class="symbol symbol-lg-75 symbol-circle symbol-primary d-none">
                                <span class="font-size-h3 font-weight-boldest">{{$service_provider->name}}</span>
                            </div>
                        </div>
                        <!--end::Pic-->
                        <!--begin::Title-->
                        <div class="d-flex flex-column">
                            <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">Luca Doncic</a>
                            <span class="text-muted font-weight-bold"></span>
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::User-->
                <!--begin::Desc-->
                <p class="mb-7">Description:  
                <a href="#" class="text-primary pr-1">{{$service_provider->description}}</p>
                <!--end::Desc-->
                <!--begin::Info-->
                <div class="mb-7">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-dark-75 font-weight-bolder mr-2">Email:</span>
                        <a href="#" class="text-muted text-hover-primary">{{$service_provider->email}}</a>
                    </div>
                    <div class="d-flex justify-content-between align-items-cente my-1">
                        <span class="text-dark-75 font-weight-bolder mr-2">Phone:</span>
                        <a href="#" class="text-muted text-hover-primary">{{$service_provider->mobile}}</a>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-dark-75 font-weight-bolder mr-2">Location:</span>
                        <span class="text-muted font-weight-bold">{{$service_provider->city->name}}</span>
                    </div>
                </div>
                <!--end::Info-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Card-->
    </div>
    @endforeach


</div>
@endsection







