def div(numero):
    divisao = numero / 2

    if numero % 2 == 0:
        return f"O número {numero} é divisível {divisao} vezes"
    else:
        return f"O número {numero} não é divisível por 2"

n = int(input("Digite um número para verificar quantas vezes é divisível por dois: "))
print(div(n))
