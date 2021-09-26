<template> </template>

<script type="text/javascript">
export default {
    created() {
        axios.post("/api/auth/logout").then(res => {
            Toast.fire({
                icon: "success",
                title: res.message
            });
        });
        localStorage.removeItem("token");
        localStorage.removeItem("user");

        this.$router.push({ name: "login" });
    }
};
</script>

<style type="text/css"></style>
