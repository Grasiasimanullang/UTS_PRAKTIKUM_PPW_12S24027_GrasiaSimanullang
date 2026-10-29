<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e($title ?? 'SIPUS-Del'); ?> — Institut Teknologi Del</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-del { background-color: #4C1D95; }
        .btn-del { background-color: #4C1D95; color: #fff; }
        .btn-del:hover { background-color: #3B0764; color: #fff; }
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark navbar-del shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?php echo e(route('buku.index')); ?>">SIPUS-Del Perpustakaan</a>
            <div class="navbar-nav flex-row gap-3 align-items-center">
                <a class="nav-link" href="<?php echo e(route('buku.index')); ?>">Buku</a>
                <a class="nav-link" href="<?php echo e(route('kategori.index')); ?>">Kategori</a>
                <a class="nav-link" href="<?php echo e(route('peminjaman.index')); ?>">Peminjaman</a>
                <?php if(auth()->guard()->check()): ?>
                    <span class="navbar-text small text-white-50">
                        <?php echo e(auth()->user()->name); ?> · <?php echo e(session('login_timestamp')); ?>

                    </span>
                    <form action="<?php echo e(route('logout')); ?>" method="POST" class="d-inline">
                        <?php echo csrf_field(); ?>
                        <button class="btn btn-sm btn-outline-light">Logout</button>
                    </form>
                <?php else: ?>
                    <a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <div class="container pb-5">
        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show">
                <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if(session('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <?php echo e(session('error')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <strong>Periksa kembali isian Anda:</strong>
                <ul class="mb-0">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php echo e($slot); ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH D:\SEMESTER 5\PPW\ppw-2026-week6-12S24027\resources\views/components/layout.blade.php ENDPATH**/ ?>