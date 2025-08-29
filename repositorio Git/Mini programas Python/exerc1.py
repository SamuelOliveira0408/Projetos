def verificar(n):
    if n % 2 == 0:
        return "é um número par"
    else:
        return "é um número ímpar"

n = int(input("Digite um número para verificar se é par ou ímpar: "))

print(verificar(n))