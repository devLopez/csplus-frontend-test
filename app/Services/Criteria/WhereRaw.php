<?php

namespace Spa\Services\Criteria;

use Illuminate\Database\Eloquent\Builder;
use Spa\Services\Repository\AbstractRepository;

class WhereRaw extends AbstractCriteria
{
    protected $query;

    /**
     * @var array
     */
    protected $bindings;

    /**
     * @var string
     */
    protected $boolean;

    /**
     * @param string $query
     * @param array  $bindings
     * @param string $boolean
     */
    public function __construct(string $query, array $bindings = [], string $boolean = 'and')
    {
        $this->query = $query;
        $this->bindings = $bindings;
        $this->boolean = $boolean;
    }

    public function apply(Builder $model, AbstractRepository $repository) : Builder
    {
        return $model->whereRaw($this->query, $this->bindings, $this->boolean);
    }
}