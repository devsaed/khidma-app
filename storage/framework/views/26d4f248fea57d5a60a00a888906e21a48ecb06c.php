<?php $__env->startSection('page-name','All Users'); ?>
<?php $__env->startSection('main-page','Human Resources'); ?>
<?php $__env->startSection('sub-page','Users'); ?>
<?php $__env->startSection('page-name-small','All Users'); ?>

<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!--begin::Advance Table Widget 5-->
<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">Users</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm">Manage system users</span>
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
                        <th style="min-width: 120px">Name</th>
                        <th style="min-width: 120px">City</th>
                        <th style="min-width: 120px">Mobile</th>
                        <th style="min-width: 150px">Email</th>
                        <th style="min-width: 120px">Permissions</th>
                        <th style="min-width: 120px">Verified</th>
                        <th class="pr-0 text-right" style="min-width: 120px">action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="pl-0">
                            <span
                                class="text-dark-75 font-weight-bolder d-block font-size-lg"><?php echo e($user->name ?? '-'); ?></span>
                        </td>

                        <td class="pl-0">
                            <span
                                class="text-dark-75 font-weight-bolder d-block font-size-lg"><?php echo e($user->city->name ?? '-'); ?></span>
                        </td>

                        <td class="pl-0">
                            <span
                                class="text-dark-75 font-weight-bolder d-block font-size-lg"><?php echo e($user->mobile ?? '-'); ?></span>
                        </td>

                        <td class="pl-0">
                            <span
                                class="text-dark-75 font-weight-bolder d-block font-size-lg"><?php echo e($user->email ?? '-'); ?></span>
                        </td>
                        
                        <td class="pr-0">
                            <a href="<?php echo e(route('user.edit-permissions',$user->id)); ?>"
                                class="btn btn-light-primary font-weight-bolder font-size-sm">(<?php echo e($user->permissions_count); ?>)
                                Permission/s</a>
                        </td>

                        <td>
                            <span
                                class="label label-lg <?php if($user->verified): ?> label-light-success <?php else: ?> label-light-danger <?php endif; ?> label-inline"><?php echo e($user->verified_status); ?></span>
                        </td>

                        <td class="pr-0 text-right">
                            <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                <span class="svg-icon svg-icon-md svg-icon-primary">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                fill="#000000" />
                                            <path
                                                d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </a>
                            <a href="#" onclick="performDestroy('<?php echo e($user->id); ?>', this)"
                                class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                <span class="svg-icon svg-icon-md svg-icon-primary">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                fill="#000000" fill-rule="nonzero" />
                                            <path
                                                d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </a>
                            
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<script>
    function performDestroy(id,reference) {
        confirmDestroy('/cms/admin/users', id, reference);
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('cms.parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\khidma-app\resources\views/cms/user/index.blade.php ENDPATH**/ ?>