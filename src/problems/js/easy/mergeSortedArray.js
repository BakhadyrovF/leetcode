

/**
 * Merge Sorted Array
 * link - https://leetcode.com/problems/merge-sorted-array
 *
 * Note: nums1 array contain zeros that should be ignored,
 * zeros added for not being worried about memory that array take - nums1 has exact length of result (merged arrays)
 */


/**
 * Approach:
 * Initialize two pointers for two arrays,
 * start iterating from the end of arrays,
 * iterate until both pointers are less than 0,
 * check which array value is higher and push value to result array starting from the end.
 *
 * Time complexity - O(n)
 * Space complexity - O(1)
 */
const merge = function(nums1, m, nums2, n) {
    if (m === 0) {
        for (i = 0; i < n; i++) {
            nums1[i] = nums2[i];
        }
    }
    if (n === 0) {return;}

    let firstPointer = m - 1;
    let secondPointer = n - 1;
    let countDown = nums1.length - 1;

    while (firstPointer >= 0 || secondPointer >= 0) {
        if (nums2[secondPointer] === undefined || nums1[firstPointer] !== undefined && nums1[firstPointer] > nums2[secondPointer]) {
            nums1[countDown--] = nums1[firstPointer--];
        } else {
            nums1[countDown--] = nums2[secondPointer--];
        }
    }
};