
my_list = [1, 2, 3, 4, 5]

for element in my_list:
    print(element)



list1 = [1, 2, 3]
list2 = [4, 5]
concatenated_list = list1 + list2  # Concatenation
repeated_list = list1 * 3  # Repetition
print(2 in list1)  # Membership testing
print(list1[1])  # Index access


my_list = [1, 2, 3, 4, 5]
sliced_list = my_list[1:4]  # Slice from index 1 to 3 (exclusive)
print(sliced_list)  # Output: [2, 3, 4]

my_list = [1, 2, 3]
my_list.append(4)  # Add an element at the end of the list
my_list.insert(1, 5)  # Insert an element at index 1
my_list.pop(2)  # Remove and return the element at index 2
my_list.remove(3)  # Remove the first occurrence of 3
my_list.sort()  # Sort the list in ascending order
my_list.reverse()  # Reverse the order of the list
print(my_list)  # Output: [4, 2, 1]



my_list = [1, 2, 3]
my_tuple = (1, 2, 3)


def square(x):
    return x ** 2

def double(x):
    return 2 * x

result = square(double(3))
print(result)  # Output: 36

