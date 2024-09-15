<template>
    <h3 class="m-3">Service List</h3>

    <div class="addservice"> <router-link to="/addservice"><button class='btn btn-success m-3'>Add Service
                +</button></router-link>
    </div>
    <div class="companylist shadow-sm p-2 mb-5 bg-body-tertiary rounded m-5 w-80">
        <table class="table table-bordered border-primary">
            <tr>
                <th>Sr No.</th>
                <th>Service Name</th>
                <th>Service Charge</th>
                <th>Service Description</th>
                <th>Action</th>
            </tr>
            <tr v-for="(service, index) in servicelist" :key="index">

                <td>{{ index + 1 }}</td>
                <td>{{ service.service_name }}</td>
                <td>{{ service.service_charge }}</td>
                <td>{{ service.service_description }}</td>
                <td><button style="background-color: transparent; border: transparent;"><span
                            class="material-symbols-outlined text-danger">
                            delete
                        </span></button><button style="background-color: transparent; border: transparent;"><span
                            class="material-symbols-outlined">
                            edit
                        </span></button><button style="background-color: transparent; border: transparent;"><span
                            class="material-symbols-outlined">
                            visibility
                        </span></button></td>
            </tr>
        </table>

    </div>
</template>

<script>

export default {
    name: 'servicelist',
    data() {
        return {
            servicelist: []
        }
    },
    mounted() {
        this.showDetails();
    },
    methods: {
        showDetails() {
            fetch('http://127.0.0.1:8000/api/servicelist', {
                method: 'GET',
                headers: {

                    'Accept': 'application/json',
                },
            })
                .then(response => response.json())
                .then(response => {
                    console.log(response)
                    this.servicelist = response.servicelist
                })

                .catch((error) => {
                    console.error('Error:', error);
                })
        },
    }
}
</script>
<style></style>