<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class ClienteFilter extends ApiFilter
{
  protected $safeParms = 
  [
    'nome' => ['eq'],
    'descricao' => ['eq'],
    'endereco' => ['eq'],
    'email' => ['eq'],
    'senha' => ['eq'],
    'idade' => ['eq', 'gt', 'lt'],
    'imagemPerfil' => ['eq'],
    'telefone' => ['eq']
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