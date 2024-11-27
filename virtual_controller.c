#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>

#define COMMAND_FILE "D:/AllFiles/wamp64/www/command.txt"

int main() {
    char command[10];
    char last_command[10] = "";

    printf("Virtual Controller Started\n");

    while (1) {
        FILE *file = fopen(COMMAND_FILE, "r");
        if (file) {
            fscanf(file, "%s", command);
            fclose(file);

            if (strcmp(command, last_command) != 0) {
                if (strcmp(command, "ON") == 0) {
                    printf("Relay is ON. Bulb is ON.\n");
                } else if (strcmp(command, "OFF") == 0) {
                    printf("Relay is OFF. Bulb is OFF.\n");
                } else {
                    printf("Unknown command: %s\n", command);
                }

                strcpy(last_command, command);
            }
        }

        sleep(1);
    }

    return 0;
}
