<?php if (isset($component)) { $__componentOriginal23a33f287873b564aaf305a1526eada4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a33f287873b564aaf305a1526eada4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => ['title' => 'Sirkulasi Peminjaman']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Sirkulasi Peminjaman']); ?>
    <h3 class="mb-4">Sirkulasi Peminjaman Buku</h3>

    <div class="card shadow-sm mb-4">
        <div class="card-header fw-semibold">Form Peminjaman Baru</div>
        <div class="card-body">
            <form action="<?php echo e(route('peminjaman.store')); ?>" method="POST" class="row g-3">
                <?php echo csrf_field(); ?>
                <div class="col-md-5">
                    <label class="form-label">Buku</label>
                    <select name="buku_id" class="form-select" required>
                        <option value="">-- Pilih buku --</option>
                        <?php $__currentLoopData = $bukus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($b->id); ?>" <?php if(old('buku_id') == $b->id): echo 'selected'; endif; ?>>
                                <?php echo e($b->judul); ?> (stok: <?php echo e($b->stok); ?>)
                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">NIM Peminjam</label>
                    <input type="text" name="nim_peminjam" value="<?php echo e(old('nim_peminjam')); ?>" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Nama Peminjam</label>
                    <input type="text" name="nama_peminjam" value="<?php echo e(old('nama_peminjam')); ?>" class="form-control" required>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-del">Pinjam Buku</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header fw-semibold">Riwayat Peminjaman</div>
        <div class="table-responsive">
            <table class="table table-striped align-middle mb-0">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Buku</th>
                        <th>Peminjam</th>
                        <th>Pinjam</th>
                        <th>Jatuh Tempo</th>
                        <th>Kembali</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $peminjamans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($p->kode_pinjam); ?></td>
                            <td><?php echo e($p->buku->judul); ?></td>
                            <td><?php echo e($p->nim_peminjam); ?><br><small class="text-muted"><?php echo e($p->nama_peminjam); ?></small></td>
                            <td><?php echo e($p->tanggal_pinjam); ?></td>
                            <td><?php echo e($p->tanggal_jatuh_tempo); ?></td>
                            <td><?php echo e($p->tanggal_kembali ?? '-'); ?></td>
                            <td>
                                <?php if($p->status === 'dipinjam'): ?>
                                    <span class="badge text-bg-warning">Dipinjam</span>
                                <?php else: ?>
                                    <span class="badge text-bg-success">Dikembalikan</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($p->status === 'dipinjam'): ?>
                                    <form action="<?php echo e(route('peminjaman.kembalikan', $p->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PATCH'); ?>
                                        <button class="btn btn-sm btn-outline-success">Kembalikan</button>
                                    </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="8" class="text-center text-muted py-4">Belum ada transaksi peminjaman.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3"><?php echo e($peminjamans->links()); ?></div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $attributes = $__attributesOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__attributesOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $component = $__componentOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__componentOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?><?php /**PATH D:\SEMESTER 5\PPW\ppw-2026-week6-12S24027\resources\views/peminjaman/index.blade.php ENDPATH**/ ?>