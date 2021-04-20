<template>
    <ui-table
        :data="data"
        :loading="loading"
        :data-size="data.length"
        class="table"
    >
        <template v-slot:header>
            <th>Title</th>
            <th>Type</th>
            <th class="d-none d-sm-table-cell">Added at</th>
            <th></th>
        </template>
        <template v-if="loading" v-slot:body>
            <th scope="row" colspan="4">Loading...</th>
        </template>
        <template v-else v-slot:body="{ row }">
            <th scope="row">
                {{ row.title }}
            </th>
            <td>
                <badge>{{ row.type }}</badge>
            </td>
            <td class="d-none d-sm-table-cell">
                <strong :title="getCaptionDate(row.created_at)">
                    {{ getDateRelative(row.created_at) }}
                </strong>
            </td>
            <td>
                <button class="btn btn-link ms-2">
                    <vue-feather
                        type="edit-2"
                        size="16"
                        title="Edit Track"
                        @click="edit(row)"
                    ></vue-feather>
                </button>
                <button class="btn btn-link ms-2">
                    <vue-feather
                        type="trash"
                        size="16"
                        title="Delete Track"
                    ></vue-feather>
                </button>
            </td>
        </template>
    </ui-table>
</template>

<script>
import { DateTime } from "luxon";

export default {
    name: "tracks-table",
    props: ["data", "edit", "loading"],
    components: {},
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
