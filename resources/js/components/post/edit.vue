<template>
    <div>
        <div class="col-md-6 col-sm-11 shadow" style="margin:auto">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="my-2">
                    <div class="-0">
                        <div class="p-2">
                            <div class="col-lg-12">
                                <div>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">
                                            Edit Post
                                        </h1>
                                    </div>

                                    <form
                                        class="user"
                                        @submit.prevent="postUpdate"
                                        enctype="multipart/form-data"
                                    >
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <label
                                                        for="exampleFormControlTextarea1"
                                                        ><b
                                                            >Post title
                                                        </b></label
                                                    >
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="exampleInputFirstName"
                                                        placeholder="Enter Post Title"
                                                        v-model="form.title"
                                                    />
                                                    <small
                                                        class="text-danger"
                                                        v-if="errors.title"
                                                    >
                                                        {{ errors.title[0] }}
                                                    </small>
                                                </div>
                                                <div class="col-md-12">
                                                    <label
                                                        for="exampleFormControlTextarea1"
                                                        ><b
                                                            >Post Slug
                                                        </b></label
                                                    >
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="exampleInputFirstName"
                                                        placeholder="Enter Post Slug"
                                                        v-model="form.slug"
                                                        v-slugify
                                                    />
                                                    <small
                                                        class="text-danger"
                                                        v-if="errors.title"
                                                    >
                                                        {{ errors.title[0] }}
                                                    </small>
                                                </div>

                                                <div class="col-md-12">
                                                    <label
                                                        for="exampleFormControlTextarea1"
                                                        ><b
                                                            >Post Description
                                                        </b></label
                                                    >
                                                    <textarea
                                                        class="form-control"
                                                        id="exampleInputFirstName"
                                                        placeholder="Enter Post decription"
                                                        v-model="form.desc"
                                                        cols="30"
                                                        rows="5"
                                                    >
                                                    </textarea>

                                                    <small
                                                        class="text-danger"
                                                        v-if="errors.desc"
                                                    >
                                                        {{ errors.desc[0] }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <label
                                                        for="exampleFormControlTextarea1"
                                                        ><b
                                                            >Post content
                                                        </b></label
                                                    >
                                                    <VueEditor
                                                        v-model="form.content"
                                                    />

                                                    <small
                                                        class="text-danger"
                                                        v-if="errors.content"
                                                    >
                                                        {{ errors.content[0] }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <label
                                                        for="exampleFormControlSelect1"
                                                        >Product Category</label
                                                    >
                                                    <select
                                                        class="form-control"
                                                        id="exampleFormControlSelect1"
                                                        v-model="
                                                            form.category_id
                                                        "
                                                    >
                                                        <option
                                                            :key="category.id"
                                                            :value="category.id"
                                                            v-for="category in cats"
                                                            >{{
                                                                category.name
                                                            }}</option
                                                        >
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div
                                            class="form-group pt-1 text-center"
                                        >
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <label
                                                        type="submit"
                                                        class="btn btn-sm btn-dark btn-block"
                                                    >
                                                        <input
                                                            style="display: none;"
                                                            type="file"
                                                            class="custom-file-input"
                                                            id="customFile"
                                                            @change="
                                                                onFileSelected
                                                            "
                                                        />
                                                        Post Pic >
                                                    </label>

                                                    <small
                                                        class="text-danger"
                                                        v-if="errors.photo"
                                                    >
                                                        {{ errors.photo[0] }}
                                                    </small>
                                                    <transition
                                                        name="custom-classes-transition"
                                                        enter-active-class="animate__animated animate__bounceIn"
                                                    >
                                                        <img
                                                            v-if="
                                                                form.photo !==
                                                                    null
                                                            "
                                                            :src="
                                                                '/' + form.photo
                                                            "
                                                            :key="form.photo"
                                                            style="height: 40px; width: 40px;"
                                                            class="rounded-circle border border-dark"
                                                        />
                                                    </transition>
                                                    <transition
                                                        name="custom-classes-transition"
                                                        enter-active-class="animate__animated animate__bounceIn"
                                                        leave-active-class="animate__animated animate__bounceOut"
                                                    >
                                                        <img
                                                            v-if="
                                                                form.newPhoto !==
                                                                    null
                                                            "
                                                            :src="form.newPhoto"
                                                            :key="form.newPhoto"
                                                            style="height: 40px; width: 40px;"
                                                            class="rounded-circle"
                                                        />
                                                    </transition>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group pt-1">
                                            <button
                                                type="submit"
                                                class="btn btn-dark"
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
                                    </form>
                                    <hr />
                                    <div class="text-center"></div>
                                    <div class="text-center"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
export default {
    created() {
        if (!User.loggedIn()) {
            this.$router.push({ name: "/login" });
        }
    },

    data() {
        return {
            form: {
                title: null,
                desc: null,
                content: null,
                photo: null,
                category_id: null,
                slug: null,
                newPhoto: null
            },
            errors: {},
            showSpinner: false,
            cats: {}
        };
    },

    methods: {
        async getPost() {
            let postSlug = this.$route.params.postSlug;
            const res = await axios.get("/api/post/" + postSlug);
            this.form = res.data.post;
        },
        onFileSelected(event) {
            let file = event.target.files[0];
            if (file.size > 1048770) {
                Notification.image_validation();
            } else {
                let reader = new FileReader();
                reader.onload = event => {
                    this.form.newPhoto = event.target.result;
                    this.form.photo = null;
                };
                reader.readAsDataURL(file);
            }
        },
        async postUpdate() {
            try {
                let postSlug = this.$route.params.postSlug;
                // this.showSpinner = true;
                const res = await axios.patch(
                    "/api/editpost/" + postSlug,
                    this.form
                );
                console.log(res.data);
                // this.showSpinner = false;
                // Toast.fire({
                //     icon: "success",
                //     title: "Post updated in successfully"
                // });
            } catch (error) {
                if (error.response !== undefined) {
                    this.showSpinner = false;
                    this.errors = error.response.data.errors;
                    Toast.fire({
                        icon: "error",
                        title: "Check your fields"
                    });
                }
            }
        },
        async getCategories() {
            const res = await axios.get("/api/categories/");
            this.cats = res.data;
        }
    },

    created() {
        this.getPost();
        this.getCategories();
    }
};
</script>

<style type="text/css"></style>
