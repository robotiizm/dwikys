<template>
    <div class="relative pb-4">
        <label :for="name" class="text-blue-500 pt-2 px-4  uppercase text-xs font-bold absolute">{{label}}</label>
        <input type="text" :id="name" class="pt-8 w-full px-4 pb-2 text-gray-800 border-b pb-2
               focus:outline-none focus:border-blue-400" :placeholder="placeholder"
               :class="errorClassObject()" v-model="value" @input="updateField()">
        <p class="text-red-700 text-xs font-bold pt-1" v-text="errorMessage()">Error here</p>

    </div>
</template>

<script>
    export default {
        name: "InputField",
        props:[
            'name', 'label', 'placeholder', 'errors', 'data',
        ],
        data: function () {
            return{
                value: ''
            }
        },
        computed: {
            hasError: function () {
                return this.errors && this.errors[this.name] && this.errors[this.name].length > 0;
            }
        },
        methods:{
            updateField: function () {
                this.clearErrors()
                this.$emit('update:field' , this.value)
            },
            errorMessage: function (){
                if (this.hasError){
                    return this.errors[this.name][0];
                }
            },
            clearErrors: function(){
                if (this.hasError){
                    this.errors[this.name] = null;
                }
            },
            errorClassObject: function () {
                return{
                    'error-field': this.hasError //true or false
                }
            }
        },
        watch: {
            data: function(val){
                this.value = val;
            }
        }
    }
</script>

<style scoped>
    .error-field{
        @apply .border-red-500 .border-b-2;
    }
</style>
