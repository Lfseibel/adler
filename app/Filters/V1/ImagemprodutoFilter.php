<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class ImagemprodutoFilter extends ApiFilter
{
  protected $safeParms = 
  [
    'imagem' => ['eq'],
    'produto_id' => ['eq']
  ];

  protected $columnMap =
  [

  ];

  protected $operatorMap = 
  [
    'eq' => '=',
    'lt' => '<',
    'lte' => '<=',
    'gte' => '>=',
    'gt' => '>'//in /like
  ];
}