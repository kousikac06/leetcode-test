<?php

namespace Tests\Unit;

use Tests\TestCase;

class SetMatrixZeroesTest extends TestCase
{
    public function testSetMatrixZeroes()
    {
        $matrix = [[1,1,1],[1,0,1],[1,1,1]];
        $outPut = $this->setZeroes($matrix);
        $this->assertSame($outPut, [[1,0,1],[0,0,0],[1,0,1]]);

        $matrix = [[0,1,2,0],[3,4,5,2],[1,3,1,5]];
        $outPut = $this->setZeroes($matrix);
        $this->assertSame($outPut, [[0,0,0,0],[0,4,5,0],[0,3,1,0]]);
    }

    /*
     * Given an m x n integer matrix, if an element is 0, set its entire row and column to 0's.
     *
     * You must do it in place.
     *
     * Example 1:
     * Input: matrix = [[1,1,1],[1,0,1],[1,1,1]]
     * Output: [[1,0,1],[0,0,0],[1,0,1]]
     *
     * Example 2:
     * Input: matrix = [[0,1,2,0],[3,4,5,2],[1,3,1,5]]
     * Output: [[0,0,0,0],[0,4,5,0],[0,3,1,0]]
     */
    private function setZeroes(array &$matrix)
    {
        $zeroLocate = [];

        $rowCount = count($matrix);
        $colCount = count($matrix[0]);

        //紀錄元素為 0 的位置
        foreach ($matrix as $rowIndex => $row) {
            foreach ($row as $colIndex => $col) {
                if ($col === 0) {
                    $zeroLocate[] = [$rowIndex, $colIndex];
                }
            }
        }

        //更新整行和整列的元素
        foreach ($zeroLocate as $locate) {
            for ($i=0; $i<$rowCount; $i++) {
                $matrix[$i][$locate[1]] = 0;
            }

            for ($i=0; $i<$colCount; $i++) {
                $matrix[$locate[0]][$i] = 0;
            }
        }

        return $matrix;
    }
}
