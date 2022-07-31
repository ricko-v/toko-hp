<template>
    <div
        class="container-fluid bg-silver min-vh-100 d-flex justify-content-center align-items-center"
    >
        <div v-if="load" class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div
            v-if="!load"
            class="col-12 col-md-6 card rounded-3 shadow-none p-3"
        >
            <h3 class="text-danger text-center fw-bold">Login Admin</h3>
            <span v-if="error" class="text-danger text-center"
                >Login Gagal!</span
            >
            <hr class="border-2 border border-secondary" />
            <form>
                <label>Email:</label>
                <input
                    type="email"
                    v-model="email"
                    class="form-control shadow-none mb-3"
                />
                <label>Password:</label>
                <input
                    type="password"
                    v-model="password"
                    class="form-control shadow-none mb-3"
                />
            </form>
            <div>
                <button
                    :disabled="proses"
                    @click="login"
                    class="btn btn-primary shadow-none rounded-3 fw-bold px-4"
                >
                    {{ proses ? "Proses..." : "Login" }}
                </button>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            email: "",
            password: "",
            error: false,
            proses: false,
            load: true,
        };
    },
    created() {
        this.isAuth();
    },
    methods: {
        isAuth() {
            if (!localStorage.HP_TOKEN) {
                this.load = false;
            } else {
                this.axios
                    .post("/api/auth/me", { token: localStorage.HP_TOKEN })
                    .then((res) => {
                        this.$router.push({
                            path: "/admin",
                        });
                    })
                    .catch((err) => {
                        this.load = false;
                    });
            }
        },
        login() {
            let akun = {
                email: this.email,
                password: this.password,
            };

            this.proses = true;
            this.axios
                .post("/api/auth/login", akun)
                .then((res) => {
                    localStorage.HP_TOKEN = res.data["access_token"];
                    this.$router.push({
                        path: "/admin",
                    });
                })
                .catch((err) => {
                    this.error = true;
                    this.email = "";
                    this.password = "";
                    setTimeout(() => {
                        this.error = false;
                        this.proses = false;
                    }, 3000);
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
