//
// breakout.c
//
// Computer Science 50
// Problem Set 4
//

// standard libraries
#define _XOPEN_SOURCE
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <time.h>

// Stanford Portable Library
#include "gevents.h"
#include "gobjects.h"
#include "gwindow.h"

// height and width of game's window in pixels
#define HEIGHT 600
#define WIDTH 400

// number of rows of bricks
#define ROWS 5

// number of columns of bricks
#define COLS 10

// radius of ball in pixels
#define RADIUS 10

// lives
#define LIVES 3

// height and width of ball
#define BALL_HEIGHT 20
#define BALL_WIDTH 20

// height and width of paddle
#define PADDLE_HEIGHT 10
#define PADDLE_WIDTH 50

// prototypes
void initBricks(GWindow window);
GOval initBall(GWindow window);
GRect initPaddle(GWindow window);
GLabel initScoreboard(GWindow window);
void updateScoreboard(GWindow window, GLabel label, int points);
GObject detectCollision(GWindow window, GOval ball);

int main(void)
{
    // seed pseudorandom number generator
    srand48(time(NULL));

    // instantiate window
    GWindow window = newGWindow(WIDTH, HEIGHT);

    // instantiate bricks
    initBricks(window);

    // instantiate ball, centered in middle of window
    GOval ball = initBall(window);

    // instantiate paddle, centered at bottom of window
    GRect paddle = initPaddle(window);

    // instantiate scoreboard, centered in middle of window, just above ball
    GLabel label = initScoreboard(window);

    // number of bricks initially
    int bricks = COLS * ROWS;

    // number of lives initially
    int lives = LIVES;

    // number of points initially
    int points = 0;

    // initial velocity
    double velocity = drand48() + 2;
    
    // set x direction to zero so the ball moves downward
    double dx = 0.0;

    // keep playing until game over
    while (lives > 0 && bricks > 0)
    {
        // check for mouse event
        GEvent event = getNextEvent(MOUSE_EVENT);

        // if we heard one
        if (event != NULL)
        {
            // if the event was movement
            if (getEventType(event) == MOUSE_MOVED)
            {
                // ensure paddle follows top cursor
                double x = getX(event) - getWidth(paddle) / 2;
                double y = HEIGHT - 75;
                setLocation(paddle, x, y);
            }
        }
        
        // GOD mode. Make the paddle track the ball itself
        //setLocation(paddle, getX(ball) - getWidth(paddle) / 2, HEIGHT - 75);
        
        // move ball along y-axis
        move(ball, dx, velocity);

        // bounce off top edge of window
        if (getY(ball) <= 0)
        {
            velocity = -velocity; // change the direction of the ball
        }
        // bounce off right edge of window
        else if (getX(ball) + getWidth(ball) >= getWidth(window))
        {
            dx = -dx; // change the x direction to bounce the ball of the edge
        }
        // bounce off bottom edge of window
        else if (getY(ball) + getHeight(ball) >= getHeight(window))
        {
            lives--; // remove one life
            dx = 0.0; // reset the x direction so the ball moves straight downward
            setLocation(ball, WIDTH / 2 - BALL_WIDTH / 2, HEIGHT / 2 - BALL_HEIGHT / 2); // reset ball to start position
            setLocation(paddle, WIDTH / 2 - PADDLE_WIDTH / 2, HEIGHT - 75); // reset paddle to start position
            // wait for click before continuing
            if (lives != 0)
            {
                waitForClick();
            }
        }
        // bounce off left edge of window
        else if (getX(ball) <= 0)
        {
            dx = -dx; // change the x direction to bounce the ball of the edge
        }
        
        // Detect a collision
        GObject object = detectCollision(window, ball);
        
        // if we have a collision
        if (object != NULL)
        {
            // if the ball touches the paddle, change the balls direction
            if (object == paddle)
            {
                // check if the ball is heading downward
                if (velocity > 0)
                {
                    velocity = -velocity; // change the direction of the ball
                    
                    if (dx < 0)
                    {
                        dx = -drand48();
                    }
                    else
                    {
                        dx = drand48();
                    }
                }    
            }
            // if the ball touches a brick, change the balls direction
            // and remove the brick
            else if (strcmp(getType(object), "GRect") == 0)
            {
                velocity = -velocity;          // change the direction of the ball
                removeGWindow(window, object); // remove the brick that the ball touched
                points++;                      // add one to score
                updateScoreboard(window, label, points); // update the scoreboard
            }
        }
        
        // check to see if the game has finished
        if (points == 50 || lives == 0)
        {
            if (points  == 50)
            {
                // remove score from window
                removeGWindow(window, label);
                
                // display winning message
                GLabel win = newGLabel("You Win!");
                setFont(win, "SansSerif-36");
                setColor(win, "CYAN");
                add(window, win);
    
                // center winning message
                double x = (getWidth(window) - getWidth(win)) / 2;
                double y = (getHeight(window) - getHeight(win)) / 2;
                setLocation(win, x, y);
            }
            else
            {
                // remove score from window
                removeGWindow(window, label);
                
                // display losing message
                GLabel lose = newGLabel("You Lose!");
                setFont(lose, "SansSerif-48");
                setColor(lose, "CYAN");
                add(window, lose);
    
                // center losing message
                double x = (getWidth(window) - getWidth(lose)) / 2;
                double y = (getHeight(window) - getHeight(lose)) / 2;
                setLocation(lose, x, y);
            }
            break;
        }

        // linger before moving again
        pause(10);
    }

    // wait for click before exiting
    waitForClick();

    // game over
    closeGWindow(window);
    return 0;
}

