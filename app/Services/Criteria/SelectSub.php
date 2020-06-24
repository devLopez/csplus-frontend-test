<?php

namespace Spa\Services\Criteria;

use Illuminate\Database\Eloquent\Builder;
use Spa\Services\Repository\AbstractRepository;

class SelectSub extends AbstractCriteria
{
    /**
     * @var string
     */
    protected $query;

    /**
     * @var string
     */
    protected $as;

    /**
     * @param string $query
     * @param string $as
     */
    public function __construct(string $query, string $as)
    {
        $this->query = $query;
        $this->as = $as;
    }

    public function apply(Builder $model, AbstractRepository $repository) : Builder
    {
        return $model->selectSub($this->query, $this->as);
    }
}