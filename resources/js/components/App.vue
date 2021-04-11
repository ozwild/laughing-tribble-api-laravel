<template>
    <div>
        <user-service-provider :userId="userId">
            <template v-slot="{user}">

                <navbar :accounts="user.accounts" v-on:account-change="accountChangeHandler"></navbar>

            </template>
        </user-service-provider>

        <separator size="lg"></separator>
        <row>
            <grid :size="4">
                <card>
                    <collection-service-provider :account="account">
                        <template v-slot="{collections}">

                            <div v-if="collections && collections.length > 0">
                                <row>
                                    <grid>
                                        <collection-crud v-model="collection" :account="account"></collection-crud>
                                    </grid>
                                </row>
                            </div>

                        </template>
                    </collection-service-provider>
                    <separator size="lg"></separator>
                    <track-service-provider :account="account" :collection="collection">
                        <template v-slot="{tracks}">

                            <div v-if="tracks && tracks.length > 0">
                                <label for="track-selector">Tracks</label>
                                <multiselect v-model="track"
                                             :options="tracks"
                                             track-by="title"
                                             label="title"
                                             placeholder="Track"
                                             id="track-selector"
                                >
                                    <template slot="singleLabel" slot-scope="{ option }">
                                        <strong>{{ option.title }}</strong>
                                    </template>
                                </multiselect>
                            </div>

                        </template>
                    </track-service-provider>
                    <separator size="lg"></separator>
                </card>
            </grid>
            <grid :size="8">
                <card v-if="collection">
                    <div class="collection-selection">
                        <img class="option__image" :src="collection.art_url" alt="No Man’s Sky">
                        <h2>{{ collection.title }}</h2>
                    </div>
                    <separator size="lg"></separator>
                    <track-crud :url="`accounts/${account.id}/tracks`"></track-crud>
                </card>

            </grid>
        </row>


    </div>
</template>

<script>
import UserServiceProvider from "./Providers/UserServiceProvider";
import AccountServiceProvider from "./Providers/AccountServiceProvider";
import CollectionServiceProvider from "./Providers/CollectionServiceProvider";
import TrackServiceProvider from "./Providers/TrackServiceProvider";
import CollectionCRUD from "./UIs/Collections/CollectionCRUD";

export default {
    name: "App",
    props: ['userId'],
    components: {
        UserServiceProvider,
        AccountServiceProvider,
        CollectionServiceProvider,
        TrackServiceProvider,
        CollectionCRUD
    },
    data() {
        return {
            account: null,
            collection: null,
            track: null,
        }
    },
    methods: {
        accountChangeHandler(account) {
            this.account = account
        },
    }
}
</script>

<style scoped>

</style>
