const { createApp, ref } = Vue

  createApp({
    data(){
      return{
        tabla_titulo:"Lista de clientes",
        display:"d-none",
        nombre:"",
        apellidos:"",
        direccion:"",
        telefono:"",
        email:"",
        clientes:[],
      }
    },
    methods:{
      mostar(){
        var me = this;
        var url = "/clientes_mostrar";
        axios.get(url)
          .then(response => {
            me.clientes = response.data;
            me.tabla();
        })
          .catch(error => {
          console.error(error);
        });
      },
      agregar(){

        var me = this;
        var url = "/crear_cliente";
        axios.post(url,{
            'nombre':me.nombre,
            'apellidos':me.apellidos,
            'direccion':me.direccion,
            'telefono':me.telefono,
            'email':me.email,

        })
          .then(response => {
            if (response.data == 1) {
              $('#nuevo_cliente').modal('hide');
              this.nombre="";
              this.apellidos="";
              this.direccion="";
              this.telefono="";
              this.email="";
              this.alert();
            } 
        })
          .catch(function(error) {
            console.error(error);
        });
        
      },
      acutalizar(){

      },
      eliminar(){

      },
      alert(){
         $('#exito').fadeIn(500);
         setTimeout(function(){
            $('#exito').fadeOut(3500);    
         },1500);
      },
      tabla(){
        $(document).ready( function () {
            $('#clientes').DataTable();
        }); 
      }
    },
    mounted(){
      this.mostar();
    }
  }).mount('#app')