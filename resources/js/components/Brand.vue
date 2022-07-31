<template>
    <div class="container-fluid bg-silver mt-5 py-5">
        <div class="container">
            <div class="row">
                <div v-if="load" class="text-center">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <div
                    v-if="!load"
                    v-for="g in brand"
                    class="col-12 col-md-6 d-flex justify-content-center col-lg-3"
                >
                    <img class="img-brand" :src="g.gambar" />
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            brand: "",
            load: true,
        };
    },
    created() {
        this.axios.get("/api/produk/brand").then((res) => {
            this.brand = res.data["results"];
            this.load = false;
        });
    },
};
</script>
<style scoped>
.img-brand {
    width: 8rem;
}
</style>
