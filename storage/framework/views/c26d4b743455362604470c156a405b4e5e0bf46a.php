<?php $__env->startSection('page-name','Create City'); ?>
<?php $__env->startSection('main-page','Content Management'); ?>
<?php $__env->startSection('sub-page','Cities'); ?>
<?php $__env->startSection('page-name-small','Create City'); ?>

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
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">Name:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="name" placeholder="Enter name" />
                            <span class="form-text text-muted">Please enter name</span>
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
<script>
    function performStore(){
        let data = {
            name: document.getElementById('name').value,
        }
        store('/cms/admin/cities',data);
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('cms.parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\khidma-app\resources\views/cms/cities/create.blade.php ENDPATH**/ ?>