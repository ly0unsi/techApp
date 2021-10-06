<template>
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div
                                class="d-flex flex-column align-items-center text-center"
                            >
                                <img
                                    :src="form.profilePic"
                                    alt="Admin"
                                    class="rounded-circle p-1 bg-primary"
                                    width="110"
                                />
                                <div class="mt-3">
                                    <h4>{{ form.name }}</h4>
                                    <p class="text-secondary mb-1">
                                        Full Stack Developer
                                    </p>
                                    <p class="text-muted font-size-sm">
                                        Bay Area, San Francisco, CA
                                    </p>
                                    <button class="btn btn-primary">
                                        Follow
                                    </button>
                                    <button class="btn btn-outline-primary">
                                        Message
                                    </button>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <ul class="list-group list-group-flush">
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap"
                                >
                                    <h6 class="mb-0">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="feather feather-globe me-2 icon-inline"
                                        >
                                            <circle
                                                cx="12"
                                                cy="12"
                                                r="10"
                                            ></circle>
                                            <line
                                                x1="2"
                                                y1="12"
                                                x2="22"
                                                y2="12"
                                            ></line>
                                            <path
                                                d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"
                                            ></path></svg
                                        >Website
                                    </h6>
                                    <span class="text-secondary"
                                        >https://bootdey.com</span
                                    >
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap"
                                >
                                    <h6 class="mb-0">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="feather feather-github me-2 icon-inline"
                                        >
                                            <path
                                                d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"
                                            ></path></svg
                                        >Github
                                    </h6>
                                    <span class="text-secondary">bootdey</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap"
                                >
                                    <h6 class="mb-0">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="feather feather-twitter me-2 icon-inline text-info"
                                        >
                                            <path
                                                d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"
                                            ></path></svg
                                        >Twitter
                                    </h6>
                                    <span class="text-secondary">@bootdey</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap"
                                >
                                    <h6 class="mb-0">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="feather feather-instagram me-2 icon-inline text-danger"
                                        >
                                            <rect
                                                x="2"
                                                y="2"
                                                width="20"
                                                height="20"
                                                rx="5"
                                                ry="5"
                                            ></rect>
                                            <path
                                                d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"
                                            ></path>
                                            <line
                                                x1="17.5"
                                                y1="6.5"
                                                x2="17.51"
                                                y2="6.5"
                                            ></line></svg
                                        >Instagram
                                    </h6>
                                    <span class="text-secondary">bootdey</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap"
                                >
                                    <h6 class="mb-0">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="feather feather-facebook me-2 icon-inline text-primary"
                                        >
                                            <path
                                                d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"
                                            ></path></svg
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
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
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
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
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

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Mobile</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
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
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
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
                                                @change="onFileSelected"
                                            />
                                            Profile Pic >
                                        </label>

                                        <small
                                            class="text-danger"
                                            v-if="errors.profilePic"
                                        >
                                            {{ errors.profilePic[0] }}
                                        </small>
                                        <transition
                                            name="custom-classes-transition"
                                            enter-active-class="animate__animated animate__bounceIn"
                                            leave-active-class="animate__animated animate__bounceOut"
                                        >
                                            <img
                                                v-if="form.profilePic !== null"
                                                :src="form.profilePic"
                                                :key="form.profilePic"
                                                style="height: 40px; width: 40px;"
                                                class="rounded-circle border border-dark"
                                            />
                                        </transition>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
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
                                    <h5 class="d-flex align-items-center mb-3">
                                        Posts
                                    </h5>
                                    <p>Web Design</p>
                                    <div
                                        class="progress mb-3"
                                        style="height: 5px"
                                    >
                                        <div
                                            class="progress-bar bg-primary"
                                            role="progressbar"
                                            style="width: 80%"
                                            aria-valuenow="80"
                                            aria-valuemin="0"
                                            aria-valuemax="100"
                                        ></div>
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
            showSpinner: false
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
                    this.form.profilePic = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        },
        async getUser() {
            try {
                const res = await axios.get("/api/user");
                this.user = res.data;
            } catch (err) {
                console.log(err);
            }
        },
        async getProfile() {
            let username = this.$route.params.username;
            const res = await axios.get("/api/profile/" + username);
            this.form = res.data;
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
                this.$router.go();
            } catch (error) {
                this.errors = error.res.data;
            }
        }
    },
    created() {
        this.getUser();
        this.getProfile();
    }
};
</script>
