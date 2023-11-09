<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class MedidaFilter extends ApiFilter
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