<?php

namespace Spa\Services\Criteria;

use Illuminate\Database\Eloquent\Builder;
use Spa\Services\Repository\AbstractRepository;

class WhereBetween extends AbstractCriteria
{
    /**
     * @var string
     */
    protected $column;

    /**
     * @var array
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
     * @param   string  $column
     * @param   array  $values
     * @param   string  $boolean
     * @param   bool  $not
     */
    public function __construct(string $column, $values = [], $boolean = 'and', $not = false)
    {
        $this->column = $column;
        $this->values = $values;
        $this->boolean = $boolean;
        $this->not = $not;
    }

    public function apply(Builder $model, AbstractRepository $repository) : Builder
    {
        return $model->whereBetween($this->column, $this->values, $this->boolean, $this->not);
    }
}