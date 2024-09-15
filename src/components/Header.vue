<template>
    <div class="p-2" style="background-color: #E9EBF6;">
        <nav class="fs-4  h-25 ">Invoice System
            <h5 @click="logout" class="position-absolute top-0 end-0 m-3" style="cursor: pointer;">Log out</h5>
        </nav>
    </div>
</template>

<script>
import sidebar from './sidebar.vue';
export default {
    name: 'Header',
    methods: {
        logout() {
            localStorage.removeItem('token');
            this.$router.push('/login');
        }
    }
}

</script>

<style></style>