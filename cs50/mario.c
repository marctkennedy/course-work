/**
 * Builds the mario half pyramid using the hash character"#".
 * Example run:
 * Height: 3
 *   ##
 *  ###
 * ####
 */

#include <cs50.h>
#include<stdio.h>

// prototypes
int get_pyramid_height();
void build_pyramid(int pyramid_height);

// constants
#define PYRAMID_MIN_HEIGHT 0
#define PYRAMID_MAX_HEIGHT 23

int main(void)
{
    build_pyramid(get_pyramid_height());
}

/**
 * Gets an integer between 0-23 inclusive.
 */
int get_pyramid_height()
{
    int pyramid_height = -1;
    do
    {
        printf("Height: ");
        pyramid_height = GetInt();
    } while(pyramid_height < PYRAMID_MIN_HEIGHT || pyramid_height > PYRAMID_MAX_HEIGHT);
    
    return pyramid_height;
}


/**
 * Outputs the mario half pyramid to the screen.
 * 
 */
void build_pyramid(int pyramid_height)
{
    int bricks = 2; // strating number of bricks.
    int spaces = pyramid_height + 1 - bricks; // starting number of spaces.

    for (int i = 0; i < pyramid_height; i++)
    {
        for (int j = 0; j < spaces; j++)
            printf(" ");
        for(int k = 0; k < bricks; k++)
            printf("#");

        printf("\n");
        bricks++; // add one brick before we print the next row.
        spaces--; // remome one space before we print the next row.
    }
}
