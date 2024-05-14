def abbreviate_string(input_string):
    words = input_string.split()  # Split the input string into words
    abbreviation = ''.join(word[0].upper() for word in words)  # Take the first letter of each word and concatenate them

    return abbreviation

# Example usage
input_string = "Damodar Valley Corporation"
abbreviated_string = abbreviate_string(input_string)
print("Abbreviated string:", abbreviated_string)
