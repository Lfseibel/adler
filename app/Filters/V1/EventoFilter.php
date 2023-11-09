<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class EventoFilter extends ApiFilter
{
  protected $safeParms = 
  [
    'nome' => ['eq'],
    'descricao' => ['eq'],
    'imagem' => ['eq'],
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