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

            <div class="col-md-12 py-4 mb-5" v-if="encuestaTerminada && cuestionario">
                <div class="card mb-3">
                    <div class="card-header text-center">
                        <h5 class="card-title">Resultados de la evaluación</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title text-left">Mike Francisco</h5>
                                <h6>Grupo 2</h6>
                            </div>
                            <div class="col-md-6 text-right">
                                <h5>Aciertos: {{aciertos}} / {{preguntas.length}}</h5>
                                <h6>Calificación: {{ (aciertos/preguntas.length).toFixed(2)*10 }}</h6>
                            </div>
                            <div class="col-m-12 text-center">
                                <p class="card-text">En la parte de abajo puedes consultar el examen para ver tus
                                aciertos y fallas. O bien, puedes terminar el cuestionario presionando el botón salir</p>
                                <button class="btn btn-success">Salir</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" v-if="preguntas">
                    <div class="card-header">
                        <h5 class="card-title text-center">Pregunta {{ indice + 1 }} / {{preguntas.length}} </h5>
                        <p class="card-text"> {{pregunta.pregunta}}
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="form-check" v-for="opcion in pregunta.opciones" :key="opcion.opcion_id">
                            <div class="row d-inline-flex">
                                <div class="col-md-2">
                                    <label class="form-check-label mr-4" v-if="comprobarRespuestas(opcion)">
                                        &#x2714;</label>
                                    <label class="form-check-label mr-4" v-if="comprobarRespuestasMala(opcion)">
                                        &#x2718;</label>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <input class="form-check-input" type="radio" disabled
                                       :name="'pregunta-'+indice" :value="opcion" v-model="respuestas[indice]">
                                <label class="form-check-label" :class="[opcion.es_correcta === '1'? 'text-success': '']">
                                    {{opcion.opcion}}
                                </label>
                            </div>
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
                                        :class="[index === indice ? 'active': '']" :key="index">
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
                aciertos : 0,
                encuestaTerminada : false,
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
                    alumno_id : 1,
                    cuestionario_id : this.cuestionario.cuestionario_id,
                    respuestasAlumno : this.respuestasAEnviar,
                }).then(response =>{
                    console.log(response.data);
                });
            },
            terminarEncuesta(){
                if (this.numContestas === this.respuestas.length){
                    this.encuestaTerminada = true;
                    this.contarAciertos();
                }else{
                    alert('Debes terminar de contestar todas las preguntas');
                }
            },
            comprobarRespuestas(opcion){
                if (this.respuestas[this.indice].opcion === opcion.opcion){
                    return this.respuestas[this.indice].es_correcta === '1';
                }
            },
            comprobarRespuestasMala(opcion){
                if (this.respuestas[this.indice].opcion === opcion.opcion){
                    return this.respuestas[this.indice].es_correcta === '0';
                }
            },
            contarAciertos(){
                if (this.encuestaTerminada === true){
                    this.aciertos = this.respuestas.filter(respuesta =>{
                        return respuesta.es_correcta === '1';
                    }).length;
                    this.enviarAciertos();
                }
            },
            enviarAciertos(){
                let url = window.location.origin +'/api/cuestionario-alumno';
                axios.post(url,{
                    alumno_id : 1,
                    cuestionario_id : this.cuestionario.cuestionario_id,
                    aciertos : this.aciertos,
                }).then(response =>{
                    console.log(response.data);
                });
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
                if (this.numContestas !== 0){
                    this.enviarRespuestasUsuario();
                }
            },
            indice(){
                this.prevButton.disabled = this.indice === 0;
                this.nextButton.disabled = this.indice === this.preguntas.length - 1;
            },
            numContestas(){
                if (this.numContestas === this.respuestas.length){
                    this.terminarButton.disabled = false;
                }
            }
        }
    }
</script>

<style scoped>
    .pagination>li>a, .pagination>li>span {
        border-radius: 50% !important;margin: 0 1px;
    }

</style>
