<script>
import axios from 'axios';


export default {
    name: 'login',
    data() {
        return {
            email: '',
            password: '',
        };
    },
    methods: {
        async login() {
            try {
                const response = await axios.post('http://localhost:8000/api/login', {
                    email: this.email,
                    password: this.password,
                });

                localStorage.setItem('token', response.data.access_token);
                this.$router.push('/dashboard');
            } catch (error) {
                console.error('Login failed', error);
            }
        }

    }
};



</script>

<template>
    <div class="container-fluid  p-3" style="height: 100vh;">
        <div class="login_c p-2 shadow p-3 mb-5 bg-body-tertiary rounded">
            <form @submit.prevent="login">
                <h1 class="p-3">Login</h1>
                <input type="email" v-model="email" required name="email" placeholder="Email or Username"
                    class=" w-75 focus-ring py-1 px-2 text-decoration-none border rounded-2 border border-primary">
                <input type="password" v-model="password" required name="password" placeholder="Password"
                    class=" w-75 focus-ring py-1 px-2 text-decoration-none border rounded-2 border border-primary">
                <button type="submit" class="m-3 w-75 bg-success text-light">Log In</button>
            </form>
        </div>
    </div>
</template>

<style scoped>
.read-the-docs {
    color: #888888;
}

.login_c {
    width: 350px;
    height: 400px;
    background-color: white;
    border-radius: 10px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}

input {
    height: 40px;
    margin: 20px;

}

button {
    font-size: 18px;
    border-radius: 10px;
    border: white;
    height: 45px;
}
</style>
