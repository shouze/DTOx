<?php
/**
 * DTOBuilder
 *
 * @copyright   Copyright (c) 2012, Jason Fox (jasonrobertfox.com)
 * @license     This source file is the property of Jason Fox and may not be redistributed in part or its entirty without the expressed written consent of Jason Fox.
 * @author      Jason Fox <jasonrobertfox@gmail.com>
 */

namespace DTOBuilder\Domain\ClassElement;

use DTOBuilder\Domain\ClassElement\ClassPropertyElement;

/**
 * @package    DTOBuilder\Domain\ClassElement
 */
class ClassPropertyElementTest extends \PHPUnit_Framework_TestCase
{
    const VALID_INSTANCE_VARIABLE_NAME = "instanceVariable";
    const VALID_INSTANCE_VARIABLE_SCOPE = "private";
    const VALID_INSTANCE_VARIABLE_TYPE = "string";

    /**
     * @test
     * @group domain
     * @group domain-class-element
     */
    public function validTextForClassPropertyElement()
    {
        $instanceVariable = $this->getValidClassPropertyElement();
    $expected = '    /**
     * @var ' . self::VALID_INSTANCE_VARIABLE_TYPE . ' $' . self::VALID_INSTANCE_VARIABLE_NAME. '
     */
    ' . self::VALID_INSTANCE_VARIABLE_SCOPE . ' $' . self::VALID_INSTANCE_VARIABLE_NAME. ' = null;';
        $this->assertEquals($expected,$instanceVariable->generate(), 'generate');
    }

    /**
     * @test
     * @group domain
     * @group domain-class-element
     */
    public function validTextForClassPropertyElementWithArray()
    {
        $instanceVariable = new ClassPropertyElement(self::VALID_INSTANCE_VARIABLE_NAME, self::VALID_INSTANCE_VARIABLE_SCOPE, 'array');
    $expected = '    /**
     * @var ' . 'array' . ' $' . self::VALID_INSTANCE_VARIABLE_NAME. '
     */
    ' . self::VALID_INSTANCE_VARIABLE_SCOPE . ' $' . self::VALID_INSTANCE_VARIABLE_NAME. ' = array();';
        $this->assertEquals($expected,$instanceVariable->generate(), 'generate');
    }

    private function getValidClassPropertyElement()
    {
        return new ClassPropertyElement(self::VALID_INSTANCE_VARIABLE_NAME, self::VALID_INSTANCE_VARIABLE_SCOPE, self::VALID_INSTANCE_VARIABLE_TYPE);
    }
}
