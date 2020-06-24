<?php

namespace Spa\Services\Criteria;

class WhereNotBetween extends WhereBetween
{
    public function __construct(string $column, $values = [], $boolean = 'and')
    {
        parent::__construct($column, $values, $boolean, true);
    }
}