<template>
    <div class="container pb-4">
        <div class="row">
            <div class="col-md-12 mb-4 text-center">
                    <h5 class="card-title">Curso Universidad</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Matemáticas</h6>
                    <p class="card-text">Lección 12. Jerarquía de operaciones</p>
            </div>
            
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/rgfHx6e8jdU" 
                frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen></iframe>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <h5>Resumen</h5>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Doloremque cum, dolorem alias qui sed veniam libero! Enim aliquam maxime iure! 
                Laborum, corrupti dicta rem esse dignissimos quam tempora quae ex.
                <br><br>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae accusamus 
                quibusdam nemo possimus similique fugiat ea! Placeat quasi obcaecati impedit 
                repellat voluptatibus adipisci rerum repellendus? Est eum temporibus perspiciatis quis?
            </div>
            <div class="col-md-4 text-center mt-4">
                <img src="img/document.png" alt="doc" width="35px">
                <button type="button" class="btn btn-outline-primary">Descargar resumen</button>
            </div>
        </div>
        <div class="row pt-3">
            <div class="col-sm-6">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Evaluación de práctica</h5>
                    <p class="card-text">Puedes realizar los intentos que desees en este examen con la finalidad de que 
                        afines tus habilidades y te prepares para la evaluación de esta lección.</p>
                    <a href="#" class="btn btn-primary">Realizar prueba</a>
                </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Evaluación de la lección</h5>
                    <p class="card-text">Esta evaluación permanecerá deshabilitado hasta que obtengas una puntuación mayor o igual a 8
                        en la evaluación de prueba.</p>
                    <a href="#" class="btn btn-primary disabled" disabled>Realizar evaluación</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</template>