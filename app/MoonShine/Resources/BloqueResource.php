<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Bloque;

use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;

use function Laravel\Prompts\text;

/**
 * @extends ModelResource<Bloque>
 */
class BloqueResource extends ModelResource
{
    protected string $model = Bloque::class;

    

    public string $titleField = 'nombre'; 

    protected string $title = 'Bloques';

    protected bool $createInModal = true; 
 
    protected bool $editInModal = true; 
 
    protected bool $showInModal = true; 

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
            ]),
            Text::make('Nombre','nombre')->sortable(),
            Textarea::make('Descripción','descripcion')
        ];
    }

    /**
     * @param Bloque $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [
            'nombre' => 'required',
            'descripcion' => 'required|min:20'

        ];;
    }

   
}
