<template>
    <div class="m-6">
        <div  class="text-blue-600" >
            <a href="#" @click="$router.back()">
                < Back
            </a>
        </div>
        <div class="pt-4">
            <form @submit.prevent="submitForm" >
                <InputField name="domain" label="domain" placeholder=""
                            @update:field="form.domain = $event" :errors="errors" :data="form.domain"/>
                <InputField name="ip" label="ip" placeholder=""
                            @update:field="form.ip = $event" :errors="errors" :data="form.ip"/>
                <InputField name="expire_date" label="expire_date" placeholder=""
                            @update:field="form.expire_date = $event" :errors="errors" :data="form.expire_date"/>
                <InputField name="status" label="status" placeholder=""
                            @update:field="form.status = $event" :errors="errors" :data="form.status"/>
                <div class="flex justify-end">
                    <button class="text-red-700 border py-2 px-4 rounded mr-3 hover:border-red-300">Cancel</button>
                    <button class="bg-blue-500 py-2 px-4 text-white rounded hover:bg-blue-400">Save</button>
                </div>

            </form>
        </div>
    </div>
</template>

<script>
    import InputField from "../components/InputField.vue";
    export default {
        name: "ServersEdit",
        components: {
            InputField
        },
        data: function(){
            return{
                form: {
                    'domain' : '',
                    'ip' : '',
                    'expire_date' : '',
                    'status': '',
                },
                errors: null
            }
        },
        methods: {
            submitForm: function () {
                axios.patch('/api/servers/' + this.$route.params.id , this.form)
                    .then(response => {
                        this.$router.push('/servers');
                        // console.log(this.form.status);

                    })
                    .catch(errors => {
                        this.errors = errors.response.data.errors;
                        console.log(errors);

                    });
            }
        },
        mounted() {
            axios.get('/api/servers/' + this.$route.params.id)
                .then(response => {
                    this.form = response.data.data;
                    this.loading = false;
                })
                .catch(error => {
                    this.loading = false;
                    console.log(error);

                    if(error.response.status === 404){
                        this.$router.push('/servers');

                    }

                });
        }

    }
</script>

<style scoped>

</style>

