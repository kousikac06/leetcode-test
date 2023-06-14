<?php

namespace Tests\Unit;

use Tests\TestCase;

class LengthOfLongestSubstringTest extends TestCase
{
    public function testLengthOfLongestSubstring()
    {
        $outPut = $this->lengthOfLongestSubstring('abcabcbb');
        $this->assertSame($outPut, 3);

        $outPut = $this->lengthOfLongestSubstring('bbbbb');
        $this->assertSame($outPut, 1);

        $outPut = $this->lengthOfLongestSubstring('pwwkew');
        $this->assertSame($outPut, 3);

        $outPut = $this->lengthOfLongestSubstring('dvdf');
        $this->assertSame($outPut, 3);

        $outPut = $this->lengthOfLongestSubstring('au');
        $this->assertSame($outPut, 2);

        $outPut = $this->lengthOfLongestSubstring(' ');
        $this->assertSame($outPut, 1);

        $outPut = $this->lengthOfLongestSubstring('');
        $this->assertSame($outPut, 0);
    }

    /*
     * Given a string s, find the length of the longest substring without repeating characters.
     *
     * Example 1:
     * Input: s = "abcabcbb"
     * Output: 3
     * Explanation: The answer is "abc", with the length of 3.
     *
     * Example 2:
     * Input: s = "bbbbb"
     * Output: 1
     * Explanation: The answer is "b", with the length of 1.
     *
     * Example 3:
     * Input: s = "pwwkew"
     * Output: 3
     * Explanation: The answer is "wke", with the length of 3.Notice that the answer must be a substring, "pwke" is a subsequence and not a substring.
     *
     * Example 4:
     * Input: s = "dvdf"
     * Output: 3
     *
     * Example 5:
     * Input: s = "au"
     * Output: 2
     *
     * Example 6:
     * Input: s = " "
     * Output: 1
     *
     * Example 7:
     * Input: s = ""
     * Output: 0
     */
    private function lengthOfLongestSubstring(string $s): int
    {
        $chars = '';
        $num   = 0;
        $res   = 0;

        for ($i = 0; $i < strlen($s); $i++) {
            if (is_numeric(strpos($chars, $s[$i]))) {
                $chars = substr($chars, strpos($chars, $s[$i]) + 1);
                $num   = strlen($chars);
            }

            $num++;
            $chars .= $s[$i];
            $res   = max($res, $num);
        }

        return $res;
    }

    // private function lengthOfLongestSubstring(string $s): int
    // {
    //     $seen = [];
    //     $l    = 0;
    //     $res  = 0;
    //
    //     for ($r = 0; $r < strlen($s); ++$r) {
    //         $char = $s[$r];
    //
    //         if (array_key_exists($char, $seen) && $seen[$char] >= $l) {
    //             $l = $seen[$char] + 1; //紀錄重複值的位置 (index + 1)
    //         } else {
    //             $res = max($res, $r - $l + 1); //當下探訪的 index - 已重複的位置 (index + 1) [取最大]
    //         }
    //
    //         $seen[$char] = $r;
    //     }
    //
    //     return $res;
    // }
}
