<?php

namespace Spa\Services\Criteria;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Spa\Services\Repository\AbstractRepository;

class With extends AbstractCriteria
{
    protected $with;

    /**
     * @param array ...$with
     */
    public function __construct(...$with)
    {
        $this->with = Arr::collapse($with);
    }

    public function apply(Builder $model, AbstractRepository $repository) : Builder
    {
        return $model->with($this->with);
    }
}