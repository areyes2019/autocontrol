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
        cliente:"",
        texto_alert:"",
        //campos del formuarlio a actualizar
        actualizar_nombre:"",
        actualizar_apellidos:"",
        actualizar_direccion:"",
        actualizar_telefono:"",
        actualizar_email:"",
        cliente_id:""

      }
    },
    methods:{
      mostrar(){
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
              me.nombre="";
              me.apellidos="";
              me.direccion="";
              me.telefono="";
              me.email="";
              me.texto_alert = "El cliente se registró correctamente";
              me.alert();
              me.mostrar();
            } 
        })
          .catch(function(error) {
            console.error(error);
        });
        
      },
      mostrar_acutualizar(data){
        var me  = this;
        var url = '/actualizar_cliente_formulario/'+data;
        axios.get(url)
          .then(response => {
          me.cliente_id = response.data[0]['cliente_id'];
          me.actualizar_nombre = response.data[0]['nombre'];
          me.actualizar_apellidos = response.data[0]['apellidos'];
          me.actualizar_direccion = response.data[0]['direccion'];
          me.actualizar_telefono = response.data[0]['telefono'];
          me.actualizar_email = response.data[0]['email'];
          $('#editar').modal('show');
            
        })
          .catch(error => {
          console.error(error);
        });
      },
      acutalizar(){
        var me = this;  
        var url = 'actualizar_cliente';  
            axios.post(url,{
              'nombre':me.actualizar_nombre,
              'apellidos':me.actualizar_apellidos,
              'direccion':me.actualizar_direccion,
              'telefono':me.actualizar_telefono,
              'email':me.actualizar_email,
              'cliente_id':me.cliente_id
            })
            .then(response => {
              me.texto_alert = "Los datos del cliente se actualizaron correctamente";
              me.alert();
              me.mostrar();
              $('#editar').modal('hide');
          })
            .catch(error => {
            console.error(error);
          });
      },
      advertencia(data){
        this.cliente = data;
        $('#advertencia').modal('show');
      },
      eliminar(data){
        console.log(data);
        var me = this;
        var url = "/eliminar_cliente/"+ data;
        axios.get(url)
          .then(response => {
            $('#advertencia').modal('hide');
            me.mostrar();
            me.alert();
        })
          .catch(error => {
          console.error(error);
        });

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
      this.mostrar();
    }
  }).mount('#app')