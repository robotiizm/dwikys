<template>
    <div>
        <div class="m-8">

            <form @submit.prevent="submitForm">
                <InputField name="domain" label="Domain" placeholder="Domain"  @update:field="form.domain = $event" :errors="errors"/>
                <InputField name="ip" label="Ip" placeholder="Ip Address"  @update:field="form.ip = $event" :errors="errors"/>
                <InputField name="expire_date" label="Expire Date" placeholder="Server Expire Date"  @update:field="form.expire_date = $event" :errors="errors"/>
                <div class="flex justify-end">
                    <button class="text-red-700 border py-2 px-4 rounded mr-3 hover:border-red-300" @click="$router.back()">Cancel</button>
                    <button class="bg-blue-500 py-2 px-4 text-white rounded hover:bg-blue-400">Add New</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import InputField from "../components/InputField";
    export default {
        name: "ServersCreate",

        components: {
            InputField,
        },
        data: function(){
            return{
                form: {
                    'domain' : '',
                    'ip' : '',
                    'expire_date' : '',
                    'status': 'active'
                },
                errors: null
            }
        },
        methods: {
            submitForm: function () {
                axios.post('/api/servers' , this.form)
                    .then(response => {
                        this.$router.push('/servers');
                    })
                    .catch(errors => {
                        this.errors = errors.response.data.errors;
                        console.log(this.errors);
                    });
            }
        }
    }
</script>

<style scoped>

</style>
