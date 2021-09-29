<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-12 col-md-12">
                <div class="shadow my-5">
                    <div class="p-2">
                        <div class="row">
                            <div class="col-lg-12 ">
                                <div>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">
                                            Add Category
                                        </h1>
                                    </div>

                                    <form
                                        class="user"
                                        @submit.prevent="categoryInsert"
                                    >
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <label
                                                        for="exampleFormControlTextarea1"
                                                        ><b
                                                            >Category name
                                                        </b></label
                                                    >
                                                    <input
                                                        type="text"
                                                        class="form-control my-1"
                                                        id="exampleInputFirstName"
                                                        placeholder="Enter Categoty name"
                                                        v-model="form.name"
                                                    />
                                                    <small
                                                        class="text-danger"
                                                        v-if="errors.name"
                                                    >
                                                        {{ errors.name[0] }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group pt-1">
                                            <button
                                                type="submit"
                                                class="btn btn-dark btn-block"
                                            >
                                                Create
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
                name: null
            },
            errors: {}
        };
    },

    methods: {
        categoryInsert() {
            axios
                .post("/api/createCat", this.form)
                .then(() => {
                    this.$router.push({ name: "home" });
                    Notification.success();
                })
                .catch(error => (this.errors = error.response.data.errors));
        }
    },
    created() {}
};
</script>

<style type="text/css"></style>
