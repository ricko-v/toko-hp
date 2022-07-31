<template>
    <div>
        <Navbar></Navbar>
        <div
            class="container-fluid min-vh-100 bg-silver mt-5 d-flex align-items-center justify-content-center pt-5 pt-lg-0"
        >
            <div v-if="load" class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <div v-if="!load" class="container card py-3 overflow-auto">
                <div
                    class="d-flex w-100 justify-content-between align-items-center"
                >
                    <h3 class="fw-bold m-0">Data Produk Brand</h3>
                    <button
                        data-bs-toggle="modal"
                        data-bs-target="#ProdukBaru"
                        class="btn btn-primary shadow-none"
                    >
                        Tambah Brand
                    </button>
                </div>
                <hr />
                <center>
                    <div
                        v-if="!produk"
                        class="spinner-border text-primary"
                        role="status"
                    >
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </center>
                <table
                    v-if="produk"
                    class="table mt-3 table-bordered border-secondary align-middle text-center"
                >
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Gambar</th>
                            <th>Edit</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(p, index) in produk">
                            <td>{{ index + 1 }}</td>
                            <td>{{ p.nama }}</td>
                            <td>
                                <img :src="p.gambar" class="img-view" />
                            </td>
                            <td>
                                <button
                                    data-bs-toggle="modal"
                                    :data-bs-target="'#EditProduk-' + p.id"
                                    class="btn btn-warning pt-1 shadow-none"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        fill="currentColor"
                                        class="bi bi-pencil-square"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"
                                        />
                                        <path
                                            fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"
                                        />
                                    </svg>
                                </button>
                            </td>
                            <td>
                                <button
                                    @click="hapus(p.id)"
                                    class="btn btn-danger pt-1 shadow-none"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        fill="currentColor"
                                        class="bi bi-trash"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"
                                        />
                                        <path
                                            fill-rule="evenodd"
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"
                                        />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div
                class="modal fade"
                id="ProdukBaru"
                data-bs-backdrop="static"
                data-bs-keyboard="false"
                tabindex="-1"
                aria-labelledby="staticBackdropLabel"
            >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">
                                Tambah Produk Brand
                            </h5>
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            ></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <small v-if="error" class="text-danger">
                                    Gagal mennambahkan produk!
                                </small>
                                <small v-if="berhasil" class="text-success">
                                    Berhasil menambahkan produk
                                </small>
                            </div>
                            <form>
                                <label>Nama Produk:</label>
                                <input
                                    v-model="nama"
                                    placeholder="ex: Xiaomi"
                                    class="form-control mb-3 shadow-none"
                                />
                                <label>Gambar Produk:</label>
                                <input
                                    @change="fngambar"
                                    type="file"
                                    class="form-control mb-3 shadow-none"
                                />
                                <img class="img-view" :src="previewImg" />
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
                            <button
                                @click="tambah"
                                type="button"
                                class="btn btn-primary shadow-none"
                            >
                                Tambahkan
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div
                v-for="(e, index) in produk"
                class="modal fade"
                :id="'EditProduk-' + e.id"
                data-bs-backdrop="static"
                data-bs-keyboard="false"
                tabindex="-1"
                :aria-labelledby="'staticBackdropLabel-' + e.id"
            >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5
                                class="modal-title"
                                :id="'staticBackdropLabel-' + e.id"
                            >
                                Edit Produk Brand
                            </h5>
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            ></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <small v-if="errorEdit" class="text-danger">
                                    Gagal mengedit produk!
                                </small>
                                <small v-if="berhasilEdit" class="text-success">
                                    Berhasil mengedit produk
                                </small>
                            </div>
                            <form>
                                <label>ID Produk</label>
                                <input
                                    disabled
                                    class="form-control mb-3"
                                    :value="e.id"
                                />
                                <label>Nama Produk:</label>
                                <input
                                    :value="e.nama"
                                    :id="'nama-' + e.id"
                                    placeholder="ex: Xiaomi"
                                    class="form-control mb-3 shadow-none"
                                />
                                <label>Gambar Produk:</label>
                                <br /><br />
                                <img class="img-view" :src="e.gambar" />
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
                            <button
                                @click="edit(e.id)"
                                type="button"
                                class="btn btn-warning shadow-none"
                            >
                                Edit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import NavbarAdmin from "../../components/NavbarAdmin.vue";
import ModalTambah from "../../components/ModalTambah.vue";

export default {
    components: {
        Navbar: NavbarAdmin,
        ModalTambah: ModalTambah,
    },
    data() {
        return {
            load: true,
            produk: "",
            nama: "",
            harga: "",
            detail: "",
            gambar: "",
            previewImg: "",
            errorEdit: "",
            berhasilEdit: "",
            error: "",
            berhasil: "",
        };
    },
    created() {
        this.isAuth();
        this.getProduk();
    },
    methods: {
        isAuth() {
            if (!localStorage.HP_TOKEN) {
                this.$router.push({
                    path: "/admin/login",
                });
            } else {
                this.axios
                    .post("/api/auth/me", {
                        token: localStorage.HP_TOKEN,
                    })
                    .then((res) => {
                        this.load = false;
                    })
                    .catch((err) => {
                        this.$router.push({
                            path: "/admin/login",
                        });
                    });
            }
        },
        getProduk() {
            this.axios
                .get("/api/produk/brand")
                .then((res) => {
                    this.produk = res.data["results"];
                })
                .catch((err) => {
                    alert(err);
                });
        },
        tambah() {
            let data = new FormData();
            data.append("gambar", this.gambar);
            data.append("token", localStorage.HP_TOKEN);
            data.append("nama", this.nama);
            data.append("harga", this.harga);
            data.append("detail", this.detail);

            this.axios
                .post("/api/produk/brand/store", data)
                .then((res) => {
                    this.berhasil = true;
                    this.nama = "";
                    this.gambar = "";
                    this.harga = "";
                    this.detail = "";
                    this.previewImg = "";
                    this.getProduk();
                    setTimeout(() => {
                        this.berhasil = false;
                    }, 2000);
                })
                .catch((err) => {
                    this.error = true;
                    setTimeout(() => {
                        this.error = false;
                    }, 2000);
                });
        },
        edit(id) {
            let nama = document.querySelector(`#nama-${id}`).value;

            let data = new FormData();
            data.append("id", id);
            data.append("token", localStorage.HP_TOKEN);
            data.append("nama", nama);

            this.axios
                .post("/api/produk/brand/update", data)
                .then((res) => {
                    this.berhasilEdit = true;
                    setTimeout(() => {
                        this.berhasilEdit = false;
                    }, 2000);
                    this.getProduk();
                })
                .catch((err) => {
                    this.errorEdit = true;
                    setTimeout(() => {
                        this.errorEdit = false;
                    }, 2000);
                });
        },
        hapus(id) {
            let tanya = confirm("Yakin menghapus produk?");
            if (tanya) {
                this.axios
                    .post("/api/produk/brand/delete", {
                        id: id,
                        token: localStorage.HP_TOKEN,
                    })
                    .then((res) => {
                        this.getProduk();
                    })
                    .catch((err) => {
                        alert(err);
                    });
            }
        },
        fngambar() {
            this.gambar = event.target.files[0];
            this.previewImg = URL.createObjectURL(this.gambar);
        },
    },
};
</script>

<style scoped>
.bg-silver {
    background: #ebfbee;
}

.img-view {
    width: 3rem;
}
</style>
