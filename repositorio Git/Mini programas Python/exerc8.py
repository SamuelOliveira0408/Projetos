def sequencia(s, n, r):
    i = 0

    print("\nSequência de Fibonacci:")
    while i < s:
        i = i + 1
        fibonacci = n + r

        print(n, " + ", r, " = ", fibonacci)
        n = fibonacci
        

s = int(input("Digite um valor para delimitar a sequência de Fibonacci: "))
n = int(input("Digite um número para a sequência: "))
r = int(input("Digite um número para a razão: "))

sequencia(s, n, r)