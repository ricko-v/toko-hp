<template>
    <div>
        <Navbar></Navbar>
        <div class="container-fluid bg-hero min-vh-100">
            <div class="container">
                <div class="row min-vh-100 d-flex align-items-center">
                    <div class="col-12 col-md-6 col-lg-6">
                        <h2 class="text-white fw-bold">
                            Kami menjual
                            <span class="text-danger">HandPhone</span> <br />
                            baru dan second.
                        </h2>
                        <small class="text-white"
                            >Ingin melihat produk kami?</small
                        >
                        <div class="mt-3">
                            <a href="#baru">
                                <button
                                    class="btn btn-outline-light rounded-3 px-4 me-3"
                                >
                                    Baru
                                </button>
                            </a>
                            <a href="#second">
                                <button
                                    class="btn btn-outline-light rounded-3 px-4 me-3"
                                >
                                    Second
                                </button>
                            </a>
                        </div>
                    </div>
                    <div
                        class="col-12 col-md-6 col-lg-6 d-none d-md-block pt-5"
                    >
                        <img
                            src="/img/item-hero.svg"
                            class="img-fluid p-0 p-lg-5"
                        />
                    </div>
                </div>
            </div>
        </div>
        <div class="container py-4 pt-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div
                        class="d-flex border align-items-center border-secondary justify-content-center p-4 rounded-3"
                    >
                        <div class="me-4">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="40"
                                height="40"
                                fill="currentColor"
                                viewBox="0 0 16 16"
                                class="bi bi-truck"
                            >
                                <path
                                    d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"
                                ></path>
                            </svg>
                        </div>
                        <div>
                            <h5><b>Gratis Ongkir</b></h5>
                            <span>Untuk daerah Solo Raya</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div
                        class="d-flex align-items-center border border-secondary justify-content-center p-4 rounded-3"
                    >
                        <div class="me-4">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="40"
                                height="40"
                                fill="currentColor"
                                viewBox="0 0 16 16"
                                class="bi bi-cash-stack text-purple"
                            >
                                <path
                                    d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"
                                ></path>
                                <path
                                    d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z"
                                ></path>
                            </svg>
                        </div>
                        <div>
                            <h5><b>Produk Bergaransi</b></h5>
                            <span>Untuk semua produk</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div
                        class="d-flex align-items-center border border-secondary justify-content-center p-4 rounded-3"
                    >
                        <div class="me-4">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="40"
                                height="40"
                                fill="currentColor"
                                viewBox="0 0 16 16"
                                class="bi bi-headset text-purple"
                            >
                                <path
                                    d="M8 1a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a6 6 0 1 1 12 0v6a2.5 2.5 0 0 1-2.5 2.5H9.366a1 1 0 0 1-.866.5h-1a1 1 0 1 1 0-2h1a1 1 0 0 1 .866.5H11.5A1.5 1.5 0 0 0 13 12h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1V6a5 5 0 0 0-5-5z"
                                ></path>
                            </svg>
                        </div>
                        <div>
                            <h5><b>Full Online Services</b></h5>
                            <span>Untuk semua pembeli</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Diskon></Diskon>
        <ProdukBaru></ProdukBaru>
        <ProdukSecond></ProdukSecond>
        <Brand></Brand>
        <Footer></Footer>
    </div>
</template>
<script>
import Navbar from "../components/Navbar.vue";
import Diskon from "../components/Diskon.vue";
import ProdukBaru from "../components/ProdukBaru.vue";
import ProdukSecond from "../components/ProdukSecond.vue";
import Brand from "../components/Brand.vue";
import Footer from "../components/Footer.vue";

export default {
    components: {
        Navbar: Navbar,
        Diskon: Diskon,
        ProdukBaru: ProdukBaru,
        ProdukSecond: ProdukSecond,
        Brand: Brand,
        Footer: Footer,
    },
};
</script>
<style scoped>
.bg-hero {
    background-image: url("/img/hero.svg");
    position: center;
    background-attachment: fixed;
    background-size: cover;
}
.bg-silver {
    background: #ebfbee;
}
.produk-slide {
    height: 15rem;
}
</style>
