<?php

namespace Tests\Unit;

use Tests\TestCase;

class MergeTwoSortedListsTest extends TestCase
{
    public function testMergeTwoSortedLists()
    {
        $node1 = new ListNode(1, new ListNode(2, new ListNode(4, null)));
        $node2 = new ListNode(1, new ListNode(3, new ListNode(4, null)));

        $outPut = $this->mergeTwoLists($node1, $node2);

        $node = new ListNode(1, new ListNode(1, new ListNode(2, new ListNode(3, new ListNode(4, new ListNode(4,null))))));
        $this->assertSame($outPut->toArr(), $node->toArr());

        $outPut = $this->mergeTwoLists(null, null);
        $this->assertSame($outPut, null);

        $outPut = $this->mergeTwoLists(null, new ListNode(0, null));
        $node = new ListNode(0, null);
        $this->assertSame($outPut->toArr(), $node->toArr());
    }

    /*
     * You are given the heads of two sorted linked lists list1 and list2.
     *
     * Merge the two lists in a one sorted list. The list should be made by splicing together the nodes of the first two lists.
     *
     * Return the head of the merged linked list.
     *
     * Example 1:
     * Input: list1 = [1,2,4], list2 = [1,3,4]
     * Output: [1,1,2,3,4,4]
     *
     * Example 2:
     * Input: list1 = [], list2 = []
     * Output: []
     *
     * Example 3:
     * Input: list1 = [], list2 = [0]
     * Output: [0]
     */
    private function mergeTwoLists($list1, $list2)
    {
        if ($list1 === null) {
            return $list2;
        }
        if ($list2 === null) {
            return $list1;
        }

        if ($list1->val < $list2->val) {
            $mergedList       = $list1;
            $mergedList->next = $this->mergeTwoLists($list1->next, $list2);
        } else {
            $mergedList       = $list2;
            $mergedList->next = $this->mergeTwoLists($list1, $list2->next);
        }

        return $mergedList;
    }
}
