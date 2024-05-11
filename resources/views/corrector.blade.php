@extends('layouts.test')



@section('content')
    <div class="md:w-10/12 mx-auto py-24">
<h2 class="text-2xl text-center font-bold">Resultado del test</h2>
            @php
                $data = $preguntas;
                $aciertos = 0;
                $num_preguntas = $data->registros;
            @endphp
            @for ($i = 1; $i <= $num_preguntas; $i++)
                <div class="w-11/12 mx-auto">
                    <x-pregunta title="{{ $i }}. {{ $data->{'texto' . $i} }}">
                       
                        <div class="">
                            <i>a) {{ $data->{'a' . $i} }}</i>


                            @php
                                $seleccionada = $data->{'respuesta' . $i};
                                $respuesta = $data->{'a' . $i};
                                $correcta = $data->{'correcta' . $i};
                                $correctaL = '';
                                
                            @endphp

                            @if ($seleccionada == 'a')
                                <i class="fas fa-arrow-left"></i><b> Seleccionada</b>
                            @endif
                            @if ($correcta == $respuesta)
                                @php
                                    $correctaL = 'a';
                                @endphp

                                <b><i class="fas fa-check"></i> Correcta</b>
                            @endif
                            <br />
                            <i>b) {{ $data->{'b' . $i} }}</i>
                            @php
                                $respuesta = $data->{'b' . $i};
                                $correcta = $data->{'correcta' . $i};
                            @endphp
                            @if ($seleccionada == 'b')
                                <i class="fas fa-arrow-left"></i><b> Seleccionada</b>
                            @endif
                            @if ($correcta == $respuesta)
                                @php
                                    $correctaL = 'b';
                                @endphp
                                <b><i class="fas fa-check"></i> Correcta</b>
                            @endif
                            <br />
                            <i>c) {{ $data->{'c' . $i} }}</i>
                            @php
                                $respuesta = $data->{'c' . $i};
                                $correcta = $data->{'correcta' . $i};
                            @endphp
                            @if ($seleccionada == 'c')
                                <i class="fas fa-arrow-left"></i><b> Seleccionada</b>
                            @endif
                            @if ($correcta == $respuesta)
                                @php
                                    $correctaL = 'c';
                                @endphp
                                <b><i class="fas fa-check"></i> Correcta</b>
                            @endif
                            <br />
                            <i>d) {{ $data->{'d' . $i} }}</i>
                            @php
                                $respuesta = $data->{'d' . $i};
                                $correcta = $data->{'correcta' . $i};
                            @endphp

                            @if ($seleccionada == 'd')
                                <i class="fas fa-arrow-left"></i><b> Seleccionada</b>
                            @endif
                            @if ($correcta == $respuesta)
                                @php
                                    $correctaL = 'd';
                                @endphp

                                <b><i class="fas fa-check"></i> Correcta</b><br />
                            @endif

                            @if ($seleccionada == $correctaL)
                                @php
                                    $aciertos++;
                                    $correctaL = 'X';
                                @endphp
                            @endif
                        </div>
                    </x-pregunta>
                </div>
            @endfor
         <!-- Cerrar el div con clase row -->
        <div class="card col-lg-6 py-2 mx-auto mt-4 mb-4 text-center">
           
            <div class="w-1/3 bg-gray-50 mx-auto border-2 rounded-lg shadow-lg m-4 p-4">
                <h2 class="text-center text-xl"><b>Resultado</b></h2>
                <p class="text-lg">Aciertos {{ $aciertos }} de {{ $num_preguntas }}</p>
                @php
                    $tantoPorCiento = number_format(($aciertos * 100) / $num_preguntas, 2);
                @endphp
                <h2 class="text-center font-bold text-xl">{{$tantoPorCiento }}% de aciertos</h2>
            </div>
            <div class="">
                <a href="{{ route('test') }}" class="btn-primary">Hacer otro</a>
            </div>
        </div>
     
    @endsection
