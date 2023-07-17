<?php

namespace Tests\Unit;

use Tests\TestCase;

class MergeIntervalsTest extends TestCase
{
    public function testMergeIntervals()
    {
        $outPut = $this->merge([[1,3],[2,6],[8,10],[15,18]]);
        $this->assertSame($outPut, [[1,6],[8,10],[15,18]]);

        $outPut = $this->merge([[1,4],[4,5]]);
        $this->assertSame($outPut, [[1,5]]);
    }

    /*
     * Given an array of intervals where intervals[i] = [starti, endi], merge all overlapping intervals, and return an array of the non-overlapping intervals that cover all the intervals in the input.
     *
     * Example 1:
     * Input: intervals = [[1,3],[2,6],[8,10],[15,18]]
     * Output: [[1,6],[8,10],[15,18]]
     * Explanation: Since intervals [1,3] and [2,6] overlap, merge them into [1,6].
     *
     * Example 2:
     * Input: intervals = [[1,4],[4,5]]
     * Output: [[1,5]]
     * Explanation: Intervals [1,4] and [4,5] are considered overlapping.
     *
     */
    private function merge($intervals)
    {
        sort($intervals);

        //經排序後已第一個區間為初始
        $ret = [array_shift($intervals)];

        foreach ($intervals as $interval) {
            $end = end($ret)[1];

            //因已做過排序，假如前一筆區間結尾大於後一筆的區間開頭，表示不需要合併
            if ($end < $interval[0]) {
                $ret[] = $interval;
                continue;
            }

            //反之表示區間重疊，因已排序區間開頭固定，結尾找最大值即可
            $ret[count($ret) - 1][1] = max($interval[1], $end);
        }

        return $ret;
    }
}
