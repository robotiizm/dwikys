<template>
    <div>
        <div class="m-10 ">
            <h3>Please send <span class="text-blue-600 font-bold">{{botKey}}</span> to the telegram bot and then click the button</h3>

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
                    console.log(response);
                    this.botKey = response.data.bot_key;
                })
                .catch(error =>{

                });
        },
        methods: {
            checkKey: function () {
                axios.get('/api/checkKey')
                    .then(response =>{
                        console.log(response);
                    })
                    .catch(error =>{

                    });
            },
            reqNewBotKey: function () {
                axios.get('/api/generateNewBotKey')
                    .then(response =>{
                        console.log(response);
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
