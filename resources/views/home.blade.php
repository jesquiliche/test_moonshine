@extends('layouts.test')

@section('css')
<style>
    #portada {
        position: relative;
        text-align: center;
        width: 100%;
    }

    .overlay {
        position: absolute;
        top: 55px;
        left: 0;
        width: 100%;
        height: 86%;
        background-color: rgba(0, 0, 0, 0.7);
        
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        color: white;
        z-index: 2;
    }

    img {
        width: 100%;
        margin: 0;
        padding: 0;
       
    }

  
</style>
@endsection

@section('content')
<div id="portada" class="hidden md:w-full md:block">
    <img src="/aplicaciones.jpg" alt="portada1">
    <div class="overlay">
        <h1 class="text-5xl font-bold">Oposiciones a técnico auxiliar de informática</h1>
        <p class="w-3/5 text-xl mt-4 font-bold italic">Personaliza tu preparación. Podrás hacer test por temas y materias sin límites. </p>
            <h2 class="text-xl mt-1 font-bold italic">Haz
                los test que quieras, cuando quieras!</h2>
    </div>
</div>
<div class="grid cols-1 md:grid-cols-3 md:gap-12 w-10/12  mx-auto  mt-22 md:mt-2">
    <x-card title="Fácil y cómodo de seguir">
        <img src="/portada1.jpg" class="rounded-lg" alt="portada1">
        <div class="card-content m-4">
            Accesible desde cualquier dispositivo y con una interfaz intuitiva. ¡Regístrate ahora y alcanza el éxito en tu examen de oposición!
        </div>
    </x-card>
    <x-card title="Temario actualizado">
        <img src="/portada2.jpg" class="rounded-lg" alt="portada2">
        <div class="m-4">
                      Preguntas actualizadas al temario de la última convocatoria de 2022 y anteriores en nuestra plataforma en línea. ¡Regístrate ahora y obtén una preparación efectiva!
        </div>
    </x-card>
    <x-card title="Más de 1000 preguntas">
        <img src="/portada3.jpeg" class="rounded-lg w-full mx-auto"  alt="portada3">
        <div class="m-4 font-semibold">
           
            Regístrate ahora para acceder a más de 1000 preguntas diseñadas por expertos. ¡Obtén una preparación efectiva y alcanza el éxito en tu examen de oposición!
        </div>
    </x-card>
</div>
<div class="w-10/12 mx-auto p-4 text-center">
    <x-card title="Contenido del temario">
    <div class="p-2">
        El temario se dividirá en 36 temas estructurados en cuatro bloques. El primero de ellos se centra en materias legislativas y jurídicas, y los tres restantes versan sobre contenido informático.
    </div>
    </x-card>

</div>
@endsection
