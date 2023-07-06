<?php

namespace Tests\Unit;

use Tests\TestCase;

class SpiralMatrixTest extends TestCase
{
    public function testSpiralMatrix()
    {
        $outPut = $this->spiralOrder([[1,2,3],[4,5,6],[7,8,9]]);
        $this->assertSame($outPut, [1,2,3,6,9,8,7,4,5]);

        $outPut = $this->spiralOrder([[1,2,3,4],[5,6,7,8],[9,10,11,12]]);
        $this->assertSame($outPut, [1,2,3,4,8,12,11,10,9,5,6,7]);
    }

    /*
     * Given an m x n matrix, return all elements of the matrix in spiral order.
     *
     *
     * Example 1:
     * Input: Input: matrix = [[1,2,3],[4,5,6],[7,8,9]]
     * Output: [1,2,3,6,9,8,7,4,5]
     *
     * Example 2:
     * Input: matrix = [[1,2,3,4],[5,6,7,8],[9,10,11,12]]
     * Output: [1,2,3,4,8,12,11,10,9,5,6,7]
     */
    private function spiralOrder($matrix)
    {
        /**
         * 旋轉偏移規律
         * 右：x 不變,y 增加
         * 下：y 不變,x 增加
         * 左：x 不變,y 減少
         * 右：y 不變,x 減少
         */
        $dirs = [[0, 1], [1, 0], [0, -1], [-1, 0]];

        $result = [];

        $n = count($matrix);
        $m = count($matrix[0]);
        $count = $n * $m;

        $i = 0;
        $j = 0;
        //紀錄當前方向使用
        $dir = 0;

        //循環直到 output 陣列元素包含所有數字
        while(count($result) < $count) {
            if ($matrix[$i][$j] !== null) {
                $result[] = $matrix[$i][$j];
                $matrix[$i][$j] = null;
            }

            $nextI = $i + $dirs[$dir][0];
            $nextJ = $j + $dirs[$dir][1];

            //不存在表示超越邊界，換一個方向
            if (!isset($matrix[$nextI][$nextJ])) {
                $dir = ($dir + 1) % 4;
                $nextI = $i + $dirs[$dir][0];
                $nextJ = $j + $dirs[$dir][1];
            }

            $i = $nextI;
            $j = $nextJ;
        }

        return $result;
    }
}
