<template>
    <div>
        <div class="section post-section pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="heading text-center">{{ post.title }}</h2>
                        <p class="lead mb-4 text-center">{{ post.desc }}</p>
                        <div class="position-relative">
                            <img
                                :src="post.photo"
                                class="img-fluid rounded mb-4 position-relative"
                            />
                            <div
                                style="align-items: center"
                                class="singlepost_ship d-flex"
                            >
                                <div v-if="Object.keys(user).length > 0">
                                    <transition
                                        name="custom-classes-transition"
                                        enter-active-class="animate__animated animate__bounceIn"
                                    >
                                        <span
                                            style="font-size:22px;cursor:pointer"
                                            v-if="isLiked"
                                            class="text-light"
                                            @click.prevent="likePost(post.id)"
                                        >
                                            <i class="fas fa-heart"></i>
                                        </span>
                                    </transition>
                                    <transition
                                        name="custom-classes-transition"
                                        enter-active-class="animate__animated animate__bounceIn"
                                    >
                                        <span
                                            style="font-size:22px;cursor:pointer"
                                            v-if="!isLiked"
                                            class="text-light"
                                            @click.prevent="likePost(post.id)"
                                        >
                                            <i class="far fa-heart"></i>
                                        </span>
                                    </transition>
                                </div>
                                <div v-else>
                                    <router-link to="/login">
                                        <span
                                            style="font-size:22px;cursor:pointer"
                                            class="text-light"
                                        >
                                            <i class="far fa-heart"></i>
                                        </span>
                                    </router-link>
                                </div>

                                <span
                                    style="margin-left:5px;font-size:16px;cursor:pointer"
                                    class="dropdown text-light"
                                >
                                    <div
                                        alt=""
                                        id="dropdownMenuButton"
                                        data-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false"
                                    >
                                        <transition
                                            name="custom-classes-transition"
                                            enter-active-class="animate__animated animate__bounceIn"
                                        >
                                            <span v-if="post.likes.length > 0">
                                                <span
                                                    v-for="like in post.likes.slice(
                                                        0,
                                                        1
                                                    )"
                                                    :key="like.id"
                                                >
                                                    {{ like.user.name }}
                                                </span>
                                                <transition
                                                    name="custom-classes-transition"
                                                    enter-active-class="animate__animated animate__bounceIn"
                                                >
                                                    <span
                                                        v-if="
                                                            post.likes.length >
                                                                1
                                                        "
                                                    >
                                                        and
                                                        {{
                                                            post.likes.length &&
                                                                post.likes
                                                                    .length - 1
                                                        }}
                                                        other
                                                    </span>
                                                </transition>
                                            </span>
                                        </transition>
                                    </div>

                                    <div
                                        class="dropdown-menu"
                                        aria-labelledby="dropdownMenuButton"
                                        style="background:#000000bd"
                                    >
                                        <div
                                            class="profile-dropdown-item p-1"
                                            style="cursor:pointer;color:white"
                                            v-for="like in post.likes"
                                            :key="like.id"
                                        >
                                            <router-link
                                                style="padding:0px;color:white"
                                                :to="{
                                                    name: 'profile',
                                                    params: {
                                                        username: like.user.name
                                                    }
                                                }"
                                            >
                                                <img
                                                    :src="like.user.profilePic"
                                                    alt="Image"
                                                    class="author-pic img-fluid rounded-circle mx-auto"
                                                />
                                                {{ like.user.name }}
                                            </router-link>
                                        </div>
                                    </div>
                                </span>

                                &mdash;
                                <router-link
                                    style="padding:0"
                                    :to="{
                                        name: 'profile',
                                        params: {
                                            username: post.user.name
                                        }
                                    }"
                                >
                                    <img
                                        :src="post.user.profilePic"
                                        alt="Image"
                                        class="author-pic img-fluid rounded-circle mx-auto"
                                    />
                                </router-link>
                                &mdash;
                                <span style="font-size:17px">{{
                                    moment(post.created_at).format(
                                        "MMM DD,YYYY"
                                    )
                                }}</span>
                                <span
                                    v-if="post.user_id === user.id"
                                    style="font-size: 17px"
                                >
                                    &mdash;
                                    <router-link
                                        class="text-white"
                                        :to="{
                                            name: 'editpost',
                                            params: {
                                                postSlug: post.slug
                                            }
                                        }"
                                        >Edit</router-link
                                    >
                                </span>
                            </div>
                        </div>
                        <div
                            style="text-align:justify"
                            v-html="post.content"
                        ></div>

                        <div class="row mt-2 border-top text-center">
                            <div class="col-md-4 col-sm-12" style="margin:auto">
                                <ul class="social list-unstyled">
                                    <li>
                                        <a href="#"
                                            ><i
                                                class="fas fa-share text-secondary"
                                            ></i
                                        ></a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            ><span
                                                class="icon-facebook text-primary"
                                            ></span
                                        ></a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            ><span
                                                class="icon-twitter text-info"
                                            ></span
                                        ></a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            ><span
                                                class="icon-linkedin text-primary"
                                            ></span
                                        ></a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            ><span
                                                class="icon-pinterest text-danger"
                                            ></span
                                        ></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <router-link
                                style="float:right"
                                class="fw-bold text-dark"
                                v-if="nextPost != null"
                                :to="{
                                    name: 'post',
                                    params: { slug: nextPost.slug }
                                }"
                                >Next</router-link
                            >
                            <router-link
                                style="float:left"
                                class="fw-bold text-dark"
                                v-if="prevPost != null"
                                :to="{
                                    name: 'post',
                                    params: { slug: prevPost.slug }
                                }"
                                >Prev</router-link
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pb-0 section">
            <div class="col-lg-9" style="margin:auto">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="heading">Related</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div
                        class="col-lg-12"
                        v-for="rpost in sameCat.slice(0, 4)"
                        :key="rpost.id"
                    >
                        <div
                            class="post-entry d-md-flex small-horizontal mb-5"
                            v-if="rpost.id !== post.id"
                        >
                            <div class="me-md-5 thumbnail mb-3 mb-md-0">
                                <router-link
                                    :to="{
                                        name: 'post',
                                        params: {
                                            slug: rpost.slug
                                        }
                                    }"
                                >
                                    <img
                                        :src="rpost.photo"
                                        alt="Image"
                                        class="img-fluid"
                                    />
                                </router-link>
                            </div>
                            <div class="content">
                                <div class="post-meta mb-3">
                                    <router-link
                                        class="category text-dark"
                                        :to="{
                                            name: 'catposts',
                                            params: {
                                                catName: rpost.category.name
                                            }
                                        }"
                                        >{{ rpost.category.name }}</router-link
                                    >
                                    &mdash;
                                    <span class="date">{{
                                        moment(rpost.created_at).format(
                                            "MMM DD,YYYY"
                                        )
                                    }}</span>
                                </div>
                                <h2 class="heading bold">
                                    <router-link
                                        :to="{
                                            name: 'post',
                                            params: {
                                                slug: rpost.slug
                                            }
                                        }"
                                    >
                                        {{ rpost.title }}
                                    </router-link>
                                </h2>
                                <p>
                                    {{ rpost.desc }}
                                </p>
                                <a
                                    href="#"
                                    class="post-author d-flex align-items-center"
                                >
                                    <div class="author-pic">
                                        <router-link
                                            style="padding:0"
                                            :to="{
                                                name: 'profile',
                                                params: {
                                                    username: rpost.user.name
                                                }
                                            }"
                                        >
                                            <img
                                                :src="rpost.user.profilePic"
                                                alt="Image"
                                            />
                                        </router-link>
                                    </div>
                                    <div class="text">
                                        <strong>{{ rpost.user.name }}</strong>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-5 bg-light mx-md-3 sec-subscribe">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="h4 fw-bold">Subscrie to netter</h2>
                    </div>
                </div>
                <form action="#" class="row">
                    <div class="col-md-8">
                        <div class="mb-3 mb-md-0">
                            <input
                                type="email"
                                class="form-control"
                                placeholder="Enter your email"
                            />
                        </div>
                    </div>
                    <div class="col-md-4 d-grid">
                        <input
                            type="submit"
                            class="btn btn-dark"
                            value="Subscribe"
                        />
                    </div>
                </form>
            </div>
        </div>
        <div class="site-footer">
            <div class="container">
                <div class="row justify-content-center copyright">
                    <div class="col-lg-7 text-center">
                        <div class="widget">
                            <ul class="social list-unstyled">
                                <li>
                                    <a href="#"
                                        ><span class="icon-facebook"></span
                                    ></a>
                                </li>
                                <li>
                                    <a href="#"
                                        ><span class="icon-twitter"></span
                                    ></a>
                                </li>
                                <li>
                                    <a href="#"
                                        ><span class="icon-linkedin"></span
                                    ></a>
                                </li>
                                <li>
                                    <a href="#"
                                        ><span class="icon-youtube-play"></span
                                    ></a>
                                </li>
                            </ul>
                        </div>
                        <div class="widget">
                            <p>
                                Copyright &copy; 2021 All rights reserved | This
                                template is made with
                                <i
                                    class="icon-heart text-danger"
                                    aria-hidden="true"
                                ></i>
                                by
                                <a
                                    href="https://colorlib.com/"
                                    target="_blank"
                                    rel="nofollow noopener"
                                    >Colorlib</a
                                >
                            </p>
                            <div class="d-block">
                                <a href="#" class="m-2"
                                    >Terms &amp; Conditions</a
                                >/
                                <a href="#" class="m-2">Privacy Policy</a>
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
            post: {},
            sameCat: {},
            isLiked: false,
            user: {},
            title: this.$route.params.slug,
            nextPost: {},
            prevPost: {}
        };
    },
    computed: {},
    methods: {
        async getUser() {
            try {
                const res = await axios.get("/api/user");
                this.user = res.data;
            } catch (err) {
                console.log(err);
            }
        },
        async likePost(postId) {
            const res = await axios.post("/api/like/" + postId);

            Reload.$emit("like");
        },
        async getPost() {
            try {
                let slug = this.$route.params.slug;
                const res = await axios.get("/api/post/" + slug);
                this.post = res.data.post;
                this.sameCat = res.data.sameCat;
                this.isLiked = res.data.isLiked;
                this.nextPost = res.data.nextPost;
                this.prevPost = res.data.prevPost;
            } catch (error) {
                console.log(error);
            }
        },
        moment() {
            return moment();
        }
    },
    created() {
        this.getPost();
        Reload.$on("like", () => {
            this.getPost();
        });
        this.getUser();
    },
    head: {
        // To use "this" in the component, it is necessary to return the object through a function
        title: function() {
            return {
                inner: this.title
            };
        }
    }
};
</script>
