<?php

namespace Herrera\Annotations\Convert;

use Herrera\Annotations\Tokens;

/**
 * Defines how a converter class must be implemented.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
interface ConvertInterface
{
    /**
     * Converts the list of tokens and returns the result.
     *
     * @param Tokens $tokens The list of tokens.
     *
     * @return mixed The result.
     */
    public function convert(Tokens $tokens);
}
