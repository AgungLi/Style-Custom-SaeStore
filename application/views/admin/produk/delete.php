<!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-<?php echo $produk->id_produk ?>">
    <i class="fas fa-trash"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="delete-<?php echo $produk->id_produk ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">HAPUS DATA PRODUK</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="callout callout-warning">
                    <h4>Peringatan!</h4>
                    Yakin ingin menghapus data?

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fas fa-times"></i> Keluar</button>
                <a href="<?php echo base_url('admin/produk/delete/' . $produk->id_produk) ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
            </div>
        </div>
    </div>
</div>