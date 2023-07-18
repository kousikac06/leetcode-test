<?php

namespace Tests\Unit;

use Tests\TestCase;

class MinimumWindowSubstringTest extends TestCase
{
    public function testMinimumWindowSubstring()
    {
        $outPut = $this->minWindow('ADOBECODEBANC', 'ABC');
        $this->assertSame($outPut, 'ABC');

        $outPut = $this->minWindow('a', 'a');
        $this->assertSame($outPut, 'a');

        $outPut = $this->minWindow('a', 'aa');
        $this->assertSame($outPut, '');
    }

    /*
     * Given two strings s and t of lengths m and n respectively, return the minimum window substring of s such that every character in t (including duplicates) is included in the window. If there is no such substring, return the empty string "".
     *
     * The testcases will be generated such that the answer is unique.
     *
     * Example 1:
     * Input: s = "ADOBECODEBANC", t = "ABC"
     * Output: "BANC"
     * Explanation: The minimum window substring "BANC" includes 'A', 'B', and 'C' from string t.
     *
     * Example 2:
     * Input: s = "a", t = "a"
     * Output: "a"
     * Explanation: The entire string s is the minimum window.
     *
     * Example 3:
     * Input: s = "a", t = "aa"
     * Output: ""
     * Explanation: Both 'a's from t must be included in the window. Since the largest window of s only has one 'a', return empty string.
     */
    private function minWindow(string $s, string $t)
    {
        $letters = [];

        //紀錄要包含的字元數量
        for ($i = 0; $i < strlen($t); $i++) {
            $letters[$t[$i]] = isset($letters[$t[$i]]) ? $letters[$t[$i]] + 1 : 1;
        }

        $match    = 0;
        $start    = 0;
        $minStart = 0;
        $minLen   = PHP_INT_MAX;

        for ($i = 0; $i < strlen($s); $i++) {
            $letter = $s[$i];

            if (isset($letters[$letter])) {
                $letters[$letter]--;

                if ($letters[$letter] >= 0) {
                    $match++;
                }
            }

            //當完全匹配時，紀錄初始位置和長度
            while ($match == strlen($t)) {
                if ($i - $start + 1 < $minLen) {
                    $minLen   = $i - $start + 1;
                    $minStart = $start;
                }

                //窗口持續右移，直到找到第一個匹配字元的位置，扣減匹配數跳出迴圈，持續將可能性往後找
                $start++;
                $leftLetter = $s[$start - 1];

                if (isset($letters[$leftLetter])) {
                    $letters[$leftLetter]++;

                    if ($letters[$leftLetter] == 1) {
                        $match--;
                    }
                }
            }
        }

        if ($minLen < PHP_INT_MAX) {
            return substr($s, $minStart, $minLen);
        } else {
            return '';
        }
    }
}