/**
 * Initializes window with a grid of bricks.
 */
void initBricks(GWindow window)
{
    // Size of the gap between the bricks in pixels
    const int GAP_SIZE = 5;
    
    // Width of a brick
    const double BRICK_WIDTH = (WIDTH - GAP_SIZE * 11) / COLS;
    
    // Height of brick
    const int BRICK_HEIGHT = 10;
    
    // colours for each row of bricks
    char *colours[5] = {"RED", "ORANGE", "YELLOW", "GREEN", "CYAN"};
    
    // x and y coordinates for the brick
    int x;
    int y = 50;
    
    for (int i = 0; i < ROWS; i++)
    {
        // calculate the next x coordinate
        int x = (WIDTH - (BRICK_WIDTH * COLS + GAP_SIZE * 9)) / 2;
        
        for (int j = 0; j < COLS; j++)
        {
            GRect brick = newGRect(x, y, BRICK_WIDTH, BRICK_HEIGHT);
            setFilled(brick, true);
            setColor(brick, colours[i]);
            add(window, brick);
            x = x + BRICK_WIDTH + GAP_SIZE;  
        }
        
        // calculate the next y coordinate
        y = y + BRICK_HEIGHT + GAP_SIZE;
    }
}

/**
 * Instantiates ball in center of window.  Returns ball.
 */
GOval initBall(GWindow window)
{
    // center the ball on the screen
    // starting x position of ball
    double x = WIDTH / 2 - BALL_WIDTH / 2;
    // starting y position of ball
    double y = HEIGHT / 2 - BALL_HEIGHT / 2;
    
    // create the ball and add it to the screen
    GOval ball = newGOval(x, y, BALL_WIDTH, BALL_HEIGHT);
    setFilled(ball, true);
    setColor(ball, "BLACK");
    add(window, ball);
    
    return ball;
}

/**
 * Instantiates paddle in bottom-middle of window.
 */
GRect initPaddle(GWindow window)
{   
    // paddle x and y coordinates for the starting position
    double x = WIDTH / 2 - PADDLE_WIDTH / 2;
    double y = HEIGHT - 75;

    // create the paddle and position it in the game window
    GRect paddle = newGRect(x, y, PADDLE_WIDTH, PADDLE_HEIGHT);
    setFilled(paddle, true);
    setColor(paddle, "BLACK");
    add(window, paddle);
    
    return paddle;
}

/**
 * Instantiates, configures, and returns label for scoreboard.
 */
GLabel initScoreboard(GWindow window)
{
    // instantiate label
    GLabel score = newGLabel("0");
    setFont(score, "SansSerif-48");
    setColor(score, "CYAN");
    add(window, score);
    sendToBack(score);
    
    // center label
    double x = (getWidth(window) - getWidth(score)) / 2;
    double y = (getHeight(window) - getHeight(score)) / 2;
    setLocation(score, x, y);
        
    return score;
}

/**
 * Updates scoreboard's label, keeping it centered in window.
 */
void updateScoreboard(GWindow window, GLabel label, int points)
{
    // update label
    char s[12];
    sprintf(s, "%i", points);
    setLabel(label, s);

    // center label in window
    double x = (getWidth(window) - getWidth(label)) / 2;
    double y = (getHeight(window) - getHeight(label)) / 2;
    setLocation(label, x, y);
}

/**
 * Detects whether ball has collided with some object in window
 * by checking the four corners of its bounding box (which are
 * outside the ball's GOval, and so the ball can't collide with
 * itself).  Returns object if so, else NULL.
 */
GObject detectCollision(GWindow window, GOval ball)
{
    // ball's location
    double x = getX(ball);
    double y = getY(ball);

    // for checking for collisions
    GObject object;

    // check for collision at ball's top-left corner
    object = getGObjectAt(window, x, y);
    if (object != NULL)
    {
        return object;
    }

    // check for collision at ball's top-right corner
    object = getGObjectAt(window, x + 2 * RADIUS, y);
    if (object != NULL)
    {
        return object;
    }

    // check for collision at ball's bottom-left corner
    object = getGObjectAt(window, x, y + 2 * RADIUS);
    if (object != NULL)
    {
        return object;
    }

    // check for collision at ball's bottom-right corner
    object = getGObjectAt(window, x + 2 * RADIUS, y + 2 * RADIUS);
    if (object != NULL)
    {
        return object;
    }

    // no collision
    return NULL;
}
