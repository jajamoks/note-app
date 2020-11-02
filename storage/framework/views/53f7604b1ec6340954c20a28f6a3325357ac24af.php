<?php $__env->startSection('content'); ?>
<div class="mx-auto h-full flex justify-center items-center bg-white">
    <div class="w-96 rounded-lg shadow-xl p-6">

        <h1 class="text-3xl pt-8">Welcome Back</h1>
        <h2>Enter your credentials below</h2>

        <form method="POST" action="<?php echo e(route('login')); ?>" class="pt-8">
            <?php echo csrf_field(); ?>

            <div class="relative">
                <label for="email" class="uppercase  text-xs font-bold absolute pl-3 pt-2">E-mail</label>

                <div>
                    <input id="email" type="email" class="pt-8 w-full rounded p-3 bg-gray-200 outline-none focus:bg-gray-300" name="email" value="<?php echo e(old('email')); ?>" autocomplete="email" autofocus placeholder="your@email.com">

                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-red-600 text-sm pt-1" role="alert"><strong><?php echo e($message); ?></strong></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <div class="relative pt-3">
                <label for="password" class="uppercase text-xs font-bold absolute pl-3 pt-2">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="pt-8 w-full rounded p-3 bg-gray-200 outline-none focus:bg-gray-300" name="password" autocomplete="current-password" placeholder="Password">

                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-red-600 text-sm pt-1" role="alert"><strong><?php echo e($message); ?></strong></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <div class="pt-2">
                <input class="" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                <label class="" for="remember">Remember Me</label>
            </div>

            <div class="pt-8">
                <button type="submit"
                        class="w-full bg-gray-900 py-2 px-3 text-left uppercase rounded text-white font-bold">
                    Login
                </button>
            </div>

            <div class="flex justify-between pt-8  text-sm font-bold">
                <a class="hover:text-gray-800" href="<?php echo e(route('password.request')); ?>">
                    Forgot Your Password?
                </a>
                <a class="hover:text-gray-800" href="<?php echo e(route('register')); ?>">
                    Register
                </a>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ZEAMO\Desktop\BACKUP\LARAVEL\exam\resources\views/auth/login.blade.php ENDPATH**/ ?>