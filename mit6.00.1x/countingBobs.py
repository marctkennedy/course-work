# file: countingBobs.py
# author: Marc Kennedy
# Program to count the number of occurrences of the name 'bob' that appear in a
# string.

def checkForBob(input, start):
    '''(str, int) -> bool
    Returns True if bob appears in input starting a element start, returns False
    otherwise.
    >>> checkForBob('bobobobgobobbooboboblobobnbboob', 0)
    True
    '''
    if input[start : start + 3] == 'bob':
        return True
    else:
        return False

def countBobs(s):
    '''(str) -> None
    Counts the number of ocurrences of the name 'bob' in s and prints their sum.
    >>> countBobs('oboboboboboqbobbmbobobboobobbobobbaboobbobbooboog')
    Number of times bob occurs is: 11 
    '''
    index = 0
    count = 0
    for i in s:
        if i == 'b':
            if checkForBob(s, index):
                count += 1
        index += 1
    print"Number of times bob occurs is: " + str(count)

# main program
s = 'oboboboboboqbobbmbobobboobobbobobbaboobbobbooboog'

countBobs(s) 
