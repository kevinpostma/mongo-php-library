<?php

namespace MongoDB\Tests\Operation;

use MongoDB\Operation\UpdateMany;

class UpdateManyTest extends TestCase
{
    /**
     * @expectedException MongoDB\Exception\InvalidArgumentTypeException
     * @dataProvider provideInvalidDocumentValues
     */
    public function testConstructorFilterArgumentTypeCheck($filter)
    {
        new UpdateMany($this->getDatabaseName(), $this->getCollectionName(), $filter, ['$set' => ['x' => 1]]);
    }

    /**
     * @expectedException MongoDB\Exception\InvalidArgumentTypeException
     * @dataProvider provideInvalidDocumentValues
     */
    public function testConstructorUpdateArgumentTypeCheck($update)
    {
        new UpdateMany($this->getDatabaseName(), $this->getCollectionName(), ['x' => 1], $update);
    }

    /**
     * @expectedException MongoDB\Exception\InvalidArgumentException
     * @expectedExceptionMessage First key in $update argument is not an update operator
     */
    public function testConstructorUpdateArgumentRequiresOperators()
    {
        new UpdateMany($this->getDatabaseName(), $this->getCollectionName(), ['x' => 1], ['y' => 1]);
    }
}
