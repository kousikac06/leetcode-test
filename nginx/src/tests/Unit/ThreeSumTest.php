<?php

namespace Tests\Unit;

use Tests\TestCase;

class ThreeSumTest extends TestCase
{
    public function testThreeSum()
    {
        $outPut = $this->threeSum([-1, 0, 1, 2, -1, -4]);
        $this->assertSame($outPut, [[-1, -1, 2], [-1, 0, 1]]);

        $outPut = $this->threeSum([0, 1, 1]);
        $this->assertSame($outPut, []);

        $outPut = $this->threeSum([0, 0, 0]);
        $this->assertSame($outPut, [[0, 0, 0]]);
    }

    /*
     * Given an integer array nums, return all the triplets [nums[i], nums[j], nums[k]] such that i != j, i != k, and j != k, and nums[i] + nums[j] + nums[k] == 0.
     *
     * Notice that the solution set must not contain duplicate triplets.
     *
     * Example 1:
     * Input: nums = [-1,0,1,2,-1,-4]
     * Output: [[-1,-1,2],[-1,0,1]]
     * Explanation:
     * nums[0] + nums[1] + nums[2] = (-1) + 0 + 1 = 0.
     * nums[1] + nums[2] + nums[4] = 0 + 1 + (-1) = 0.
     * nums[0] + nums[3] + nums[4] = (-1) + 2 + (-1) = 0.
     * The distinct triplets are [-1,0,1] and [-1,-1,2].
     * Notice that the order of the output and the order of the triplets does not matter.
     *
     * Example 2:
     * Input: nums = [0,1,1]
     * Output: []
     * Explanation: The only possible triplet does not sum up to 0.
     *
     * Example 3:
     * Input: nums = [0,0,0]
     * Output: [[0,0,0]]
     * Explanation: The only possible triplet sums up to 0.
     */
    // private function threeSum(array $nums): array
    // {
    //     sort($nums);
    //
    //     $result = [];
    //     $length = count($nums);
    //
    //     //中間值
    //     for ($index = 1; $index < $length - 1; $index++) {
    //         $start = 0;
    //         $end   = $length - 1;
    //
    //         if ($index > 1 && $nums[$index] == $nums[$index - 1]) {
    //             $start = $index - 1;
    //         }
    //
    //         while ($start < $index && $end > $index) {
    //             //與前一個相同表示之前迴圈已經組合過
    //             if ($start > 0 && $nums[$start] == $nums[$start - 1]) {
    //                 $start++;
    //                 continue;
    //             }
    //
    //             //與後一個相同表示之前迴圈已經組合過
    //             if ($end < $length - 1 && $nums[$end] == $nums[$end + 1]) {
    //                 $end--;
    //                 continue;
    //             }
    //
    //             $addNum = $nums[$start] + $nums[$end] + $nums[$index];
    //
    //             //因已排序，初始的 start 和 end 分別代表最小和最大的數字
    //             if ($addNum === 0) {    //從最兩側往中間值 ($index) 找
    //                 $result[] = [$nums[$start], $nums[$index], $nums[$end]];
    //                 $start++;
    //                 $end--;
    //             } elseif ($addNum > 0) {    //大於零表示右側數字過大，往左找較小的數字
    //                 $end--;
    //             } else {    //小於零表示左側數字過小，往右找較大的數字
    //                 $start++;
    //             }
    //         }
    //     }
    //
    //     return $result;
    // }

    private function threeSum($nums) {
        sort($nums);

        $result = [];

        foreach($nums as $key => $startNum) {
            //因已排序，假如初始數字已經大於零，表示後續數字也都大於零，不可能有三數相加為零的結果
            //初始數字與之前數字相同也不需要在判斷
            if ($startNum > 0 || ($key > 0 && $nums[$key - 1] === $startNum)) continue;

            $middle = $key + 1;
            $end = count($nums) - 1;

            while ($middle < $end) {
                $sum = $startNum + $nums[$middle] + $nums[$end];

                if ($sum > 0) {
                    $end--;
                } elseif ($sum < 0) {
                    $middle++;
                } else {
                    $result[] = [$startNum, $nums[$middle], $nums[$end]];

                    $middle+=1;

                    //迴圈直到找到不同數字
                    while ($nums[$middle] === $nums[$middle-1]) {
                        $middle+=1;
                    }
                }
            }
        }

        return $result;
    }
}
