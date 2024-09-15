<template>


    <div class="sidebar shadow-sm p-3 mb-5 bg-body-tertiary rounded" style="height: 100%;">

        <div class="menu-items  ">

            <router-link to="/dashboard" active-class="active" tag="button"
                class="mb-3 d-flex align-items-center text-secondary-emphasis">
                <span class="material-symbols-outlined me-2">
                    grid_view
                </span> <span>Dashboard</span>

            </router-link>
            <a @click="toggleCompany" class="mb-3 d-flex align-items-center text-secondary-emphasis"><span
                    class="material-symbols-outlined me-2 text-secondary-emphasis">
                    apartment
                </span><span>Client</span></a>
            <router-link to="/showclient" v-show="showCompany" active-class="active" tag="button"
                class="mb-3  align-items-center text-secondary-emphasis" style="display: flex;">
                <span class="material-symbols-outlined me-2">
                    <span class="material-symbols-outlined">
                        fiber_manual_record
                    </span>
                </span> <span>Client List</span>

            </router-link>
            <router-link to="/addclient" v-show="showCompany" active-class="active" tag="button"
                class="mb-3  align-items-center text-secondary-emphasis" style="display: flex;">
                <span class="material-symbols-outlined me-2">
                    <span class="material-symbols-outlined">
                        fiber_manual_record
                    </span>
                </span> <span>Add Client</span>

            </router-link>
            <a @click="toggleInvoices" class="mb-3 d-flex align-items-center text-secondary-emphasis"><span
                    class="material-symbols-outlined me-2">
                    other_admission
                </span><span>Invoices</span></a>
            <router-link to="/invoice" active-class="active" tag="button"
                class="mb-3 align-items-center text-secondary-emphasis" v-show="showInvoices"
                style="margin-left: 20px; display: flex;">
                <span class="material-symbols-outlined me-2">
                    fiber_manual_record
                </span><span>Create an Invoice</span>

            </router-link>
            <router-link to="/invoice" active-class="active" tag="button"
                class="mb-3 align-items-center text-secondary-emphasis" v-show="showInvoices"
                style="margin-left: 20px; display: flex;">
                <span class="material-symbols-outlined me-2">
                    fiber_manual_record
                </span><span>Manage Invoice</span>

            </router-link>
            <a @click="toggleProducts" class="mb-3 d-flex align-items-center text-secondary-emphasis"><span
                    class="material-symbols-outlined me-2">
                    home_repair_service
                </span><span>Services</span></a>
            <router-link to="/addservice" active-class="active" tag="button"
                class="mb-3 align-items-center text-secondary-emphasis" v-show="showProducts"
                style="margin-left: 20px; display: flex;">
                <span class="material-symbols-outlined me-2">
                    fiber_manual_record
                </span><span>Add Service</span>

            </router-link>
            <router-link to="/servicelist" active-class="active" tag="button"
                class="mb-3 align-items-center text-secondary-emphasis" v-show="showProducts"
                style="margin-left: 20px; display: flex;">
                <span class="material-symbols-outlined me-2">
                    fiber_manual_record
                </span><span>Services List</span>

            </router-link>
            <a @click="toggleVendor" class="mb-3 d-flex align-items-center text-secondary-emphasis">
                <span class="material-symbols-outlined me-2">
                    productivity
                </span><span>Vendor</span></a>
            <router-link to="/addservice" active-class="active" tag="button"
                class="mb-3 align-items-center text-secondary-emphasis" v-show="showVendors"
                style="margin-left: 20px; display: flex;">
                <span class="material-symbols-outlined me-2">
                    fiber_manual_record
                </span><span>Vendors Management</span>

            </router-link>
            <router-link to="/servicelist" active-class="active" tag="button"
                class="mb-3 align-items-center text-secondary-emphasis" v-show="showVendors"
                style="margin-left: 20px; display: flex;">
                <span class="material-symbols-outlined me-2">
                    fiber_manual_record
                </span><span>Vendors Invoices</span>

            </router-link>
            <a @click="logout" class="mb-3">
                Logout
            </a>
        </div>

    </div>

</template>

<script>
export default {
    name: 'sidebar',
    data() {
        return {
            showInvoices: false,
            showProducts: false,
            showCompany: false,
            showVendors: false,
        };
    },
    methods: {
        toggleInvoices() {
            this.showInvoices = !this.showInvoices;
        },
        toggleProducts() {
            this.showProducts = !this.showProducts;
        },
        toggleCompany() {
            this.showCompany = !this.showCompany;
        },
        toggleVendor() {
            this.showVendors = !this.showVendors;
        },
        logout() {
            localStorage.removeItem('token');
            this.$router.push('/login');
        }
    },
}
</script>
<style scoped>
.title {
    color: black;
    font-size: 24px;
    margin-top: 10px;
}

.menu-items {
    display: flex;
    flex-direction: column;
    margin-top: 50px;
    font-size: 1rem;
}

.menu-items>* {

    margin-left: 15px;
}

a {
    text-decoration: none;
    color: black;
    cursor: pointer;

}
</style>