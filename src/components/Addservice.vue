<template>
    <h3 class="m-3">Add Services</h3>
    <router-link to="/servicelist">
        <button class='btn btn-success m-3'> Service List</button>
    </router-link>
    <div class="container shadow-sm p-3 mb-5 bg-body-tertiary rounded w-75">
        <form @submit.prevent="submitForm">

            <div class="row p-3">
                <div class="col">
                    <Label class="p-2">Service Name <sup class="text-danger fs-5">*</sup></Label>
                    <input type="text" name="service_name" v-model="form.service_name" class="form-control w-60"
                        placeholder="Entre Service Name" aria-label="service_name">
                </div>

            </div>
            <div class="row p-3">
                <div class="col">
                    <Label class="p-2">HSN Code <sup class="text-danger fs-5">*</sup></Label>
                    <input type="number" name="hsn" class="form-control w-60" v-model="form.hsn"
                        placeholder="Entre HSN Code" aria-label="hsn">
                </div>

            </div>
            <div class="row p-3">
                <div class="col">
                    <Label class="p-2">Enter Service Description <sup class="text-danger fs-5">*</sup></Label>
                    <textarea type="text" name="service_description" class="form-control w-60"
                        v-model="form.service_description" placeholder="Enter Service Description"
                        aria-label="service_description"></textarea>
                </div>

            </div>
            <div class="row p-3">
                <div class="col">

                    <button class="p-2 m-2 btn btn-success" type="submit">Save</button>
                </div>

            </div>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'Addservice',
    data() {
        return {
            form: {
                service_name: '',
                hsn: '',
                service_description: '',
            }
        }
    },
    methods: {
        // submitForm() {
        //     axios.post('http://localhost:8000/api/addclient', this.form)
        //         .then(response => {
        //             alert('Client added successfully!');
        //             this.resetForm();
        //         })
        //         .catch(error => {
        //             console.error(error);
        //             alert('An error occurred while adding the client.');
        //         });
        // },
        async submitForm() {
            const response = await fetch('http://127.0.0.1:8000/api/addservice', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(this.form),
            })

                .catch((error) => {
                    console.error('Error:', error);
                });
        },
        resetForm() {
            this.form = {
                service_name: '',
                hsn: '',
                service_description: '',
            };
        }

    }
}
</script>
<style></style>