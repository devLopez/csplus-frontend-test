<?php

namespace Spa\Services\Criteria;

use Illuminate\Database\Eloquent\Builder;
use Spa\Services\Repository\AbstractRepository;

class Having extends AbstractCriteria
{
    /**
     * @var string
     */
    protected $column;

    /**
     * @var null
     */
    protected $operator;

    /**
     * @var null
     */
    protected $value;

    /**
     * @var string
     */
    protected $boolean;

    /**
     * @param string $column
     * @param null   $operator
     * @param null   $value
     * @param string $boolean
     */
    public function __construct(string $column, $operator = null, $value = null, $boolean = 'and')
    {
        $this->column = $column;
        $this->operator = $operator;
        $this->value = $value;
        $this->boolean = $boolean;
    }

    public function apply(Builder $model, AbstractRepository $repository) : Builder
    {
        return $model->having(
            $this->column,
            $this->operator,
            $this->value,
            $this->boolean
        );
    }
}