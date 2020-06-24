<?php

namespace Spa\Services\Criteria;

class WhereNotNull extends WhereNull
{
    public function __construct(string $column, string $boolean = 'and')
    {
        parent::__construct($column, $boolean, true);
    }
}