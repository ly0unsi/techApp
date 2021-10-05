<template>
    <div class="section pt-5 pb-0">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-lg-9">
                    <span class="fw-normal text-uppercase d-block mb-1"
                        >Categories</span
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
                        <div class="me-md-5 thumbnail mb-3 mb-md-0">
                            <img
                                :src="'/' + post.photo"
                                alt="Image"
                                class="img-fluid"
                            />
                        </div>
                        <div class="content">
                            <div class="post-meta mb-3">
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
                                    <img
                                        :src="post.user.profilePic"
                                        alt="Image"
                                    />
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

            <div class="row align-items-center justify-content-center py-5">
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
