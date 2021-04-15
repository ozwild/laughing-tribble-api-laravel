<template>
    <div>
        <slot :account="account"></slot>
    </div>
</template>

<script>
import { inject, provide, reactive, readonly } from "vue";

export default {
    name: "account-service-provider",
    setup() {
        const user = inject("user");
        
        const accounts = reactive([]);
        const account = reactive({});

        const setAccounts = (newAccounts) => {
            accounts.value = newAccounts;
            const defaultAccount = getDefaultAccount();
            if (defaultAccount) setAccount(defaultAccount, false);
        };

        const setAccount = (newAccount, shouldStore = true) => {
            account.value = newAccount;
            if (shouldStore) storeAccountLocally(newAccount);
        };

        const getDefaultAccount = () =>
            accounts.value.length === 1
                ? accounts.value[0]
                : getLocallyStoredAccount();

        const getLocallyStoredAccount = () => {
            const storedAccountData = localStorage.getItem("lt-account");
            const storedAccount = JSON.parse(storedAccountData);

            return storedAccount && isAccountInAccounts(storedAccount)
                ? storedAccount
                : null;
        };

        const isAccountInAccounts = (account) =>
            accounts.value.filter((a) => a.id === account.id).length > 0;

        const storeAccountLocally = (account) => {
            localStorage.setItem("lt-account", JSON.stringify(account));
        };

        provide("accounts", readonly(accounts));
        provide("account", readonly(account));
        provide("setAccount", setAccount);

        return {
            user,
            accounts,
            setAccounts,
            account,
            setAccount,
        };
    },
    watch: {
        "user.value": function (user) {
            if (user.accounts) this.setAccounts(user.accounts);
        },
    },
};
</script>

<style scoped></style>
