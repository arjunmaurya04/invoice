<template>
    <div class="p-2" style="background-color: #E9EBF6;">


        <Header class="header" />
    </div>
    <div class="dashboard">
        <sidebar class="sidebar" />
        <div class="content" style="height: 100%; width: 100%;">
            <router-view></router-view>

        </div>
    </div>

</template>

<script>
import Header from './Header.vue';
import sidebar from './sidebar.vue';

export default {
    name: 'Dashboard',

    components: {
        sidebar,
        Header
    },
    methods: {
        logout() {
            localStorage.removeItem('token');
            this.$router.push('/login');
        }
    }
}

</script>

<style>
.dashboard {
    display: grid;
    background-color: rgb(220, 222, 234);
    grid-template-columns: 1fr 5fr;
    height: 100vh;
    width: 100vw;
}

.content {
    background-color: rgb(220, 222, 234);
    margin: 25px;
}

.header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    /* z-index: 1000; */
    /* Ensures the header is above other elements */
    background-color: #fff;
    /* Set a background color */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    /* Optional: Adds a shadow for better visibility */
}

body {
    background-color: rgb(220, 222, 234);
}
</style>