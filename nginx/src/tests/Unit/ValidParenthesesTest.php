<?php

namespace Tests\Unit;

use Tests\TestCase;

class ValidParenthesesTest extends TestCase
{
    public function testValidParentheses()
    {
        $outPut = $this->isValid('()');
        $this->assertSame($outPut, true);

        $outPut = $this->isValid('()[]{}');
        $this->assertSame($outPut, true);

        $outPut = $this->isValid('(]');
        $this->assertSame($outPut, false);
    }

    /*
     * Given a string s containing just the characters '(', ')', '{', '}', '[' and ']', determine if the input string is valid.
     *
     * An input string is valid if:
     *
     * Open brackets must be closed by the same type of brackets.
     *
     * Open brackets must be closed in the correct order.
     *
     * Every close bracket has a corresponding open bracket of the same type.
     *
     * Example 1:
     * Input: s = "()"
     * Output: true
     *
     * Example 2:
     * Input: s = "()[]{}"
     * Output: true
     *
     * Example 3:
     * Input: s = "(]"
     * Output: false
     */
    private function isValid(string $s)
    {
        $map = [
            ')' => '(',
            '}' => '{',
            ']' => '[',
        ];

        $symbols = [];

        for ($i = 0; $i < strlen($s); $i++) {
            $symbol = $s[$i];

            if (isset($map[$symbol])) {
                if (array_pop($symbols) !== $map[$symbol]) {
                    return false;
                }
            } else {
                $symbols[] = $symbol;
            }
        }

        return empty($symbols);
    }
}
