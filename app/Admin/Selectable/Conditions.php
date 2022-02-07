<?php

namespace App\Admin\Selectable;

use App\Models\Condition;
use Encore\Admin\Grid\Filter;
use Encore\Admin\Grid\Selectable;

class Conditions extends Selectable
{
    public $model = Condition::class;

    protected $key = 'id';

    public function make()
    {
        $this->column('id');
        $this->column('title');

        $this->filter(function (Filter $filter) {
            $filter->like('title');
        });
    }
}