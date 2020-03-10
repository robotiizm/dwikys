<template>
    <div>
        <!--        <div class="container-fluid ">-->
        <!--            <div class="row min-vh-100 flex-column flex-md-row ">-->
        <!--                <aside class="col-12 col-md-2 p-0 bg-blue-400 flex-shrink-1  ">-->
        <!--                   <Nav></Nav>-->
        <!--                </aside>-->

        <!--                <main class="flex flex-col bg-white flex-1 h-screen overflow-y-hidden">-->
        <!--                    <router-view class=" overflow-x-hidden"></router-view>-->
        <!--                </main >-->
        <!--            </div>-->
        <!--        </div>-->
        <Nav></Nav>

        <router-view></router-view>
    </div>
</template>

<script>
    import ExampleComponent from "./ExampleComponent";
    import Nav from "./Nav";

    export default {
        name: "App",

        components: {
            ExampleComponent,
            Nav
        }
    }
</script>

<style scoped>

</style>
