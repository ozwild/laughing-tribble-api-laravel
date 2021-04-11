<template>
    <card>
        <div class="u-full-width">

            <row>
                <grid :size="6" class="navbar-section navbar-left">
                    <multiselect v-if="accounts.length > 1"
                                 v-model="account"
                                 :options="accounts"
                                 track-by="name"
                                 label="name"
                                 placeholder="Account"
                                 class="mr-1"
                    >
                        <template slot="singleLabel" slot-scope="{ option }">
                            [{{ option.country }}] <strong>{{ option.name }}</strong>
                        </template>
                    </multiselect>
                    <h5 v-else-if="account" v-html="account.name" style="margin: 0"></h5>
                </grid>
                <grid :size="6" class="navbar-section navbar-right">


                    <a href="#" @click="logout">Logout</a>

                </grid>
            </row>

        </div>
    </card>
</template>

<script>
export default {
    name: "navbar",
    props: ['accounts'],
    data() {
        return {
            account: null
        }
    },
    mounted() {
        if (this.accounts.length === 1) {
            this.account = this.accounts[0]
        } else {
            const storedAccount = localStorage.getItem('lt-account')
            if (storedAccount) {
                this.account = JSON.parse(storedAccount)
            }
        }
    },
    watch: {
        account() {
            localStorage.setItem('lt-account', JSON.stringify(this.account))
            this.$emit('account-change', this.account)
        }
    },
    methods: {
        logout() {
            axios.post('/logout')
                .then(() => {
                    location.reload();
                });
        }
    }
}
</script>

<style scoped>
.navbar-section {

}

.navbar-right {
    text-align: end;
}

.navbar-section > * {

}

.multiselect {
    display: inline-block;
    width: auto;
}
</style>
