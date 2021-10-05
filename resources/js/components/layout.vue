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
                                                :src="'/' + post.photo"
                                                alt=""
                                            />
                                            <span
                                                style="margin-left:5px;color:#303030"
                                            >
                                                <router-link
                                                    :to="{
                                                        name: 'post',
                                                        params: {
                                                            slug: post.slug
                                                        }
                                                    }"
                                                    >{{
                                                        post.title
                                                    }}</router-link
                                                >

                                                | by
                                                <b>
                                                    {{ post.user.name }}
                                                </b>
                                            </span>
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
                                <ul class="list-unstyled social me-auto col-10">
                                    <div style="float:left">
                                        <li>
                                            <a href="#"
                                                ><span
                                                    class="icon-twitter"
                                                ></span
                                            ></a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                ><span
                                                    class="icon-facebook"
                                                ></span
                                            ></a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                ><span
                                                    class="icon-instagram"
                                                ></span
                                            ></a>
                                        </li>
                                    </div>
                                    <div style="float:right">
                                        <transition
                                            name="custom-classes-transition"
                                            enter-active-class="animate__animated animate__bounceIn"
                                            leave-active-class="animate__animated animate__bounceOut"
                                        >
                                            <li
                                                v-if="user.name"
                                                class="dropdown"
                                            >
                                                <div
                                                    alt=""
                                                    id="dropdownMenuButton"
                                                    data-toggle="dropdown"
                                                    aria-haspopup="true"
                                                    aria-expanded="false"
                                                >
                                                    <img
                                                        style="width: 30px;
                                                            border-radius: 50%;
                                                            border:1px solid #303030;
                                                            height: 30px;
                                                            object-fit: cover;"
                                                        :src="user.profilePic"
                                                    />
                                                </div>

                                                <div
                                                    class="dropdown-menu"
                                                    aria-labelledby="dropdownMenuButton"
                                                >
                                                    <div
                                                        class="dropdown-item"
                                                        v-if="user.name"
                                                    >
                                                        <span
                                                            v-on:click="
                                                                onShowModal
                                                            "
                                                            style="cursor:pointer;color:#303030"
                                                            >Add a post</span
                                                        >
                                                    </div>
                                                    <div class="dropdown-item">
                                                        <router-link
                                                            style="padding:0"
                                                            :user="user"
                                                            to="/logout"
                                                            >Logout
                                                        </router-link>
                                                    </div>
                                                </div>
                                            </li>
                                        </transition>
                                        <li v-if="!user.name">
                                            <router-link to="/login"
                                                >Login</router-link
                                            >
                                        </li>
                                    </div>
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
                                        <router-link
                                            :to="{
                                                name: 'catposts',
                                                params: {
                                                    catName: cat.name
                                                }
                                            }"
                                        >
                                            {{ cat.name }}
                                        </router-link>
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

        <create
            @closeModal="closeModal"
            :show-modal="showModal"
            :cats="categories"
        />

        <transition
            name="custom-classes-transition"
            enter-active-class="animate__animated animate__fadeInRight animate__fast"
        >
            <router-view :key="$route.fullPath"></router-view>
        </transition>
        <!-- set progressbar -->
        <vue-progress-bar></vue-progress-bar>
    </div>
</template>
<script>
import create from "./post/create.vue";
export default {
    components: { create },
    mounted() {
        //  [App.vue specific] When App.vue is finish loading finish the progress bar
        this.$Progress.finish();
    },
    data() {
        return {
            user: {},
            categories: {},
            show: false,
            showModal: false,
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
        async getUser() {
            try {
                const res = await axios.get("/api/user");
                this.user = res.data;
            } catch (err) {
                console.log(err);
            }
        },
        async getCategories() {
            const res = await axios.get("/api/categories/");
            this.categories = res.data;
        },
        async getPosts() {
            const res = await axios.get("/api/posts/");
            this.posts = res.data;
        },
        closeModal() {
            this.showModal = false;
        },
        handleProgressBar() {
            //  [App.vue specific] When App.vue is first loaded start the progress bar
            this.$Progress.start();
            //  hook the progress bar to start before we move router-view
            this.$router.beforeEach((to, from, next) => {
                //  does the page we want to go to have a meta.progress object
                if (to.meta.progress !== undefined) {
                    let meta = to.meta.progress;
                    // parse meta tags
                    this.$Progress.parseMeta(meta);
                }
                //  start the progress bar
                this.$Progress.start();
                //  continue to next page
                next();
            });
            //  hook the progress bar to finish after we've finished moving router-view
            this.$router.afterEach((to, from) => {
                //  finish the progress bar
                this.$Progress.finish();
            });
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
        Reload.$on("logout", () => {
            this.getUser();
        });
        Reload.$on("login", () => {
            this.getUser();
        });
        this.getCategories();
        this.getPosts();
        this.handleProgressBar();
    }
};
</script>

<style type="text/css"></style>
