<?php

namespace Spa\Services\Criteria;

use Illuminate\Database\Eloquent\Builder;
use Spa\Services\Repository\AbstractRepository;

class Limit extends AbstractCriteria
{
    protected $limit;

    /**
     * @param   int  $limit
     */
    public function __construct(int $limit = 15)
    {
        $this->limit = $limit;
    }

    public function apply(Builder $model, AbstractRepository $repository) : Builder
    {
        return $model->take($this->limit);
    }
}