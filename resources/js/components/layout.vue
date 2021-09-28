<template>
    <div>
        <nav class="site-nav">
            <div class="container">
                <div class="site-navigation">
                    <div class="row">
                        <div
                            class="col-md-4 text-center order-1 order-md-2 mb-3 mb-md-0"
                        >
                            <router-link to="/" class="logo m-0 text-uppercase">
                                MagDesign
                            </router-link>
                        </div>
                        <div class="col-md-4 order-3 order-md-1">
                            <form action="#" class="search-form">
                                <span class="icon-search2"></span>
                                <input
                                    type="search"
                                    class="form-control"
                                    style="border-radius:30px"
                                    placeholder="Search..."
                                />
                            </form>
                        </div>
                        <div
                            class="col-md-4 col-sm-12 text-end order-2 order-md-3 mb-3 mb-md-0"
                        >
                            <div class="d-flex">
                                <ul class="list-unstyled social me-auto">
                                    <li>
                                        <a href="#"
                                            ><span class="icon-twitter"></span
                                        ></a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            ><span class="icon-facebook"></span
                                        ></a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            ><span class="icon-instagram"></span
                                        ></a>
                                    </li>

                                    <li v-if="user.name">
                                        <a href="#">{{ user.name }}</a>
                                    </li>

                                    <li v-if="user.name">
                                        <router-link :user="user" to="/logout">
                                            Logout
                                        </router-link>
                                    </li>

                                    <li v-if="user.name">
                                        <span
                                            v-on:click="onShowModal"
                                            class="icon-edit"
                                        ></span>
                                    </li>

                                    <li v-else>
                                        <router-link to="/login"
                                            >Login</router-link
                                        >
                                    </li>
                                </ul>

                                <a
                                    class="burger ms-auto float-end site-menu-toggle d-inline-block"
                                    v-on:click="onshow"
                                >
                                    <span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <transition
                        name="slide"
                        enter-active-class="animated slideInRight"
                        leave-active-class="animated slideOutRight"
                    >
                        <ul
                            v-if="show"
                            class="d-lg-inline-none text-start site-menu float-end"
                        >
                            <div class="site-mobile-menu-header">
                                <div class="site-mobile-menu-close">
                                    <span
                                        v-on:click="onshow"
                                        class="icofont-close js-menu-toggle"
                                    ></span>
                                </div>
                            </div>
                            <li class="active">
                                <a href="index-2.html">Home</a>
                            </li>
                            <li class="has-children">
                                <a href="#">Categories</a>
                                <ul class="dropdown">
                                    <li v-for="cat in categories" :key="cat.id">
                                        <a href="#">{{ cat.name }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li v-if="user.name">
                                <router-link to="/createcat">
                                    Add category
                                </router-link>
                            </li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </transition>
                </div>
            </div>
        </nav>

        <create :show-modal="showModal" />

        <transition
            name="custom-classes-transition"
            enter-active-class="animated fadeInRight"
        >
            <router-view :user-prop="user"></router-view>
        </transition>
    </div>
</template>
<script>
import create from "./post/create.vue";
export default {
    components: { create },
    data() {
        return {
            user: {},
            categories: {},
            show: false,
            showModal: false,
            routeName: this.$router.name
        };
    },
    methods: {
        onShowModal() {
            this.showModal = !this.showModal;
        },
        exit() {
            this.user = null;
        },
        onshow() {
            this.show = !this.show;
        },
        getUser() {
            axios
                .get("/api/user")
                .then(res => (this.user = res.data))
                .catch(err => console.log(err));
        }
    },
    created() {
        this.getUser();

        axios
            .get("/api/categories/")
            .then(({ data }) => (this.categories = data));
    },
    mounted() {
        this.getUser();
    }
};
</script>

<style type="text/css"></style>
