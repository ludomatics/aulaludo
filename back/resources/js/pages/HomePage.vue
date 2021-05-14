<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mb-2">
                <h2>Miguel Francisco</h2>
                <!-- EN CASO DE QUE EL USUARIO SE HAYA INSCRITO EN VARIOS GRUPOS, SE MOSTRARÁ EL MÁS RECIENTE (last) -->
                <h3>Curso Universidad 2020</h3>
                <h4>Grupo 2</h4>
                <hr>
            </div>
            <div class="col-md-4 text-center">
                <h5>No olvides cerrar sesión</h5>
                <a class="btn btn-primary" href="#">
                    Cerrar Sesión
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Examen simulación 1</h5>
                        <h6 class="card-subtitle mb-2 text-muted">UNAM 2013 área 2</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a :href="'cuestionario'" class="card-link">Resolver Ahora</a>
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
        }
    }
</script>
