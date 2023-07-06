<?php

namespace Tests\Unit;

use Tests\TestCase;

class MaximumSubarrayTest extends TestCase
{
    public function testMaximumSubarray()
    {
        $outPut = $this->maxSubArray([-2, 1, -3, 4, -1, 2, 1, -5, 4]);
        $this->assertSame($outPut, 6);

        $outPut = $this->maxSubArray([1]);
        $this->assertSame($outPut, 1);

        $outPut = $this->maxSubArray([5, 4, -1, 7, 8]);
        $this->assertSame($outPut, 23);
    }

    /*
     * Given an integer array nums, find the subarray with the largest sum, and return its sum.
     *
     * Example 1:
     * Input: nums = [-2,1,-3,4,-1,2,1,-5,4]
     * Output: 6
     * Explanation: The subarray [4,-1,2,1] has the largest sum 6.
     *
     * Example 2:
     * Input: nums = [1]
     * Output: 1
     * Explanation: The subarray [1] has the largest sum 1.
     *
     * Example 3:
     * Input: nums = [5,4,-1,7,8]
     * Output: 23
     * Explanation: The subarray [5,4,-1,7,8] has the largest sum 23.
     */
    private function maxSubArray($nums)
    {
        if (count($nums) == 0) {
            return 0;
        }

        if (count($nums) == 1) {
            return $nums[0];
        }

        $max  = $nums[0];
        $temp = 0;

        for ($i = 0; $i < count($nums); $i++) {
            $temp += $nums[$i];

            $max = max($max, $temp);

            //數值為負就將累計數字歸零
            if ($temp < 0) {
                $temp = 0;
            }
        }

        return $max;
    }
}
