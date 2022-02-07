<?php

namespace App\Admin\Selectable;

use App\Models\Tool;
use Encore\Admin\Grid\Filter;
use Encore\Admin\Grid\Selectable;

class Tools extends Selectable
{
    public $model = Tool::class;

    protected $key = 'id';

    public function make()
    {
        $this->column('id');
        $this->column('name')->display(function () {
            return "<div class='label' style='background-color: ". $this->color. " '>" . $this->name . "</div>";
        });

        $this->filter(function (Filter $filter) {
            $filter->like('name');
        });
    }
}