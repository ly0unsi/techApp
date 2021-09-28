<template> </template>

<script type="text/javascript">
export default {
    created() {
        axios
            .post("/api/auth/logout")
            .then(() => {
                Reload.$emit("AfterAdd");
            })
            .then(res => {
                Toast.fire({
                    icon: "success",
                    title: res.data.message
                });
            });

        this.$router.push({ name: "login" });
        this.$router.go();
    }
};
</script>

<style type="text/css"></style>
