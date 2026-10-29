<?php if (isset($component)) { $__componentOriginal23a33f287873b564aaf305a1526eada4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a33f287873b564aaf305a1526eada4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => ['title' => 'Daftar Buku']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Daftar Buku']); ?>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Daftar Buku</h3>
        <a href="<?php echo e(route('buku.create')); ?>" class="btn btn-del">+ Tambah Buku</a>
    </div>

    <div class="table-responsive bg-white shadow-sm rounded">
        <table class="table table-striped align-middle mb-0">
            <thead>
                <tr>
                    <th>ISBN</th><th>Judul</th><th>Penulis</th>
                    <th>Kategori</th><th>Stok</th><th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $bukus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $buku): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($buku->isbn); ?></td>
                        <td><?php echo e($buku->judul); ?></td>
                        <td><?php echo e($buku->penulis); ?></td>
                        <td><?php echo e($buku->kategori->nama_kategori); ?></td>
                        <td><?php echo e($buku->stok); ?></td>
                        <td class="text-end">
                            <a href="<?php echo e(route('buku.show', $buku)); ?>" class="btn btn-sm btn-outline-secondary">Detail</a>
                            <a href="<?php echo e(route('buku.edit', $buku)); ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="<?php echo e(route('buku.destroy', $buku)); ?>" method="POST" class="d-inline"
                                  onsubmit="return confirm('Hapus buku ini?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="6" class="text-center text-muted py-4">Belum ada data buku.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-3"><?php echo e($bukus->links()); ?></div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $attributes = $__attributesOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__attributesOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $component = $__componentOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__componentOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?><?php /**PATH D:\SEMESTER 5\PPW\ppw-2026-week5-12S24027_Grasia\resources\views/buku/index.blade.php ENDPATH**/ ?>