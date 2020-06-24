<?php

namespace Spa\Services\Criteria;

use Illuminate\Database\Eloquent\Builder;
use Spa\Services\Repository\AbstractRepository;

class SelectRaw extends AbstractCriteria
{
    /**
     * @var string
     */
    protected $expression;

    /**
     * @var array
     */
    protected $bindings;

    public function __construct(string $expression, array $bindings = [])
    {
        $this->expression = $expression;
        $this->bindings = $bindings;
    }
    public function apply(Builder $model, AbstractRepository $repository) : Builder
    {
        return $model->selectRaw($this->expression, $this->bindings);
    }
}