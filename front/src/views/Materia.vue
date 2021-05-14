<template>
  <div>
  <v-card class="pa-5" color="blue lighten-1">
    <v-row class="d-flex align-content-start flex-wrap">
      <v-col cols="2">
        <img src="../assets/math.jpg" alt="Matemáticas" width="250px" style="border-radius:20px;">
      </v-col>
      <v-col cols="10">
        <h1 class="display-2 white--text">Matemáticas</h1>
        <h2 class="headline white--text">Curso de preparación para el ingreso a nivel medio superior</h2>
        <div>
          <v-progress-linear
            height="25"
            reactive
            rounded
            value="50"
            class="mt-4"
            color="indigo"
          >
            <strong class="white--text">50%</strong>
          </v-progress-linear>
        </div>
      </v-col>
    </v-row>
  </v-card>

  <v-container fluid>
    <v-row>
      <v-col cols="8 pl-10">
          <v-expansion-panels focusable multiple>
          <v-expansion-panel
            v-for="(leccion,i) in lecciones"
            :key="i"
            
          >
            <v-expansion-panel-header>
              <p><strong>Lección {{i +  1}}:</strong> {{leccion.titulo}}</p>
            </v-expansion-panel-header>
            <v-expansion-panel-content>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
              incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
              exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </v-expansion-panel-content>
          </v-expansion-panel>
        </v-expansion-panels>
      </v-col>
      <v-col cols="4 pr-10">
          <v-row class="d-flex justify-end">
            <v-col cols="10">
              <v-card
                class="mx-auto"
                max-width="400"
              >
                <v-img
                  class="white--text align-end"
                  height="200px"
                  src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
                >
                </v-img>

                <v-card-subtitle class="pb-0">Number 10</v-card-subtitle>

                <v-card-text class="text--primary">
                  <div>Whitehaven Beach</div>

                  <div>Whitsunday Island, Whitsunday Islands</div>
                </v-card-text>
              </v-card>
            </v-col>
            <v-col cols="10">
              <v-card
                class="mx-auto"
                max-width="400"
              >
                <v-img
                  class="white--text align-end"
                  height="200px"
                  src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
                >
                </v-img>

                <v-card-subtitle class="pb-0">Number 10</v-card-subtitle>

                <v-card-text class="text--primary">
                  <div>Whitehaven Beach</div>

                  <div>Whitsunday Island, Whitsunday Islands</div>
                </v-card-text>
              </v-card>
            </v-col>
          </v-row>
      </v-col>
    </v-row>
  </v-container>
  </div>

</template>

<script>
export default {
  data(){
    return {
      lecciones : [
        {
          titulo : "Leyes de los signos",
        },
        {
          titulo : "Jerarquía de operaciones",
        },
        {
          titulo : "Operaciones con fracciones",
        },
        {
          titulo : "Regla de 3",
        },
        {
          titulo : "Fracciones complejas",
        }
      ]
    }
  }
}
</script>