<template>
    <div>
        <user-service-provider :userId="userId">
            <account-service-provider>
                <collection-service-provider>
                    <track-service-provider>
                        <div>
                            <app-bar></app-bar>
                            <collection-bar></collection-bar>
                            <container>
                                <row>
                                    <column>
                                        <card>
                                            <track-crud></track-crud>
                                        </card>
                                    </column>
                                </row>
                            </container>
                        </div>
                    </track-service-provider>
                </collection-service-provider>
            </account-service-provider>
        </user-service-provider>
    </div>
</template>

<script>
import TrackCRUD from "./UIs/Tracks/TrackCRUD";
export default {
    name: "app",
    props: ["userId"],
    components: { TrackCRUD },
    methods: {},
};
</script>

<style scoped></style>
