<template>
    <p>{{formaterFecha}}</p>
</template>
<script>
export default {
    props:['hola'],
    computed:{
        formaterFecha(){
            return moment(this.hola).locale('es').format('DD [de] MMMM [del] YYYY');
        }
    }
}
</script>