#include <ctype.h>
#include <cs50.h>
#include <stdio.h>
#include <string.h>

void encrypt_text(string, int);

int main(int argc, string argv[])
{
    // check command-line arg
    if (argc != 2)
    {
        printf("Error! One command line argument required, %d given.\n", argc - 1);
        return 1;
    }
    
    // check for positive integer
    if (argv[1] < 0)
    {
        printf("Error! Argument must be a positive integer.\n");
        return 1;
    }
    
    // get message from user
    //printf("Enter the message to be encrypted: ");
    string message = GetString();
    
    // encrypt message
    encrypt_text(message, atoi(argv[1]));
    
    printf("\n");

    return 0;
}

/**
 * Encrypts message with Caesar cypher and prints the encrypted message to
 * the screen
 *
 * @param string message The string to be encrypted
 * @param int key The key to rotate the characters by
 *
 * @return void
 */
 void encrypt_text(string message,  int key)
 {
    char alphabet[] = {'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i',
    'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v',
    'w', 'x', 'y', 'z'};
    
    char encrypted_text[strlen(message)];
    
    for (int i = 0, len = strlen(message); i < len; i++)
    {
        if (isalpha(message[i]))
        {
            for (int j = 0; j < 26; j++)
            {
                    if (tolower(message[i]) == alphabet[j])
                    {
                        if (j + key < 26)
                        {
                            encrypted_text[i] = islower(message[i]) ? alphabet[j + key]: toupper(alphabet[j + key]);
                        }
                        else
                        {
                            encrypted_text[i] = islower(message[i]) ? alphabet[(j + key) % 26]: toupper(alphabet[(j + key) % 26]);
                        }
                    }
            }
        }
        else
        {
            encrypted_text[i] = message[i];
        }
        
        printf("%c", encrypted_text[i]);
    }
 }
