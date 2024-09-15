<template>
    <div class="create_invoice">
        <div class="content">
            <div class="container shadow-sm p-3 mb-5 bg-body-tertiary rounded">
                <form @submit.prevent="submitInvoice">
                    <h2>TAX INVOICE</h2>
                    <div class="row">
                        <div class="col">
                            <label for="client_id">Client:</label>
                            <select class="form-control" v-model="form.client_id" @change="updateClientDetails"
                                required>
                                <option v-for="client in clients" :key="client.id" :value="client.id">
                                    {{ client.company_name }}
                                </option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="invoice_number">Invoice Number:</label>
                            <input class="form-control" v-model="form.invoice_number" type="text" required />
                        </div>
                    </div>

                    <!-- Display client details after selecting client -->
                    <div class="row">
                        <div class="col">
                            <label for="date">Date:</label>
                            <input class="form-control" v-model="form.date" type="date" required />
                        </div>
                        <div class="col">
                            <label for="address">Address:</label>
                            <input class="form-control" v-model="selectedClient.address" type="text" disabled />
                        </div>
                        <div class="col">
                            <label for="postalcode">Postal Code:</label>
                            <input class="form-control" v-model="selectedClient.postalcode" type="text" disabled />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="gstno">GST Number:</label>
                            <input class="form-control" v-model="selectedClient.gstno" type="text" disabled />
                        </div>
                        <div class="col">
                            <label for="discount">Discount:</label>
                            <input class="form-control" v-model="selectedClient.discount" type="text" disabled />
                        </div>
                        <div class="col">
                            <label for="payment_term">Payment Term in day</label>
                            <input class="form-control" v-model="selectedClient.payment_term" type="text" disabled />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="status">Status:</label>
                            <select class="form-control" v-model="form.status" required>
                                <option value="Pending">Pending</option>
                                <option value="Paid">Paid</option>
                                <option value="Overdue">Overdue</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="due_date">Due Date:</label>
                            <input class="form-control" v-model="form.due_date" type="date" required />
                        </div>
                        <div class="col">
                            <label for="ponumber">PO Number:</label>
                            <input class="form-control" v-model="form.ponumber" type="number" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="igst">IGST:</label>
                            <input class="form-control" v-model="form.igst" type="number" required />
                        </div>

                        <div class="col">
                            <label for="sgst">SGST:</label>
                            <input class="form-control" v-model="form.sgst" type="number" required />
                        </div>
                        <div class="col">
                            <label for="cgst">CGST:</label>
                            <input class="form-control" v-model="form.cgst" type="number" required />
                        </div>
                    </div>

                    <div>
                        <h3 class="m-2">Invoice Items</h3>
                        <table class="m-2 table table-bordered border-primary">
                            <tr>
                                <th>Service Name</th>
                                <th>Description</th>
                                <th>HSN Code</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total Price</th>
                                <th class="p-2">Delete</th>
                                <th>Add Item</th>
                            </tr>
                            <tr v-for="(item, index) in form.items" :key="index">
                                <td class="p-2"><select class="form-control" v-model="item.service_id"
                                        @change="updateServiceDetails(index)" required>
                                        <option v-for="service in services" :key="service.id" :value="service.id">
                                            {{ service.service_name }}
                                        </option>
                                    </select>
                                </td>
                                <td><input class="form-control" v-model="selectedservice.service_description"
                                        type="text" disabled /></td>
                                <td><input class="form-control" v-model="selectedservice.hsn" type="text" disabled />
                                </td>
                                <td class="p-2">
                                    <input class="form-control" v-model="item.quantity" @input="updateTotalPrice(index)"
                                        type="number" min="1" required />
                                </td>
                                <td>
                                    <input class="form-control" v-model="item.unitprice"
                                        @input="updateTotalPrice(index)" type="number" step="0.01" required />
                                </td>
                                <td>
                                    <input class="form-control" v-model="item.total_price" type="number" step="0.01"
                                        disabled />
                                </td>

                                <td>
                                    <button type="button" @click="removeItem(index)"
                                        style="background-color: transparent;border-color: transparent;"><span
                                            class="material-symbols-outlined"> cancel </span></button>
                                </td>

                                <td>
                                    <button type="button" @click="addItem"
                                        style="background-color: transparent;border-color: transparent;"><span
                                            class="material-symbols-outlined"> add_box </span></button>
                                </td>
                            </tr>
                        </table>
                        <button class="btn btn-primary m-3" type="button" @click="addItem">Add Item</button>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-primary m-3" type="button" @click="calculateTotalAmount">Calculate
                                Total Amount</button>
                        </div>
                        <div class="col">
                            <h4>Total Amount:</h4>
                            <input v-model="form.amount" class="form-control" type="number" disabled />
                        </div>
                    </div>
                    <button class="btn btn-success m-3" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'create_invoice',
    data() {
        return {
            form: {
                client_id: '',
                invoice_number: '',
                status: 'Pending',
                due_date: '',
                date: '',
                ponumber: '',
                igst: '',
                sgst: '',
                cgst: '',
                amount: '',
                items: []
            },
            clients: [],
            services: [],
            selectedClient: {
                address: '',
                postalcode: '',
                gstno: '',
                discount: '',
                payment_term: ''
            },
            selectedservice: {
                service_description: '',
                hsn: '',

            },

        };
    },
    mounted() {
        this.fetchClients();
        this.fetchServices();
    },
    // computed: {
    //     totalAmount() {
    //         const subtotal = this.form.items.reduce((total, item) => total + item.total_price, 0);
    //         const discount = parseFloat(this.selectedClient.discount) || 0;
    //         const igst = parseFloat(this.form.igst) || 0;
    //         const sgst = parseFloat(this.form.sgst) || 0;
    //         const cgst = parseFloat(this.form.cgst) || 0;

    //         const totalTax = igst + sgst + cgst;
    //         const total = subtotal + totalTax - discount;

    //         return total.toFixed(2); // Format to two decimal places
    //     }
    // },
    methods: {
        async fetchClients() {
            try {
                const response = await fetch('http://127.0.0.1:8000/api/clients');
                this.clients = await response.json();
            } catch (error) {
                console.error('Error fetching clients:', error);
            }
        },
        async fetchServices() {
            try {
                const response = await fetch('http://127.0.0.1:8000/api/services');
                this.services = await response.json();
            } catch (error) {
                console.error('Error fetching services:', error);
            }
        },
        updateClientDetails() {
            const client = this.clients.find(c => c.id === this.form.client_id);
            if (client) {
                this.selectedClient = {
                    address: client.address,
                    postalcode: client.postalcode,
                    gstno: client.gstno,
                    discount: client.discount,
                    payment_term: client.payment_term
                };
            }
        },
        updateServiceDetails(index) {
            const service = this.services.find(s => s.id === this.form.items[index].service_id);
            if (service) {
                this.selectedservice = {
                    service_description: service.service_description,
                    hsn: service.hsn,
                };
                this.form.items[index].total_price = service ? service.service_charge : 0;
            }
        },
        updateTotalPrice(index) {
            const item = this.form.items[index];
            item.total_price = item.unitprice * item.quantity;
        },
        calculateTotalAmount() {
            // Step 1: Calculate the subtotal for all items
            const subtotal = this.form.items.reduce((total, item) => total + item.total_price, 0);

            // Step 2: Calculate the discount based on the subtotal (assuming discount is a percentage)
            const discount = parseFloat(this.selectedClient.discount) || 0;
            const discountAmount = (discount / 100) * subtotal; // Discount in monetary value

            // Step 3: Calculate the price after discount
            const discountedTotal = subtotal - discountAmount;

            // Step 4: Calculate the taxes (IGST, CGST, SGST) based on the discounted total
            const igst = parseFloat(this.form.igst) || 0;
            const sgst = parseFloat(this.form.sgst) || 0;
            const cgst = parseFloat(this.form.cgst) || 0;

            // Taxes are usually a percentage of the discounted total
            const igstAmount = (igst / 100) * discountedTotal;
            const sgstAmount = (sgst / 100) * discountedTotal;
            const cgstAmount = (cgst / 100) * discountedTotal;

            // Step 5: Calculate total tax amount
            const totalTax = igstAmount + sgstAmount + cgstAmount;

            // Step 6: Calculate the final total amount (Subtotal - Discount + Taxes)
            this.form.amount = discountedTotal + totalTax;
        },

        addItem() {
            this.form.items.push({ service_id: '', quantity: 1, total_price: 0 });
        },
        removeItem(index) {
            this.form.items.splice(index, 1);
        },

        async submitInvoice() {
            this.calculateTotalAmount();
            try {
                const response = await fetch('http://127.0.0.1:8000/api/addinvoices', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify(this.form),
                });
                const result = await response.json();
                if (response.ok) {
                    alert('Invoice created successfully!');
                    this.$router.push('/invoice');
                } else {
                    alert('Error creating invoice: ' + result.message);
                }
            } catch (error) {
                console.error('Error submitting invoice:', error);
            }
        },
    }
};
</script>

<style scoped>
.container {
    background-color: white;
    width: 800px;
    margin-left: 220px;
    margin-top: 50px;
}
</style>
