<template>
  <v-table class="mx-10 my-10">
        <thead class="bg-grey">
            <tr>
                <th>NO</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Username</th>
                <th>No Handphone</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(row, i) in reg" :key="i++">
                <td>{{ i }}</td>
                <td>{{ row.nama }}</td>
                <td>{{ row.nik }}</td>
                <td>{{ row.username }}</td>
                <td>{{ row.tlp }}</td>
                <td>
                    <v-btn color="blue" @click="konfirmasi(row.id)">Konfirmasi</v-btn>
                </td>
            </tr>
        </tbody>
    </v-table>
</template>

<script>
import { router } from '@inertiajs/vue3'
import layout from '../../layout/layout.vue'
export default {
    props:{
        reg:Array
    },
    layout:layout,
    methods:{
        konfirmasi($id){
            router.visit('/admin/register/'+ $id, {
                method:'get',
                preservationState: true,
                preservationScroll: true,
            })
        }
    }
}
</script>
<style>

</style>
