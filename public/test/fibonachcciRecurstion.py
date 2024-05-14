n = int(input("Enter the number of terms: "))

# Initializing the first two terms
num1, num2 = 0, 1

# Print the first two terms
print(num1, end=" ")
print(num2, end=" ")

# Generate and print the Fibonacci series
for _ in range(n - 2):
    next_num = num1 + num2
    print(next_num, end=" ")
    num1, num2 = num2, next_num
