<?php

namespace Tests\Unit;

use Tests\TestCase;

class LongestPalindromeTest extends TestCase
{
    public function testLongestPalindrome()
    {
        $outPut = $this->longestPalindrome('babad');
        $this->assertSame($outPut, 'aba');

        $outPut = $this->longestPalindrome('cbbd');
        $this->assertSame($outPut, 'bb');
    }

    /*
     * Given a string s, return the longest palindromic substring in s.
     *
     * Example 1:
     * Input: s = "babad"
     * Output: "bab"
     * Explanation: "aba" is also a valid answer.
     *
     * Example 2:
     * Input: s = "cbbd"
     * Output: "bb"
     */
    private function longestPalindrome($s)
    {
        //字串正讀反讀一樣為回文
        if (strlen($s) == 1 || $s == strrev($s)) {
            return $s;
        }

        $maxlength = 1;
        $str       = "";

        //迴圈已每個字串 ($i) 做為中間位置,檢查所有可能的長度組合
        for ($i = 0; $i < strlen($s); $i++) {
            //這邊是迴圈原字串總長度,跟原字串探訪無關
            for ($len = $maxlength; $len <= strlen($s); $len++) {
                //$len 代表目前要判斷子字串,$len >> 1 代表子字串中心點往旁邊需要的距離
                $start = $i - ($len >> 1);

                //起始位置小於 0 或起始位置加子字串長度加起來大於原字串則跳過
                if ($start < 0 || $start + $len > strlen($s)) {
                    break;
                }

                //取子字串
                $substr = substr($s, $start, $len);

                //判斷是否為回文
                if ($substr === strrev($substr)) {
                    $str       = $substr;
                    $maxlength = $len;
                } elseif ($len > ($maxlength + 1)) {
                    //因為已經超過了目前已經找到的最長回文子字串的長度,不再搜尋更長的回文子字串
                    //如果存在一個比 $maxlength + 1 還要長的回文子字串,後續的搜尋的過程中，一定會在 $len 等於該回文子字串的長度時發現它
                    break;
                }
            }
        }

        return $str;
    }

    //此處最優解為 Manacher’s Algorithm，有時間再研究
}
