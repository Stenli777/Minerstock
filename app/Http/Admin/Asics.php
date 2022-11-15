<?php

namespace App\Http\Admin;

use AdminColumn;
use AdminColumnFilter;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use App\Models\Producer;
use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Form\Buttons\Cancel;
use SleepingOwl\Admin\Form\Buttons\Save;
use SleepingOwl\Admin\Form\Buttons\SaveAndClose;
use SleepingOwl\Admin\Form\Buttons\SaveAndCreate;
use SleepingOwl\Admin\Section;

/**
 * Class Asics
 *
 * @property \App\Models\Asic $model
 *
 * @see https://sleepingowladmin.ru/#/ru/model_configuration_section
 */
class Asics extends Section implements Initializable
{
    /**
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $alias;

    /**
     * Initialize class.
     */
    public function initialize()
    {
        $this->addToNavigation()->setPriority(100)->setIcon('fa fa-lightbulb-o')->setTitle('Асики')->getParent();
    }

    /**
     * @param array $payload
     *
     * @return DisplayInterface
     */
    public function onDisplay($payload = [])
    {
        $columns = [
            AdminColumn::text('id', '#')->setWidth('50px')->setHtmlAttribute('class', 'text-center'),
            AdminColumn::text('producer.name', 'Производитель'),
            AdminColumn::text('name', 'Название'),
            AdminColumn::text('algorythm.name', 'Алгоритм'),
            AdminColumn::text('hashrate', 'Хэшрейт'),
            AdminColumn::text('consumption', 'Потребление'),
        ];

        $display = AdminDisplay::datatables()
            ->setName('firstdatatables')
            ->setOrder([[0, 'asc']])
            ->setDisplaySearch(true)
            ->with('producer','algorythm')
            ->paginate(25)
            ->setColumns($columns)
            ->setHtmlAttribute('class', 'table-primary table-hover th-center')
        ;

        $display->setColumnFilters([
            AdminColumnFilter::select()
                ->setModelForOptions(\App\Models\Asic::class, 'name')
                ->setLoadOptionsQueryPreparer(function($element, $query) {
                    return $query;
                })
                ->setDisplay('name')
                ->setColumnName('name')
                ->setPlaceholder('Все асики')
            ,
        ]);
        $display->getColumnFilters()->setPlacement('card.heading');

        return $display;
    }

    /**
     * @param int|null $id
     * @param array $payload
     *
     * @return FormInterface
     */
    public function onEdit($id = null, $payload = [])
    {
        $form = AdminForm::card()->addBody([
            AdminFormElement::columns()->addColumn(
            [
                AdminFormElement::text('name', 'Введите название асика')->required(),
                AdminFormElement::select('producer_id', 'Производитель', Producer::class)->setDisplay('name'),
                AdminFormElement::text('hashrate', 'Введите хэшрейт асика')->required(),
                AdminFormElement::select('algorythm_id', 'Алгоритм', \App\Models\Algorythm::class)->setDisplay('name'),
                AdminFormElement::date('sales_data_start', 'Введите дату старта продаж асика'),
                AdminFormElement::image('img', 'выберите изображение асика'),
            ], 'col-xs-12 col-sm-6 col-md-4 col-lg-4')->addColumn([
                AdminFormElement::text('consumption', 'Введите потребление асика')->required(),
                AdminFormElement::text('packing_size', 'Введите размер упаковки'),
                AdminFormElement::text('weight_brutto', 'Введите вес вместе с упаковкой'),
                AdminFormElement::text('dimensions', 'Введите габариты асика')->required(),
                AdminFormElement::text('weight_netto', 'Введите вес асика')->required(),
                AdminFormElement::text('noise', 'Введите шум асика')->required(),
                AdminFormElement::text('chips', 'Введите количество чипов в асике'),
            ], 'col-xs-12 col-sm-6 col-md-8 col-lg-8'),
        ]);

        $form->getButtons()->setButtons([
            'save'  => new Save(),
            'save_and_close'  => new SaveAndClose(),
            'save_and_create'  => new SaveAndCreate(),
            'cancel'  => (new Cancel()),
        ]);

        return $form;
    }

    /**
     * @return FormInterface
     */
    public function onCreate($payload = [])
    {
        return $this->onEdit(null, $payload);
    }

    /**
     * @return bool
     */
    public function isDeletable(Model $model)
    {
        return true;
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // remove if unused
    }
}
