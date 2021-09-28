<template>
    <transition
        name="custom-classes-transition"
        enter-active-class="animated bounceIn"
        leave-active-class="animated bounceOut"
    >
        <div v-if="showModal" class="createModal container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="my-5">
                        <div class="-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">
                                                Add Post
                                            </h1>
                                        </div>

                                        <form
                                            class="user"
                                            @submit.prevent="postInsert"
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
                                                            {{
                                                                errors.title[0]
                                                            }}
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
                                                            {{
                                                                errors.title[0]
                                                            }}
                                                        </small>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label
                                                            for="exampleFormControlTextarea1"
                                                            ><b
                                                                >Post
                                                                Description
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
                                                            v-model="
                                                                form.content
                                                            "
                                                        />

                                                        <small
                                                            class="text-danger"
                                                            v-if="
                                                                errors.content
                                                            "
                                                        >
                                                            {{
                                                                errors
                                                                    .content[0]
                                                            }}
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <label
                                                            for="exampleFormControlSelect1"
                                                            >Product
                                                            Category</label
                                                        >
                                                        <select
                                                            class="form-control"
                                                            id="exampleFormControlSelect1"
                                                            v-model="
                                                                form.category_id
                                                            "
                                                        >
                                                            <option
                                                                :key="
                                                                    category.id
                                                                "
                                                                :value="
                                                                    category.id
                                                                "
                                                                v-for="category in categories"
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
                                                            {{
                                                                errors.photo[0]
                                                            }}
                                                        </small>

                                                        <img
                                                            :src="form.photo"
                                                            style="height: 40px; width: 40px;"
                                                            class="rounded-circle border border-dark"
                                                        />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group pt-1">
                                                <button
                                                    type="submit"
                                                    class="btn btn-dark"
                                                >
                                                    Add
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
    </transition>
</template>

<script type="text/javascript">
export default {
    created() {
        if (!User.loggedIn()) {
            this.$router.push({ name: "/login" });
        }
    },
    props: ["showModal"],

    data() {
        return {
            form: {
                title: null,
                desc: null,
                content: null,
                photo: null,
                category_id: null,
                slug: null
            },
            errors: {},
            categories: {}
        };
    },

    methods: {
        onFileSelected(event) {
            let file = event.target.files[0];
            if (file.size > 1048770) {
                Notification.image_validation();
            } else {
                let reader = new FileReader();
                reader.onload = event => {
                    this.form.photo = event.target.result;
                    console.log(event.target.result);
                };
                reader.readAsDataURL(file);
            }
        },
        postInsert() {
            axios
                .post("/api/createpost", this.form)
                .then(() => {
                    this.$router.push({ name: "home" });
                    Notification.success();
                })
                .catch(error => (this.errors = error.response.data.errors));
        }
    },
    created() {
        axios
            .get("/api/categories/")
            .then(({ data }) => (this.categories = data));
    }
};
</script>

<style type="text/css"></style>
