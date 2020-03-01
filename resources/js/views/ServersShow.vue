<template>
    <div class="m-8">
        <div v-if="loading">Loading...</div>
        <div v-else class="row flex items-center">
            <div v-if="server.domain" class="col-md-4">
                <p class="pt-6 text-gray-600 font-bold uppercase text-sm">domain</p>
                <p class="pt-2 text-blue-400"><a v-bind:href="'https://'+server.domain" target="_blank">{{ server.domain}}</a> </p>
            </div>

            <div v-if="server.status" class="col-md-4">
                <p class="pt-6 text-gray-600 font-bold uppercase text-sm">status</p>
                <p class="pt-2 text-blue-400">{{ server.status}} </p>
            </div>

            <div v-if="server.ip" class="col-md-4">
                <p class="pt-6 text-gray-600 font-bold uppercase text-sm">ip</p>
                <p class="pt-2 text-blue-400">{{ server.ip}} </p>
            </div>
            <div v-if="server.expire_date" class="col-md-4">
                <p class="pt-6 text-gray-600 font-bold uppercase text-sm">expire date</p>
                <p class="pt-2 text-blue-400">{{ server.expire_date}} </p>
            </div>
            <div v-if="server.last_updated" class="col-md-4">
                <p class="pt-6 text-gray-600 font-bold uppercase text-sm">Last Update</p>
                <p class="pt-2 text-blue-400">{{ server.last_updated}} </p>
            </div>
            <div class="mt-4 flex items-center justify-first col-md-4" >
                <router-link :to="'/servers/' + server.server_id + '/edit'" class="px-4 py-2 rounded text-green-500
                     border-2 border-green-500 text-sm font-bold">Edit</router-link>
                <button @click="destroy" class="px-4 py-2 ml-4 bg-red-600 rounded text-sm font-bold text-white" >Delete</button>
            </div>


        </div>
        <div v-if="logsLoading"><i class="fa fa-spinner fa-pulse fa-3x fa-fw flex "></i></div>
        <div v-else>
            <div class="table-responsive mt-12" v-if="serverLogs.data.length > 0">
                <h1 class="text-blue-800 font-bold text-xl">Servers Logs</h1>
                <table class="table table-bordered mt-6">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Type</th>
                        <th scope="col">Ping</th>
<!--                        <th scope="col">Details</th>-->
                        <th scope="col">Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(logs, id) in serverLogs.data" :key="id">
                        <th >{{id+1}}</th>
                        <td>{{logs.type}}</td>
                        <td>{{logs.ping}}</td>
<!--                        <td>{{logs.details}}</td>-->
                        <td>{{logs.time}}</td>
                    </tr>
                    </tbody>
                </table>
                <pagination class="justify-end mt-3" :data="serverLogs" @pagination-change-page="getLogs"></pagination>

            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "ServersShow",
        data: function () {
            return {
                server: null,
                loading: true,
                logsLoading : true,
                serverLogs: {},

            }
        },
        mounted() {
            axios.get('/api/servers/' + this.$route.params.id)
                .then(response =>{
                    this.server = response.data.data;
                    // console.log(this.server);
                    this.loading = false;

                })
                .catch(error =>{

                });
            this.getLogs();
        },
        methods: {
            destroy: function(){
                axios.delete('/api/servers/' + this.$route.params.id)
                    .then(response=> {
                        this.$router.push('/servers');
                    })
                    .catch(error =>{
                        alert('unable to delete.')
                    });
            },
            getLogs: function (page = 1) {
                axios.get('/api/servers/logs/'+ this.$route.params.id +'?page=' + page)
                    .then(response => {
                        // console.log(response);

                        this.serverLogs = response.data;
                        this.logsLoading = false;
                    });
            }
        }
    }
</script>

<style scoped>

</style>
