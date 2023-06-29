<?php

namespace Tests\Unit;

use Tests\TestCase;

class MergeKSortedListsTest extends TestCase
{
    public function testMergeKSortedLists()
    {
        $node1 = new ListNode(1, new ListNode(4, new ListNode(5, null)));
        $node2 = new ListNode(1, new ListNode(3, new ListNode(4, null)));
        $node3 = new ListNode(2, new ListNode(6, null));

        $outPut = $this->mergeKLists([$node1, $node2, $node3]);

        $node = new ListNode(1, new ListNode(1, new ListNode(2, new ListNode(3, new ListNode(4, new ListNode(4, new ListNode(5, new ListNode(6,null))))))));
        $this->assertSame($outPut->toArr(), $node->toArr());

        $outPut = $this->mergeKLists([]);
        $this->assertSame($outPut, []);

        $outPut = $this->mergeKLists([[]]);
        $this->assertSame($outPut, []);
    }

    /*
     * You are given an array of k linked-lists lists, each linked-list is sorted in ascending order.
     *
     * Merge all the linked-lists into one sorted linked-list and return it.
     *
     * Example 1:
     * Input: lists = [[1,4,5],[1,3,4],[2,6]]
     * Output: [1,1,2,3,4,4,5,6]
     * Explanation: The linked-lists are:
        [
          1->4->5,
          1->3->4,
          2->6
        ]
        merging them into one sorted list:
        1->1->2->3->4->4->5->6
     *
     * Example 2:
     * Input: lists = []
     * Output: []
     *
     * Example 3:
     * Input: lists = [[]]
     * Output: []
     */
    private function mergeKLists($lists) {
        if (empty($lists)) {
            return [];
        }

        if (count($lists) === 1) {
            return $lists[0];
        }

        foreach($lists as $index => $list) {
            if ($index === 0) {
                $list1 = $list;
            } else {
                $list1 = $this->mergeTwoLists($list1, $list);
            }
        }

        return $list1;
    }

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

    // private function mergeKLists($lists) {
    //     $res = [];
    //
    //     //將所有 node 的值取出
    //     foreach($lists as $list)
    //     {
    //         $current = $list;
    //
    //         while($current != null){
    //             $res[] = $current->val;
    //             $current = $current->next;
    //         }
    //     }
    //
    //     //排序值
    //     rsort($res);
    //     $l = null;
    //
    //     //重新建立新的 linked list
    //     foreach($res as $r)
    //     {
    //         $l = new ListNode($r, $l);
    //     }
    //
    //     return $l;
    // }
}
