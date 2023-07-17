<?php

namespace Tests\Unit;

use Tests\TestCase;

class UniquePathsTest extends TestCase
{
    public function testUniquePaths()
    {
        $outPut = $this->uniquePaths(3, 7);
        $this->assertSame($outPut, 28);

        $outPut = $this->uniquePaths(3, 2);
        $this->assertSame($outPut, 3);
    }

    /*
     * There is a robot on an m x n grid. The robot is initially located at the top-left corner (i.e., grid[0][0]). The robot tries to move to the bottom-right corner (i.e., grid[m - 1][n - 1]). The robot can only move either down or right at any point in time.
     *
     * Given the two integers m and n, return the number of possible unique paths that the robot can take to reach the bottom-right corner.
     *
     * The test cases are generated so that the answer will be less than or equal to 2 * 109.
     *
     * Example 1:
     * Input:  m = 3, n = 7
     * Output: 28
     *
     * Example 2:
     * Input: m = 3, n = 2
     * Output: 3
     * Output: 3
        Explanation: From the top-left corner, there are a total of 3 ways to reach the bottom-right corner:
        1. Right -> Down -> Down
        2. Down -> Down -> Right
        3. Down -> Right -> Down
     */
    private function uniquePaths(int $m, int $n)
    {
        $matrix = [];

        for ($i = 0; $i < $m; $i++) {
            $matrix[] = array_fill(0, $n, 0);
        }

        foreach ($matrix as $colIndex => &$row) {
            foreach ($row as $rowIndex => &$val) {
                if ($colIndex == 0 || $rowIndex == 0) {
                    $val = 1;
                    continue;
                }

                //因為路線只能往右跟往下，每個位置能到達的最多路線，為上方位置加左方位置最多路線總和
                $val = $matrix[$colIndex - 1][$rowIndex] + $matrix[$colIndex][$rowIndex - 1];
            }
        }

        return $matrix[$m - 1][$n - 1];
    }
}
