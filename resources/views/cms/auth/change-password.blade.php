@extends('cms.parent')

@section('page-name','Change Password')
@section('main-page','Edite Profile')
@section('sub-page','Profile')
@section('page-name-small','Change Profile')


@section('content')
<!--begin::Content-->
<div class="flex-row-fluid ml-lg-8">
    <!--begin::Card-->
    <div class="card card-custom">
        <!--begin::Header-->
        <div class="card-header py-3">
            <div class="card-title align-items-start flex-column">
                <h3 class="card-label font-weight-bolder text-dark">Change Password</h3>
                <span class="text-muted font-weight-bold font-size-sm mt-1">Change your account password</span>
            </div>
            <div class="card-toolbar">
                <button type="button" onclick="performStore()" class="btn btn-success mr-2">Save Changes</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Form-->
        <form class="form" id="create-form">
            <div class="card-body">

                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label text-alert">Current Password</label>
                    <div class="col-lg-9 col-xl-6">
                        <input type="password" class="form-control form-control-lg form-control-solid mb-2"
                            id="current_password" value="" placeholder="Current password" />
                        {{-- <a href="#" class="text-sm font-weight-bold">Forgot password ?</a> --}}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label text-alert">New Password</label>
                    <div class="col-lg-9 col-xl-6">
                        <input type="password" class="form-control form-control-lg form-control-solid" value=""
                            id="new_password" placeholder="New password" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label text-alert">Verify Password</label>
                    <div class="col-lg-9 col-xl-6">
                        <input type="password" class="form-control form-control-lg form-control-solid" value=""
                            id="new_password_confirmation" placeholder="Verify password" />
                    </div>
                </div>
            </div>
        </form>
        <!--end::Form-->
    </div>
</div>
<!--end::Content-->
@endsection

@section('scripts')
@parent
<script>
    function performStore() {
        axios.put('/cms/admin/update-password', {
            password: document.getElementById('current_password').value,
            new_password: document.getElementById('new_password').value,
            new_password_confirmation: document.getElementById('new_password_confirmation').value,
        })
        .then(function (response) {
            console.log(response);
            toastr.success(response.data.message);
            document.getElementById('create-form').reset();
        })
        .catch(function (error) {
            console.log(error.response);
            toastr.error(error.response.data.message);
        });
    }
</script>
@endsection