<?php

namespace App\Admin\Controllers;

use App\Admin\Selectable\Images;
use App\Models\Sale;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SaleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '推薦商品';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Sale());

        $grid->column('id', __('Id'))->sortable();
        $grid->column('title', __('Title'));
        $grid->column('text', __('Text'))->hide();
        $grid->column('href', __('Href'))->hide();
        $grid->column('type', __('Type'))->using(['推薦商品', '宣傳版位', '廣告']);

        $grid->column('target', __('Target'))->hide();
        $grid->column('created_at', __('Created at'))->hide()->sortable();
        $grid->column('updated_at', __('Updated at'))->sortable();

        $grid->model()->orderBy('id', 'desc');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Sale::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('text', __('Text'));
        $show->field('href', __('Href'));
        $show->field('type', __('Type'));
        $show->field('target', __('Target'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Sale());

        $form->text('title', __('Title'));
        $form->textarea('text', __('Text'));
        $form->url('href', __('Href'));
        $form->radio('type', __('Type'))->options(['推薦商品', '宣傳版位', '廣告'])->default(0);
        $form->text('target', __('Target'))->default('_self');
        $form->belongsToMany('images', Images::class, __('Images'));

        return $form;
    }
}
