<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class ProdutotipoFilter extends ApiFilter
{
  protected $safeParms = 
  [
    'produto_id' => ['eq'],
    'tipo_id' => ['eq'],
  ];

  protected $columnMap =
  [

  ];

  protected $operatorMap = 
  [
    'eq' => '=',
  ];
}