<?php $__env->startSection('page-name','Create Category'); ?>
<?php $__env->startSection('main-page','Content Management'); ?>
<?php $__env->startSection('sub-page','Categories'); ?>
<?php $__env->startSection('page-name-small','Create Category'); ?>

<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!--begin::Container-->
<div class="row">
    <div class="col-lg-12">
        <!--begin::Card-->
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Horizontal Form Layout</h3>
                
            </div>
            <!--begin::Form-->
            <form id="create-form">
                <div class="card-body">
                    <h3 class="text-dark font-weight-bold mb-10">Basic Info</h3>

                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">Name :</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="name" placeholder="Enter name" />
                            <span class="form-text text-muted">Please enter name</span>
                        </div>
                    </div>
                    <div class="separator separator-dashed my-10"></div>
                    <h3 class="text-dark font-weight-bold mb-10">Details</h3>
                    <div class="form-group row">
                        <label class="col-3 col-form-label">Image:</label>
                        <div class="col-9">
                            <div class="image-input image-input-empty image-input-outline" id="kt_image_5"
                                style="background-image: url(<?php echo e(asset('cms/assets/media/users/blank.png')); ?>)">
                                <div class="image-input-wrapper"></div>

                                <label
                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                    data-action="change" data-toggle="tooltip" title=""
                                    data-original-title="Change avatar">
                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                    <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="profile_avatar_remove" />
                                </label>

                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                    data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>

                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                    data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="separator separator-dashed my-10"></div>
                    <h3 class="text-dark font-weight-bold mb-10">Settings</h3>
                    <div class="form-group row">
                        <label class="col-3 col-form-label">Visible</label>
                        <div class="col-3">
                            <span class="switch switch-outline switch-icon switch-success">
                                <label>
                                    <input type="checkbox" checked="checked" id="active">
                                    <span></span>
                                </label>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-3">

                        </div>
                        <div class="col-9">
                            <button type="button" onclick="performStore()" class="btn btn-primary mr-2">Submit</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Card-->
    </div>
</div>
<!--end::Container-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('cms/assets/js/pages/crud/forms/widgets/bootstrap-select.js')); ?>"></script>
<script src="<?php echo e(asset('cms/assets/js/pages/crud/file-upload/image-input.js')); ?>"></script>

<script>
    var image = new KTImageInput('kt_image_5');
    
    function performStore(){
        let formData = new FormData();
        formData.append('name',document.getElementById('name').value);
        formData.append('image',image.input.files[0]);
        formData.append('active',document.getElementById('active').checked);
        store('/cms/admin/categories',formData);
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('cms.parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\khidma-app\resources\views/cms/categories/create.blade.php ENDPATH**/ ?>