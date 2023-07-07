<?php

namespace Tests\Unit;

use Tests\TestCase;

class JumpGameTest extends TestCase
{
    public function testValidParentheses()
    {
        $outPut = $this->canJump([2,3,1,1,4]);
        $this->assertSame($outPut, true);

        $outPut = $this->canJump([3,2,1,0,4]);
        $this->assertSame($outPut, false);
    }

    /*
     * You are given an integer array nums. You are initially positioned at the array's first index, and each element in the array represents your maximum jump length at that position.
     *
     * Return true if you can reach the last index, or false otherwise.
     *
     * Example 1:
     * Input: nums = [2,3,1,1,4]
     * Output: true
     * Explanation: Jump 1 step from index 0 to 1, then 3 steps to the last index.
     *
     * Example 2:
     * Input: nums = [3,2,1,0,4]
     * Output: false
     * Explanation: You will always arrive at index 3 no matter what. Its maximum jump length is 0, which makes it impossible to reach the last index.
     */
    private function canJump($nums)
    {
        $n = count($nums);

        if ($n == 0) {
            return false;
        }

        if ($n == 1) {
            return true;
        }

        //代表當前能往後跳最大數量
        $maxJump = 0;

        for ($i = 0; $i < $n; $i++) {
            //代表當位置超越往後跳最大數量
            if ($i > $maxJump) {
                return false;
            }

            $maxJump = max($maxJump, $i + $nums[$i]);
        }

        return true;
    }
}
