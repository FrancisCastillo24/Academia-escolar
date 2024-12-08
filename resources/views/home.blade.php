@extends("layouts.main")
@section('title', 'Inicio')

@section("content")
<div class="container py-5">
    <!-- Encabezado de bienvenida -->
    <div class="text-center mb-4">
        <h1 class="fw-bold">Bienvenido a nuestra Academia</h1>
        <p class="text-muted">Construimos tu futuro con educación de calidad. Explora nuestras opciones de aprendizaje.</p>
    </div>

    <!-- Sección de Tarjetas -->
    <div class="row g-4">
        <!-- Tarjeta 1 -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('img/cursos.jpg') }}" class="card-img-top" alt="Cursos Personalizados">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">Cursos Personalizados</h5>
                    <p class="card-text">Adapta tu aprendizaje con clases diseñadas para ti. Desde idiomas hasta ciencias exactas.</p>
                    <a href="#" class="btn btn-primary">Más Información</a>
                </div>
            </div>
        </div>
        
        <!-- Tarjeta 2 -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('img/clases_presenciales.jpg') }}" class="card-img-top" alt="Clases Presenciales">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">Clases Presenciales</h5>
                    <p class="card-text">Disfruta de una experiencia educativa inmersiva en nuestras instalaciones.</p>
                    <a href="#" class="btn btn-primary">Descubre más</a>
                </div>
            </div>
        </div>

        <!-- Tarjeta 3 -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('img/soporte_academico.jpg') }}" class="card-img-top" alt="Soporte Académico">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">Soporte Académico</h5>
                    <p class="card-text">Asistencia constante y asesorías para alcanzar tus metas académicas.</p>
                    <a href="#" class="btn btn-primary">Contáctanos</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección "Sobre Nosotros" -->
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="bg-light p-4 rounded shadow-sm">
                <h4 class="fw-bold">Nuestra Misión</h4>
                <p class="text-muted">
                    Brindar educación accesible y de alta calidad para preparar a nuestros estudiantes a enfrentar los desafíos del futuro.
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="bg-light p-4 rounded shadow-sm">
                <h4 class="fw-bold">Nuestra Visión</h4>
                <p class="text-muted">
                    Ser reconocidos como líderes en educación personalizada y en la creación de experiencias de aprendizaje transformadoras.
                </p>
            </div>
        </div>
    </div>

    <!-- Llamado a la acción -->
    <div class="text-center mt-5">
        <h3 class="fw-bold">¡Comienza tu viaje educativo con nosotros hoy!</h3>
        <a href="{{ route('course.index') }}" class="btn btn-success btn-lg mt-3">Ver Cursos</a>
    </div>
</div>
@endsection
