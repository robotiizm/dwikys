<template>
    <div class="m-4">
        <div class="row">
            <div v-for="server in servers" class="col-md-4">
                <div v-if="server.data.status == 'active'" >
                    <div class="card mx-2 mt-4 border-blue-300 ">
                        <div class="card-header bg-blue-600 shadow text-white font-bold ">
                            <p ><a v-bind:href="'https://'+server.data.domain" target="_blank">{{ server.data.domain}}</a> </p>

                        </div>
                        <div class="card-body ">
                            <div class="flex justify-between items-center">
                                <p>Status: <span class="text-green-700 font-bold"> {{server.data.status}}</span></p>
                                <i class="fas fa-cog fa-spin text-green-600 text-2xl"></i>
                            </div>
                            <router-link class="text-gray-700 mt-4 text-sm font-bold flex justify-end" :to="'/servers/' + server.data.server_id">Details</router-link>

                        </div>
                    </div>
                </div>

                <div v-else class="">
                    <div class="card mx-2 mt-4 border-red-300">
                        <div class="card-header bg-red-600 shadow text-white font-bold ">
                            <p ><a v-bind:href="'https://'+server.data.domain" target="_blank">{{ server.data.domain}}</a> </p>

                        </div>
                        <div class="card-body ">
                            <div class="flex justify-between items-center">
                                <p>Status: <span class="text-red-700 font-bold"> {{server.data.status}}</span></p>
                                <i class="fas fa-cog  text-red-600 text-2xl"></i>
                            </div>
                            <router-link class="text-gray-700 mt-4 text-sm font-bold flex justify-end" :to="'/servers/' + server.data.server_id">Details</router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
</template>

<script>
    export default {
        name: "ServersIndex",
        data: function(){
            return{
                servers: null
            }
        },

        mounted() {
            axios.get('/api/servers/')
                .then(res =>{
                    // console.log(res);
                    this.servers = res.data.data;
                })
                .catch(err=> {

                })
        }
    }
</script>

<style scoped>

</style>
