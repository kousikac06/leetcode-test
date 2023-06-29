<?php

namespace Tests\Unit;

use Tests\TestCase;

class RemoveNthNodeFromEndOfListTest extends TestCase
{
    public function testRemoveNthNodeFromEndOfList()
    {
        for ($i = 5; $i >= 1; $i--) {
            $head = new ListNode($i, $head ?? null);
        }

        $outPut = $this->removeNthFromEnd($head, 2);
        $this->assertSame($outPut->toArr(), [1,2,3,5]);

        $head = new ListNode(1, null);
        $outPut = $this->removeNthFromEnd($head, 1);
        $this->assertSame($outPut ?? [], []);

        $head = new ListNode(1, new ListNode(2, null));
        $outPut = $this->removeNthFromEnd($head, 1);
        $this->assertSame($outPut->toArr(), [1]);
    }

    /*
     * Given the head of a linked list, remove the nth node from the end of the list and return its head.
     *
     * Example 1:
     * Input: head = [1,2,3,4,5], n = 2
     * Output: [1,2,3,5]
     *
     * Example 2:
     * Input: head = [1], n = 1
     * Output: []
     *
     * Example 3:
     * Input: head = [1,2], n = 1
     * Output: [1]
     */
    private function removeNthFromEnd($head, $n)
    {
        $length = 0;
        $curr = $head;

        while ($curr) {
            $length += 1;
            $curr = $curr->next;
        }

        $prevItem = null;
        $curr = $head;
        $pos = 0;

        while($curr) {
            if ($n === ($length - $pos)) {
                if ($prevItem) {
                    $prevItem->next = $curr->next;
                } else {
                    $head = $head->next;
                }
            }

            $prevItem = $curr;
            $curr = $curr->next;
            $pos += 1;
        }

        return $head;
    }
}

class ListNode
{
    public $val  = 0;
    public $next = null;

    public function __construct($val = 0, $next = null)
    {
        $this->val  = $val;
        $this->next = $next;
    }

    public function toArr() {
        $arr = [];
        $curr = $this;

        while ($curr) {
            $arr[] = $curr->val;
            $curr = $curr->next;
        }

        return $arr;
    }
}
