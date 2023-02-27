<template>
    <p>Ini tanggapan dari {{ level }}</p>
</template>
<script>
export default {
    props: ["id"],
    data() {
        return {
            level: ""
        }
    },
    created() {
        fetch('/masyarakat/tanggapan/' + this.id)
            .then((res) => res.json())
            .then((data) => {
                this.level = data.levelPetugas;
                console.log(data.levelPetugas);
             });
        }


}
</script>
