<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pregunta;
use App\MoonShine\Pages\Pregunta\PreguntaIndexPage;
use App\MoonShine\Pages\Pregunta\PreguntaFormPage;
use App\MoonShine\Pages\Pregunta\PreguntaDetailPage;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Select;
use MoonShine\Resources\ModelResource;
use MoonShine\Pages\Page;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;

use function Laravel\Prompts\text;

/**
 * @extends ModelResource<Pregunta>
 */
class PreguntaResource extends ModelResource
{
    protected string $model = Pregunta::class;

    protected string $title = 'Pregunta';

    protected bool $createInModal = true;

    protected bool $editInModal = true;

    protected bool $showInModal = true;

    /**
     * @return list<Page>
     */
    public function pages(): array
    {
        return [
            PreguntaIndexPage::make($this->title()),
            PreguntaFormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            PreguntaDetailPage::make(__('moonshine::ui.show')),
        ];
    }

    /**
     * @param Pregunta $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'pregunta' => 'required',
            'respuesta' => 'required',
            'categoria_id' => 'required'
        ];
    }

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
            ]),

            BelongsTo::make('Categoria', 'categoria', 'nombre', resource: new CategoriaResource()),
            Textarea::make('Pregunta', 'pregunta')->sortable(),
            Textarea::make('Opción A', 'a'),
            Textarea::make('Opción B', 'b'),
            Textarea::make('Opción C', 'c'),
            Textarea::make('Opción D', 'd'),
            Text::make('Correcta', 'respuesta')

        ];
    }

    public function filters(): array
    {
        return [


            BelongsTo::make('Categoria', 'categoria', 'nombre', resource: new CategoriaResource())->nullable(),
            Text::make('Pregunta'),
            Text::make('Opción A', 'a'),
            Text::make('Opción B', 'b'),
            Text::make('Opción C', 'c'),
            Text::make('Opción D', 'd'),
            Select::make('Correcta', 'respuesta')
                ->options([
                    'a' => 'a',
                    'b' => 'b',
                    'c' => 'b',
                    'd' => 'd',
                ])
                ->default('value 2')

        ];
    }
}
