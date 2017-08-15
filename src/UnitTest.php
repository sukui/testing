<?php

namespace
{
    // 类别名会触发自动加载
    // 这里先尝试加载, 没有则新建
    if (!class_exists("\\PHPUnit_Framework_TestCase", true)) {
        class PHPUnit_Framework_TestCase {}
    }
}


namespace ZanPHP\Testing
{

    class UnitTest extends \PHPUnit_Framework_TestCase
    {
        protected function invoke(&$object, $methodName, array $parameters = [])
        {
            $reflection = new \ReflectionClass(get_class($object));
            $method = $reflection->getMethod($methodName);
            $method->setAccessible(true);

            return $method->invokeArgs($object, $parameters);
        }

        protected function getProperty(&$object, $propertyName)
        {
            $reflection = new \ReflectionClass(get_class($object));
            $property = $reflection->getProperty($propertyName);
            $property->setAccessible(true);

            return $property->getValue($object);
        }

        protected function setPropertyValue(&$object, $propertyName, $value)
        {
            $reflection = new \ReflectionClass(get_class($object));
            $property = $reflection->getProperty($propertyName);
            $property->setAccessible(true);

            return $property->setValue($object, $value);
        }
    }

}