<?php

namespace App\Admin\Controllers;

use App\Admin\Selectable\Conditions;
use App\Models\Prize;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PrizeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '抽獎獎池';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Prize());
        $rateSum = (int)Prize::sum('rate');

        $grid->column('id', __('Id'))->sortable();
        $grid->column('title', __('Title'));
        $grid->column('rate', __('Rate'));
        $grid->column('percent')->display(function ()  use($rateSum) {
            return round($this->rate * 100 / $rateSum, 2) . "%";
        });
        $grid->column('type', __('Type'))->using(['落空','折扣券']);
        $grid->column('coupon_type', __('Coupon type'))->using(['現金券','打折券']);
        $grid->column('coupon_amount', __('Coupon amount'))->sortable();
        $grid->column('coupon_expire_in_days', __('Coupon expire in days'))->hide();
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
        $show = new Show(Prize::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('rate', __('Rate'));
        $show->field('type', __('Type'));
        $show->field('coupon_type', __('Coupon type'));
        $show->field('coupon_amount', __('Coupon amount'));
        $show->field('coupon_expire_in_days', __('Coupon expire in days'));
        $show->field('condition_id', __('Condition id'));
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
        $form = new Form(new Prize());

        $form->text('title', __('Title'));
        $form->number('rate', __('Rate'))->default(10);
        $form->radio('type', __('Type'))->options(['落空','贈送折扣券']);
        $form->radio('coupon_type', __('Coupon type'))->options(['現金券','打折券']);
        $form->number('coupon_amount', __('Coupon amount'));
        $form->number('coupon_expire_in_days', __('Coupon expire in days'))->default(30);

        return $form;
    }
}
