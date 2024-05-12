<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pregunta;
use App\MoonShine\Pages\Pregunta\PreguntaIndexPage;
use App\MoonShine\Pages\Pregunta\PreguntaFormPage;
use App\MoonShine\Pages\Pregunta\PreguntaDetailPage;

use MoonShine\Resources\ModelResource;
use MoonShine\Pages\Page;

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
        return [];
    }
}
