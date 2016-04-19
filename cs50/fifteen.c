/**
 * fifteen.c
 *
 * Computer Science 50
 * Problem Set 3
 *
 * Implements the Game of Fifteen (generalized to d x d).
 *
 * Usage: ./fifteen d
 *
 * whereby the board's dimensions are to be d x d,
 * where d must be in [MIN,MAX]
 *
 * Note that usleep is obsolete, but it offers more granularity than
 * sleep and is simpler to use than nanosleep; `man usleep` for more.
 */
 
#define _XOPEN_SOURCE 500

#include <cs50.h>
#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>

// board's minimal dimension
#define MIN 3

// board's maximal dimension
#define MAX 9

// board, whereby board[i][j] represents row i and column j
int board[MAX][MAX];

// board's dimension
int d;

// Current position of blank tile
int blank_column;
int blank_row;

// prototypes
void clear(void);
void greet(void);
void init(void);
void draw(void);
bool move(int tile);
bool won(void);
void save(void);

int main(int argc, string argv[])
{
    // greet player
    greet();

    // ensure proper usage
    if (argc != 2)
    {
        printf("Usage: ./fifteen d\n");
        return 1;
    }

    // ensure valid dimensions
    d = atoi(argv[1]);
    if (d < MIN || d > MAX)
    {
        printf("Board must be between %i x %i and %i x %i, inclusive.\n",
            MIN, MIN, MAX, MAX);
        return 2;
    }

    // initialize the board
    init();

    // accept moves until game is won
    while (true)
    {
        // clear the screen
        clear();

        // draw the current state of the board
        draw();

        // saves the current state of the board (for testing)
        save();

        // check for win
        if (won())
        {
            printf("ftw!\n");
            break;
        }

        // prompt for move
        printf("Tile to move: ");
        int tile = GetInt();

        // move if possible, else report illegality
        if (!move(tile))
        {
            printf("\nIllegal move.\n");
            usleep(500000);
        }

        // sleep for animation's sake
        usleep(500000);
    }

    // that's all folks
    return 0;
}

/**
 * Clears screen using ANSI escape sequences.
 */
void clear(void)
{
    printf("\033[2J");
    printf("\033[%d;%dH", 0, 0);
}

/**
 * Greets player.
 */
void greet(void)
{
    clear();
    printf("GAME OF FIFTEEN\n");
    usleep(2000000);
}

/**
 * Initializes the game's board with tiles numbered 1 through d*d - 1,
 * (i.e., fills board with values but does not actually print them),
 * whereby board[i][j] represents row i and column j.
 */
void init(void)
{
    // Find largest tile number for the board
	int start_num = d * d - 1;

    // Setup the board
	for (int i = 0; i < d; i++)
	{
		for (int j = 0; j < d; j++)
		{
			if (start_num != 0)
			{
				// Assign board number to current tile
				board[i][j] = start_num;
				start_num--;
			}
			else
			{
				// Set blank tile to a underscore, not a number
				board[i][j] = 95;
			}
		}
	}

	// Reverse the 1 and 2 tiles if the board size has odd number of tiles
	if (d % 2 == 0)
	{
		board[d - 1][d - 2] = 2;
		board[d - 1][d - 3] = 1;
	}
}

/**

 * Prints the board in its current state.
 */
void draw(void)
{
    // Print board
	for (int i = 0; i < d; i++)
	{
		for (int j = 0; j < d; j++)
		{
		    // If the current tile is the blank tile
			if (board[i][j] == 95)
			{
			    // Set the current position of the blank tile
			    blank_column = i;
				blank_row = j;
				
			    // Don't print leading space before underscore on blank tile
				if (d < 4)
				{
					printf("%c ", board[i][j]);
				}
				else
				{
				    // Print leading space before underscore on blank tile
					printf("%2c ", board[i][j]);
				}
			}
			else
			{
				if (board[i][j] < 10 && d > 3)
				{
					printf("%2d ", board[i][j]);
				}
				else
				{
					printf("%d ", board[i][j]);
				}
			}
		}
		printf("\n");
	}
}

/**
 * If tile borders empty space, moves tile and returns true, else
 * returns false. 
 */
bool move(int tile)
{
    // To hold the current position of tile
    int move_column, move_row;

    // Get the current position of tile
	for (int i = 0; i < d; i++)
	{
		for (int j = 0; j < d; j++)
		{
			if (board[i][j] == tile)
			{
				move_column = i; // Current column of tile
				move_row = j;    // Current row of tile
			}
		}

	}

    // Check to see if the requested move is legal
	if ( ( move_column == blank_column && ( move_row == blank_row + 1 || move_row == blank_row - 1 ) ) || ( move_row == blank_row && ( move_column == blank_column + 1 || move_column == blank_column - 1 ) ) )
	{
	    // Swap the tiles
		board[move_column][move_row] = 95;
		board[blank_column][blank_row] = tile;

		return true;
	}

	return false;
}

/**
 * Returns true if game is won (i.e., board is in winning configuration), 
 * else false.
 */
bool won(void)
{
    int start_tile = 1; // Starting number of the top left tile
	bool won = false;   // Game over?
	int true_count = 0; // Keep count of correct tiles
	int last_tile;      // Current value of the last tile bottom right

    // Check to see if all the tiles are in winning order
	for (int i = 0; i < d; i++)
	{
		for (int j = 0; j < d; j++)
		{
			if (board[i][j] == start_tile)
			{
			    // Add one to true_count if the tile value matches win value
				true_count++;
			}

            // Find the value of the last tile bottom right
			if (i == d - 1 && j == d - 1)
			{
				last_tile = board[i][j];
			}

			start_tile++;
		}
	}

    // If all the tiles match you have won, return true
	if (true_count == d * d - 1 && last_tile == 95)
	{
		won = true;
	}	

	return won;
}

/**
 * Saves the current state of the board to disk (for testing).
 */
void save(void)
{
    // log
    const string log = "log.txt";

    // delete existing log, if any, before first save
    static bool saved = false;
    if (!saved)
    {
        unlink(log);
        saved = true;
    }

    // open log
    FILE* p = fopen(log, "a");
    if (p == NULL)
    {
        return;
    }

    // log board
    fprintf(p, "{");
    for (int i = 0; i < d; i++)
    {
        fprintf(p, "{");
        for (int j = 0; j < d; j++)
        {
            fprintf(p, "%i", board[i][j]);
            if (j < d - 1)
            {
                fprintf(p, ",");
            }
        }
        fprintf(p, "}");
        if (i < d - 1)
        {
            fprintf(p, ",");
        }
    }
    fprintf(p, "}\n");

    // close log
    fclose(p);
}
