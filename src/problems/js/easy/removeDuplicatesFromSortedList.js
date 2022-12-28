

/**
 * Remove Duplicates from Sorted List
 * link - https://leetcode.com/problems/remove-duplicates-from-sorted-list
 *
 * Approach:
 * Initialize two pointers (two nodes - current, next)
 * Traverse through each node until second pointer (second node) is not null
 * Check if first node and second node values are the same,
 * then just drop the second node (assign reference of the second node's next node to the first node's next property)
 * Else (values are not the same), then continue traverse (first node references to the second node, second node reference to the next node)
 *
 * Time complexity - O(n)
 * Space complexity - O(1)
 */
const deleteDuplicates = function(head) {
    if (!head) {
        return head;
    }

    let currentNode = head;
    let nextNode = head.next;

    while (nextNode) {
        if (currentNode.val === nextNode.val) {
            nextNode = nextNode.next;
            currentNode.next = nextNode;
        } else {
            currentNode = nextNode;
            nextNode = nextNode.next;
        }
    }

    return head;
};