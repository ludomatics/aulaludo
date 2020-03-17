<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <h4>Cuestionario</h4>
                <h5>Matemáticas. Jerarquía de operaciones</h5>
            </div>
            <div class="col-md-10 py-4" v-if="cuestionario">
                <div class="card" v-if="preguntas">
                    <div class="card-header">
                        <h5 class="card-title">Pregunta #</h5>
                        <p class="card-text"> {{preguntas[indice].pregunta}}
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="form-check" v-for="opcion in preguntas[indice].opciones">
                            <input class="form-check-input" type="radio" v-on:click="guardarRespuesta"
                                   :name="'pregunta-'+indice" :value="opcion" v-model="respuesta">
                            <label class="form-check-label">
                                {{opcion}}
                            </label>
                        </div>
                        <p>Tu respuesta es {{respuesta}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mt-2 text-left">
                        <button class="btn btn-primary" v-on:click="anterior">Anterior</button>
                    </div>
                    <div class="col-md-4 mt-2 text-center">
                        <button class="btn btn-success">Lista reactivos</button>
                    </div>
                    <div class="col-md-4 mt-2 text-right">
                        <button class="btn btn-primary" v-on:click="siguiente">Siguiente</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            let indice = 0;
            let respuesta = '';
            return{
                indice,
                respuesta,
                cuestionario : null,
                preguntas : [ ]
            }
        },
        methods:{
            anterior(){
                if (this.indice !== 0){
                    this.indice--;
                }
            },
            siguiente(){
                if (this.indice !== this.preguntas.length -1 ){
                    this.indice++;
                }
            },
            guardarRespuesta(){
                this.preguntas[this.indice].contestada = true;
            }
        },
        mounted() {
            let url = window.location.origin +'/api/cuestionario/1';
            axios.get(url).then(response => {
               this.cuestionario = response.data;
               this.preguntas = this.cuestionario.preguntas;
            });
            console.log(this.cuestionario)
        }
    }
</script>

<style scoped>

</style>
