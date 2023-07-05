<?php

namespace Tests\Unit;

use Tests\TestCase;

class GroupAnagramsTest extends TestCase
{
    public function testGroupAnagrams()
    {
        $outPut = $this->groupAnagrams(["eat","tea","tan","ate","nat","bat"]);
        $this->assertSame($outPut, [["eat","tea","ate"],["tan","nat"],["bat"]]);

        $outPut = $this->groupAnagrams([""]);
        $this->assertSame($outPut, [[""]]);

        $outPut = $this->groupAnagrams(["a"]);
        $this->assertSame($outPut, [["a"]]);
    }

    /*
     * Given an array of strings strs, group the anagrams together. You can return the answer in any order.
     *
     * An Anagram is a word or phrase formed by rearranging the letters of a different word or phrase, typically using all the original letters exactly once.
     *
     * Example 1:
     * Input: strs = ["eat","tea","tan","ate","nat","bat"]
     * Output: [["bat"],["nat","tan"],["ate","eat","tea"]]
     *
     * Example 2:
     * Input: strs = [""]
     * Output: [[""]]
     *
     * Example 3:
     * Input: strs = ["a"]
     * Output: [["a"]]
     */
    private function groupAnagrams($strs)
    {
        $map = [];

        foreach($strs as $str) {
            $strArr = str_split($str);
            sort($strArr);
            $sortStr = implode('', $strArr);
            $map[$sortStr][] = $str;
        }

        $res = [];

        foreach ($map as $val) {
            $res[] = $val;
        }

        return $res;
    }
}
