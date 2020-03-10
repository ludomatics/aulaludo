<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <p>Sera la vista de los {{viewName}}</p>
                        <button v-on:click="changeName()" class="btn btn-primary">Cambiar Nombre</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                viewName : 'Cuestionarios'
            }
        },
        methods:{
            changeName(){
                this.viewName = 'Quizzes';
            }
        }
    }
</script>
