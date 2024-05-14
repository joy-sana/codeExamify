def prime(n):
    #same logic is used by you
    flag=0
    for i in range(2,n):
        if n%i==0:
            flag=1
        else :
            break

    if flag==0 :
        return  "This is prime number" #removed print and braces and add return
    else :
        return  "This is not prime number" #removed print and braces and add return


number=int(input("Enter a number: "))


print(prime(number)) #calling the user define function named as prime