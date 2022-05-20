<?php $__env->startComponent('mail::message'); ?>
# Welcome 

We are pleased to have you join us, we wish you good luck and success,<br>

<?php $__env->startComponent('mail::panel'); ?>
To complete your registeration, use below code in invitation screen.<br>
# Invitaion Code: 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('mail::button', ['url' => '']); ?>
Store CMS
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?><?php /**PATH C:\wamp64\www\khidma-app\resources\views/emails/user_welcome_email.blade.php ENDPATH**/ ?>