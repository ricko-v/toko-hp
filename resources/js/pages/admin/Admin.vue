<template>
    <div
        class="container-fluid pt-5 min-vh-100 bg-silver d-flex align-items-center justify-content-center"
    >
        <div v-if="load" class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="w-100 pt-5 pt-md-0" v-if="!load">
            <Navbar></Navbar>

            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3 mb-4">
                        <div
                            class="card shadow-sm bg-danger text-white rounded-3 p-3"
                        >
                            <div
                                class="d-flex align-items-center justify-content-between"
                            >
                                <div><b>Produk Baru</b></div>
                                <div>
                                    <h2 class="fw-bold m-0">
                                        {{ baru.length }}
                                    </h2>
                                </div>
                            </div>
                            <hr />
                            <div>
                                <router-link to="/admin/produk_baru">
                                    <button
                                        class="btn w-100 btn-outline-light shadow-none"
                                    >
                                        Lihat Data
                                    </button>
                                </router-link>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 mb-4">
                        <div
                            class="card shadow-sm bg-dark text-white rounded-3 p-3"
                        >
                            <div
                                class="d-flex align-items-center justify-content-between"
                            >
                                <div><b>Produk Second</b></div>
                                <div>
                                    <h2 class="fw-bold m-0">
                                        {{ second.length }}
                                    </h2>
                                </div>
                            </div>
                            <hr />
                            <div>
                                <router-link to="/admin/produk_second">
                                    <button
                                        class="btn w-100 btn-outline-light shadow-none"
                                    >
                                        Lihat Data
                                    </button>
                                </router-link>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 mb-4">
                        <div
                            class="card shadow-sm bg-success text-white rounded-3 p-3"
                        >
                            <div
                                class="d-flex align-items-center justify-content-between"
                            >
                                <div><b>Produk Diskon</b></div>
                                <div>
                                    <h2 class="fw-bold m-0">
                                        {{ diskon.length }}
                                    </h2>
                                </div>
                            </div>
                            <hr />
                            <div>
                                <router-link to="/admin/produk_diskon">
                                    <button
                                        class="btn w-100 btn-outline-light shadow-none"
                                    >
                                        Lihat Data
                                    </button>
                                </router-link>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 mb-4">
                        <div
                            class="card shadow-sm bg-primary text-white rounded-3 p-3"
                        >
                            <div
                                class="d-flex align-items-center justify-content-between"
                            >
                                <div><b>Produk Brand</b></div>
                                <div>
                                    <h2 class="fw-bold m-0">
                                        {{ brand.length }}
                                    </h2>
                                </div>
                            </div>
                            <hr />
                            <div>
                                <router-link to="/admin/produk_brand">
                                    <button
                                        class="btn w-100 btn-outline-light shadow-none"
                                    >
                                        Lihat Data
                                    </button>
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import NavbarAdmin from "../../components/NavbarAdmin.vue";
export default {
    components: {
        Navbar: NavbarAdmin,
    },
    data() {
        return {
            load: true,
            baru: "",
            second: "",
            diskon: "",
            brand: "",
        };
    },
    created() {
        this.isAuth();
        this.getBaru();
        this.getSecond();
        this.getDiskon();
        this.getBrand();
    },
    methods: {
        isAuth() {
            if (!localStorage.HP_TOKEN) {
                this.$router.push({
                    path: "/admin/login",
                });
            } else {
                this.axios
                    .post("/api/auth/me", { token: localStorage.HP_TOKEN })
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
        getBaru() {
            this.axios.get("/api/produk/baru").then((res) => {
                this.baru = res.data["results"];
            });
        },
        getSecond() {
            this.axios.get("/api/produk/second").then((res) => {
                this.second = res.data["results"];
            });
        },
        getDiskon() {
            this.axios.get("/api/produk/diskon").then((res) => {
                this.diskon = res.data["results"];
            });
        },
        getBrand() {
            this.axios.get("/api/produk/brand").then((res) => {
                this.brand = res.data["results"];
            });
        },
    },
};
</script>
<style scoped>
.bg-silver {
    background: #ebfbee;
}
</style>
