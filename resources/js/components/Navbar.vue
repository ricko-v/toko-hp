<template>
    <nav class="navbar fixed-top shadow-sm navbar-expand-lg bg-light">
        <div class="container py-1">
            <a class="navbar-brand fw-bold" href="#">TokoHP</a>
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
                <div>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a
                                class="nav-link fw-bold link-secondary"
                                href="#baru"
                                >Baru</a
                            >
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link fw-bold link-secondary"
                                href="#second"
                                >Second</a
                            >
                        </li>
                    </ul>
                </div>
                <div class="w-50 mb-3 mb-lg-0">
                    <form class="d-flex" role="search">
                        <input
                            class="form-control rounded-3 shadow-none"
                            type="search"
                            placeholder="Mau cari HP seperti apa?"
                            aria-label="Search"
                        />
                    </form>
                </div>
                <div>
                    <button
                        class="btn fw-bold px-4 rounded-3 btn-outline-primary me-2 shadow-none"
                    >
                        Masuk
                    </button>
                    <button
                        class="btn fw-bold px-4 rounded-3 btn-primary shadow-none"
                    >
                        Daftar
                    </button>
                </div>
            </div>
        </div>
    </nav>
</template>
