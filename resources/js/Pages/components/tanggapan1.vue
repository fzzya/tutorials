<template>
  <v-btn color="blue" class="nt-3" @click="tampilkan">Tanggapan</v-btn>
  <div v-show="show" @click="readMore" style="cursor:pointer">
  <p>
    {{ isi }}
  </p>
  <p v-show="showRead" style="color:#7f7f7f">
    Baca Selengkapnya...
  </p>
  </div>
</template>

<script>
export default {
  props: ["id"],
  data() {
    return {
      show: false,
      showRead: true,
      isi: "",
      longText: "",
    };
  },
  methods: {
    tampilkan() {
      this.show = !this.show
    },
    getTanggapan() {
      fetch('/masyarakat/tanggapan/' + this.id)
        .then((res) => res.json())
        .then((data) => {
            this.longText = data.tanggapan;
            if (data.tanggapan.split(" ").length > 20) {
                this.isi = data.tanggapan.split(" ").slice(0, 20).join(" ") + "..."
            } else {
                this.isi = data.tanggapan
                this.showRead = false
            }
          console.log(data.tanggapan);
        });
    },
    readMore() {
        this.isi = this.longText
        this.showRead = false
    },
  },
  created() {
    this.getTanggapan();
  },
};
</script>

<style>
</style>
