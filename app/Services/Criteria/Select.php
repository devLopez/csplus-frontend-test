<?php

namespace Spa\Services\Criteria;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Spa\Services\Repository\AbstractRepository;

class Select extends AbstractCriteria
{
    /**
     * @var array|mixed
     */
    protected $columns;

    /**
     * @param array|mixed ...$columns
     */
    public function __construct(...$columns)
    {
        $columns = Arr::flatten($columns);

        if ( empty($columns) ) {
            $columns = ['*'];
        }

        $this->columns = $columns;
    }

    public function apply(Builder $model, AbstractRepository $repository) : Builder
    {
        return $model->select($this->columns);
    }


}