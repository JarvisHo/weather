<?php

namespace App\Admin\Controllers;

use App\Admin\Selectable\Tools;
use App\Models\Program;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProgramController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '洗車項目';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Program());

        $grid->column('id', __('Id'))->sortable();
        $grid->column('name', __('Name'));
        $grid->column('tags', __('Tags'))->display(function () {
            return implode('', $this->tools()->get()->map(function ($tool){
                return "<div class='label' style='margin-right: 2px;background-color: ". $tool->color. " '>" . $tool->name . "</div>";
            })->toArray());
        });

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
        $show = new Show(Program::findOrFail($id));

        $show->field('name', __('Name'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Program());

        $form->text('name');
        $form->belongsToMany('tools', Tools::class, __('Tools'));

        return $form;
    }
}
