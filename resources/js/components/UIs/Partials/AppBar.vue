<template>
    <nav class="navbar navbar-expand-sm navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Laughing Tribble</a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li> -->
                </ul>
                <div class="d-flex">
                    <vue-select
                        class="text-light"
                        v-if="accounts.length > 1"
                        v-model="accountId"
                        v-slot="{ option }"
                        :options="accounts"
                        label="name"
                    >
                        [{{ option.country }}]
                        <strong>{{ option.name }}</strong>
                    </vue-select>
                    <span
                        v-else-if="account"
                        class="md-title"
                        v-html="account.name"
                    ></span>
                </div>
                <ul class="navbar-nav ms-2" v-if="user">
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="userOptionsDropdown"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            {{ user.name }}
                        </a>
                        <ul
                            class="dropdown-menu dropdown-menu-end"
                            aria-labelledby="userOptionsDropdown"
                        >
                            <li>
                                <a
                                    class="dropdown-item"
                                    href="#"
                                    @click="logout"
                                    >Logout</a
                                >
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
import { inject } from "vue";

export default {
    name: "app-bar",
    emits: ["update:modelValue"],
    setup() {
        const appUser = inject("user");
        const appAccounts = inject("accounts", []);
        const appAccount = inject("account", {});
        const setAccount = inject("setAccount");

        return {
            appUser,
            appAccounts,
            appAccount,
            setAccount,
        };
    },
    data() {
        return {
            user: null,
            accountId: null,
            accounts: [],
            account: null,
        };
    },
    watch: {
        "appUser.value": function (newValue, oldValue) {
            if (newValue?.id !== oldValue?.id) {
                this.user = newValue;
            }
        },
        "appAccount.value": function (newValue) {
            this.account = newValue;
            this.accountId = newValue.id;
        },
        "appAccounts.value": function (newValue) {
            this.accounts = newValue;
        },
        accountId(id) {
            const [account] = this.accounts.filter(
                (option) => option.id === id
            );
            if (account) this.setAccount(account);
        },
    },
    methods: {
        logout() {
            this.$http.post("/logout").then(() => {
                location.reload();
            });
        },
    },
};
</script>

<style scoped>
.navbar {
    background: linear-gradient(
        45deg,
        black,
        purple,
        magenta,
        orange,
        purple,
        transparent
    );
    filter: hue-rotate(0deg) saturate(0.15);
    z-index: 2;
    box-shadow: 0 0 8px -2px;
}
</style>
