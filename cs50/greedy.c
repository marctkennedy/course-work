/**
 * Calculates the minimum number of coins needed to repay change, using
 * quarters, dimes, nickels and pennies.
 * Example run:
 * How much change is owed? 0.41
 * 4
 *
 * How much change is owed? 1.41
 * 8
 */

#include <cs50.h>
#include <stdio.h>
#include <math.h>

// Prototypes
void calculate_minimum_coins(double change_owed);
double get_change_owed();
int dollars_to_cents(double change_owed);

// Constants
#define MINIMUM_CHANGE_OWED 0.0
#define QUARTERS 25
#define DIMES 10
#define NICKELS 5
#define PENNIES 1

int main(void)
{
    calculate_minimum_coins(get_change_owed());
}


/**
 * Gets the total amount of change owed. Must be a positive amount.
*/
double get_change_owed()
{
    double change_owed;

    do
    {
        printf("How much change is owed? ");
        change_owed = GetFloat();
    } while (change_owed < MINIMUM_CHANGE_OWED);

    return change_owed;
}


/**
 * Converts dollars and cents to cents.
 */
int dollars_to_cents(double change_owed)
{
    int change_in_cents = round(change_owed * 100);
    return change_in_cents; 
}


/**
 * Calculates the minimum coins needed to repay the cahnge owed.
 */
void calculate_minimum_coins(double change_owed)
{
    if (change_owed == 0)
    {
        printf("%d\n", 0);
        exit(1);
    }

    int change_owed_in_cents = dollars_to_cents(change_owed);
    int total_coins = 0;

    while (change_owed_in_cents > 0)
    {
        if (change_owed_in_cents >= QUARTERS)
        {
            change_owed_in_cents = change_owed_in_cents - QUARTERS;
            total_coins++;
        }
        else if (change_owed_in_cents >= DIMES)
        {
            change_owed_in_cents = change_owed_in_cents - DIMES;
            total_coins++;
        }
        else if (change_owed_in_cents >= NICKELS)
        {
            change_owed_in_cents = change_owed_in_cents - NICKELS;
            total_coins++;
        }
        else if (change_owed_in_cents >= PENNIES)
        {
            change_owed_in_cents = change_owed_in_cents - PENNIES;
            total_coins++;
        }
    }
    printf("%d\n", total_coins);
}
