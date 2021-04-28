<template>
  <ui-table
      :data="data"
      :loading="loading"
      :data-size="data.length"
  >
    <template v-slot:header>
      <th>Titulo</th>
      <th>Fuente</th>
      <th>Tipo</th>
      <th class="d-none d-sm-table-cell">Ultima Actualizacion</th>
      <th></th>
    </template>
    <template v-if="loading" v-slot:body>
      <th scope="row" colspan="4">Cargando...</th>
    </template>
    <template v-else v-slot:body="{ row }">
      <th scope="row">
        {{ row.title }}
      </th>
      <td>
        <audio controls :src="row.audio_url">
        </audio>
      </td>
      <td>
        <badge>{{ row.type }}</badge>
      </td>
      <td class="d-none d-sm-table-cell">
                <span class="muted" :title="getCaptionDate(row.updated_at)">
                    {{ getDateRelative(row.updated_at) }}
                </span>
      </td>
      <td>
        <button class="btn btn-link ms-2" @click="edit(row)">
          <vue-feather
              type="edit-2"
              size="16"
              title="Edit Track"
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
import {DateTime} from "luxon";

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
      const d = DateTime.fromISO(v);
      return `${d.toRelativeCalendar()} ${d.toRelative()}`;
    },
  },
};
</script>

<style scoped></style>
