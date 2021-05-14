<template>
  <v-container>
    <v-row>
      <v-col cols="12">
        <h3 class="display-1">Bienvenido de vuelta, Rodrigo</h3>
        <h3 class="headline">Curso de preparación para el ingreso a nivel medio superior</h3>
        <span class="font-weight-thin">Nivel: principiante</span>
        <v-rating v-model="rating">
          <template v-slot:item="props">
            <v-icon
              :color="props.isFilled ? genColor(props.index) : 'grey lighten-1'"
              large
              @click="props.click"
            >
              {{ props.isFilled ? 'mdi-star-circle' : 'mdi-circle-outline' }}
            </v-icon>
          </template>
        </v-rating>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12" class="justify-center">
      <v-tabs v-model="tab">
        <v-tab>Mis materias</v-tab>
        <v-tab>Mis exámenes</v-tab>
        <v-tab>Mi avance</v-tab>
      </v-tabs>
      </v-col>
    </v-row>
    

    
      <v-tabs-items v-model="tab">
        <v-tab-item>
        <v-row >
          <v-col cols="3" v-for="materia in materias" :key="materia.id">
            <v-card
              class="mx-auto"
              min-height="330"
              max-height="330"
            >
              <v-img
                class="white--text align-end"
                height="150px"
                :src="rutaImagen(materia.imagen)"
              >
              </v-img>

              <v-card-text class="text--primary">
                <div class="title">{{materia.nombre}}</div>

                <v-progress-linear
                  height="25"
                  reactive
                  rounded
                  :value="materia.progreso"
                  class="mt-4"
                  v-if="materia.continuar"
                >
                  <strong>{{materia.progreso}}%</strong>
                </v-progress-linear>

                <div v-else>
                  {{materia.texto}}
                </div>

              </v-card-text>

              <v-card-actions class="d-flex align-end flex-column">
                <router-link to="materia">
                <v-btn
                  color="indigo"
                  text
                >
                  {{textoBotonCard(materia.continuar)}}
                </v-btn></router-link>
              </v-card-actions>
            </v-card>
        </v-col>
        </v-row>
        </v-tab-item>
        <v-tab-item>
          <v-row>
            <v-col cols="3" v-for="examen in examenes" :key="examen.id">
              <v-card
                class="mx-auto"
                max-width="344"
              >
                <v-img
                  class="white--text align-end"
                  height="150px"
                  src="../assets/globe.jpg"
                >
                </v-img>
                <v-card-text>
                  <div>{{tituloExamen(examen)}}</div>
                  <p class="display-1 text--primary">
                    Examen simulación {{examen.id}}
                  </p>
                  <p>Núm. reactivos: {{examen.numPreguntas}}</p>
                </v-card-text>
                <v-card-actions class="d-flex align-end flex-column">
                  <v-btn
                    text
                    color="deep-purple accent-4"
                  >
                    Realizar ahora
                  </v-btn>
                </v-card-actions>
              </v-card>
            </v-col>
          </v-row>
        </v-tab-item>
        <v-tab-item>
           <v-row>
              <v-col cols="3" v-for="n in 4" :key="n">
                <v-card
                  class="mx-auto"
                  max-width="344"
                >
                  <v-card-text>
                    <div>Word of the Day</div>
                    <p class="display-1 text--primary">
                      :)
                    </p>
                    <p>adjective</p>
                    <div class="text--primary">
                      well meaning and kindly.<br>
                      "a benevolent smile"
                    </div>
                  </v-card-text>
                
                </v-card>
              </v-col>
            </v-row>
        </v-tab-item>
      </v-tabs-items>
    
  </v-container>
</template>

<script>
  export default {
    name: 'Home',

    data: () => ({
      tab : null,
      materias : [
        {
          id: 1, 
          nombre:"Física", 
          texto: "Da el primer paso para entender los fenómenos de la naturaleza.",
          continuar : false,
          progreso: 0, 
          imagen: "albert-einstein.png"
        },
        {
          id: 2, 
          nombre:"Matemáticas", 
          texto: "Dale el primer paso para explicar los fenómenos de la naturaleza.",
          continuar : false,
          progreso: 55, 
          imagen: "kids.png"
        },
        {
          id: 3, 
          nombre:"Biología", 
          texto: "Dale el primer paso para explicar los fenómenos de la naturaleza.",
          continuar : false,
          progreso: 30, 
          imagen: "elephant.png"
        },
        {
          id: 4, 
          nombre:"Geografía", 
          texto: "Dale el primer paso para explicar los fenómenos de la naturaleza.",
          continuar : true,
          progreso: 40, 
          imagen: "globe.jpg"
        },
      ],
      examenes : [
        {
          id: 1, 
          disponible: true,
          terminado : true,
          simulacion : true,
          annio : 2014,
          institucion : 'UNAM-COMIPEMS',
          numPreguntas: 128
        },
        {
          id: 2, 
          disponible: true,
          terminado : false,
          simulacion : true,
          annio : 2015,
          institucion : 'UNAM-COMIPEMS',
          numPreguntas: 128
        },
        {
          id: 3, 
          disponible: false,
          terminado : false,
          simulacion : true,
          annio : 2019,
          institucion : 'UNAM-COMIPEMS',
          numPreguntas: 128
        }
      ],
      rating :1,
      colors: ['green', 'purple', 'orange', 'indigo', 'red'],
    }),
    methods : {
      rutaImagen(nombre){
        return require('../assets/'+nombre)
      },
      textoBotonCard(continuar){
        return continuar ? 'Continuar' : 'Empezar'
      },
      tituloExamen(examen){
        return examen.institucion + " " + examen.annio;
      },
      genColor (i) {
        return this.colors[i]
      },
    }
  }
</script>
