my_string = "Hello, World!"
print(my_string[0])  # Accessing the first character
print(my_string[7])  # Accessing the eighth character
print(my_string[-1])  # Accessing the last character


my_string = "Hello"
my_string += " World!"  # Concatenating another string
print(my_string)


my_string = "Hello, World!"
print(my_string[0:5])  # Slicing from index 0 to 4 (exclusive)
print(my_string[7:])  # Slicing from index 7 to the end
print(my_string[:5])  # Slicing from the beginning to index 4 (exclusive)







my_string = "Hello, World!"

print(my_string.upper())  # Convert the string to uppercase

print(my_string.find("World"))  # Find the index of the substring "World"

print(my_string.lower())  # Convert the string to lowercase

print(my_string.capitalize())  # Capitalize the first character

print(my_string.count("l"))  # Count the occurrences of the letter "l"

print("-".join(my_string))  # Join each character with a hyphen

print(len(my_string))  # Get the length of the string

print(my_string.isalnum())  # Check if the string is alphanumeric

print(my_string.isalpha())  # Check if the string is alphabetic

print(my_string.isdigit())  # Check if the string is numeric

print(my_string.islower())  # Check if the string is in lowercase

print(my_string.isnumeric())  # Check if the string is numeric

print(my_string.isspace())  # Check if the string contains only whitespace

print(my_string.isupper())  # Check if the string is in uppercase

print(max(my_string))  # Get the maximum character in the string

print(min(my_string))  # Get the minimum character in the string

print(my_string.replace("World", "Universe"))  # Replace "World" with "Universe"

print(my_string.split(", "))  # Split the string into a list based on the delimiter
