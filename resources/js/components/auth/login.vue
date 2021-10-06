<template>
    <div style="max-width: 500px;" class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="shadow my-5">
                    <div class=" p-2">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">
                                            Login
                                        </h1>
                                    </div>
                                    <form class="user" @submit.prevent="login">
                                        <div class="form-group">
                                            <input
                                                type="email"
                                                class="form-control"
                                                id="exampleInputEmail"
                                                aria-describedby="emailHelp"
                                                placeholder="Enter Email Address"
                                                v-model="form.email"
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.email"
                                            >
                                                {{ errors.email[0] }}
                                            </small>
                                        </div>
                                        <div class="form-group">
                                            <input
                                                type="password"
                                                class="form-control"
                                                id="exampleInputPassword"
                                                placeholder="Password"
                                                v-model="form.password"
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.password"
                                            >
                                                {{ errors.password[0] }}
                                            </small>
                                        </div>
                                        <div class="form-group">
                                            <div
                                                class="custom-control custom-checkbox small"
                                                style="line-height: 1.5rem;"
                                            >
                                                <input
                                                    type="checkbox"
                                                    class="custom-control-input"
                                                    id="customCheck"
                                                />
                                                <label
                                                    class="custom-control-label"
                                                    for="customCheck"
                                                    >Remember Me</label
                                                >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button
                                                type="submit"
                                                class="btn btn-dark"
                                            >
                                                Login
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
                                        <hr />
                                    </form>
                                    <hr />
                                    <div class="text-center">
                                        <router-link
                                            to="/register"
                                            class="font-weight-bold small"
                                            >Create an Account!</router-link
                                        >
                                    </div>
                                    <div class="text-center">
                                        <router-link
                                            to="/forget"
                                            class="font-weight-bold small"
                                            >Forget Password</router-link
                                        >
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

<script type="text/javascript">
export default {
    data() {
        return {
            form: {
                email: null,
                password: null
            },
            errors: {},
            auth: {},
            showSpinner: false
        };
    },
    methods: {
        async getUser() {
            try {
                const res = await axios.get("/api/user");
                this.auth = res.data;
                if (Object.keys(this.auth).length > 0) {
                    this.$router.push({ name: "home" });
                }
            } catch (err) {
                console.log(err);
            }
        },
        async getCats() {
            const res = await axios.get("/api/categories/");
            this.categories = res.data;
        },
        async login() {
            try {
                this.showSpinner = true;
                const res = await axios.post("/api/auth/login", this.form);
                Reload.$emit("login");
                this.showSpinner = false;
                this.$router.back();
            } catch (error) {
                if (error) {
                    this.showSpinner = false;
                    this.errors = error;

                    Toast.fire({
                        icon: "warning",
                        title: "something went wrong"
                    });
                }
            }
        }
    },
    created() {
        this.getUser();
        this.getCats();
    }
};
</script>

<style type="text/css"></style>
