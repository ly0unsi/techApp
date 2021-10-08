<template>
    <transition
        name="custom-classes-transition"
        enter-active-class="animate__animated animate__bounceIn"
        leave-active-class="animate__animated animate__bounceOut"
    >
        <div
            v-if="show_modal"
            style="width:100%;height:100%;position:absolute; z-index: 10;padding-top: 35px;"
        >
            <div class="col-md-6 col-sm-11 createModal shadow">
                <div class="col-12">
                    <i
                        class="fas fa-times close_add_post__icon"
                        style="cursor:pointer"
                        @click="closeModal"
                    ></i>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="my-2">
                        <div class="-0">
                            <div class="p-2">
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
                                                            {{
                                                                errors.photo[0]
                                                            }}
                                                        </small>
                                                        <transition
                                                            name="custom-classes-transition"
                                                            enter-active-class="animate__animated animate__bounceIn"
                                                            leave-active-class="animate__animated animate__bounceOut"
                                                        >
                                                            <img
                                                                v-if="
                                                                    form.photo !==
                                                                        null
                                                                "
                                                                :src="
                                                                    form.photo
                                                                "
                                                                :key="
                                                                    form.photo
                                                                "
                                                                style="height: 40px; width: 40px;"
                                                                class="rounded-circle border border-dark"
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
                                                    Add
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
    </transition>
</template>

<script type="text/javascript">
export default {
    created() {
        if (!User.loggedIn()) {
            this.$router.push({ name: "/login" });
        }
    },
    props: ["showModal", "cats"],

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
            showSpinner: false
        };
    },
    computed: {
        show_modal() {
            return this.showModal;
        }
    },
    methods: {
        closeModal() {
            this.showModal = false;
            this.$emit("closeModal");
        },
        onFileSelected(event) {
            let file = event.target.files[0];
            if (file.size > 1048770) {
                Notification.image_validation();
            } else {
                let reader = new FileReader();
                reader.onload = event => {
                    this.form.photo = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        },
        async postInsert() {
            try {
                this.showSpinner = true;
                await axios.post("/api/createpost", this.form);
                this.showSpinner = false;
                Reload.$emit("postInserted");
                this.closeModal();
                Toast.fire({
                    icon: "success",
                    title: "Post created in successfully"
                });
                this.form = {};
                this.form.photo = null;
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
        }
    },

    created() {}
};
</script>

<style type="text/css"></style>
