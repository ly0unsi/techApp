<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-12 col-md-9" style="border-radius:10px">
                <div class="shadow my-5">
                    <div class="p-2">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">
                                            Register
                                        </h1>
                                    </div>
                                    <form class="user" @submit.prevent="signup">
                                        <label for="exampleFormControlTextarea1"
                                            ><b>Full Name </b></label
                                        >
                                        <div class="form-group mb-1">
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="exampleInputFirstName"
                                                placeholder="Enter Your Full Name"
                                                v-model="form.name"
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.name"
                                            >
                                                {{ errors.name[0] }}
                                            </small>
                                        </div>
                                        <label for="exampleFormControlTextarea1"
                                            ><b>Email </b></label
                                        >
                                        <div class="form-group mb-1">
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

                                        <label for="exampleFormControlTextarea1"
                                            ><b>Password </b></label
                                        >
                                        <div class="form-group mb-1">
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
                                        <label for="exampleFormControlTextarea1"
                                            ><b>Confirm Password </b></label
                                        >
                                        <div class="form-group mb-1">
                                            <input
                                                type="password"
                                                class="form-control"
                                                id="exampleInputPasswordRepeat"
                                                placeholder="Confirm Password"
                                                v-model="
                                                    form.password_confirmation
                                                "
                                            />
                                        </div>
                                        <div class="form-group">
                                            <button
                                                type="submit"
                                                class="btn btn-dark btn-block"
                                            >
                                                Register
                                            </button>
                                        </div>
                                    </form>
                                    <hr />
                                    <div class="text-center">
                                        <router-link
                                            to="/login"
                                            class="font-weight-bold small"
                                            >Already have an
                                            account?</router-link
                                        >
                                    </div>
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
        if (this.user.name) {
            this.$router.push({ name: "home" });
        }
        axios
            .get("/api/user")
            .then(res => (this.user = res.data))
            .catch(err => console.log(err));
        axios
            .get("/api/categories/")
            .then(({ data }) => (this.categories = data));
    },

    data() {
        return {
            form: {
                name: null,
                email: null,
                password: null,
                confirm_password: null
            },
            errors: {},
            user: {}
        };
    },
    methods: {
        async signup() {
            try {
                const res = await axios.post("/api/auth/signup", this.form);

                Toast.fire({
                    icon: "success",
                    title: "Signed in successfully"
                });
                this.$router.push({ name: "home" });
                setTimeout(this.$router.go(), 10000);
            } catch (error) {
                this.errors = error.response.data.errors;
                if (error) {
                    Toast.fire({
                        icon: "warning",
                        title: this.errors
                    });
                }
            }
        }
    }
};
</script>

<style type="text/css"></style>
