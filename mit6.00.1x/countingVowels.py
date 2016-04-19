# file: countingVowels.py
# author: Marc Kennedy
# Program to count the number of vowels that appear in a string.

def isVowel(char):
    '''(str) -> bool
    Returns True if char is a vowel, False otherwise.
    >>> isVowel('a')
    True
    >>> isVowel('x')
    False
    '''
    return char in ['a', 'e', 'i', 'o', 'u']

def countVowels(s):
    '''(str) -> None
    Counts the number of vowel in s and prints their sum.
    >>> countVowels('gfmeoaeipbvkzvyibwo')
    Number of vowels 7
    >>> countVowels('aaeiaxgaaojcwdmtofiih')
    Number of vowels 11
    '''
    count = 0
    for i in s:
        if isVowel(i):
            count += 1
    print"Number of vowels " + str(count)


# main program
s = 'gfmeoaeipbvkzvyibwo'

countVowels(s)
