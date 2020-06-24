<?php

namespace Spa\Services\Criteria;

class WhereNotIn extends WhereIn
{
    public function __construct(string $column, $values, string $boolean = 'and')
    {
        parent::__construct($column, $values, $boolean, true);
    }
}