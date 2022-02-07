<?php

namespace App\Admin\Controllers;

use App\Models\Tool;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ToolController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '用品標籤';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Tool());

        $grid->column('id', __('Id'))->sortable();
        $grid->column('name')->display(function () {
            return "<div class='label' style='background-color: ". $this->color. " '>" . $this->name . "</div>";
        });
        $grid->column('created_at', __('Created at'))->sortable();
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
        $show = new Show(Tool::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('color', __('Color'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Tool());

        $form->text('name', __('Name'));
        $form->color('color', __('Color'));

        return $form;
    }
}
