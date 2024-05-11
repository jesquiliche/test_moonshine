<div>
    <div class="bg-gray-50 border-2 border-gray-300 rounded-lg shadow-lg p-2 m-4">
        @if ($title)
            <h2 class="text-lg my-2 italic rounded-md bg-gray-200 text-justify"><b>{{ $title }}</b></h2>
        @endif
        <div class="flex space-x-3">
            <div class="w-1/6 hidden md:block">
                <img src="/pregunta.png" class="w-28 h-28 mx-auto border-2 rounded-md shadow-md" />
            </div>
            <div class="w-5/6">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
