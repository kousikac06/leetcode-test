<?php

namespace Tests\Unit;

use Tests\TestCase;

class WordSearchTest extends TestCase
{
    public function testWordSearch()
    {
        $outPut = $this->exist([["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]], "ABCCED");
        $this->assertSame($outPut, true);

        $outPut = $this->exist([["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]], "SEE");
        $this->assertSame($outPut, true);

        $outPut = $this->exist([["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]], "ABCB");
        $this->assertSame($outPut, false);
    }

    /*
     * Given an m x n grid of characters board and a string word, return true if word exists in the grid.
     *
     * The word can be constructed from letters of sequentially adjacent cells, where adjacent cells are horizontally or vertically neighboring. The same letter cell may not be used more than once.
     *
     * Example 1:
     * Input: board = [["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]], word = "ABCCED"
     * Output: true
     *
     * Example 2:
     * Input: board = [["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]], word = "SEE"
     * Output: true
     *
     * Example 3:
     * Input: board = [["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]], word = "ABCB"
     * Output: false
     */
    private function exist($board, $word)
    {
        //建立對應陣列
        $visited = array_fill(0, count($board), array_fill(0, count($board[0]), false));

        for ($i = 0; $i < count($board); $i++) {
            for ($j = 0; $j < count($board[0]); $j++) {
                if ($this->searchWord($board, $visited, $word, 0, $i, $j)) {
                    return true;
                }
            }
        }

        return false;
    }

    //確認沒超出邊界
    private function isInBoard($board, $x, $y)
    {
        return $x >= 0 && $x < count($board) && $y >= 0 && $y < count($board[0]);
    }

    private function searchWord($board, &$visited, $word, $index, $x, $y)
    {
        //假如找到最後一筆，就不用往下繼續找，一定是倒數前一個元素的前後左右
        if ($index === strlen($word) - 1) {
            return $board[$x][$y] === $word[$index];
        }

        if ($board[$x][$y] === $word[$index]) {
            $visited[$x][$y] = true;

            $dir = [[-1, 0], [0, 1], [1, 0], [0, -1]];

            //往四個方向尋找，並且是未被找到的元素
            for ($i = 0; $i < 4; $i++) {
                $nx = $x + $dir[$i][0];
                $ny = $y + $dir[$i][1];

                if ($this->isInBoard($board, $nx, $ny) && !$visited[$nx][$ny] && $this->searchWord($board, $visited,
                        $word, $index + 1, $nx, $ny)) {
                    return true;
                }
            }

            $visited[$x][$y] = false;
        }

        return false;
    }
}
