<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;
use App\MoonShine\Resources\BloqueResource; 
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Select;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;

 


/**
 * @extends ModelResource<Categoria>
 */
class CategoriaResource extends ModelResource
{
    protected string $model = Categoria::class;

    protected string $title = 'Categoria';

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
     
            BelongsTo::make('Bloque', 'bloque','nombre')->sortable(),
            Text::make('Nombre','nombre')->sortable(),
            Textarea::make('Descripción','descripcion')->sortable()
        ];
            
    }

    /**
     * @param Categoria $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [
            'nombre' => 'required',
            'descripcion' => 'required|min:20',
            'bloque_id'=> 'required'

        ];
    }

    public function filters(): array
    {
        return [
           
            Text::make('Nombre'),
            
            BelongsTo::make('Bloque', 'bloque','nombre')->nullable()
        ];
           
    }
}
