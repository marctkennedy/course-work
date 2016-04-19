#include <cs50.h>
#include <ctype.h>
#include <stdio.h>
#include <string.h>

void encrypt_text(string, string);

int main(int argc, string argv[])
{
    // check the number of command-line args equals 2
    if (argc != 2)
    {
        printf("Error! One argument required, %d given.\n", argc - 1);
        return 1;
    }
    
    // make sure input contains only alphabetical characters
    for (int i = 0, len = strlen(argv[1]); i < len; i++)
    {
        if (! isalpha(argv[1][i]))
        {
            printf("Error! argument must only contain alphabetical characters.\n");
            return 1;
        }
    }
    
    // get message to encrypt from the user
    string message = GetString();
    
    // encrypt the message
    encrypt_text(message, argv[1]);
    
    printf("\n");
    
    return 0;
}


/**
 * Encrypts a message using vigenere cypher
 *
 * @param string message The message to be encrypted
 * @param string key The key to use for the cypher
 *
 * @return void
 */
 void encrypt_text(string message, string key)
 {
    char alphabet[] = {'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i',
    'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v',
    'w', 'x', 'y', 'z'};
    
    char encrypted_text[strlen(message)]; // array for the encrypted message
    int key_length = strlen(key);         // length of the key
    int message_val;                      // current alphabet value of message
    int key_val;                          // current alphabet value of key
    int char_count = 0;                   // current key count
    
    for (int i = 0, len = strlen(message); i < len; i++)
    {
        if (isalpha(message[i]))
        {
            // map ascii values to alphabet values
            for (int j = 0; j < 26; j++)
            {
                // map message ascii value to alphabet value
                if (tolower(message[i]) == alphabet[j])
                {
                    message_val = j;
                }
                
                // map key ascii value to alphabet value
                if (tolower(key[char_count % key_length]) == alphabet[j])
                {
                    key_val = j;
                }
            }
            
            if (message_val + key_val < 26)
            {
                // get the current cypher character if the alphabet does not wrap
                if (islower(message[i]))
                {
                    encrypted_text[i] =  alphabet[message_val + key_val];
                }
                else
                {
                    encrypted_text[i] = toupper(alphabet[message_val + key_val]); 
                }
            }
            else
            {
                // get the current cypher character if the alphabet does wrap
                if (islower(message[i]))
                {
                    encrypted_text[i] = alphabet[(message_val + key_val) % 26];
                }
                else
                {
                    encrypted_text[i] = toupper(alphabet[(message_val + key_val) % 26]);
                }
            }
            // increment the value of key[char_count]
            char_count++;
        } 
        else
        {
            // copy message[i] if it is not alphabetical
            encrypted_text[i] = message[i];
        }
        
        // print the encrypted text to the screen
        printf("%c", encrypted_text[i]);
    }
 }
