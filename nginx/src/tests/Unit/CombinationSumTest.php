<?php

namespace Tests\Unit;

use Tests\TestCase;

class CombinationSumTest extends TestCase
{
    public function testCombinationSum()
    {
        $outPut = $this->combinationSum([2, 3, 6, 7], 7);
        $this->assertSame($outPut, [[2, 2, 3], [7]]);

        $outPut = $this->combinationSum([2, 3, 5], 8);
        $this->assertSame($outPut, [[2, 2, 2, 2], [2, 3, 3], [3, 5]]);

        $outPut = $this->combinationSum([2], 1);
        $this->assertSame($outPut, []);
    }

    /*
     * Given an array of distinct integers candidates and a target integer target, return a list of all unique combinations of candidates where the chosen numbers sum to target. You may return the combinations in any order.
     *
     * The same number may be chosen from candidates an unlimited number of times. Two combinations are unique if the frequency of at least one of the chosen numbers is different.
     *
     * The test cases are generated such that the number of unique combinations that sum up to target is less than 150 combinations for the given input.
     *
     * Example 1:
     * Input: candidates = [2,3,6,7], target = 7
     * Output: [[2,2,3],[7]]
     * Explanation:
     * 2 and 3 are candidates, and 2 + 2 + 3 = 7. Note that 2 can be used multiple times.
     * 7 is a candidate, and 7 = 7.
     * These are the only two combinations.
     *
     * Example 2:
     * Input: candidates = [2,3,5], target = 8
     * Output: [[2,2,2,2],[2,3,3],[3,5]]
     *
     * Example 3:
     * Input: candidates = [2], target = 1
     * Output: []
     */
    private function combinationSum(array $candidates, int $target)
    {
        $out = [];
        $res = [];

        sort($candidates);

        $this->dfs($candidates, $target, 0, $out, $res);

        return $res;
    }

    private function dfs(array $candidates, int $target, $index, &$out, &$res)
    {
        if ($target < 0) {
            return;
        }

        if ($target === 0) {
            $res[] = $out;
            return;
        }

        foreach ($candidates as $key => $candidate) {
            //不回找已經探訪完的點，可去重複
            if ($key < $index) {
                continue;
            }

            //排序後可剪枝
            if ($candidate > $target) {
                break;
            }

            $out[] = $candidate;

            $this->dfs($candidates, $target - $candidate, $key, $out, $res);
            array_pop($out);
        }
    }
}
