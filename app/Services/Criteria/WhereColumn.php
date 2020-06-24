<?php

namespace Spa\Services\Criteria;

use Illuminate\Database\Eloquent\Builder;
use Spa\Services\Repository\AbstractRepository;

class WhereColumn extends AbstractCriteria
{
    protected $first;

    /**
     * @var null
     */
    protected $operator;

    /**
     * @var null
     */
    protected $second;

    /**
     * @var string
     */
    protected $boolean;

    /**
     * @param string|array $first
     * @param string|null  $operator
     * @param string|null  $second
     * @param string       $boolean
     */
    public function __construct($first, $operator = null, $second = null, $boolean = 'and')
    {
        $this->first = $first;
        $this->operator = $operator;
        $this->second = $second;
        $this->boolean = $boolean;
    }

    public function apply(Builder $model, AbstractRepository $repository) : Builder
    {
        return $model->whereColumn(
            $this->first,
            $this->operator,
            $this->second,
            $this->boolean
        );
    }
}