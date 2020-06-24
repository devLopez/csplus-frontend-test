<?php

namespace Spa\Services\Criteria;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Spa\Services\Repository\AbstractRepository;

class GroupBy extends AbstractCriteria
{
    protected $groups;

    public function __construct(...$groups)
    {
        $this->groups = Arr::flatten($groups);
    }

    public function apply(Builder $model, AbstractRepository $repository) : Builder
    {
        return $model->groupBy($this->groups);
    }
}