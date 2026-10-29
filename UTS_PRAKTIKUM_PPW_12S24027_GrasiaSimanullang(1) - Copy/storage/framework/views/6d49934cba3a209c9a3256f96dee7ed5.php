<?php if (isset($component)) { $__componentOriginal23a33f287873b564aaf305a1526eada4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a33f287873b564aaf305a1526eada4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => ['title' => 'Daftar Kategori']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Daftar Kategori']); ?>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Daftar Kategori</h3>
        <a href="<?php echo e(route('kategori.create')); ?>" class="btn btn-del">+ Tambah Kategori</a>
    </div>

    <div class="table-responsive bg-white shadow-sm rounded">
        <table class="table table-striped align-middle mb-0">
            <thead>
                <tr><th>Kode</th><th>Nama Kategori</th><th>Jumlah Buku</th><th class="text-end">Aksi</th></tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($kategori->kode_kategori); ?></td>
                        <td><?php echo e($kategori->nama_kategori); ?></td>
                        <td><?php echo e($kategori->bukus_count); ?></td>
                        <td class="text-end">
                            <a href="<?php echo e(route('kategori.show', $kategori)); ?>" class="btn btn-sm btn-outline-secondary">Detail</a>
                            <a href="<?php echo e(route('kategori.edit', $kategori)); ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="<?php echo e(route('kategori.destroy', $kategori)); ?>" method="POST" class="d-inline"
                                  onsubmit="return confirm('Menghapus kategori ini juga menghapus semua bukunya. Lanjutkan?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="4" class="text-center text-muted py-4">Belum ada kategori.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-3"><?php echo e($kategoris->links()); ?></div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $attributes = $__attributesOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__attributesOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $component = $__componentOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__componentOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?><?php /**PATH D:\SEMESTER 5\PPW\ppw-2026-week5-12S24027_Grasia\resources\views/kategori/index.blade.php ENDPATH**/ ?>