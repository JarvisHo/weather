<?php

namespace App\Admin\Selectable;

use App\Models\Image;
use Encore\Admin\Grid\Filter;
use Encore\Admin\Grid\Selectable;

class Images extends Selectable
{
    public $model = Image::class;

    protected $key = 'id';

    public function make()
    {
        $this->column('id');
        $this->column('src')->image();
        $this->column('alt');

        $this->filter(function (Filter $filter) {
            $filter->like('alt');
        });
    }
}