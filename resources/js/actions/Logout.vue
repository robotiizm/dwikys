<template>
    <div>

    </div>
</template>

<script>
    export default {
        name: "Logout",
        created() {
            axios.post('/logout', {})
                .finally(error => {
                    console.log(error);
                    window.location = '/login';
                })
        }
    }
</script>

<style scoped>

</style>
