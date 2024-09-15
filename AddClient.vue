<template>
    <div>

        <h3 class="m-3">Add Client</h3>
        <router-link to="/showclient">
            <button class='btn btn-success m-3'> Client List</button>
        </router-link>

        <div class="container shadow-sm p-3 mb-5 bg-body-tertiary rounded w-75">
            <form @submit.prevent="submitForm">

                <div class="row p-3">
                    <div class="col">
                        <Label class="p-2">Company Name <sup class="text-danger fs-5">*</sup></Label>
                        <input type="text" name="company_name" v-model="form.company_name" class="form-control w-60"
                            placeholder="Enter Company Name" aria-label="company_name">
                    </div>
                    <div class="col">
                        <Label class="p-2">Website URL <sup class="text-danger fs-5">*</sup></Label>
                        <input type="text" name="website_url" v-model="form.website_url" class="form-control w-60"
                            placeholder="Enter Website" aria-label="website_url">
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col">
                        <Label class="p-2">Email <sup class="text-danger fs-5">*</sup></Label>
                        <input type="text" name="email" class="form-control w-60" v-model="form.email"
                            placeholder="Enter Email" aria-label="email">
                    </div>
                    <div class="col">
                        <Label class="p-2">Contact Number <sup class="text-danger fs-5">*</sup></Label>
                        <input type="text" name="client_number" class="form-control w-60" v-model="form.client_number"
                            placeholder="Enter Contact Number" aria-label="client_number" maxlength="10">
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col">
                        <Label class="p-2">GST No. <sup class="text-danger fs-5">*</sup></Label>
                        <input type="text" name="gstno" class="form-control w-60" v-model="form.gstno"
                            placeholder="Enter GST No" aria-label="gstno">
                    </div>
                    <div class="col">
                        <Label class="p-2">Discount <sup class="text-danger fs-5">*</sup></Label>
                        <input type="number" name="discount" class="form-control w-60" v-model="form.discount"
                            placeholder="Enter Discount" aria-label="discount" maxlength="10">
                    </div>
                    <div class="col">
                        <Label class="p-2">Payement Term <sup class="text-danger fs-5">*</sup></Label>
                        <input type="number" name="payment_term" class="form-control w-60" v-model="form.payment_term"
                            placeholder="Enter Payment term in day" aria-label="payment_term" maxlength="10">
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col">
                        <Label class="p-2">Address <sup class="text-danger fs-5">*</sup></Label>
                        <textarea type="text" name="address" class="form-control w-60" v-model="form.address"
                            placeholder="Enter address" aria-label="address"></textarea>
                    </div>
                    <div class="col">
                        <Label class="p-2">Postalcode <sup class="text-danger fs-5">*</sup></Label>
                        <input type="text" name="postalcode" class="form-control w-60" v-model="form.postalcode"
                            placeholder="Enter Postalcode" aria-label="postalcode" maxlength="6">
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col">

                        <button class="p-2 m-2 btn btn-success" type="submit">Add Company</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'AddClient',
    data() {
        return {
            form: {
                company_name: '',
                website_url: '',
                email: '',
                client_number: '',
                address: '',
                postalcode: '',
                gstno: '',
                discount: '',
                payment_term: '',
            }
        }
    },
    methods: {
        async submitForm() {
            try {
                const response = await fetch('http://127.0.0.1:8000/api/addclient', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(this.form),
                });

                if (response.ok) {
                    this.showAlert('Client added successfully!', 'success');
                    this.resetForm();
                } else {
                    this.showAlert('An error occurred while adding the client.', 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                this.showAlert('An error occurred while adding the client.', 'error');
            }
        },


        resetForm() {
            this.form = {
                company_name: '',
                website_url: '',
                email: '',
                client_number: '',
                address: '',
                postalcode: '',
                gstno: '',
                discount: '',
                payment_term: '',
            };
        },
        // showAlert(message, type) {
        //     alert(message); // This triggers the browser's default alert
        //     // Optionally, you can use a custom modal or toast notification for better UX
        // },


    }
}

</script>
<style>
td {
    text-align: left;
}
</style>