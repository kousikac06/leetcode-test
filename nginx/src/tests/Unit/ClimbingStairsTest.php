<?php

namespace Tests\Unit;

use Tests\TestCase;

class ClimbingStairsTest extends TestCase
{
    public function testClimbingStairs()
    {
        $outPut = $this->climbStairs(2);
        $this->assertSame($outPut, 2);

        $outPut = $this->climbStairs(3);
        $this->assertSame($outPut, 3);

        $outPut = $this->climbStairs(4);
        $this->assertSame($outPut, 5);
    }

    /*
     * You are climbing a staircase. It takes n steps to reach the top.
     *
     * Each time you can either climb 1 or 2 steps. In how many distinct ways can you climb to the top?
     *
     * Example 1:
     * Input: n = 2
     * Output: 2
     * Explanation: There are two ways to climb to the top.
        1. 1 step + 1 step
        2. 2 steps
     *
     * Example 2:
     * Input: n = 3
     * Output: 3
     * Explanation: There are three ways to climb to the top.
        1. 1 step + 1 step + 1 step
        2. 1 step + 2 steps
        3. 2 steps + 1 step
     */
    private function climbStairs(int $n)
    {
        //經過規律，發現 n=1 為 1，n=2 為 2，n=3 為 2+1=3， n=4 為 2+3=5，得出公式為 F(n) = F(n-1) + (n-2)，為斐波那契数列。
        $dp = [1, 1];

        for ($i = 2; $i <= $n; $i++) {
            $dp[$i] = $dp[$i - 1] + $dp[$i - 2];
        }
        return $dp[$n];
    }
}
