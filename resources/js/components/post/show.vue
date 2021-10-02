<template>
    <div>
        <div class="section post-section pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="text-center">
                            <img
                                :src="post.user.profilePic"
                                alt="Image"
                                class="author-pic img-fluid rounded-circle mx-auto"
                            />
                        </div>
                        <span class="d-block text-center">{{
                            post.user.name
                        }}</span>
                        <span
                            class="date d-block text-center small text-uppercase text-black-50 mb-5"
                            >{{
                                moment(post.created_at).format("MMM DD,YYYY")
                            }}</span
                        >
                        <h2 class="heading text-center">{{ post.title }}</h2>
                        <p class="lead mb-4 text-center">{{ post.desc }}</p>
                        <img
                            :src="'/' + post.photo"
                            class="img-fluid rounded mb-4"
                        />
                        <div
                            style="text-align:justify"
                            v-html="post.content"
                        ></div>

                        <div class="row mt-5 pt-5 border-top">
                            <div class="col-12">
                                <span class="fw-bold text-black small mb-1"
                                    >Share</span
                                >
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
                                            ><span class="icon-pinterest"></span
                                        ></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="heading">Related</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div
                        class="col-lg-12"
                        v-for="post in sameCat.slice(0, 3)"
                        :key="post.id"
                    >
                        <div class="post-entry d-md-flex small-horizontal mb-5">
                            <div class="me-md-5 thumbnail mb-3 mb-md-0">
                                <img
                                    :src="'/' + post.photo"
                                    alt="Image"
                                    class="img-fluid"
                                />
                            </div>
                            <div class="content">
                                <div class="post-meta mb-3">
                                    <a href="#" class="category">{{
                                        post.category.name
                                    }}</a
                                    >, &mdash;
                                    <span class="date">{{
                                        moment(post.created_at).format(
                                            "MMM DD,YYYY"
                                        )
                                    }}</span>
                                </div>
                                <h2 class="heading">
                                    <a>
                                        {{ post.title }}
                                    </a>
                                </h2>
                                <p>
                                    {{ post.desc }}
                                </p>
                                <a
                                    href="#"
                                    class="post-author d-flex align-items-center"
                                >
                                    <div class="author-pic">
                                        <img
                                            :src="post.user.profilePic"
                                            alt="Image"
                                        />
                                    </div>
                                    <div class="text">
                                        <strong>{{ post.user.name }}</strong>
                                        <span>
                                            {{ post.user.length }}
                                        </span>
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
    </div>
</template>
<script>
export default {
    data() {
        return {
            post: {},
            sameCat: {}
        };
    },
    computed: {},
    methods: {
        async getPost() {
            try {
                let slug = this.$route.params.slug;
                const res = await axios.get("/api/post/" + slug);
                this.post = res.data.post;
                this.sameCat = res.data.sameCat;
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
    }
};
</script>
