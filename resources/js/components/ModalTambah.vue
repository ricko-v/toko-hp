<template>
    <div
        class="modal fade"
        :id="id"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
        :aria-labelledby="id + 'Label'"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" :id="id + 'Label'">
                        Tambah Produk {{ produk }}
                    </h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div v-if="produk == 'Baru'" class="modal-body">
                    <form>
                        <label>Nama Produk:</label>
                        <input
                            placeholder="ex: Redmi Note 10 Pro"
                            class="form-control mb-3 shadow-none"
                        />
                        <label>Harga Produk:</label>
                        <input
                            placeholder="ex: Rp 3.990.000"
                            class="form-control mb-3 shadow-none"
                        />
                        <label>Detail Produk:</label>
                        <textarea
                            placeholder="Spesifikasi Produk"
                            class="form-control mb-3 shadow-none"
                        />
                        <label>Gambar Produk:</label>
                        <input
                            type="file"
                            class="form-control mb-3 shadow-none"
                        />
                    </form>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                    >
                        Batal
                    </button>
                    <button type="button" class="btn btn-primary">
                        Tambahkan
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        id: String,
        produk: String,
    },
};
</script>
