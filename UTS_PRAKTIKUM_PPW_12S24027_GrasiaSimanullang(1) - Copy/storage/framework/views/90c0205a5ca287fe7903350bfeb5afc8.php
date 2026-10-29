<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">ISBN</label>
        <input type="text" name="isbn" class="form-control" value="<?php echo e(old('isbn', $buku->isbn ?? '')); ?>">
    </div>
    <div class="col-md-6">
        <label class="form-label">Judul</label>
        <input type="text" name="judul" class="form-control" value="<?php echo e(old('judul', $buku->judul ?? '')); ?>">
    </div>
    <div class="col-md-6">
        <label class="form-label">Penulis</label>
        <input type="text" name="penulis" class="form-control" value="<?php echo e(old('penulis', $buku->penulis ?? '')); ?>">
    </div>
    <div class="col-md-6">
        <label class="form-label">Penerbit</label>
        <input type="text" name="penerbit" class="form-control" value="<?php echo e(old('penerbit', $buku->penerbit ?? '')); ?>">
    </div>
    <div class="col-md-4">
        <label class="form-label">Tahun Terbit</label>
        <input type="number" name="tahun_terbit" class="form-control" value="<?php echo e(old('tahun_terbit', $buku->tahun_terbit ?? '')); ?>">
    </div>
    <div class="col-md-4">
        <label class="form-label">Kategori</label>
        <select name="kategori_id" class="form-select">
            <option value="">-- Pilih Kategori --</option>
            <?php $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($k->id); ?>" <?php if(old('kategori_id', $buku->kategori_id ?? '') == $k->id): echo 'selected'; endif; ?>>
                    <?php echo e($k->nama_kategori); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="col-md-4">
        <label class="form-label">Stok</label>
        <input type="number" name="stok" class="form-control" value="<?php echo e(old('stok', $buku->stok ?? 0)); ?>">
    </div>
    <div class="col-12">
        <label class="form-label">Sinopsis</label>
        <textarea name="sinopsis" rows="4" class="form-control"><?php echo e(old('sinopsis', $buku->sinopsis ?? '')); ?></textarea>
    </div>
</div>
<div class="mt-4">
    <button type="submit" class="btn btn-del">Simpan</button>
    <a href="<?php echo e(route('buku.index')); ?>" class="btn btn-outline-secondary">Batal</a>
</div><?php /**PATH D:\SEMESTER 5\PPW\ppw-2026-week5-12S24027_Grasia\resources\views/buku/_form.blade.php ENDPATH**/ ?>