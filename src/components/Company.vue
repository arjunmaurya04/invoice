<!-- <template>
    <h3 class="m-3">Company List</h3>
    <div class="addcompany"> <router-link to="/addclient"><button class='btn btn-success m-3'>Add Client
                +</button></router-link>
    </div>
    <div class="companylist shadow-sm p-2 mb-5 bg-body-tertiary rounded m-5 w-80">
        <table class="table table-bordered border-primary">
            <tr>
                <th>Sr No.</th>
                <th>Client Name</th>
                <th>Client Website</th>
                <th>Client Email</th>
                <th>Client Number</th>
                <th>Client Address</th>
                <th>Client Postalcode</th>
                <th>Action</th>
            </tr>
            <tr v-for="(client, index) in showclient" :key="index">

                <td>{{ index + 1 }}</td>
                <td>{{ client.company_name }}</td>
                <td>{{ client.website_url }}</td>
                <td>{{ client.email }}</td>
                <td>{{ client.client_number }}</td>
                <td>{{ client.address }}</td>
                <td>{{ client.postalcode }}</td>
                <td><button style="background-color: transparent; border: transparent;"><span
                            class="material-symbols-outlined text-danger">
                            delete
                        </span></button></td>
            </tr>
        </table>

    </div>
</template>

<script>

export default {
    name: 'showclient',
    data() {
        return {
            showclient: [],
        }

    },
    mounted() {
        this.showDetails();
    },
    methods: {
        showDetails() {
            fetch('http://127.0.0.1:8000/api/showclient', {
                method: 'GET',
                headers: {

                    'Accept': 'application/json',
                },
            })

                .then(response => response.json())
                .then(response => {
                    console.log(response)
                    this.showclient = response.showclient
                })

                .catch((error) => {
                    console.error('Error:', error);
                })
        },
    }
}
</script>
<style></style> -->

<template>
    <h3 class="m-3">Company List</h3>
    <div class="addcompany">
        <router-link to="/addclient">
            <button class='btn btn-success m-3'>Add Client +</button>
        </router-link>
        <div class="input-group mb-3">
            <input type="text" class="border border-primary rounded" placeholder="Recipient's username"
                aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button">Search</button>
            </div>
        </div>
    </div>
    <div class="companylist shadow-sm p-2 mr-5 mb-5 bg-body-tertiary rounded m-2 w-80">
        <table class="table table-bordered border-primary">
            <tr>
                <th>Sr No.</th>
                <th>Client Name</th>
                <th>Client Website</th>
                <th>Client Email</th>
                <th>Client Number</th>
                <th>Client Address</th>
                <th>Client Postalcode</th>
                <th>Client GST No</th>
                <th>Client Discount</th>
                <th>Client Payment Term in Day</th>
                <th>Action</th>
            </tr>
            <tr v-for="(client, index) in paginatedClients" :key="index">
                <td>{{ index + 1 + (currentPage - 1) * itemsPerPage }}</td>
                <td>{{ client.company_name }}</td>
                <td>{{ client.website_url }}</td>
                <td>{{ client.email }}</td>
                <td>{{ client.client_number }}</td>
                <td>{{ client.address }}</td>
                <td>{{ client.postalcode }}</td>
                <td>{{ client.gstno }}</td>
                <td>{{ client.discount }}</td>
                <td>{{ client.payment_term }}</td>
                <td>
                    <button style="background-color: transparent; border: transparent;">
                        <span class="material-symbols-outlined text-danger">delete</span>
                    </button>
                </td>
            </tr>
        </table>

        <!-- Pagination Controls -->
        <nav>
            <ul class="pagination justify-content-center">

                <li v-for="page, index in links " :key="index" class="page-item"
                    :class="{ active: currentPage === page }">
                    <button class="page-link" @click.prevent="changePage(page)" v-html="page.label">
                    </button>
                </li>

            </ul>
        </nav>
    </div>
</template>

<script>
export default {
    name: 'showclient',
    data() {
        return {
            showclient: [],
            currentPage: 1,
            itemsPerPage: 10,
            links: []
        };
    },
    computed: {
        totalPages() {
            return Math.ceil(this.showclient.length / this.itemsPerPage);
        },
        paginatedClients() {
            const start = (this.currentPage - 1) * this.itemsPerPage;
            const end = start + this.itemsPerPage;
            return this.showclient.slice(start, end);
        },
    },
    mounted() {
        this.showDetails();
    },
    methods: {
        showDetails() {
            fetch('http://127.0.0.1:8000/api/showclient', {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                },
            })
                .then(response => response.json())
                .then(response => {
                    this.showclient = response.showclient.data;
                    this.links = response.showclient.links;
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        },
        changePage(page) {
            fetch(page.url, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                },
            })
                .then(response => response.json())
                .then(response => {
                    this.showclient = response.showclient.data;
                    this.links = response.showclient.links;
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        },
    }
};
</script>

<style>
th {
    padding: 10px;
}

td {
    padding: 10px;
}
</style>
