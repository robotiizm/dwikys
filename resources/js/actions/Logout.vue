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
                    window.location = '/login';
                })
        }
    }
</script>

<style scoped>

</style>
