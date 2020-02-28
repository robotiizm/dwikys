<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
            <div class="container">
                <router-link to="/servers"><p class="nav-link text-red-500 text-3xl font-bold font-mono">DWIKYS</p></router-link>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto w-100 justify-content-end">
                        <li class="nav-item active">
                            <router-link to="/servers/create"><p class="nav-link text-green-400 font-bold">Create</p></router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/notification-settings"><p class="nav-link text-green-400 font-bold">Notification Settings</p></router-link>
                        </li>

                        <li class="nav-item">
                            <router-link to="/logout"><p class="nav-link text-green-400 font-bold">Logout</p></router-link>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>

    export default {
        name: "Nav"
    }
</script>

<style >




</style>
