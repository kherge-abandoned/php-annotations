<?php

namespace Herrera\Annotations\Tests\Exception;

use Doctrine\Common\Annotations\DocLexer;
use Herrera\Annotations\Exception\SyntaxException;
use Herrera\PHPUnit\TestCase;

class SyntaxExceptionTest extends TestCase
{
    public function testCreate()
    {
        $exception = SyntaxException::create('test');

        $this->assertEquals(
            'Expected test, received end of string.',
            $exception->getMessage()
        );
    }

    public function testCreateWithToken()
    {
        $exception = SyntaxException::create(
            'test',
            array(
                'position' => 123,
                'value' => 'abc',
            )
        );

        $this->assertEquals(
            'Expected test, received \'abc\' at position 123.',
            $exception->getMessage()
        );
    }

    public function testCreateWithLookahead()
    {
        $lexer = new DocLexer();
        $lexer->lookahead = array(
            'position' => 123,
            'value' => 'abc',
        );

        $exception = SyntaxException::create('test', null, $lexer);

        $this->assertEquals(
            'Expected test, received \'abc\' at position 123.',
            $exception->getMessage()
        );
    }
}
