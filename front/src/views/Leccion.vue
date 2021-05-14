<template>
    <div>
    <v-card class="pa-5" color="blue lighten-1">
        <v-row class="d-flex align-content-start flex-wrap">
        <v-col cols="2">
            <img src="../assets/math.jpg" alt="Matemáticas" width="250px" style="border-radius:20px;">
        </v-col>
        <v-col cols="10">
            <h1 class="display-2 white--text">Lección 2: Jerarquía de operaciones</h1>
            <h2 class="headline white--text">Matemáticas</h2>
            <h3 class="title white--text">Curso de preparación para el ingreso a nivel medio superior</h3>
        </v-col>
        </v-row>
    </v-card>
    <v-container fluid>
        <v-row class="d-flex justify-center">
            <v-col cols="12">
                <v-stepper v-model="e6" vertical >
                    <v-stepper-step :complete="e6 > 1" step="1" editable>
                    Aprende
                    <!--small>Summarize if needed</small-->
                    </v-stepper-step>

                    <v-stepper-content step="1">
                    <v-card color="" class="mb-12 pb-5">
                        <v-row>
                            <v-col cols="6">
                                <h2 class="headline">Instrucciones</h2>
                                <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                Dolores quo earum, natus voluptates nulla possimus laboriosam quasi sapiente distinctio,
                                nobis rerum consectetur dicta molestias impedit cum? Laboriosam sequi minus molestias.</p>

                                <p><a href="#">Descargar notas: Jerarquía de operaciones</a></p>

                                <h2 class="headline">Notas</h2>

                                <p class="text-justify">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae 
                                    vitae architecto cumque, 
                                consequatur libero quis id vel nemo! Expedita cum reprehenderit commodi explicabo sed soluta?
                                Eum tenetur dolore excepturi quaerat. Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                                Laboriosam ullam ducimus sapiente, reiciendis minima voluptatem repellat tempora rerum quae, 
                                eveniet nisi dolorem cumque aperiam soluta reprehenderit mollitia consequatur beatae laborum!</p>

                                <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure praesentium 
                                    vel a ipsam excepturi
                                beatae accusantium eum maiores soluta esse. Dolores eaque fugiat culpa. Vero numquam ducimus dolore 
                                nemo nobis.</p>
                            </v-col>
                            <v-col cols="6" class="text-center">
                                <iframe width="560" height="315" 
                                    src="https://www.youtube.com/embed/rgfHx6e8jdU" 
                                    frameborder="0" allowfullscreen>
                                </iframe>
                            </v-col>
                            <v-col cols="12">
                                <h2 class="headline">Biblioteca</h2>
                                <v-card
                                    class="mx-auto"
                                    outlined
                                >
                                    <v-list-item>
                                    <v-list-item-content>
                                        <v-list-item-title>Single-line item</v-list-item-title>
                                    </v-list-item-content>
                                    </v-list-item>

                                    <v-list-item two-line>
                                    <v-list-item-content>
                                        <v-list-item-title>Two-line item</v-list-item-title>
                                        <v-list-item-subtitle>Secondary text</v-list-item-subtitle>
                                    </v-list-item-content>
                                    </v-list-item>

                                    <v-list-item three-line>
                                    <v-list-item-content>
                                        <v-list-item-title>Three-line item</v-list-item-title>
                                        <v-list-item-subtitle>
                                        Secondary line text Lorem ipsum dolor sit amet,
                                        </v-list-item-subtitle>
                                        <v-list-item-subtitle>
                                        consectetur adipiscing elit.
                                        </v-list-item-subtitle>
                                    </v-list-item-content>
                                    </v-list-item>
                                </v-card>
                            </v-col>
                        </v-row>
                        <v-row>
                            <v-col cols="12" class="text-center">
                                <v-btn color="primary" @click="e6 = 2" class="mt-4 mb-4">Continuar con el examen prueba</v-btn>
                            </v-col>
                        </v-row>
                    </v-card>
                    
                    </v-stepper-content>

                    <v-stepper-step :complete="e6 > 2" step="2" editable>Examen prueba</v-stepper-step>

                    <v-stepper-content step="2" >
                    <v-card color="grey lighten-1" class="mb-12" height="200px"></v-card>
                    <v-btn color="primary" @click="e6 = 3">Continue</v-btn>
                    <v-btn text>Cancel</v-btn>
                    </v-stepper-content>

                    <v-stepper-step step="3" editable>Evaluación de la lección</v-stepper-step>

                    <v-stepper-content step="3">
                    <v-card color="grey lighten-1" class="mb-12" height="200px"></v-card>
                    <v-btn color="primary" @click="e6 = 4">Continue</v-btn>
                    <v-btn text>Cancel</v-btn>
                    </v-stepper-content>

                </v-stepper>
            </v-col>

        </v-row>
    </v-container>
    </div>
</template>

<script>
export default {
    data () {
      return {
        e6: 1,
        item: 1,
      items: [
        { text: 'Real-Time', icon: 'mdi-clock' },
        { text: 'Audience', icon: 'mdi-account' },
        { text: 'Conversions', icon: 'mdi-flag' },
      ],
      }
    },
}
</script>