<template>
    <div class="container">
        <div
            class="spinner text-dark"
            style="margin: auto;width: 35px;padding: 20%"
            v-if="
                Object.keys(user).length === 0 || Object.keys(form).length === 0
            "
        >
            <div style="margin:auto" class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <div v-else class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div
                                class="row  align-items-center text-center"
                                style="justify-content: center"
                            >
                                <div class="position-relative col-md-3">
                                    <img
                                        :src="form.profilePic"
                                        alt="Admin"
                                        style="object-fit:cover"
                                        class="rounded-circle p-1 bg-dark position-relative float-right"
                                        width="80"
                                        height="80"
                                    />

                                    <label
                                        v-if="form.id === user.id"
                                        type="submit"
                                        class="btn btn-sm btn-dark position-absolute"
                                        style="right: 39%;padding: 3px;bottom: 5%;"
                                    >
                                        <input
                                            style="display: none;"
                                            type="file"
                                            class="custom-file-input"
                                            id="customFile"
                                            @change="onFileSelected"
                                        />
                                        <i class="fas fa-edit"></i>
                                    </label>
                                </div>
                                <div class="col-md-3">
                                    <h4>{{ form.name }}</h4>

                                    <button
                                        v-if="user.id !== form.id"
                                        @click.prevent="follow(form.id)"
                                        class="btn btn-sm btn-dark"
                                    >
                                        <span v-if="isFollowing">Unfollow</span>
                                        <span v-else>Follow</span>
                                    </button>
                                    <!--
                                    <button
                                        v-if="user.id !== form.id"
                                        class="btn btn-outline-primary"
                                    >
                                        Message
                                    </button>
                                    -->
                                </div>
                                <div class="row mt-4">
                                    <div class="col border-right text-center">
                                        <span class="text-dark fw-bold">{{
                                            form.posts.length
                                        }}</span>
                                        <span class="text-dark">Posts</span>
                                    </div>
                                    <div class="col border-right text-center">
                                        <span class="text-dark fw-bold">{{
                                            form.followers.length
                                        }}</span>
                                        <span class="text-dark">Followers</span>
                                    </div>
                                    <div class="col text-center">
                                        <span class="text-dark fw-bold">{{
                                            form.followings.length
                                        }}</span>
                                        <span class="text-dark"
                                            >Followings</span
                                        >
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <ul class="list-group list-group-flush">
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap"
                                >
                                    <h6 class="mb-0">
                                        <i class="fas fa-globe"></i>
                                        Website
                                    </h6>
                                    <span class="text-secondary"
                                        >https://bootdey.com</span
                                    >
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap"
                                >
                                    <h6 class="mb-0">
                                        <i class="fab fa-github"></i>
                                        Github
                                    </h6>
                                    <span class="text-secondary">bootdey</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap"
                                >
                                    <h6 class="mb-0">
                                        <span
                                            class="icon-twitter text-info"
                                        ></span
                                        >Twitter
                                    </h6>
                                    <span class="text-secondary">@bootdey</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap"
                                >
                                    <h6 class="mb-0">
                                        <span
                                            class="icon-pinterest text-danger"
                                        ></span
                                        >Pinterest
                                    </h6>
                                    <span class="text-secondary">bootdey</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap"
                                >
                                    <h6 class="mb-0">
                                        <span
                                            class="icon-facebook text-primary"
                                        ></span
                                        >Facebook
                                    </h6>
                                    <span class="text-secondary">bootdey</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3" style="align-items: center;">
                                <div class="col-sm-2">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-10 text-secondary">
                                    <input
                                        v-if="user.id != form.id"
                                        type="text"
                                        class="form-control"
                                        v-model="form.name"
                                        readonly
                                    />
                                    <input
                                        v-else
                                        type="text"
                                        class="form-control"
                                        v-model="form.name"
                                    />
                                </div>
                            </div>
                            <div class="row mb-3" style="align-items: center;">
                                <div class="col-sm-2">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-10 text-secondary">
                                    <input
                                        v-if="user.id != form.id"
                                        type="text"
                                        class="form-control"
                                        v-model="form.email"
                                        readonly
                                    />
                                    <input
                                        v-else
                                        type="text"
                                        class="form-control"
                                        v-model="form.email"
                                    />
                                </div>
                            </div>

                            <div class="row mb-3" style="align-items: center;">
                                <div class="col-sm-2">
                                    <h6 class="mb-0">Mobile</h6>
                                </div>
                                <div class="col-sm-10 text-secondary">
                                    <input
                                        v-if="user.id != form.id"
                                        type="text"
                                        class="form-control"
                                        value="(320) 380-4539"
                                        readonly
                                    />
                                    <input
                                        v-else
                                        type="text"
                                        class="form-control"
                                        value="(320) 380-4539"
                                    />
                                </div>
                            </div>
                            <div class="row mb-3" style="align-items: center;">
                                <div class="col-sm-2">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-10 text-secondary">
                                    <input
                                        v-if="user.id != form.id"
                                        type="text"
                                        class="form-control"
                                        value="Bay Area, San Francisco, CA"
                                        readonly
                                    />
                                    <input
                                        v-else
                                        type="text"
                                        class="form-control"
                                        value="Bay Area, San Francisco, CA"
                                    />
                                </div>
                            </div>
                            <div
                                v-if="user.id === form.id"
                                class="form-group pt-1 text-center"
                            ></div>
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10 text-secondary">
                                    <button
                                        v-if="user.id === form.id"
                                        type="submit"
                                        class="btn btn-dark"
                                        @click.prevent="editProfile"
                                    >
                                        Edit
                                        <div
                                            v-if="showSpinner"
                                            class="spinner-border spinner_add_post"
                                            role="status"
                                        >
                                            <span class="sr-only"
                                                >Loading...</span
                                            >
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <nav>
                                        <div
                                            class="nav nav-tabs"
                                            id="nav-tab"
                                            role="tablist"
                                        >
                                            <button
                                                class="nav-link active"
                                                id="nav-posts-tab"
                                                data-bs-toggle="tab"
                                                data-bs-target="#nav-posts"
                                                type="button"
                                                role="tab"
                                                aria-controls="nav-posts"
                                                aria-selected="true"
                                            >
                                                Posts
                                            </button>
                                            <button
                                                class="nav-link"
                                                id="nav-followings-tab"
                                                data-bs-toggle="tab"
                                                data-bs-target="#nav-followings"
                                                type="button"
                                                role="tab"
                                                aria-controls="nav-followings"
                                                aria-selected="false"
                                            >
                                                Followings
                                            </button>
                                            <button
                                                class="nav-link"
                                                id="nav-contact-tab"
                                                data-bs-toggle="tab"
                                                data-bs-target="#nav-contact"
                                                type="button"
                                                role="tab"
                                                aria-controls="nav-contact"
                                                aria-selected="false"
                                            >
                                                Followers
                                            </button>
                                        </div>
                                    </nav>
                                    <div
                                        class="tab-content"
                                        id="nav-tabContent"
                                    >
                                        <div
                                            class="tab-pane fade show active"
                                            id="nav-posts"
                                            role="tabpanel"
                                            aria-labelledby="nav-posts-tab"
                                        >
                                            <div
                                                v-for="post in profilePosts"
                                                :key="post.id"
                                                class="post-entry d-md-flex small-horizontal mt-3"
                                            >
                                                <div
                                                    class="me-md-4 mb-3 mb-md-0"
                                                    style="flex: 0 0 219px;"
                                                >
                                                    <router-link
                                                        :to="{
                                                            name: 'post',
                                                            params: {
                                                                slug: post.slug
                                                            }
                                                        }"
                                                    >
                                                        <img
                                                            :src="post.photo"
                                                            alt="Image"
                                                            class="img-fluid"
                                                        />
                                                    </router-link>
                                                </div>
                                                <div class="content">
                                                    <div class="post-meta mb-1">
                                                        <router-link
                                                            class="category text-dark"
                                                            style="color:whitesmoke"
                                                            :to="{
                                                                name:
                                                                    'catposts',
                                                                params: {
                                                                    catName:
                                                                        post
                                                                            .category
                                                                            .name
                                                                }
                                                            }"
                                                            >{{
                                                                post.category
                                                                    .name
                                                            }}</router-link
                                                        >
                                                        &mdash;
                                                        <span class="date">{{
                                                            moment(
                                                                post.created_at
                                                            ).format(
                                                                "MMM DD,YYYY"
                                                            )
                                                        }}</span>
                                                    </div>
                                                    <h2 class="heading">
                                                        <router-link
                                                            :to="{
                                                                name: 'post',
                                                                params: {
                                                                    slug:
                                                                        post.slug
                                                                }
                                                            }"
                                                            >{{
                                                                post.title.slice(
                                                                    0,
                                                                    90
                                                                )
                                                            }}..</router-link
                                                        >
                                                    </h2>
                                                    <p>
                                                        {{
                                                            post.desc.slice(
                                                                0,
                                                                130
                                                            )
                                                        }}..
                                                    </p>
                                                    <a
                                                        href="#"
                                                        class="post-author d-flex align-items-center"
                                                    >
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="tab-pane fade"
                                            id="nav-followings"
                                            role="tabpanel"
                                            aria-labelledby="nav-followings-tab"
                                        >
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div
                                                        class="tab-content p-0"
                                                    >
                                                        <div
                                                            class="tab-pane fade active show"
                                                            v-for="following in form.followings"
                                                            :key="following.id"
                                                        >
                                                            <div
                                                                class="list-group"
                                                            >
                                                                <div
                                                                    class="list-group-item d-flex align-items-center"
                                                                >
                                                                    <img
                                                                        :src="
                                                                            following.profilePic
                                                                        "
                                                                        alt=""
                                                                        width="50px"
                                                                        class="rounded-circle ml-n2"
                                                                    />
                                                                    <div
                                                                        class="flex-fill ps-3 pe-3"
                                                                    >
                                                                        <div>
                                                                            <a
                                                                                href="#"
                                                                                class="text-dark font-weight-600"
                                                                            >
                                                                                {{
                                                                                    following.name
                                                                                }}
                                                                            </a>
                                                                        </div>
                                                                        <div
                                                                            class="text-muted fs-13px"
                                                                        >
                                                                            {{
                                                                                following.email
                                                                            }}
                                                                        </div>
                                                                    </div>
                                                                    <!--
                                                                    <a
                                                                        href="#"
                                                                        class="btn btn-outline-primary"
                                                                    >
                                                                        <span
                                                                            >Follow</span
                                                                        >
                                                                        <span
                                                                            >Unfollow</span
                                                                        >
                                                                    </a>
                                                                    !-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="tab-pane fade"
                                            id="nav-contact"
                                            role="tabpanel"
                                            aria-labelledby="nav-contact-tab"
                                        >
                                            <div
                                                class="tab-pane fade active show"
                                                v-for="follower in form.followers"
                                                :key="follower.id"
                                            >
                                                <div class="list-group">
                                                    <div
                                                        class="list-group-item d-flex align-items-center"
                                                    >
                                                        <img
                                                            :src="
                                                                follower.profilePic
                                                            "
                                                            alt=""
                                                            width="50px"
                                                            class="rounded-circle ml-n2"
                                                        />
                                                        <div
                                                            class="flex-fill ps-3 pe-3"
                                                        >
                                                            <div>
                                                                <a
                                                                    href="#"
                                                                    class="text-dark font-weight-600"
                                                                >
                                                                    {{
                                                                        follower.name
                                                                    }}
                                                                </a>
                                                            </div>
                                                            <div
                                                                class="text-muted fs-13px"
                                                            >
                                                                {{
                                                                    follower.email
                                                                }}
                                                            </div>
                                                        </div>
                                                        <!--
                                                                    <a
                                                                        href="#"
                                                                        class="btn btn-outline-primary"
                                                                    >
                                                                        <span
                                                                            >Follow</span
                                                                        >
                                                                        <span
                                                                            >Unfollow</span
                                                                        >
                                                                    </a>
                                                                    !-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
            user: {},
            form: {
                name: null,
                email: null,
                profilePic: null,
                id: null
            },
            errors: {},
            showSpinner: false,
            profilePosts: {},
            isFollowing: false
        };
    },
    methods: {
        async follow(id) {
            const res = await axios.post("/api/follow/" + id);
            Reload.$emit("follow");
        },
        onFileSelected(event) {
            let file = event.target.files[0];
            if (file.size > 1048770) {
                Notification.image_validation();
            } else {
                let reader = new FileReader();
                reader.onload = event => {
                    this.form.profilePic = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        },
        async getUser() {
            try {
                const res = await axios.get("/api/user");
                this.user = res.data;
                if (Object.keys(this.user).length === 0) {
                    this.$router.back();
                }
            } catch (err) {
                console.log(err);
            }
        },
        async getProfile() {
            let username = this.$route.params.username;
            const res = await axios.get("/api/profile/" + username);
            this.form = res.data.profile;
            this.profilePosts = res.data.profilePosts;
            this.isFollowing = res.data.isFollowing;
        },
        async editProfile() {
            try {
                let username = this.$route.params.username;
                this.showSpinner = true;
                axios.patch("/api/editProfile/" + username, this.form);
                this.showSpinner = false;
                Toast.fire({
                    icon: "success",
                    title: "Profile updated in successfully"
                });
                this.$router.push({
                    name: "profile",
                    params: { username: this.form.name }
                });
                Reload.$emit("profileChanged");
            } catch (error) {
                this.errors = error.res.data;
            }
        },
        moment() {
            return moment();
        }
    },
    created() {
        this.getUser();
        this.getProfile();
        Reload.$on("profileChanged", () => {
            this.getProfile();
        });
        Reload.$on("follow", () => {
            this.getProfile();
        });
    }
};
</script>
