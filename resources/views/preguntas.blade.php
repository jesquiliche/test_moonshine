@extends('layouts.test')

@section('content')
    <div class=" md:w-10/12 mx-auto py-24">
        <h2 class="text-center text-2xl font-bold">{{ $titulo }}</h2>
       
        @php
            $x = 0;
        @endphp
        @if(count($preguntas) > 0)
            <form action="{{ route('corrector') }}" method="POST">
                @csrf
                @foreach ($preguntas as $pregunta)
                    @php
                        $x++;
                    @endphp
                    <div class="">
                        <div class="w-11/12 mx-auto">
                            <x-pregunta title="{{ $x }}. {{ $pregunta->pregunta }}">
                                <input type="hidden" name="texto{{ $x }}" value="{{ $pregunta->pregunta }}">
                                <input type="hidden" name="pregunta{{ $x }}" value="{{ $pregunta->id }}">
                                <input type="hidden" name="respuesta{{ $x }}" value="x">
                                <input type="radio" name="respuesta{{ $x }}" value="a"> a)
                                
                                <i>{{ $pregunta->a }}</i>
                                <input type="hidden" name="a{{ $x }}" value="{{ $pregunta->a }}">
                                <input type="hidden" name="b{{ $x }}" value="{{ $pregunta->b }}">
                                <input type="hidden" name="c{{ $x }}" value="{{ $pregunta->c }}">
                                <input type="hidden" name="d{{ $x }}" value="{{ $pregunta->d }}">
                                @if ($pregunta->respuesta == 'a')
                                    <input type="hidden" name="correcta{{ $x }}" value="{{ $pregunta->a }}">
                                @endif
                                <br/>
                                <input type="radio" name="respuesta{{ $x }}" value="b" class="ml-0"><i> b) {{ $pregunta->b }}</i>
                                <br/>
                                @if ($pregunta->respuesta == 'b')
                                    <input type="hidden" name="correcta{{ $x }}" value="{{ $pregunta->b }}">
                                @endif
                                
                                <input type="radio" name="respuesta{{ $x }}" value="c" class="ml-0"><i> c) {{ $pregunta->c }}</i>
                                @if ($pregunta->respuesta == 'c')
                                    <input type="hidden" name="correcta{{ $x }}" value="{{ $pregunta->c }}">
                                @endif
                                <br />
                                <input type="radio" name="respuesta{{ $x }}" value="d" class="ml-0"><i> d) {{ $pregunta->d }}</i>
                                @if ($pregunta->respuesta == 'd')
                                    <input type="hidden" name="correcta{{ $x }}" value="{{ $pregunta->d }}">
                                @endif
                            </x-pregunta>
                        </div>
                    </div>
                @endforeach
                <input type="hidden" name="registros" value="{{ $x }}">
                <div class="container col-lg-8 text-center py-2 mt-3 mx-auto">
                    <input type="submit" class="btn-primary"
                        value="Corregir">
                </div>
            </form>
        @else
            <div class="card text-center col-md-6 mx-auto py-4 mt-4">
                <h5>No se encontraron preguntas sobre este tema/bloque</h5>
                <a href="{{ route('test') }}"
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Ok</a>
            </div>
        @endif
      
    </div>
@endsection
