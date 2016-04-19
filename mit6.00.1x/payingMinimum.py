# file: payingMinimum.py
# author: Marc Kennedy
# Program to calculate the credit card balance after one year if a person only
# pays the minimum monthly payment required by the credit card company each
# month.

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


#Main Program
balance = 4213
annualInterestRate = 0.2
monthlyPaymentRate = 0.04
minPayment = 0
totalPayed = 0

for i in range(1, 13):
    minPayment = minimumPayment(balance, monthlyPaymentRate)
    totalPayed += minimumPayment(balance, monthlyPaymentRate)
    balance = calculateBalance(unpaidBalance(balance, minimumPayment(balance, monthlyPaymentRate)), interest(unpaidBalance(balance, minimumPayment(balance, monthlyPaymentRate)), annualInterestRate))
    
    print 'Month: ' + str(i)
    print 'Minimum monthly payment: ' + str( round(minPayment, 2) )
    print 'Remaining balance: ' + str( round(balance, 2) )

print 'Total paid: ' + str( round(totalPayed, 2) )
print 'Remaining balance: ' + str( round(balance, 2) )
