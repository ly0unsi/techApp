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
                                Readose.com
                            </router-link>
                        </div>
                        <div class="col-md-4 order-3 order-md-1">
                            <form action="#" class="search-form">
                                <span class="icon-search2"></span>
                                <input
                                    type="search"
                                    class="form-control"
                                    style="border-radius:30px"
                                    v-model="searchTerm"
                                    placeholder="Search..."
                                />
                            </form>
                            <transition
                                name="custom-classes-transition"
                                enter-active-class="animate__animated animate__bounceIn"
                                leave-active-class="animate__animated animate__bounceOut"
                            >
                                <div
                                    v-if="searchTerm !== ''"
                                    class="bg-light col-3 py-2 px-2 mt-1 shadow-sm"
                                    style="height:auto;background:black;position:absolute;width:auto;z-index:3;border-radius:30px"
                                >
                                    <div v-if="searchedPosts.length > 0">
                                        <div
                                            :key="post.id"
                                            v-for="post in searchedPosts"
                                            class="d-flex mt-1"
                                            style="align-items: center;"
                                        >
                                            <img
                                                style="width: 37px;
                                            border-radius: 50%;
                                            border:1px solid #303030;
                                            height: 37px;
                                            object-fit: cover;"
                                                :src="post.photo"
                                                alt=""
                                            />
                                            <span
                                                style="margin-left:5px;color:#303030"
                                                >{{ post.title }} | by
                                                {{ post.user.name }}</span
                                            >
                                        </div>
                                    </div>
                                    <div v-else>
                                        NO user Found !!
                                    </div>
                                </div>
                            </transition>
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
                                            v-if="showModal == false"
                                            v-on:click="onShowModal"
                                            class="icon-edit"
                                            style="cursor:pointer;color:#303030"
                                        ></span>
                                        <span
                                            v-else
                                            v-on:click="onShowModal"
                                            class="icon-close"
                                            style="cursor:pointer;color:#303030"
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
                        enter-active-class="animate__animated animate__slideInRight animate__faster"
                        leave-active-class=" animate__animated animate__slideOutRight animate__faster"
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

        <create :show-modal="showModal" :cats="categories" />

        <transition
            name="custom-classes-transition"
            enter-active-class="animate__animated animate__fadeInRight animate__fast"
        >
            <router-view></router-view>
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
            routeName: this.$router.name,
            searchTerm: "",
            posts: []
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
        },
        getCategories() {
            axios
                .get("/api/categories/")
                .then(res => (this.categories = res.data));
        },
        getPosts() {
            axios.get("/api/posts/").then(res => (this.posts = res.data));
        }
    },
    computed: {
        searchedPosts() {
            return this.posts.filter(post => {
                return post.title.match(this.searchTerm);
            });
        }
    },
    created() {
        this.getUser();
        this.getCategories();
        this.getPosts();
    }
};
</script>

<style type="text/css"></style>
