#include <stdio.h>
#include <string.h>
#include <stdlib.h>

void access_secure_file() {
    printf("\nAccessing secure file...\n");
    FILE *file = fopen("secure_intel.txt", "r");
    if (file == NULL) {
        printf("Error: Secure file not found.\n");
        return;
    }

    char line[256];
    while (fgets(line, sizeof(line), file)) {
        printf("%s", line);
    }

    fclose(file);
}

void write_log_entry(const char *entry) {
    char log_entry[50];
    strcpy(log_entry, entry);
    if (strcmp(log_entry, "exploit") == 0) {
        access_secure_file();
    }
}

void process_task() {
    char user_input[120];
    printf("Enter task details: ");
    fgets(user_input, sizeof(user_input), stdin);

    write_log_entry(user_input);
}

int main() {
    printf("Velora Task Logging System\n");

    while (1) {
        int choice;
        printf("\nMenu:\n1. Submit a task\n2. Exit\nEnter your choice: ");
        scanf("%d", &choice);
        getchar();

        if (choice == 1) {
            process_task();
        } else if (choice == 2) {
            printf("Exiting system.\n");
            break;
        } else {
            printf("Invalid choice. Try again.\n");
        }
    }

    return 0;
}
