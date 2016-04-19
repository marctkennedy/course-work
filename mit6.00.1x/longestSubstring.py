# file: longestSubstring.py
# author: Marc Kennedy
# Program that prints the longest substring of s in which the letters occur in
# alphabetical order.

def longestSubstring(s):
    '''(str) -> None
    Finds the longest substring of s in which the letters occur in alphabetical
    order.
    >>> longestSubstring('zyxwvutsrqponmlkjihgfedcba')
    Longest substring in alphabetical order is: z
    >>> longestSubstring('rsnogpqtvfpu')
    Longest substring in alphabetical order is: gpqtv
    '''
    longest = ''
    current = ''

    for i in range( len(s) ):
        if current == '':
            current = s[i]
        else:
            if s[i] >= s[i - 1]:
                current += s[i]
            else:
                if len(current) > len(longest):
                    longest = current
                    current = s[i]
                else:
                    current = s[i]

    if len(current) > len(longest):
        longest = current

    print"Longest substring in alphabetical order is: " + longest


# main program
s = 'zyxwvutsrqponmlkjihgfedcba'

longestSubstring(s)
