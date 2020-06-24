<?php

namespace Spa\Services\Criteria;

use Illuminate\Database\Eloquent\Builder;
use Spa\Services\Repository\AbstractRepository;

class WhereIn extends AbstractCriteria
{
    /**
     * @var string
     */
    protected $column;

    /**
     * @var mixed
     */
    protected $values;

    /**
     * @var string
     */
    protected $boolean;

    /**
     * @var bool
     */
    protected $not;

    /**
     * @param string $column
     * @param mixed  $values
     * @param string $boolean
     * @param bool   $not
     */
    public function __construct(string $column, $values, string $boolean = 'and', bool $not = false)
    {
        $this->column = $column;
        $this->values = $values;
        $this->boolean = $boolean;
        $this->not = $not;
    }

    public function apply(Builder $model, AbstractRepository $repository) : Builder
    {
        return $model->whereIn(
            $this->column,
            $this->values,
            $this->boolean,
            $this->not
        );
    }
}