<template>
    <div>
        <user-service-provider :userId="userId">
            <account-service-provider>
                <collection-service-provider>
                    <track-service-provider v-slot="{ tracks }">
                        <spinner
                            v-if="userLoading || collectionLoading"
                        ></spinner>
                        <div v-else>
                            <app-bar></app-bar>
                            <collection-bar></collection-bar>
                            <p :key="track.id" v-for="track in tracks">
                                {{ track }}
                            </p>
                        </div>
                    </track-service-provider>
                </collection-service-provider>
            </account-service-provider>
        </user-service-provider>
    </div>
</template>

<script>
export default {
    name: "app",
    props: ["userId"],
};
</script>

<style scoped></style>
