<?php $__env->startSection('page-name','Role Permissions'); ?>
<?php $__env->startSection('main-page','Roles & Permissions'); ?>
<?php $__env->startSection('sub-page','Role Permissions'); ?>
<?php $__env->startSection('page-name-small','Permissions'); ?>

<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!--begin::Advance Table Widget 5-->
<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark"><?php echo e($user->name); ?> Permissions</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm">Manage role permissions</span>
        </h3>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-0">
        <!--begin::Table-->
        <div class="table-responsive">
            <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_2">
                <thead>
                    <tr class="text-uppercase">
                        <th style="min-width: 150px">name</th>
                        <th style="min-width: 120px">Auth Type</th>
                        <th style="min-width: 80px">Granted</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="pl-0">
                            <a href="#"
                                class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg"><?php echo e($permission->name); ?></a>
                        </td>
                        <td class="pl-0">
                            <span href="#"
                                class="text-dark-50 font-weight-bolder text-hover-primary font-size-lg"><?php echo e(ucfirst($permission->guard_name)); ?></span>
                        </td>
                        <td class="pl-0">
                            <div class="checkbox-inline">
                                <label class="checkbox checkbox-success">
                                    <input type="checkbox" name="permission_<?php echo e($permission->id); ?>"
                                        <?php if($permission->assigned): ?>
                                    checked="checked"
                                    <?php endif; ?> onclick="grantPermission('<?php echo e($permission->id); ?>')">
                                    <span></span>Granted</label>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <!--end::Table-->
    </div>
    <!--end::Body-->
</div>
<!--end::Advance Table Widget 5-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('assets/js/pages/widgets.js')); ?>"></script>
<?php $__env->startSection('scripts'); ?>
<script>
    function grantPermission(permissionId) {
        axios.put('/cms/admin/users/<?php echo e($user->id); ?>/permissions/edit', {
            permission_id: permissionId
        })
        .then(function (response) {
            console.log(response);
            toastr.success(response.data.message);
        })
        .catch(function (error) {
            console.log(error.response);
            toastr.error(error.response.data.message);
        });
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('cms.parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\khidma-app\resources\views/cms/user/user-permissions.blade.php ENDPATH**/ ?>