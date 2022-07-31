<template>
    <nav class="navbar fixed-top shadow-sm navbar-expand-lg bg-light">
        <div class="container py-1">
            <router-link class="navbar-brand fw-bold" to="/admin">
                <span v-if="this.$route.name == 'admin'">TokoHP</span>
                <svg
                    v-if="this.$route.name != 'admin'"
                    xmlns="http://www.w3.org/2000/svg"
                    width="20"
                    height="20"
                    fill="currentColor"
                    class="bi bi-arrow-left"
                    viewBox="0 0 16 16"
                >
                    <path
                        fill-rule="evenodd"
                        d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"
                    />
                </svg>
            </router-link>
            <button
                class="navbar-toggler shadow-none"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div
                class="collapse navbar-collapse justify-content-between"
                id="navbarSupportedContent"
            >
                <div></div>
                <div>
                    <button
                        @click="logout"
                        class="btn fw-bold px-4 rounded-3 btn-outline-danger me-2 shadow-none"
                    >
                        Logout
                    </button>
                </div>
            </div>
        </div>
    </nav>
</template>
<script>
export default {
    data() {
        return {};
    },
    methods: {
        logout() {
            this.axios
                .post("/api/auth/logout", { token: localStorage.HP_TOKEN })
                .then((res) => {
                    localStorage.HP_TOKEN = "";
                    this.$router.push({
                        path: "/admin/login",
                    });
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },
};
</script>
