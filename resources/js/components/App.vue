<template>
    <div>
        <user-service-provider :userId="userId">
            <account-service-provider>
                <collection-service-provider>
                    <track-service-provider v-slot="{ tracks }">
                        <div>
                            <app-bar></app-bar>
                            <collection-bar></collection-bar>
                            <container>
                                <row>
                                    <column>
                                        <card>
                                            <button
                                                class="btn btn-dark ms-2 float-end"
                                            >
                                                <vue-feather
                                                    type="plus"
                                                    size="16"
                                                    title="Add Track to Collection"
                                                ></vue-feather>
                                            </button>
                                            <ui-table
                                                :data="tracks"
                                                class="table"
                                            >
                                                <template v-slot:header>
                                                    <th>Type</th>
                                                    <th>Title</th>
                                                    <th>Added at</th>
                                                    <th></th>
                                                </template>
                                                <template v-slot:body="{ row }">
                                                    <td>
                                                        <badge>{{
                                                            row.type
                                                        }}</badge>
                                                    </td>
                                                    <td>{{ row.title }}</td>

                                                    <td>
                                                        <strong
                                                            :title="
                                                                getCaptionDate(
                                                                    row.created_at
                                                                )
                                                            "
                                                        >
                                                            {{
                                                                getDateRelative(
                                                                    row.created_at
                                                                )
                                                            }}
                                                        </strong>
                                                    </td>
                                                    <td>
                                                        <button
                                                            class="btn btn-link ms-2"
                                                        >
                                                            <vue-feather
                                                                type="edit-2"
                                                                size="16"
                                                                title="Edit Track"
                                                            ></vue-feather>
                                                        </button>
                                                        <button
                                                            class="btn btn-link ms-2"
                                                        >
                                                            <vue-feather
                                                                type="trash"
                                                                size="16"
                                                                title="Delete Track"
                                                            ></vue-feather>
                                                        </button>
                                                    </td>
                                                </template>
                                            </ui-table>
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
import { DateTime } from "luxon";
export default {
    name: "app",
    props: ["userId"],
    methods: {
        getCaptionDate(v) {
            const d = DateTime.fromISO(v);
            return `${d.toLocaleString()} ${d.toSQLTime()}`;
        },
        getDateRelative(v) {
            return DateTime.fromISO(v).toRelativeCalendar();
        },
    },
};
</script>

<style scoped></style>
