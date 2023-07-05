<?php

namespace Tests\Unit;

use Tests\TestCase;

class SearchInRotatedSortedArrayTest extends TestCase
{
    public function testSearchInRotatedSortedArray()
    {
        $outPut = $this->search([4,5,6,7,0,1,2], 0);
        $this->assertSame($outPut, 4);

        $outPut = $this->search([4,5,6,7,0,1,2], 3);
        $this->assertSame($outPut, -1);

        $outPut = $this->search([1], 0);
        $this->assertSame($outPut, -1);
    }

    /*
     * There is an integer array nums sorted in ascending order (with distinct values).
     *
     * Prior to being passed to your function, nums is possibly rotated at an unknown pivot index k (1 <= k < nums.length) such that the resulting array is [nums[k], nums[k+1], ..., nums[n-1], nums[0], nums[1], ..., nums[k-1]] (0-indexed). For example, [0,1,2,4,5,6,7] might be rotated at pivot index 3 and become [4,5,6,7,0,1,2].
     *
     * Open brackets must be closed by the same type of brackets.
     *
     * Given the array nums after the possible rotation and an integer target, return the index of target if it is in nums, or -1 if it is not in nums.
     *
     * You must write an algorithm with O(log n) runtime complexity.
     *
     * Example 1:
     * Input: nums = [4,5,6,7,0,1,2], target = 0
     * Output: 4
     *
     * Example 2:
     * Input: nums = [4,5,6,7,0,1,2], target = 3
     * Output: -1
     *
     * Example 3:
     * Input: nums = [1], target = 0
     * Output: -1
     */
    private function search(array $nums, int $target)
    {
        $count = count($nums);

        if ($count == 0) {
            return -1;
        }

        $low = 0;
        $high = $count - 1;

        while ($low <= $high) {
            $mid = $low + (($high - $low) >> 1);

            if ($nums[$mid] == $target) {   //mid 的 index 等於 target
                return $mid;
            } elseif ($nums[$mid] > $nums[$low]) {  //mid 落在數值較大的區間 [4,5,6,'7',0,1,2]
                if ($nums[$low] <= $target && $target < $nums[$mid]) {  //target between low and mid
                    $high = $mid - 1;   //將範圍調整程 low ~ ($mid - 1) 縮小範圍
                } else {    //target between mid and high
                    $low = $mid + 1;    //將範圍調整程 ($mid + 1) ~ high 縮小範圍
                }
            } elseif ($nums[$mid] < $nums[$high]) { //mid 落在數值較小的區間 [4,5,6,'1',2,3]
                if ($nums[$mid] < $target && $target <= $nums[$high]) { //target between mid and high
                    $low = $mid + 1;    //將範圍調整程 ($mid + 1) ~ high 縮小範圍
                } else {    //target between low and mid
                    $high = $mid - 1;   //將範圍調整程 low ~ ($mid - 1) 縮小範圍
                }
            } else {    //跳過重複的元素
                if ($nums[$low] == $nums[$mid]) {
                    $low++;
                }
                if ($nums[$high] == $nums[$mid]) {
                    $high--;
                }
            }
        }

        return -1;
    }

    // function search($nums, $target) {
    //     $a = array_search($target, $nums);
    //     return $a !== false ? $a : -1;
    // }
}
