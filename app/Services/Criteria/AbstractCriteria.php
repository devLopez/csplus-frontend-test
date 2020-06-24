<?php

namespace Spa\Services\Criteria;

use Illuminate\Database\Eloquent\Builder;
use Spa\Services\Repository\AbstractRepository;

abstract class AbstractCriteria
{
    public abstract function apply(Builder $model, AbstractRepository $repository) : Builder;
}