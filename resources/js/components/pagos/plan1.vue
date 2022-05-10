<template>
  <div class="container">
    <div v-if="!paidFor" style="justify-content: center;display: grid;margin-bottom: 2em;">
      <h1>Curso Trainee - ${{ product.price }}</h1>

      <p>{{ product.description }}</p>

      <img width="400" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQbR-lHEfKNmPtPG0WEflipIOydNOSz79W9gNOg65TLgjgMwiHEKAYbDJOwegW4EOA_dws&usqp=CAU" />
    </div>

    <div v-if="paidFor" style="justify-content: center;
display: grid;
margin: 2em;">
      <h1>Haz adquirido el curso!!!</h1>

      <img src="https://media.giphy.com/media/j5QcmXoFWl4Q0/giphy.gif">
    </div>

    <div ref="paypal" style="display: flex;justify-content: center;width: 100%;"></div>
    <v-card height="200px" style="margin-top: 2em">
            <v-footer
            v-bind="localAttrs"
            :padless="padless"
            >                
                <v-card
                    flat
                    tile
                    width="100%"
                    height="250px"
                    class="red lighten-1 text-center"
            >
                    <v-card-text>
                    <v-btn
                        v-for="icon in icons"
                        :key="icon"
                        class="mx-4"
                        icon
                    >
                        <v-icon size="24px">
                        {{ icon }}
                        </v-icon>
                    </v-btn>
                    </v-card-text>

                    <v-divider></v-divider>

                    <v-card-text class="white--text">
                    {{ new Date().getFullYear() }} — <strong>Vuetify</strong>
                    </v-card-text>
                </v-card>
            </v-footer>        
        </v-card>
  </div>
</template>

<script>
// import image from "../assets/lamp.png"
export default {
  name: "HelloWorld",
  data: function() {
    return {
      loaded: false,
      paidFor: false,
      product: {
        price: 19.99,
        description: "Para aquellos que apenas empiezan en la programacion",
        img: "./assets/lamp.jpg",        
      },
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
    };
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
  mounted: function() {
    const script = document.createElement("script");
    script.src =
      "https://www.paypal.com/sdk/js?client-id=ARNRNvgJTH0oaRUrQUC-p-MgCXzIOl5T6um6YqdW7U9mkwzV-ZkfCtp9c0QH6dRWArJY85Yh3rLCT5Vu";
    script.addEventListener("load", this.setLoaded);
    document.body.appendChild(script);
  },
  methods: {
    setLoaded: function() {
      this.loaded = true;
      window.paypal
        .Buttons({
          createOrder: (data, actions) => {
            return actions.order.create({
              purchase_units: [
                {
                  description: this.product.description,
                  amount: {
                    currency_code: "USD",
                    value: this.product.price
                  }
                }
              ]
            });
          },
          onApprove: async (data, actions) => {
            const order = await actions.order.capture();
            this.data;
            this.paidFor = true;
            console.log(order);
          },
          onError: err => {
            console.log(err);
          }
        })
        .render(this.$refs.paypal);
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>