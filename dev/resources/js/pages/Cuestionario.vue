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
                        <h5 class="card-title text-center">Pregunta {{ indice + 1 }} / {{this.preguntas.length}} </h5>
                        <p class="card-text"> {{pregunta.pregunta}}
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="form-check" v-for="opcion in pregunta.opciones" :key="opcion.opcion_id">
                            <input class="form-check-input" type="radio"
                                :name="'pregunta-'+indice" :value="opcion" v-model="respuestas[indice]">
                            <label class="form-check-label">
                                {{opcion.opcion}}
                            </label>
                        </div>
                        <p>Tu respuesta es {{respuestas[indice].opcion}}</p>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="row">
                                <div class="col-md-4 mt-2 text-left">
                                    <button class="btn btn-primary" v-on:click="anterior" :class="prevButton">Anterior
                                    </button>
                                </div>
                                <div class="col-md-4 mt-2 text-center">
                                    <button class="btn btn-success" data-toggle="modal" data-target="#ListaReactivosModal">
                                        Lista reactivos</button>
                                </div>
                                <div class="col-md-4 mt-2 text-right">
                                    <button class="btn btn-primary" v-on:click="siguiente" :class="nextButton">Siguiente
                                    </button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="ListaReactivosModal" tabindex="-1" role="dialog"
             aria-labelledby="ListaReactivosModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ListaReactivosModalLabel">Lista de reactivos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <!--ul class="list-group list-group-horizontal flex-md-row">
                                <a href="#" v-for="(pregunta,index) in preguntas">
                                    <li class="list-group-item rounded-circle bg-light">{{index + 1}}</li>
                                </a>
                            </ul-->

                            <nav aria-label="...">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item" v-for="(pregunta,index) in preguntas"
                                        :class="[index === indice ? 'active': '']">
                                        <a class="page-link" v-on:click="saltarA(index)"
                                           :class="[respuestas[index] !== ''? 'bg-success text-white':'']">{{index + 1}}
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                indice : 0,
                cuestionario : null,
                preguntas : null,
                pregunta: null,
                respuestas : null,
                prevButton : {
                    'disabled' : true
                },
                nextButton : {
                    'disabled' : false
                },
            }
        },
        methods:{
            anterior(){
                if (this.indice !== 0){
                    this.indice--;
                    this.pregunta = this.preguntas[this.indice];
                }
            },
            siguiente(){
                if (this.indice !== this.preguntas.length -1 ){
                    this.indice++;
                    this.pregunta = this.preguntas[this.indice];
                }
            },
            saltarA(index){
                this.indice = index;
                this.pregunta = this.preguntas[this.indice];
            }
        },
        mounted() {
            let url = window.location.origin +'/api/cuestionario/1';
            axios.get(url).then(response => {
               this.cuestionario = response.data;
               this.preguntas = this.cuestionario.preguntas;
               this.pregunta = this.preguntas[this.indice];
               this.respuestas = new Array(12).fill('');
            });
        },
        watch :{
            respuestas(){
                console.log(this.respuestas);
            },
            indice(){
                this.prevButton.disabled = this.indice === 0;
                //this.nextButton.disabled = this.indice === this.preguntas.length - 1;
            }

        }
    }
</script>

<style scoped>
    .pagination>li>a, .pagination>li>span {
        border-radius: 50% !important;margin: 0 1px;
    }

</style>
