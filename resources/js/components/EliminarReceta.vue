<template>
  <input
    type="submit"
    value="Eliminar"
    class="btn btn-danger d-block mb-1 w-100"
    @click="eliminarReceta"
  />
</template>
<script>
export default {
  props: ["eliminarId"],
  methods: {
    eliminarReceta() {
      this.$swal({
        title: "¿Deseas eliminar esta receta?",
        text: "Al eliminar nos e puede recuperar la informacón",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si",
        cancelButtonText: "No",
      }).then((result) => {
        if (result.isConfirmed) {
          //enviar peticion de eliminacion
          const params = {
            id: this.eliminarId,
          };
          axios
            .post(`/recetas/${this.eliminarId}`, { params, _method: "delete" }).then((response) => {
              this.$swal({
                icon: "success",
                title: "Receta Eliminada Correctamente",
                showConfirmButton: false,
                timer: 1500,
              });
              //   eliminar deldom
                this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
            })
            .catch((error) => {
              console.log(error);
              this.$swal({
                icon: "error",
                title: "Receta Eliminada Correctamente",
                showConfirmButton: false,
                timer: 1500,
              });
            });
        }
      });
    },
  },
};
</script>