<template>
    <div class="contenedor">
        <v-parallax            
            height="600"
            src="https://cdn.vuetifyjs.com/images/parallax/material2.jpg"
        ><img class="btn-whatsapp" src="https://clientes.dongee.com/whatsapp.png" width="64" height="64" alt="Whatsapp" onclick="window.location.href='https://wa.me/573001112233?text=Hola!%20Estoy%20interesado%20en%20tu%20servicio'"></v-parallax>
        <v-carousel :show-arrows="false">
            <v-carousel-item
                class="mx-auto"
                v-for="(user,i) in users"
                :key="i"            
                :src="'img/profile/'+user.foto"  
                width=500
                heigth=500                    
            ></v-carousel-item>
        </v-carousel>   
             
    </div>
  
</template>
<script>
    export default {  
        data() {
            return {                                
                users : [],
                form: new Form({
                    id : '',
                    name : '',                                                            
                    foto : '',                    
                })
                ,
                icons: [
                    'mdi-home',
                    'mdi-email',
                    'mdi-calendar',
                    'mdi-delete',
                ],
                items: [
                    'default',
                    'absolute',
                    'fixed',
                ],
                padless: false,
                variant: 'default',
            }                        
        },
        mounted() {
            console.log(this.form.name)            
        },
        computed: {
            localAttrs () {
                const attrs = {}

                if (this.variant === 'default') {
                    attrs.absolute = false
                    attrs.fixed = false
                } else {
                    attrs[this.variant] = true
                }
                
                return attrs
            },
        },
        methods: {                                                                          
            loadPrograma(){                                
                axios.get("/fotos").then( respuesta => (this.users = respuesta.data));
            }   
            
        },
        created() {
            this.loadPrograma();                      
        }
    }
</script>