<template>
    <div class="container-fluid py-4 bg-silver">
        <div class="container">
            <div
                class="banner-diskon align-items-center mb-4 d-flex justify-content-between"
            >
                <div class="d-flex align-items-center">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="23"
                        height="23"
                        fill="currentColor"
                        viewBox="0 0 16 16"
                        class="bi bi-emoji-laughing text-purple"
                    >
                        <path
                            d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                        ></path>
                        <path
                            d="M12.331 9.5a1 1 0 0 1 0 1A4.998 4.998 0 0 1 8 13a4.998 4.998 0 0 1-4.33-2.5A1 1 0 0 1 4.535 9h6.93a1 1 0 0 1 .866.5zM7 6.5c0 .828-.448 0-1 0s-1 .828-1 0S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 0-1 0s-1 .828-1 0S9.448 5 10 5s1 .672 1 1.5z"
                        ></path>
                    </svg>
                    <b class="ms-2 fw-bold">Lagi Diskon</b>
                </div>
                <div>
                    <button class="btn btn-outline-dark">Lihat Semua</button>
                </div>
            </div>
            <div v-if="load" class="text-center">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            <div v-if="!load">
                <div
                    id="carouselDiskonPC"
                    class="carousel slide produk-slide d-none d-lg-block"
                    data-bs-ride="true"
                >
                    <div class="carousel-inner produk-slide">
                        <div
                            v-for="a in 2"
                            class="carousel-item"
                            :class="a == 1 ? 'active' : ''"
                        >
                            <div
                                class="row d-flex justify-content-center align-items-center h-100"
                            >
                                <div
                                    v-for="p in produk.slice(a * 3 - 3, 3 * a)"
                                    class="col-12 col-md-6 card-group col-lg-4 mb-4"
                                >
                                    <div class="card shadow-sm p-3 rounded-3">
                                        <div class="d-flex">
                                            <div class="col-6">
                                                <b>{{ p.nama }}</b>
                                                <br />
                                                <span
                                                    class="text-primary fw-bold"
                                                    >{{ p.harga_diskon }}</span
                                                >
                                                <br />
                                                <s
                                                    ><small>{{
                                                        p.harga_asli
                                                    }}</small></s
                                                >
                                                <br />
                                                <button
                                                    data-bs-toggle="modal"
                                                    :data-bs-target="
                                                        '#ModalDiskon-' + p.id
                                                    "
                                                    class="btn d-flex btn-outline-dark pt-1 mt-3 shadow-none align-items-center"
                                                >
                                                    <p class="m-0 me-2">
                                                        <small
                                                            >Lihat Produk</small
                                                        >
                                                    </p>
                                                </button>
                                            </div>
                                            <div
                                                class="col-6 justify-content-end d-flex"
                                            >
                                                <div
                                                    class="badge position-absolute"
                                                    :class="
                                                        p.keterangan == 'Baru'
                                                            ? 'bg-success'
                                                            : 'bg-danger'
                                                    "
                                                >
                                                    {{ p.keterangan }}
                                                </div>
                                                <img
                                                    class="img-produk lazy-diskon"
                                                    :data-src="p.gambar"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-indicators position-relative">
                        <button
                            v-for="a in 2"
                            type="button"
                            data-bs-target="#carouselDiskonPC"
                            :data-bs-slide-to="a - 1"
                            class="bg-dark"
                            :class="a == 1 ? 'active' : ''"
                            aria-current="true"
                            :aria-label="'Slide ' + a"
                        ></button>
                    </div>
                </div>

                <div
                    id="carouselDiskonMB"
                    class="carousel slide produk-slide d-block d-md-none"
                    data-bs-ride="true"
                >
                    <div class="carousel-inner produk-slide">
                        <div
                            v-for="(p, index) in produk.slice(0, 6)"
                            class="carousel-item"
                            :class="index == 0 ? 'active' : ''"
                        >
                            <div class="card shadow-sm p-3 rounded-3">
                                <div class="d-flex">
                                    <div class="col-6">
                                        <b>{{ p.nama }}</b>
                                        <br />
                                        <span class="text-primary fw-bold">{{
                                            p.harga_diskon
                                        }}</span>
                                        <br />
                                        <s
                                            ><small>{{
                                                p.harga_asli
                                            }}</small></s
                                        >
                                        <br />
                                        <button
                                            data-bs-toggle="modal"
                                            :data-bs-target="
                                                '#ModalDiskon-' + p.id
                                            "
                                            class="btn d-flex btn-outline-dark pt-1 mt-3 shadow-none align-items-center"
                                        >
                                            <p class="m-0 me-2">
                                                <small>Lihat Produk</small>
                                            </p>
                                        </button>
                                    </div>
                                    <div
                                        class="col-6 justify-content-end d-flex"
                                    >
                                        <div
                                            class="badge position-absolute"
                                            :class="
                                                p.keterangan == 'baru'
                                                    ? 'bg-success'
                                                    : 'bg-danger'
                                            "
                                        >
                                            {{ p.keterangan }}
                                        </div>
                                        <img
                                            class="img-produk lazy-diskon"
                                            :data-src="p.gambar"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-indicators position-relative mt-4">
                        <button
                            v-for="a in 6"
                            type="button"
                            data-bs-target="#carouselDiskonMB"
                            :data-bs-slide-to="a - 1"
                            class="bg-dark"
                            :class="a == 1 ? 'active' : ''"
                            aria-current="true"
                            :aria-label="'Slide ' + a"
                        ></button>
                    </div>
                </div>

                <div
                    id="carouselDiskonMD"
                    class="carousel slide produk-slide d-none d-md-block d-lg-none"
                    data-bs-ride="true"
                >
                    <div class="carousel-inner produk-slide">
                        <div
                            v-for="a in 3"
                            class="carousel-item"
                            :class="a == 1 ? 'active' : ''"
                        >
                            <div
                                class="row d-flex justify-content-center align-items-center h-100"
                            >
                                <div
                                    v-for="p in produk.slice(a * 2 - 2, a * 2)"
                                    class="col-12 col-md-6 col-lg-4 mb-4"
                                >
                                    <div class="card shadow-sm p-3 rounded-3">
                                        <div class="d-flex">
                                            <div class="col-6">
                                                <b>{{ p.nama }}</b>
                                                <br />
                                                <span
                                                    class="text-primary fw-bold"
                                                    >{{ p.harga_diskon }}</span
                                                >
                                                <br />
                                                <s
                                                    ><small>{{
                                                        p.harga_asli
                                                    }}</small></s
                                                >
                                                <br />
                                                <button
                                                    class="btn d-flex btn-outline-dark pt-1 mt-3 shadow-none align-items-center"
                                                >
                                                    <p class="m-0 me-2">
                                                        <small
                                                            >Lihat Produk</small
                                                        >
                                                    </p>
                                                </button>
                                            </div>
                                            <div
                                                class="col-6 justify-content-end d-flex"
                                            >
                                                <div
                                                    class="badge position-absolute"
                                                    :class="
                                                        p.keterangan == 'baru'
                                                            ? 'bg-success'
                                                            : 'bg-danger'
                                                    "
                                                >
                                                    {{ p.keterangan }}
                                                </div>
                                                <img
                                                    class="img-produk lazy-diskon"
                                                    :data-src="p.gambar"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-indicators position-relative">
                        <button
                            v-for="a in 3"
                            type="button"
                            data-bs-target="#carouselDiskonMD"
                            :data-bs-slide-to="a - 1"
                            class="bg-dark"
                            :class="a == 1 ? 'active' : ''"
                            aria-current="true"
                            :aria-label="'Slide ' + a"
                        ></button>
                    </div>
                </div>

                <div
                    v-for="m in produk"
                    class="modal fade"
                    :id="'ModalDiskon-' + m.id"
                    data-bs-backdrop="static"
                    data-bs-keyboard="false"
                    tabindex="-1"
                    aria-labelledby="staticBackdropLabel"
                >
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5
                                    class="modal-title"
                                    id="staticBackdropLabel"
                                >
                                    {{ m.nama }}
                                </h5>
                                <div
                                    :class="
                                        m.keterangan == 'Baru'
                                            ? 'bg-success'
                                            : 'bg-danger'
                                    "
                                    class="badge pt-1 ms-2"
                                >
                                    {{ m.keterangan }}
                                </div>
                                <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                ></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div
                                        class="col-12 col-md-4 d-flex mb-4 justify-content-center"
                                    >
                                        <div class="text-center">
                                            <img
                                                class="img-produk"
                                                :src="m.gambar"
                                            />
                                            <h6
                                                class="text-primary fw-bold mt-3 mb-0"
                                            >
                                                {{ m.harga_diskon }}
                                            </h6>
                                            <p class="m-0">
                                                <small
                                                    ><s>{{
                                                        m.harga_asli
                                                    }}</s></small
                                                >
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-8 mb-4">
                                        <ul>
                                            <li
                                                v-for="i in m.detail.split(
                                                    '\n'
                                                )"
                                            >
                                                {{ i }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
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
                                    type="button"
                                    class="btn btn-primary shadow-none"
                                >
                                    Tambahkan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            produk: "",
            load: true,
        };
    },
    created() {
        this.axios.get("/api/produk/diskon").then((res) => {
            this.produk = res.data["results"];
            this.load = false;
            setTimeout(() => {
                this.lazyImg("lazy-diskon");
            }, 1000);
        });
    },
    methods: {
        lazyImg(nclass) {
            var lazyloadImages = document.querySelectorAll(`img.${nclass}`);
            var lazyloadThrottleTimeout;

            function lazyload() {
                if (lazyloadThrottleTimeout) {
                    clearTimeout(lazyloadThrottleTimeout);
                }

                lazyloadThrottleTimeout = setTimeout(function () {
                    var scrollTop = window.pageYOffset;
                    lazyloadImages.forEach(function (img) {
                        if (img.offsetTop < window.innerHeight + scrollTop) {
                            img.src = img.dataset.src;
                            img.classList.remove(`${nclass}`);
                        }
                    });
                    if (lazyloadImages.length == 0) {
                        document.removeEventListener("scroll", lazyload);
                        window.removeEventListener("resize", lazyload);
                        window.removeEventListener(
                            "orientationChange",
                            lazyload
                        );
                    }
                }, 20);
            }

            document.addEventListener("scroll", lazyload);
            window.addEventListener("resize", lazyload);
            window.addEventListener("orientationChange", lazyload);
        },
    },
};
</script>
<style scoped>
.img-produk {
    width: 7rem;
    height: 9rem;
}
</style>
