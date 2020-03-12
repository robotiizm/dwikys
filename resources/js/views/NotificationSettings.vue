<template>
    <div>
        <div class="m-10 ">
            <h3>Please send <span class="text-blue-600 font-bold">{{botKey}}</span>
                to the telegram bot <span class="font-bold text-blue-600">@Server_checkerbot</span> and then click the Check Key button  </h3>

            <h3 class="mt-3">Once you receive welcome message in from telegram bot you servers will be under control.</h3>

            <button class="mt-6 bg-blue-500 py-2 px-4 text-white rounded hover:bg-blue-400 font-bold" @click="checkKey"> Check key</button>
            <button class="mt-6 bg-green-500 py-2 px-4 text-white rounded hover:bg-blue-400 font-bold" @click="reqNewBotKey">Request New BotKey</button>


        </div>
    </div>
</template>

<script>
    import InputField from "../components/InputField";
    export default {
        name: "NotificationSettings",

        components: {
            InputField,
        },

        props:[
            'data'
        ],
        data: function(){
            return{
                botKey:null,
            }
        },

        mounted() {
            axios.get('/api/getBotKey')
                .then(response =>{
                    this.botKey = response.data.bot_key;
                })
                .catch(error =>{

                });
        },
        methods: {
            checkKey: function () {
                axios.get('/api/checkKey')
                    .then(response =>{
                    })
                    .catch(error =>{

                    });
            },
            reqNewBotKey: function () {
                axios.get('/api/generateNewBotKey')
                    .then(response =>{
                        this.botKey = response.data.bot_key;
                    })
                    .catch(error =>{

                    });
            }
        },
        watch: {
            data: function(val){
                this.botKey = val;
            }
        }
    }
</script>

<style scoped>

</style>
