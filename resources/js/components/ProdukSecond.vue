<template>
    <div id="second" class="pt-5">
        <div class="container py-4">
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
                        class="bi bi-node-minus text-purple"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M11 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8zM6.025 7.5a5 5 0 1 1 0 1H4A1.5 1.5 0 0 1 2.5 10h-1A1.5 1.5 0 0 1 0 8.5v-1A1.5 1.5 0 0 1 1.5 6h1A1.5 1.5 0 0 1 4 7.5h2.025zM1.5 7a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM8 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5A.5.5 0 0 1 8 8z"
                        ></path>
                    </svg>
                    <b class="ms-2 fw-bold">Produk Second</b>
                </div>
                <div>
                    <button class="btn btn-outline-dark">Lihat Semua</button>
                </div>
            </div>

            <div class="row">
                <div v-if="load" class="text-center">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <div
                    v-if="!load"
                    v-for="p in produk"
                    class="col-12 col-md-6 col-lg-3 mb-4 card-group"
                >
                    <div class="card bg-silver p-3 rounded-3 text-center">
                        <div class="d-flex justify-content-center">
                            <img
                                class="produk-card lazy-second"
                                :data-src="p.gambar"
                            />
                        </div>
                        <div class="mt-2">
                            <b>{{ p.nama }}</b>
                            <br />
                            <b class="text-primary">{{ p.harga }}</b>
                            <br />
                            <button
                                data-bs-toggle="modal"
                                :data-bs-target="'#ModalSecond-' + p.id"
                                class="btn mt-2 btn-outline-dark shadow-none pt-1"
                            >
                                <small>Lihat Produk</small>
                            </button>
                        </div>
                    </div>
                </div>

                <div
                    v-for="m in produk"
                    class="modal fade"
                    :id="'ModalSecond-' + m.id"
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
                                                class="produk-card"
                                                :src="m.gambar"
                                            />
                                            <h6
                                                class="text-primary fw-bold mt-3 mb-0"
                                            >
                                                {{ m.harga }}
                                            </h6>
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
        this.axios.get("/api/produk/second").then((res) => {
            this.produk = res.data["results"];
            this.load = false;
            setTimeout(() => {
                this.lazyImg("lazy-second");
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
.bg-silver {
    background: #ebfbee;
}
.produk-card {
    width: 5rem;
}
</style>
