<template> </template>

<script type="text/javascript">
export default {
    created() {
        axios
            .post("/api/auth/logout")
            .then(() => {
                Reload.$emit("logout");
            })
            .then(res => {
                Toast.fire({
                    icon: "success",
                    title: res.data.message
                });
            });

        this.$router.push({ name: "home" });
    }
};
</script>

<style type="text/css"></style>
