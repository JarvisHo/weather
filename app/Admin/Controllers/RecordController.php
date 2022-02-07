<?php

namespace App\Admin\Controllers;

use App\Models\Record;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class RecordController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Record';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Record());

        $grid->column('id', __('ID'));
        $grid->column('user_id', __('用戶'))->display(function (){
            return $this->user->name ?? '<span style="color: #CCC">用戶已刪除</span>';
        });
        $grid->column('program_id', __('洗車項目'))->display(function (){
            return $this->program->name ?? '<span style="color: #CCC">項目已刪除</span';
        });
        $grid->column('note', __('備註'));
        $grid->column('created_at', __('Created at'))->hide()->sortable();
        $grid->column('updated_at', __('Updated at'))->hide()->sortable();

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
        $show = new Show(Record::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('uuid', __('Uuid'));
        $show->field('user_id', __('User id'));
        $show->field('program_id', __('Program id'));
        $show->field('note', __('Note'));
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
        $form = new Form(new Record());

        $form->text('note', __('Note'));

        return $form;
    }
}
