<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class CategoriaFilter extends ApiFilter
{
  protected $safeParms = 
  [
    'descricao' => ['eq'],
  ];

  protected $columnMap =
  [

  ];

  protected $operatorMap = 
  [
    'eq' => '=',
  ];
}