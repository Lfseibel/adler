<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class ProdutoFilter extends ApiFilter
{
  protected $safeParms = 
  [
    'nome' => ['eq'],
    'descricao' => ['eq'],
    'valor' => ['eq','gt','gte','lt','lte'],
    'categoriaID' => ['eq','ne'],
    'medidaID' => ['eq','ne'],
    'fornecedorID' => ['eq'],
    'fornecedor_id' => ['eq'],
    'medida_id' => ['eq'],
    'categoria_id' => ['eq']
  ];

  protected $columnMap = 
  [
    'fornecedorID' => 'fornecedor_id',
    'categoriaID' => 'categoria_id',
    'medidaID' => 'medida_id'
  ];

  protected $operatorMap = 
  [
    'eq' => '=',
    'lt' => '<',
    'lte' => '<=',
    'gte' => '>=',
    'gt' => '>',
    'ne' => '!='
  ];
}