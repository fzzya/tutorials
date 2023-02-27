<template>
  <div class="d-flex justify-center">
    <v-card class="my-3" width="50%" v-if="datas.length">
      <v-card-text>
        <v-list lines="three">
          <v-list-item v-for="row in datas" :key="row.id">
            <v-list-item-title>{{ row.nama }} - {{ row.nik }}</v-list-item-title>
            <v-list-item-title>{{ row.tgl_pengaduan }}</v-list-item-title>

            <v-list-item-subtitle>
              <p v-html="row.isi"></p>
            </v-list-item-subtitle>
            <v-list-item-subtitle>
              <span v-if="row.status == '0'" class="text-blue"
                >Status: Belum Diproses</span
              >
              <span v-else class="text-blue">Status: {{ row.status }}</span>
            </v-list-item-subtitle>
            <v-divider/>

            <v-list-item-subtitle>
                <levelPetugas :id="row.id"/>
            </v-list-item-subtitle>

            <template v-slot:prepend>
              <v-avatar color="grey-lighten-1" size="70">
                <v-img
                  class="bg-blue"
                  :aspect-ratio="1"
                  :src="'/storage/' + row.foto"
                  cover
                >
                </v-img>
              </v-avatar>
            </template>

          </v-list-item>
        </v-list>
      </v-card-text>
    </v-card>
  </div>
</template>

<script>
import layout2 from '../../layout/layout2.vue'
import levelPetugas from '../components/levelPetugas.vue'
export default {
    layout:layout2,
    components:{
        levelPetugas
    },
    props:{
        datas:Array
    }
}
</script>

<style>

</style>
