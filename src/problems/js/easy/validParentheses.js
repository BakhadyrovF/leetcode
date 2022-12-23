/**
 * Valid Parentheses
 * link - https://leetcode.com/problems/valid-parentheses
 *
 * Approach:
 * Iterate through each parenthesis and if it is opening parenthesis, then push it to our stack
 * Else (closing parenthesis), then take top from our stack (LILO) and if stack's top is not our pair, return false
 * If it is our pair - remove it from stack and continue iterating
 *
 * Time complexity - O(n)
 * Space complexity - O(n)
 */
const isValid = function(s) {
    const stack = [];
    const parentheses = {
        '{': '}',
        '(': ')',
        '[': ']'
    };
    let lastElement;

    for (i = 0; i < s.length; i++) {
        if (parentheses[s[i]] !== undefined) {
            stack.push(s[i]);
        } else {
            lastElement = stack.pop()

            if (parentheses[lastElement] !== s[i]) {
                return false;
            }
        }
    }

    return stack.length === 0;
};
