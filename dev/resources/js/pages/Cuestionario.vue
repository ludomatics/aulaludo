<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <h4>Cuestionario</h4>
                <h5>Matemáticas. Jerarquía de operaciones</h5>
            </div>
            <div class="col-md-10 py-4" v-if="cuestionario && !encuestaTerminada">
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
                        <!--p>Tu respuesta es {{respuestas[indice].opcion}}</p-->
                    </div>
                    <div class="card-footer text-muted">
                        <div class="row">
                            <div class="col-md-2">
                                <p>P. Resp: {{numContestas}}/{{respuestas.length}}</p>
                            </div>
                            <div class="col-md-8 text-center">
                                <button class="btn btn-primary" v-on:click="anterior" :class="prevButton">Anterior
                                </button>
                                <button class="btn btn-success" data-toggle="modal" data-target="#ListaReactivosModal">
                                    Lista reactivos</button>
                                <button class="btn btn-primary" v-on:click="siguiente" :class="nextButton">Siguiente
                                </button>
                            </div>
                            <div class="col-md-2 text-right">
                                <button class="btn btn-danger" :class="terminarButton" v-on:click="terminarEncuesta">
                                    Terminar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 py-4" v-if="encuestaTerminada">
                <div class="card" v-if="preguntas">
                    <div class="card-header">
                        <h5 class="card-title text-center">Pregunta {{ indice + 1 }} / {{this.preguntas.length}} </h5>
                        <p class="card-text"> {{pregunta.pregunta}}
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="form-check" v-for="opcion in pregunta.opciones" :key="opcion.opcion_id">
                            <label class="form-check-label mr-4">&#x2714;</label>
                            <input class="form-check-input" type="radio" disabled
                                   :name="'pregunta-'+indice" :value="opcion" v-model="respuestas[indice]">
                            <label class="form-check-label text-success">
                                {{opcion.opcion}}
                            </label>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary" v-on:click="anterior" :class="prevButton">Anterior
                                </button>
                                <button class="btn btn-success" data-toggle="modal" data-target="#ListaReactivosModal">
                                    Lista reactivos</button>
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
                            <nav aria-label="lista-reactivos">
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
                cuestionario : null,
                preguntas : null,
                pregunta: null,
                respuestas : null,
                respuestasAEnviar : null,
                indice : 0,
                numContestas : 0,
                encuestaTerminada : true, // Por defecto va en false
                prevButton : {
                    'disabled' : true
                },
                nextButton : {
                    'disabled' : false
                },
                terminarButton:{
                    'disabled' : true
                }
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
            },
            enviarRespuestasUsuario(){
                let url = window.location.origin +'/api/respuestas';
                axios.post(url,{
                    respuestasUsuario : this.respuestasAEnviar
                }).then(response =>{
                    console.log(response);
                });
            },
            terminarEncuesta(){
                if (this.numContestas === this.respuestas.length){
                    this.encuestaTerminada = true;
                }else{
                    alert('Debes terminar de contestar todas las preguntas');
                }
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
                this.respuestasAEnviar = this.respuestas.filter( respuesta => {
                   return respuesta !== '';
                });
                this.numContestas = this.respuestasAEnviar.length;
                console.log(this.respuestasAEnviar);
            },
            indice(){
                this.prevButton.disabled = this.indice === 0;
                this.nextButton.disabled = this.indice === this.preguntas.length - 1;
            },
            numContestas(){
                if (this.numContestas === this.respuestas.length){
                    this.terminarButton.disabled = false;
                    //this.encuestaTerminada = true;
                }
                //this.enviarRespuestasUsuario();
            }
        }
    }
</script>

<style scoped>
    .pagination>li>a, .pagination>li>span {
        border-radius: 50% !important;margin: 0 1px;
    }

</style>
