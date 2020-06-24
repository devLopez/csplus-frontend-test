<?php

namespace Spa\Services\Criteria;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Spa\Services\Repository\AbstractRepository;

class Where extends AbstractCriteria
{
    /**
     * @var string|Closure
     */
    protected $column;

    /**
     * @var string|null
     */
    protected $operator;

    /**
     * @var string|null
     */
    protected $value;

    /**
     * @var string
     */
    protected $boolean;

    /**
     * @param string|Closure $column
     * @param string|null    $operator
     * @param string|null    $value
     * @param string         $boolean
     */
    public function __construct($column, $operator = null, $value = null, $boolean = 'and')
    {
        $this->column = $column;
        $this->operator = $operator;
        $this->value = $value;
        $this->boolean = $boolean;
    }

    public function apply(Builder $model, AbstractRepository $repository) : Builder
    {
        return $model->where(
            $this->column,
            $this->operator,
            $this->value,
            $this->boolean
        );
    }
}