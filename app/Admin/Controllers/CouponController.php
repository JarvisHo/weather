<?php

namespace App\Admin\Controllers;

use App\Admin\Selectable\Conditions;
use App\Admin\Selectable\Prizes;
use App\Admin\Selectable\Users;
use App\Models\Coupon;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CouponController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '折扣券';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Coupon());

        $grid->column('id', __('Id'))->sortable();
        $grid->column('title', __('Title'));
        $grid->column('code', __('Code'))->hide();
        $grid->column('type', __('Type'))->using(['折現金', '打折']);
        $grid->column('amount', __('Amount'));
        $grid->column('expire_in_days', __('Expire in days'));
        $grid->column('expired_at', __('Expired at'))->sortable();
        $grid->column('used_at', __('Used at'));
        $grid->column('created_at', __('Created at'))->hide();
        $grid->column('updated_at', __('Updated at'))->hide();

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
        $show = new Show(Coupon::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('uuid', __('Uuid'));
        $show->field('title', __('Title'));
        $show->field('code', __('Code'));
        $show->field('type', __('Type'));
        $show->field('amount', __('Amount'));
        $show->field('expire_in_days', __('Expire in days'));
        $show->field('condition_id', __('Condition id'));
        $show->field('prize_id', __('Prize id'));
        $show->field('user_id', __('User id'));
        $show->field('expired_at', __('Expired at'));
        $show->field('used_at', __('Used at'));
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
        $form = new Form(new Coupon());

        $form->text('title', __('標題'));
        $form->text('code', __('Code'));
        $form->radio('type', __('Type'))->options(['折現金', '打折']);
        $form->number('amount', '額度');
        $form->number('expire_in_days', '有效天數');
        $form->datetime('expired_at', __('過期日'));
        $form->datetime('used_at', '使用時間');

        $form->belongsTo('condition_id', Conditions::class, '滿足的成就條件');
        $form->belongsTo('prize_id', Prizes::class, '抽中的獎項');
        $form->belongsTo('user_id', Users::class, '持有的用戶');

        return $form;
    }
}
