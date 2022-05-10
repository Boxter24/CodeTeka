<style lang="scss">
$lt-grey: #777777;
$grey: #d5d5d5;
$dk-grey: #3A3A3A;
$brand__alt: #7FC146;
$brand: #6863CE;
$white: #ffffff;
$space: 8px;


.card {
	background-color: $dk-grey;
	color: $white;
	box-shadow: 2px 2px 10px $lt-grey;
	border-top: 8px solid $dk-grey;
	border-radius: $space/2;
	padding: ($space*2) ($space*4) ($space*4) ($space*4);
	margin: $space*2;
	width: 280px;
	&:hover {
		border-top: 8px solid $brand;
		border-radius: $space/2;
		transform: translateY(-1em);
		transition: all 0.2s ease-out;
	}
}

.card__title {
	font-size: 0.875rem;
	text-transform: uppercase;
	letter-spacing: $space/2;
	padding-bottom: $space;
}

.card__body {
	position: relative;
	border-top: 2px solid $lt-grey;
	border-bottom: 2px solid $lt-grey;
	padding-bottom: $space*2;
}

.price {
	font-size: 4rem;
	font-weight: bold;
	text-shadow: 0 0 1px #000;
	color: $brand__alt;
	padding-left: $space*3;
	margin: ($space*4) 0;
}

.price__symbol {
	position: absolute;
	left: 0px;
	top: 42px;
	font-size: 1.5rem;
}

.price__tag {
	text-transform: uppercase;
	margin-bottom: $space;
}

ol {
	list-style: none;
	margin-left: -$space*5;
}

li {
	padding: 12px 0;
	font-size: 1.125rem
}

li:before {
	content: '*';
	margin-right: $space;
	font-size: 0.875rem;
}

.card__button {
	width: 100%;
	background-color: $brand__alt;
	border: 1px solid $brand__alt;
	border-radius: $space;
	margin-top: $space*4;
	padding: $space*2 0;
	font-size: 1.25rem;
	font-weight: bold;
	letter-spacing: $space/3;
	text-transform: uppercase;
	text-shadow: 1px 1px $dk-grey;
	color: $white;
}

.card:hover .card__button {
		background-color: $brand;
		border-color: $brand; 
}

.card:hover .price {
	color: $brand;
}
.metodos{
    display: flex;
    justify-content: center;
}
</style>

<template>
    <div class="contenedor">
        <div class="metodos">
            <router-link to="/plan1">
                <div id="card" class="card">
                    <h1 class="card__title">Trainee</h1>
                    <div class="card__body">
                        <p class="price"><span class="price__symbol">$</span>19.99</p>
                        <p class="price__tag">loral ipsum loral</p>
                    </div>
                    <ol class="card__list">
                        <li class="card__list__item">Ipsum ipsum ipsum</li>
                        <li class="card__list__item">Ipsum loral</li>
                        <li class="card__list__item">Loral ipsum loral loral</li>
                    </ol>
                    <button class="card__button"
                                    type="button"
                                    value="select"
                                    >Select
                    </button>
                </div>
            </router-link>
            <router-link to="/plan2">
                <div id="card" class="card">
                    <h1 class="card__title">Jr</h1>
                    <div class="card__body">
                        <p class="price"><span class="price__symbol">$</span>59.99</p>
                        <p class="price__tag">loral ipsum loral</p>
                    </div>
                    <ol class="card__list">
                        <li class="card__list__item">Ipsum ipsum ipsum</li>
                        <li class="card__list__item">Ipsum loral</li>
                        <li class="card__list__item">Loral ipsum loral loral</li>
                    </ol>
                    <button class="card__button"
                                    type="button"
                                    value="select"
                                    >Select
                    </button>
                </div>
            </router-link>
            <router-link to="/plan3">
                <div id="card" class="card">
                    <h1 class="card__title">Senior</h1>
                    <div class="card__body">
                        <p class="price"><span class="price__symbol">$</span>99.99</p>
                        <p class="price__tag">loral ipsum loral</p>
                    </div>
                    <ol class="card__list">
                        <li class="card__list__item">Ipsum ipsum ipsum</li>
                        <li class="card__list__item">Ipsum loral</li>
                        <li class="card__list__item">Loral ipsum loral loral</li>
                    </ol>
                    <button class="card__button"
                                    type="button"
                                    value="select"
                                    >Select
                    </button>
                </div>
            </router-link>
            
        </div>
        <v-card height="200px" style="margin-top:">
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
export default {
    name: "MetodosPagos",
    data() {
            return {                                
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
    }

</script>