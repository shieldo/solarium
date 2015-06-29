<?php
/** 
 * AddField.php
 * Generated by PhpStorm - 06/2015
 * Project solarium
 * @author Beno!t POLASZEK
**/

namespace Solarium\QueryType\Schema\Query\Command;

use Solarium\Core\ArrayableInterface;
use Solarium\Exception\RuntimeException;
use Solarium\QueryType\Schema\Query\Field\Field;
use Solarium\QueryType\Schema\Query\Field\FieldInterface;
use Solarium\QueryType\Schema\Query\Query as SchemaQuery;


class DeleteField extends Command implements ArrayableInterface {

    /**
     * @var FieldInterface[]|Field[]
     */
    protected $fields = array();

    /**
     * Returns command type, for use in adapters
     *
     * @return string
     */
    public function getType() {
        return SchemaQuery::COMMAND_DELETE_FIELD;
    }

    /**
     * @return Field[]|FieldInterface[]
     */
    public function getFields() {
        return $this->fields;
    }

    /**
     * @param Field[]|FieldInterface[] $fields
     * @return $this - Provides Fluent Interface
     */
    public function setFields(array $fields) {
        $this->fields = array();
        $this->addFields($fields);
        return $this;
    }

    /**
     * @param Field[]|FieldInterface[] $fields
     * @return $this - Provides Fluent Interface
     */
    public function addFields(array $fields) {
        foreach ($fields AS $field)
            is_array($field) ? $this->createField($field) : $this->addField($field);
        return $this;
    }

    /**
     * @param FieldInterface $field
     * @return $this
     */
    public function addField(FieldInterface $field) {
        if (!array_key_exists((string) $field, $this->getFields()))
            $this->fields[(string) $field] = $field;
        return $this;
    }

    /**
     * @param array $attributes
     * @return $this
     */
    public function createField(array $attributes = array()) {
        if (!array_key_exists('name', $attributes))
            throw new RuntimeException("A field must have a name attribute.");
        $field = new Field($attributes);
        $this->addField($field);
        return $field;
    }

    /**
     * @return array
     */
    public function castAsArray() {
        return array_values(array_map(function (FieldInterface $field) {
            return array('name' => $field->getName());
        }, $this->getFields()));
    }

}