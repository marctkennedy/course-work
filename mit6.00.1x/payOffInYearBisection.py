# file: payOffInYearBisection.py
# author: Marc Kennedy
# Program program that calculates the minimum fixed monthly payment needed in
# order pay off a credit card balance within 12 months (uses bisection search).

def calculateBalance(unpaidBalance, interest):
    ''' (number, number) -> float
    Returns the outstanding unpaidBalance including interest.
    >>> balance(4900, 73.50)
    4973.50
    '''

    return unpaidBalance + interest

def minimumPayment(balance, interestRate):
    ''' (number, number) -> float
    Returns the minimum payment due on the balance with
    interestRate.
    Pre-condition: balance must be an int represented in pennies.
    >>> minimumPayment(5000, 0.02)
    100.0
    '''

    return balance * interestRate

def unpaidBalance(balance, minimumPayment):
    ''' (number, number) -> float
    Returns the unpaid account balance after the minimumPayment.
    >>> unpaidBalance(5000, 100)
    4900
    '''

    return balance - minimumPayment

def interest(unpaidBalance, annualInterestRate):
    ''' (number) -> float
    Returns the interest due on the unpaidBalance.
    >>> interest(4900)
    73.50
    '''

    return annualInterestRate / 12.0 * unpaidBalance

#Main program
balance = 320000
annualInterestRate = 0.2
updatedBalance = balance
upperBounds = balance
lowerBounds = 0.0
epsilon = 0.08
minPayment = (upperBounds + lowerBounds) / 2

while abs(updatedBalance) >= epsilon:
    updatedBalance = balance
    
    for i in range(1, 13):
        updatedBalance =  calculateBalance( unpaidBalance(updatedBalance, minPayment), interest( unpaidBalance(updatedBalance, minPayment),  annualInterestRate) )  

    if updatedBalance > 0:
        lowerBounds = minPayment
        minPayment = (upperBounds + lowerBounds) / 2
    else:
        upperBounds = minPayment
        minPayment = (upperBounds + lowerBounds) / 2
        
print 'Lowest Payment:', round(minPayment, 2)
