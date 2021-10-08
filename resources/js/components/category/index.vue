<template>
    <div class="section pt-2 pb-0">
        <div class="container">
            <div class="row mb-2 justify-content-center">
                <div class="col-lg-9">
                    <span class="fw-normal text-uppercase d-block mb-1"
                        >Category</span
                    >
                    <h2 class="heading">'{{ catName }}'</h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div
                    class="col-lg-9"
                    v-for="post in pageOfPosts"
                    :key="post.id"
                >
                    <div class="post-entry d-md-flex small-horizontal mb-5">
                        <div class="me-md-4 thumbnail mb-3 mb-md-0">
                            <img
                                :src="post.photo"
                                alt="Image"
                                class="img-fluid"
                            />
                        </div>
                        <div class="content">
                            <div class="post-meta mb-1">
                                <span class="date">{{
                                    moment(post.created_at).format(
                                        "MMM DD,YYYY"
                                    )
                                }}</span>
                            </div>
                            <h2 class="heading">
                                <a href="single.html">{{ post.title }}</a>
                            </h2>
                            <p>
                                {{ post.desc }}
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
                                                username: post.user.name
                                            }
                                        }"
                                    >
                                        <img
                                            :src="post.user.profilePic"
                                            alt="Image"
                                        />
                                    </router-link>
                                </div>
                                <div class="text">
                                    <strong>{{ post.user.name }}</strong>
                                    <span>Author, 26 published post</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="row align-items-center justify-content-center py-2
            "
            >
                <div class="col-lg-6 text-center">
                    <jw-pagination
                        :items="catPosts"
                        @changePage="onChangePage"
                        :labels="customLabels"
                        :pageSize="6"
                    ></jw-pagination>
                </div>
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
const customLabels = {
    first: "<<",
    last: ">>",
    previous: "<",
    next: ">"
};
export default {
    data() {
        return {
            catPosts: [],
            catName: null,
            pageOfPosts: [],
            customLabels
        };
    },
    methods: {
        onChangePage(pageOfPosts) {
            // update page of items
            this.pageOfPosts = pageOfPosts;
        },
        async getPosts() {
            try {
                let catName = this.$route.params.catName;
                const res = await axios.get("/api/catPosts/" + catName);
                this.catPosts = res.data;
                this.catName = catName;
            } catch (err) {
                console.log(err);
            }
        },
        moment() {
            return moment();
        }
    },
    created() {
        this.getPosts();
    }
};
</script>
