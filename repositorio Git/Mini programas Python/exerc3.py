def maior_num():
    print("Digite 3 números para determinar o maior:")
    n1 = int(input())
    n2 = int(input())
    n3 = int(input())

    if n1 > n2 and n1 > n3:
        maior = n1
    elif n2 > n1 and n2 > n3:
        maior = n2
    elif n3 > n1 and n3 > n2:
        maior = n3

    return maior

print("O maior número é", maior_num())