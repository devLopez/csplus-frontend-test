<?php

namespace Spa\Services\Criteria;

use Illuminate\Database\Eloquent\Builder;
use Spa\Services\Repository\AbstractRepository;

class Distinct extends AbstractCriteria
{
    public function apply(Builder $model, AbstractRepository $repository) : Builder
    {
        return $model->distinct();
    }
}