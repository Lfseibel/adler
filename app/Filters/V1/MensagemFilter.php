<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class MensagemFilter extends ApiFilter
{
  protected $safeParms = 
  [
    'data' => ['eq','lt','lte','gt','gte'],
    'conteudo' => ['eq'],
    'fornecedor_id' => ['eq'],
    'cliente_id' => ['eq']
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