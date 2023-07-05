<?php

namespace Tests\Unit;

use Tests\TestCase;

class RotateImageTest extends TestCase
{
    public function testRotateImage()
    {
        $matrix = [[1,2,3],[4,5,6],[7,8,9]];
        $outPut = $this->rotate($matrix);
        $this->assertSame($outPut, [[7,4,1],[8,5,2],[9,6,3]]);

        $matrix = [[5,1,9,11],[2,4,8,10],[13,3,6,7],[15,14,12,16]];
        $outPut = $this->rotate($matrix);
        $this->assertSame($outPut, [[15,13,2,5],[14,3,4,1],[12,6,8,9],[16,7,10,11]]);
    }

    /*
     * You are given an n x n 2D matrix representing an image, rotate the image by 90 degrees (clockwise).
     *
     * You have to rotate the image in-place, which means you have to modify the input 2D matrix directly. DO NOT allocate another 2D matrix and do the rotation.
     *
     * Example 1:
     * Input: matrix = [[1,2,3],[4,5,6],[7,8,9]]
     * Output: [[7,4,1],[8,5,2],[9,6,3]]
     *
     * Example 2:
     * Input: matrix = [[5,1,9,11],[2,4,8,10],[13,3,6,7],[15,14,12,16]]
     * Output: [[15,13,2,5],[14,3,4,1],[12,6,8,9],[16,7,10,11]]
     */
    private function rotate(&$matrix)
    {
        $temp = $matrix;

        foreach($matrix as $x => $items) {
            foreach($items as $y => $val) {
                $matrix[$y][count($items) - ($x+1)] = $temp[$x][$y];
            }
        }

        return $matrix;
    }

    // function rotate(&$matrix) {
    //     $n = count($matrix);
    //     $ar = [];
    //     $j = $n-1;
    //     $i = 0;
    //
    //     while($i < $n){
    //         $t[] = $matrix[$j][$i];
    //         $j--;
    //
    //         if($j < 0){
    //             $ar[] = $t;
    //             $t = [];
    //             $j = $n - 1;
    //             $i ++;
    //         }
    //     }
    //
    //     $matrix = $ar;
    // }
}
