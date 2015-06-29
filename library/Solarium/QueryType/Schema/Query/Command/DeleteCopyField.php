<?php
/** 
 * AddField.php
 * Generated by PhpStorm - 06/2015
 * Project solarium
 * @author Beno!t POLASZEK
**/

namespace Solarium\QueryType\Schema\Query\Command;

use Solarium\Core\ArrayableInterface;
use Solarium\QueryType\Schema\Query\Field\CopyField;
use Solarium\QueryType\Schema\Query\Query as SchemaQuery;


class DeleteCopyField extends AddCopyField implements ArrayableInterface {

    /**
     * @var CopyField[]
     */
    protected $fields = array();

    /**
     * Returns command type, for use in adapters
     *
     * @return string
     */
    public function getType() {
        return SchemaQuery::COMMAND_DELETE_COPY_FIELD;
    }

}