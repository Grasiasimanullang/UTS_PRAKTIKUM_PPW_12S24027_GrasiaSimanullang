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

    <div class="row g-3 mb-4">
        <div class="col-6 col-md-3">
            <div class="card shadow-sm h-100"><div class="card-body">
                <div class="text-muted small">Total Judul Buku</div>
                <div class="fs-3 fw-bold"><?php echo e($stats['total_judul']); ?></div>
            </div></div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card shadow-sm h-100"><div class="card-body">
                <div class="text-muted small">Total Stok Tersedia</div>
                <div class="fs-3 fw-bold"><?php echo e($stats['total_stok']); ?></div>
            </div></div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card shadow-sm h-100"><div class="card-body">
                <div class="text-muted small">Sedang Dipinjam</div>
                <div class="fs-3 fw-bold"><?php echo e($stats['sedang_dipinjam']); ?></div>
            </div></div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card shadow-sm h-100"><div class="card-body">
                <div class="text-muted small">Total Dikembalikan</div>
                <div class="fs-3 fw-bold"><?php echo e($stats['dikembalikan']); ?></div>
            </div></div>
        </div>
    </div>

    <form method="GET" action="<?php echo e(route('buku.index')); ?>" class="row g-2 mb-3">
        <div class="col-md-5">
            <input type="text" name="search" value="<?php echo e(request('search')); ?>"
                   class="form-control" placeholder="Cari judul / penulis / ISBN...">
        </div>
        <div class="col-md-4">
            <select name="kategori_id" class="form-select">
                <option value="">Semua Kategori</option>
                <?php $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($k->id); ?>" <?php if(request('kategori_id') == $k->id): echo 'selected'; endif; ?>>
                        <?php echo e($k->nama_kategori); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="col-md-3 d-flex gap-2">
            <button class="btn btn-del">Cari</button>
            <a href="<?php echo e(route('buku.index')); ?>" class="btn btn-outline-secondary">Reset</a>
        </div>
    </form>

    <?php if(session('last_search')): ?>
        <p class="text-muted small">Pencarian terakhir Anda (sesi):
            <a href="<?php echo e(route('buku.index', ['search' => session('last_search')])); ?>"><?php echo e(session('last_search')); ?></a>
        </p>
    <?php endif; ?>

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-striped align-middle mb-0">
                <thead>
                    <tr>
                        <th>ISBN</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Riwayat Pinjam</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $bukus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $buku): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($buku->isbn); ?></td>
                            <td><?php echo e($buku->judul); ?></td>
                            <td><?php echo e($buku->penulis); ?></td>
                            <td><?php echo e($buku->kategori->nama_kategori); ?></td>
                            <td>
                                <?php if($buku->stok < 1): ?>
                                    <span class="badge text-bg-danger">0</span>
                                <?php else: ?>
                                    <?php echo e($buku->stok); ?>

                                <?php endif; ?>
                            </td>
                            <td><?php echo e($buku->peminjamans_count); ?>x</td>
                            <td class="text-end">
                                <div class="d-inline-flex gap-1">
                                    <a href="<?php echo e(route('buku.show', $buku)); ?>" class="btn btn-sm btn-outline-secondary">Detail</a>
                                    <a href="<?php echo e(route('buku.edit', $buku)); ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                                    <form action="<?php echo e(route('buku.destroy', $buku)); ?>" method="POST"
                                          onsubmit="return confirm('Yakin hapus buku ini?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button class="btn btn-sm btn-outline-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                Tidak ada buku yang cocok dengan pencarian Anda.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
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
<?php endif; ?><?php /**PATH D:\SEMESTER 5\PPW\ppw-2026-week6-12S24027\resources\views/buku/index.blade.php ENDPATH**/ ?>